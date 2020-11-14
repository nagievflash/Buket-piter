<?php

namespace App\Imports;

use App\Product;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Illuminate\Support\Str;

class ProductsImport implements ToModel, WithProgressBar
{
    /**
    * @param array $row
    *
    * @return Product
    */

    use Importable;

    public function model(array $row)
    {

        $slug = Str::slug($row[1], '-');

        $input = array('slug' => $slug);
        $rules = array(
            'slug' => 'unique:products'
        );

        $validator = Validator::make($input, $rules);

        if (!$validator->passes())
        {
            $slug = $slug.'-1';
        }


        $file = 'http://buket-piter.ru'.$row[3];
        $filename = $slug.'.jpg';

        @file_put_contents(public_path('/storage/products/full') .'/'.$filename, fopen($file, 'r'));
        if (file_exists(public_path('/storage/products/full') .'/'.$filename)) {
            $image = 'products/full/'.$filename;
        }
        else $image = '';


        $file = 'http://buket-piter.ru'.$row[4];

        @file_put_contents(public_path('storage/products/thumb') . '/' . $filename, fopen($file, 'r'));
        if (file_exists(public_path('/storage/products/thumb') .'/' . $filename)) {
            $thumb = 'products/thumb/' . $filename;
        }
        else $thumb = '';



        $product = new Product([
            'title'         => $row[1],
            'sku'           => $row[0],
            'slug'          => $slug,
            'image'         => $image,
            'image_thumb'   => $thumb,
            'detail'        => '',
            'price'         => $row[2],
        ]);
        $product->save();
        return $product;
    }
}
