@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Storehouses</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Storehouse</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card-body">
                            <form action="{{ route('product-subcategories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en" placeholder="English Name"
                                        value="{{ old('name_en') }}">
                                    <x-errors.display-validation-error property="name_en" />
                                </div>
                                <div class="form-group">
                                    <label>Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar" dir="auto"
                                        placeholder="English Name" value="{{ old('name_ar') }}">
                                    <x-errors.display-validation-error property="name_ar" />
                                </div>
                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label>{{ __('gt_cars_create.ExtraFeatures') }}
                                            <span
                                                class="text-success">{{ __('gt_cars_create.Choose_additional_features_for_your_car') }}</span>
                                        </label>
                                        <div>
                                            <select class="js-example-basic-single w-100" multiple name="categories[]">
                                                <option value="">{{ __('gt_cars_create.select') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ in_array($category->id, (array) old('categories', [])) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-errors.display-validation-error property="features" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Brand Logo</label>
                                    <input type="file" name="logo" class="file-upload-default" accept=".png">

                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image" name="logo">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <x-errors.display-validation-error property="logo" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmaill" class="form-label"> </label>
                                    <img id="showImage" class="image-rec-full"
                                        src="{{ asset('gt_manager/media/no_image.jpg') }}" alt="...">
                                </div>
                                <button class="btn btn-success float-right" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
