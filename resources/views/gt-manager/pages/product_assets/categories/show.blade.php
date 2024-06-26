@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('product-categories.index') }}">All
                            Categories</a></li>
                    <li class="breadcrumb-item"><a>Category</a></li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Sub Category
                </button>
                {{-- ========================== Add subcategory ========================== --}}
                <div class="modal fade" id="addNewCarModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('product-subcategories.store') }}" method="POST"
                                    enctype="multipart/form-data" id="car-brand">
                                    @csrf
                                    <input type="text" name="product_category_id" value="{{ $productCategory->id }}"
                                        hidden>
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">(EN)</span></label>
                                        <input type="text" class="form-control" name="name_en" placeholder="English Name"
                                            value="{{ old('name_en') }}">
                                        <x-errors.display-validation-error property="name_en" />
                                    </div>
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">(AR)</span></label>
                                        <input type="text" class="form-control" name="name_ar" dir="auto"
                                        placeholder="English Name"
                                            value="{{ old('name_ar') }}">
                                        <x-errors.display-validation-error property="name_ar" />
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
                                    <div class="modal-footer">
                                        <button type="submit" id="add_employee_btn" class="btn btn-success">Save
                                            changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- ====== CATEGORY Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <img class="image-in-box" src="{{ display_img($productCategory->logo) }}" alt="No Image">
                            <span class="profile-name ml-3 h4">{{ $productCategory->name }}</span>
                            <td>
                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                    data-target="#EditCategory{{ $productCategory->slug }}" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>


                                <button class="btn btn-inverse-danger" data-toggle="modal"
                                    data-target="#confirmDeleteModal{{ $productCategory->slug }}" title="Edit">
                                    <i class="bi bi-trash3"></i>
                                </button>

                                <x-modal.confirm-delete-modal
                                    route="{{ route('product-categories.destroy', $productCategory->slug) }}"
                                    id="{{ $productCategory->slug }}" />
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== All Categories ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Models</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Logo</th>
                                        <th>Model Name <span class="text-danger">(EN)</span></th>
                                        <th>Model Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- LOOP --}}
                                        @foreach ($productCategory->productSubCategories as $productSubCategory)
                                            <td>#</td>
                                            <td><img class="image-in-box"
                                                    src="{{ display_img($productSubCategory->logo) }}" alt="No Image">
                                            </td>
                                            <td>{{ $productSubCategory->getTranslations('name')['en'] }}</td>
                                            <td>{{ $productSubCategory->getTranslations('name')['ar'] }}</td>
                                            <td>
                                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                    data-target="#editModelproductSubCategory{{ $productSubCategory->slug }}"
                                                    title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <button class="btn btn-inverse-danger" data-toggle="modal"
                                                    data-target="#confirmDeleteModal{{ $productSubCategory->slug }}"
                                                    title="Edit">
                                                    <i class="bi bi-trash3"></i>
                                                </button>

                                                <x-modal.confirm-delete-modal
                                                    route="{{ route('product-subcategories.destroy', $productSubCategory->slug) }}"
                                                    id="{{ $productSubCategory->slug }}" />
                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <div class="modal fade"
                                        id="editModelproductSubCategory{{ $productSubCategory->slug }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Model</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample car-brand-model-edit" method="POST"
                                                        action="{{ route('product-subcategories.update', $productSubCategory->slug) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id"
                                                            value="{{ $productSubCategory->id }}">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(EN)</span></label>
                                                            <input type="text" class="form-control" name="name_en"
                                                                autocomplete="off" placeholder="English Name"
                                                                value="{{ $productSubCategory->getTranslations('name')['en'] }}">
                                                            <x-errors.display-validation-error property="name_en" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(AR)</span></label>
                                                            <input type="text" class="form-control" name="name_ar"
                                                                placeholder="Arabic Name"
                                                                value="{{ $productSubCategory->getTranslations('name')['ar'] }}">
                                                            <x-errors.display-validation-error property="name_ar" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>sub category Logo</label>
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
                                                            <img width="100px" id="showImage" class="image-rec-full"
                                                                src="{{ display_img($productSubCategory->logo) }}"alt="No_IMG">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" id="add_employee_btn"
                                                                class="btn btn-success">Save
                                                                changes</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- LOOP --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== Edit Modal ====== --}}
        <div class="modal fade" id="EditCategory{{ $productCategory->slug }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample"
                            action="{{ route('product-categories.update', $productCategory->slug) }}" method="POST"
                            enctype="multipart/form-data" id="car-brand">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $productCategory->id }}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $productCategory->getTranslations('name')['en'] }}">
                                <x-errors.display-validation-error property="name_en" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" dir="auto"
                                    value="{{ $productCategory->getTranslations('name')['ar'] }}">
                                <x-errors.display-validation-error property="name_ar" />
                            </div>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo" class="file-upload-default" id="image"
                                    accept=".png">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                    </span>
                                </div>
                                <x-errors.display-validation-error property="logo" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img width="100px" id="showImage" class="image-rec-full"
                                    src="{{ !empty($productCategory->logo) ? asset('storage/' . $productCategory->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                    alt="No_IMG">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-success">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
