@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Blogs</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Blog</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Title & Content --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">New Blog</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Title <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="title_en" value="">
                                    <x-errors.display-validation-error property="title_en" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Title <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="title_ar" dir="auto" value="">
                                    <x-errors.display-validation-error property="title_ar" />
                                </div>
                            </div>
                            {{-- Categories --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Category</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="blog_category_id">
                                            <option value="Select Model">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="blog_category_id" />
                                    </div>
                                </div>
                            </div>
                            {{-- Description --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Content<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="content_en" id="tinymceExample" rows="10"></textarea>
                                    <x-errors.display-validation-error property="content_en" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Content<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="content_ar" id="tinymceExample2" rows="10"></textarea>
                                    <x-errors.display-validation-error property="content_ar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Media --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Media</label>
                            <div class="form-group pt-0">
                                <label>Model Images</label>
                                <input type="file" class="filepond" name="image" multiple credits="false">
                                <x-errors.display-validation-error property="image" />
                            </div>
                            {{-- <div class="form-group pt-0">
                                <label>PDF Brochure</label>
                                <input type="file" name="brochure" accept="application/pdf"
                                    class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Borchur">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-light" type="button">Upload</button>
                                    </span>
                                </div>
                                <x-errors.display-validation-error property="brochure" />
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- releated to --}}
            {{-- <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Releated to</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Brand</label>
                                        <select id="brandSelect" class="js-example-basic-single w-100" multiple="multiple" name="brand">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Model</label>
                                        <select id="modelSelect" class="js-example-basic-single w-100" multiple="multiple" name="model">
                                            <option value="">Select Brand First</option>
                                            @foreach ($models as $model)
                                                <option value="{{ $model->id }}"
                                                    {{ old('model') == $model->id ? 'selected' : '' }}>
                                                    {{ $model->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Select Years</label>
                                        <select class="js-example-basic-single w-100" multiple="multiple" name="year">
                                            @foreach (getYearsRange() as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label>Select Transmission</label>
                                        <select class="js-example-basic-single w-100" name="transmission_type">
                                            <option>Select</option>
                                            @foreach ($transmissionTypes as $transmissionType)
                                                <option value="{{ $transmissionType->id }}">
                                                    {{ $transmissionType->getTranslation('name', app()->getLocale()) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Engine Aspiration</label>
                                        <select class="js-example-basic-single w-100" name="Engine_aspiration">
                                            <option value="Select Model">Select</option>
                                            @foreach ($EngineAspirations as $EngineAspiration)
                                                <option value="{{ $EngineAspiration->id }}">
                                                    {{ $EngineAspiration->getTranslation('name', app()->getLocale()) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label>Engine Type</label>
                                        <select class="js-example-basic-single w-100" name="Fuel_type">
                                            <option value="Select Model">Select</option>
                                            @foreach ($FuelTypes as $FuelType)
                                                <option value="{{ $FuelType->id }}">
                                                    {{ $FuelType->getTranslation('name', app()->getLocale()) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- Tags --}}
            {{-- <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2 nav-item"><i class="bi bi-plus-circle"></i> Tags input</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Tags</label>
                                    <div>
                                        <input name="tags" id="tags" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- Submit --}}
            <button class="btn btn-success float-right" type="submit">Submit form</button>
        </Form>
    </div>
@endsection


@section('script')
    <script>
        // ---------------------------------------- Filepond
        // Plugins
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageTransform);
        FilePond.registerPlugin(FilePondPluginFileMetadata);
        // Vars
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        // Option
        pond.setOptions({
            allowMultiple: true,
            allowReorder: true,
            server: {
                process: '/manage/blogTmpUpload',
                revert: '/manage/blogTmpDelete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            // Plugin Services
            imageTransformOutputStripImageHead: true,
            imageTransformCanvasMemoryLimit: 50000000,
            imageTransformOutputQuality: 80,
        });
        // ---------------------------------------- Brands_Models
        $(document).ready(function() {
            // Select the correct option based on the value of the "brand" input
            var selectedBrandId = $('#brandSelect').val();
            $('#brandSelect option[value="' + selectedBrandId + '"]').prop('selected', true);

            // Select the correct option based on the value of the "model" input
            var selectedModelId = $('#modelSelect').val();
            $('#modelSelect option[value="' + selectedModelId + '"]').prop('selected', true);

            // Handle change event on the brand select
            $('#brandSelect').change(function() {
                var brandId = $(this).val();
                if (!brandId) {
                    $('#modelSelect').html('<option value="">Select Brand First</option>');
                    return;
                }

                // Perform AJAX request to fetch models
                $.ajax({
                    url: '/manage/car-brand-models/models/' + brandId,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Select Model</option>';
                        $.each(data, function(index, model) {
                            // Get the translation based on the current locale
                            var modelName = model.name["{{ App::getLocale() }}"];

                            // Append the option to the select dropdown
                            options += '<option value="' + model.id + '">' + modelName +
                                '</option>';
                        });
                        $('#modelSelect').html(options);

                        // Select the correct option based on the value of the "model" input
                        var selectedModelId = $('#modelSelect').val();
                        $('#modelSelect option[value="' + selectedModelId + '"]').prop(
                            'selected', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching models:', error);
                    }
                });
            });

            // Trigger change event on brand select to load models initially
            $('#brandSelect').trigger('change');
        });
    </script>
@endsection
