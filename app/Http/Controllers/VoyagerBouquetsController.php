<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class VoyagerBouquetsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function insertUpdateData($request, $slug, $rows, $data)
    {

        $multi_select = [];

        // Pass $rows so that we avoid checking unused fields
        $request->attributes->add(['breadRows' => $rows->pluck('field')->toArray()]);

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
            ? $data->prepareTranslations($request)
            : [];

        foreach ($rows as $row) {
            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                // if the field is a belongsToMany relationship, don't remove it
                // if no content is provided, that means the relationships need to be removed
                if (isset($row->details->type) && $row->details->type !== 'belongsToMany') {
                    continue;
                }
            }

            // Value is saved from $row->details->column row
            if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row, $row->details);

            if ($row->type == 'relationship' && $row->details->type != 'belongsToMany') {
                $row->field = @$row->details->column;
            }

            /*
             * merge ex_images/files and upload images/files
             */
            if (in_array($row->type, ['multiple_images', 'file']) && !is_null($content)) {
                if (isset($data->{$row->field})) {
                    $ex_files = json_decode($data->{$row->field}, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($content)));
                    }
                }
            }

            if (is_null($content)) {

                // If the image upload is null and it has a current image keep the current image
                if ($row->type == 'image' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                    if (!$content) {
                        $content = json_encode([]);
                    }
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }
            }

            if ($row->type == 'relationship' && $row->details->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = [
                    'model'           => $row->details->model,
                    'content'         => $content,
                    'table'           => $row->details->pivot_table,
                    'foreignPivotKey' => $row->details->foreign_pivot_key ?? null,
                    'relatedPivotKey' => $row->details->related_pivot_key ?? null,
                    'parentKey'       => $row->details->parent_key ?? null,
                    'relatedKey'      => $row->details->key,
                    'pivotDatas'      => $row->details->pivot_datas ?? null,
                    'FieldName'       => $row->field,
                ];
            } else {
                $data->{$row->field} = $content;
            }
        }

        if (isset($data->additional_attributes)) {
            foreach ($data->additional_attributes as $attr) {
                if ($request->has($attr)) {
                    $data->{$attr} = $request->{$attr};
                }
            }
        }
        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }
        $collection = new Collection();
        foreach ($multi_select as $sync_data) {
            if ($sync_data['table'] == 'category_product') {
                $collection->push($sync_data['content']);
            }
        }
        $collection = $collection->collapse()->unique()->toArray();
        foreach ($multi_select as $sync_data) {
            //if there is pivot data parameters
            if ($sync_data['table'] == 'category_product') {
                $sync_data['content'] = $collection;
            }
            if (isset($sync_data['pivotDatas'])) {

                if(count($sync_data['pivotDatas']) != null && count($sync_data['content']) != null){
                    $pivot_tab = [];
                    //we are looking for pivot data value

                    foreach($sync_data['content'] as $key => $content_to_sync_with){
                        $pivot_rows = [];
                        foreach($sync_data['pivotDatas'] as $pivot_data){

                            //name of the column in the pivot table
                            $name_of_pivot = $pivot_data[0];

                            //form field name
                            $name_of_formField = $sync_data['FieldName']."-".$name_of_pivot;

                            //value of this form field name
                            $value = $request->$name_of_formField[$key];
                            $pivot_rows[$name_of_pivot] = $value;
                        }
                        array_push($pivot_tab, $pivot_rows);
                    }
                    //combination of the datas to sync and datas to put in the columns of the pivot table

                    $sync = array_combine($sync_data['content'], $pivot_tab);
                }
                else {
                    $sync = $sync_data['content'];
                }
            }
            else {
                $sync = $sync_data['content'];
            }
            $data->belongsToMany(
                $sync_data['model'],
                $sync_data['table'],
                $sync_data['foreignPivotKey'],
                $sync_data['relatedPivotKey'],
                $sync_data['parentKey'],
                $sync_data['relatedKey']
            )->sync($sync);
        }

        // Rename folders for newly created data through media-picker
        if ($request->session()->has($slug.'_path') || $request->session()->has($slug.'_uuid')) {
            $old_path = $request->session()->get($slug.'_path');
            $uuid = $request->session()->get($slug.'_uuid');
            $new_path = str_replace($uuid, $data->getKey(), $old_path);
            $folder_path = substr($old_path, 0, strpos($old_path, $uuid)).$uuid;

            $rows->where('type', 'media_picker')->each(function ($row) use ($data, $uuid) {
                $data->{$row->field} = str_replace($uuid, $data->getKey(), $data->{$row->field});
            });
            $data->save();
            if ($old_path != $new_path && !Storage::disk(config('voyager.storage.disk'))->exists($new_path)) {
                $request->session()->forget([$slug.'_path', $slug.'_uuid']);
                Storage::disk(config('voyager.storage.disk'))->move($old_path, $new_path);
                Storage::disk(config('voyager.storage.disk'))->deleteDirectory($folder_path);
            }
        }
        return $data;
    }

    public function copy(Request $request, $id) {
        return $this->edit($request, $id, 'products');
    }

    public function edit(Request $request, $id, $slug = false)
    {
        if (!$slug) {
            $slug = $this->getSlug($request);
            $isCopy = false;
        }
        else $isCopy = true;

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        if ($isCopy) {
            $dataTypeContent->title = '';
            $dataTypeContent->slug = '';
            return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isCopy'));
        }
        else {
            return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
        }

    }



}
