@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Product</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Create Product ========================== --}}
        <Form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- General Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> General</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Manufacturer</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="manufacturer_id">
                                            <option value="Select Model">Select Manufacturer</option>
                                            @foreach ($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="manufacturer_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Category</label>
                                    <div>
                                        <select id="categorySelect" class="js-example-basic-single w-100"
                                            name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="category_id" />
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Sub Category</label>
                                    <div>
                                        <select id="subcategorySelect" class="js-example-basic-single w-100"
                                            name="subcategory_id">
                                            <option value="">Select Category First</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="subcategory_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en" value="">
                                    <x-errors.display-validation-error property="name_en" />
                                </div>
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar" value="">
                                    <x-errors.display-validation-error property="name_ar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SKU / Part number / Price  --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Details</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sukGenerator" name="sku" required
                                            value="" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="generateUniqueId()">Generate Unique ID</button>
                                        </div>
                                        <x-errors.display-validation-error property="sku" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Part Number / OEM</label>
                                    <input type="text" class="form-control" autocomplete="off" name="part_number"
                                        value="">
                                    <x-errors.display-validation-error property="part_number" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Main price</label>
                                    <input type="main_price" class="form-control" name="main_price" value="">
                                    <x-errors.display-validation-error property="main_price" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- des --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Description</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description <span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="description_en" id="tinymceExample" rows="10"></textarea>
                                    <x-errors.display-validation-error property="description_en" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description <span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="description_ar" id="tinymceExample2" rows="10"></textarea>
                                    <x-errors.display-validation-error property="description_ar" />
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
                            <div class="form-group pt-0">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- releated to --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Compatible With</label>
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
            </div>
            {{-- Tags --}}
            <div class="row">
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
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">Submit form</button>
        </Form>
    </div>
@endsection
@section('script')
    <script>
        // ---------------------------------------- Filepond
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        pond.setOptions({
            allowMultiple: true,
            allowReorder: true,
            server: {
                process: '/manage/tmpFilepondUpload',
                revert: '/manage/tmpFilepondDelete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },

        });
        // ---------------------------------------- SKU
        function generateUniqueId() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var id = '';

            for (var i = 0; i < 10; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                var character = characters.charAt(randomIndex).toUpperCase(); // Convert character to uppercase
                id += character;
            }

            document.getElementById('sukGenerator').value = id;
        }
        // ---------------------------------------- SubCategories
        $(document).ready(function() {
            // Select the correct option based on the value of the "category" input
            var selectedCategoryId = $('#categorySelect').val();
            $('#categorySelect option[value="' + selectedCategoryId + '"]').prop('selected', true);

            // Select the correct option based on the value of the "subcategory" input
            var selectedSubcategoryId = $('#subcategorySelect').val();
            $('#subcategorySelect option[value="' + selectedSubcategoryId + '"]').prop('selected', true);

            // Handle change event on the category select
            $('#categorySelect').change(function() {
                var categoryId = $(this).val();
                if (!categoryId) {
                    $('#subcategorySelect').html('<option value="">Select Category First</option>');
                    return;
                }

                // Perform AJAX request to fetch subcategories
                $.ajax({
                    url: '/product-subcategories/categories/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Select Subcategory</option>';
                        $.each(data, function(index, subcategory) {
                            // Get the translation based on the current locale
                            var subcategoryName = subcategory.name[
                                "{{ App::getLocale() }}"];

                            // Append the option to the select dropdown
                            options += '<option value="' + subcategory.id + '">' +
                                subcategoryName + '</option>';
                        });
                        $('#subcategorySelect').html(options);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching subcategories:', error);
                    }
                });
            });

            // Trigger change event on category select to load subcategories initially
            $('#categorySelect').trigger('change');
        });
        // ---------------------------------------- Brands&Models
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
