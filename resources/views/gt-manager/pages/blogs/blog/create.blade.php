@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Blog</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="name_en" value="">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Title <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_en" value="">
                                </div>
                            </div>
                            {{-- Categories --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Category</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="manufacturer_id">
                                            <option value="Select Model">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- Description --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="description_en" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="description_ar" id="tinymceExample2" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Media --}}
            {{-- <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group pt-0 mt-4">
                                <label>Model Images</label>
                                <input type="file" class="filepond" name="image" multiple credits="false">
                                <x-errors.display-validation-error property="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- releated to --}}
            {{-- <div class="row">
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
            </div> --}}
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
