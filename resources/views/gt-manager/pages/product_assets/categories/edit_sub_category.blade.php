@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product-categories.index') }}">All Categories</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Sub Category</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card-body">
                            <form action="{{ route('product-subcategories.update', $productSubCategory->slug) }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id"
                                value="{{ $productSubCategory->id }}">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en" value="{{ $productSubCategory->getTranslations('name')['en'] }}">
                                    <x-errors.display-validation-error property="name_en" />
                                </div>
                                <div class="form-group">
                                    <label>Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar" dir="auto" value="{{ $productSubCategory->getTranslations('name')['ar'] }}">
                                    <x-errors.display-validation-error property="name_ar" />
                                </div>
                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label>Select Main Categories
                                            <span
                                                class="text-success">(Multiple)</span>
                                        </label>
                                        <div>
                                            <select class="js-example-basic-single w-100" multiple name="categories[]">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ in_array($category->id, (array) old('categories', $selectedCategories)) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <x-errors.display-validation-error property="features" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Logo</label>
                                    <input type="file" name="logo"
                                        class="file-upload-default" id="image"
                                        accept=".png">
                                    <div class="input-group col-xs-12">
                                        <input type="text"
                                            class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
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
