@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a>Add Car For Sale</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <Form action="{{ route('sale-car.store') }}" id="carForSaleID" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Brand , Model , Year , Color , Body , Trans & Condition --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Brand</label>
                                        <select id="brandSelect" class="js-example-basic-single w-100" name="brand">
                                            <option>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @selected(old('brand') == $brand->id)>
                                                    {{-- {{ old('brand') == $brand->id ? 'selected' : '' }}> --}}
                                                    {{ $brand->name }}

                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="brand" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <label>Model</label>
                                        <select id="modelSelect" class="js-example-basic-single w-100" name="model">
                                            <option value="">Select Brand First</option>
                                            @foreach ($models as $model)
                                                <option value="{{ $model->id }}"
                                                    {{ old('model') == $model->id ? 'selected' : '' }}>
                                                    {{ $model->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="model" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.bodyShape') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="bodyShape">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($shapes as $shape)
                                                <option value="{{ $shape->id }}"
                                                    {{ old('shape') == $shape->id ? 'selected' : '' }}>{{ $shape->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="bodyShape" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.transmission') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="transmission">
                                            <option disabled selected>{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($trans_types as $trans_type)
                                                <option value="{{ $trans_type->id }}"
                                                    {{ old('trans_type') == $trans_type->id ? 'selected' : '' }}>
                                                    {{ $trans_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="transmission" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="year">{{ __('gt_cars_create.year') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="year">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach (getYearsRange() as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="year" />
                                    </div>
                                </div>
                                <div class="col">
                                    <label>{{ __('gt_cars_create.color') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="color">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}"
                                                    {{ old('brand') == $color->id ? 'selected' : '' }}>
                                                    {{ $color->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="color" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h4 class="mt-3 mb-3 font-weight-blod">{{ __('gt_cars_create.condition') }}</h4>
                                    @foreach ($conditions as $condition)
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="condition"
                                                    id="optionsRadios{{ $condition->id }}" value="{{ $condition->id }}">
                                                {{ ucwords($condition->getTranslation('name', App::getLocale())) }}
                                                <i class="input-frame"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                    <x-errors.display-validation-error property="condition" />
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
                            <h4 class="mt-3 mb-3 font-weight-blod">{{ __('gt_cars_create.media') }}</h4>
                            <div>
                                <input type="file" name="image" class="file-upload-default" id="image">
                                <x-errors.display-validation-error property="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Price --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h4 class="mt-3 mb-3 font-weight-blod">{{ __('gt_cars_create.payment_method') }}</h4>
                                    @foreach ($paymentMethods as $payment)
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="payment"
                                                    id="optionsRadios{{ $payment->id }}" value="{{ $payment->id }}">
                                                {{ ucwords($payment->getTranslation('name', App::getLocale())) }}
                                                <i class="input-frame"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                    <x-errors.display-validation-error property="payment" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h4 class="mt-3 mb-3 font-weight-blod">{{ __('gt_cars_create.price') }}</h4>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" oninput="formatNumber(this)">
                                    <x-errors.display-validation-error property="price" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Engine Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.fuelType') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="fuelType">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($FuelTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ old('type') == $type->id ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="fuelType" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.EngineCapacity') }}</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="cc">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($engineCCS as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ old('type') == $type->id ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="cc" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.ExtraFeatures') }}
                                        <span
                                            class="text-success">{{ __('gt_cars_create.Choose_additional_features_for_your_car') }}</span>
                                    </label>
                                    <div>
                                        <select class="js-example-basic-single w-100" multiple name="features[]">
                                            <option value="">{{ __('gt_cars_create.select') }}</option>
                                            @foreach ($features as $feature)
                                                <option value="{{ $feature->id }}"
                                                    {{ in_array($feature->id, (array) old('features', [])) ? 'selected' : '' }}>
                                                    {{ $feature->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="features" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Aspiration') }}</label>
                                    <select class="js-example-basic-single w-100" name="aspiration">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($EngineAspirations as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('type') == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="aspiration" />
                                </div>
                                <div class="col">
                                    <label>{{ __('gt_cars_create.kilometers') }}</label>
                                    <select class="js-example-basic-single w-100" name="km">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($EngineKMS as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('type') == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="km" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Description --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="description">{{ __('gt_cars_create.Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="8" maxlength="4200"
                                    style="max-height: 200px;" placeholder="{{ __('gt_cars_create.EnterDescription') }}"></textarea>
                                <x-errors.display-validation-error property="description" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-3 mb-3 font-weight-blod">{{ __('gt_cars_create.ContactDetails') }}</h4>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Governorate') }}</label>
                                    <select class="js-example-basic-single w-100" name="governorate">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"
                                                {{ old('governorate') == $governorate->id ? 'selected' : '' }}>
                                                {{ $governorate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="governorate" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputName1">{{ __('gt_cars_create.name') }}</label>
                                    <input type="text" class="form-control" name="user_name" value="">
                                    <x-errors.display-validation-error property="user_name" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">{{ __('gt_cars_create.PhoneNumber') }}</label>
                                    <input type="text" class="form-control" name="phone" value="">
                                    <x-errors.display-validation-error property="phone" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                process: '/manage/SaleCarTmpUpload',
                revert: '/manage/SaleCarTmpDelete',
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
                    url: '/car-brand-models/models/' + brandId,
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
