@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <!-- form start -->
            <form role="form"
                  class="form-edit-add"
                  action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                  method="POST" enctype="multipart/form-data">
                <!-- PUT Method if we are editing -->
            @if($edit)
                {{ method_field("PUT") }}
            @endif

            <!-- CSRF TOKEN -->
                {{ csrf_field() }}
            <div class="col-md-8">

                <div class="panel panel-bordered">


                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                $exclude = ['product_belongstomany_product_relationship', 'price', 'size', 'width', 'height'];
                            @endphp

                            @foreach($dataTypeRows as $row)
                                @if(!in_array($row->field, $exclude))
                                <!-- GET THE DISPLAY OPTIONS -->
                                    @php
                                        $display_options = $row->details->display ?? NULL;
                                        if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @if (isset($row->details->legend) && isset($row->details->legend->text))
                                        <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                    @endif

                                    <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if (isset($row->details->view))
                                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                        @elseif ($row->type == 'relationship')
                                            @if(isset($row->details->pivot_datas) && $row->details->pivot_datas != null)
                                                @include('voyager::formfields.relationshipwithpivot', ['options' => $row->details])
                                            @else
                                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @endif
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                        @if ($errors->has($row->field))
                                            @foreach ($errors->get($row->field) as $error)
                                                <span class="help-block">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>


                </div>
            </div>


            <div class="col-md-4">
                <!-- ### DETAILS ### -->
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon wb-clipboard"></i> Свойства букета</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($dataTypeRows as $row)
                            @if($row->field == 'product_belongstomany_product_relationship')
                        <div class="form-group">
                            @include('voyager::formfields.relationshipwithpivot', ['options' => $row->details])
                        </div>
                            @endif
                        @endforeach
                        @foreach($dataTypeRows as $row)
                            @if($row->field == 'price')
                                <div class="form-group">
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                </div>
                            @endif
                            @if($row->field == 'size')
                                <div class="form-group">
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                </div>
                            @endif
                            @if($row->field == 'width')
                                <div class="form-group">
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                </div>
                            @endif
                            @if($row->field == 'height')
                                <div class="form-group">
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        @section('submit-buttons')
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        @stop
                        @yield('submit-buttons')
                    </div>

                </div>
            </div>
            </form>

            <iframe id="form_target" name="form_target" style="display:none"></iframe>
            <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                  enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                <input name="image" id="upload_file" type="file"
                       onchange="$('#my_form').submit();this.value='';">
                <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                {{ csrf_field() }}
            </form>

        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
            return function() {
                $file = $(this).siblings(tag);

                params = {
                    slug:   '{{ $dataType->slug }}',
                    filename:  $file.data('file-name'),
                    id:     $file.data('id'),
                    field:  $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        function hideAlreadySelectedOptions(selectObject){
            //When an option has been selected in a list, we do not want this option to be displayed in other lists.
            var name_of_select = selectObject.name;
            console.log(name_of_select);
            var options_to_hide_array = [];
            //Looking for every select element
            $("select[name='"+name_of_select+"']").each(function(){
                //The option selected has to be hide in each select
                var option_to_hide = $(this).val();
                if(option_to_hide != ""){
                    options_to_hide_array.push(option_to_hide);
                }
                //for now we show all options (for updating)
                $("option", this).each(function(index, element){
                    $(element).show();
                });
            });
            console.log(options_to_hide_array);
            //we are looking for every select again
            $("select[name='"+name_of_select+"']").each(function(){
                var option_selected = $(this).val();
                $("option", this).each(function(index, element){
                    //if the option is in the array of the options to be hide AND the option is not selected in the current select...
                    if(options_to_hide_array.includes(element.value) && element.value != option_selected){
                        //...we hide this option
                        $(element).hide();
                    }
                });
            });
        }
        $('.addEntry').click(function(){
            // get the last DIV which ID starts with ^= id (the $relationshipField)
            var id = $( this ).attr("data-relationshipField");
            var $div = $('div[id^="'+id+'"]:last');

            // Read the Number from that DIV's ID
            // And increment that number by 1
            var num = parseInt( $div.prop("id").split('-num')[1] ) +1;
            var $newdiv = $div.clone().prop('id', id+'-num'+num );
            $div.after($newdiv);
            $newdiv.hide();
            $newdiv.show("fast");
            //retrieve all pivot field within the new div cloned and delete their value
            var div_cloned = '#'+id+'-num'+num;
            var allPivotFields = $(div_cloned).find('.pivot').map(function() {
                this.value = "";
            }).get();

            //we don't want to select the same option twice
            $("select[name='"+id+"[]']").each(function(){
                var option_to_delete = $(this).val();
                $(div_cloned + " > select[name='"+id+"[]'] > option[value='"+option_to_delete+"']").hide();
            });

            var max_of_options = parseInt($( this ).attr("data-nbOfRelationshipOptions"));
            //if the nb of entries is bigger or equal to the maximum options available
            if(num+1 >= max_of_options){
                $(this).hide();
            }
            //show the button "delEntry"
            $parent_div = $(this).closest("div");
            $parent_div.find(".delEntry").show();
        });
        $('.delEntry').click(function(){
            // get the last DIV which ID starts with ^= id (the $relationshipField)
            var id = $( this ).attr("data-relationshipField");
            var $div = $('div[id^="'+id+'"]:last');
            var num = parseInt( $div.prop("id").split('-num')[1] );
            $div.fadeOut(500, function(){
                $(this).remove();
                //we update the list of option off all select
                var last_select = $parent_div.find("select[name='"+id+"[]']").get(0);
                hideAlreadySelectedOptions(last_select);
            });
            if(num <= 1){
                $(this).hide();
            }
            //show the button "addEntry"
            $parent_div = $(this).closest("div");
            $parent_div.find(".addEntry").show();

        });


        function calculatePrice() {
           var a = 0;

           $('#product_belongstomany_product_relationship>div').each(function() {
               a += $(this).find('select option:checked').attr('data-price') * $(this).find('input[type="number"]').val()
           })

           $('input[name="price"]').val(a);
        }


    </script>
@stop
