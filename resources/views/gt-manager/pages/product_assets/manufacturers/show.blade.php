@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ====== Navagation ====== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('manufacturers.index') }}">Manufacturers</a></li>
                    <li class="breadcrumb-item"><a>{{ $manufacturer->name }}</a></li>
                </ol>
                {{-- ====== Product button ====== --}}
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create Product
                </a>
            </div>
        </nav>
        {{-- ====== Brand Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <img class="image-in-box"
                                src="{{ !empty($manufacturer->logo) ? url('storage/' . $manufacturer->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                alt="No Image">
                            <span class="profile-name ml-3 h4">{{ $manufacturer->name }}</span>
                            <td>
                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                    data-target="#EditCarBrand" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button type="button" class="btn btn-inverse-danger" data-toggle="modal"
                                    data-target="#confirmDeleteModal{{ $manufacturer->id }}" title="Edit">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <x-modal.confirm-delete-modal
                                    route="{{ route('manufacturers.destroy', $manufacturer->slug) }}"
                                    id="{{ $manufacturer->id }}" />
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Edit manufacturer ========================== --}}
        <div class="modal fade" id="EditCarBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Car Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('manufacturers.update', $manufacturer->slug) }}" class="forms-sample"
                            method="POST" enctype="multipart/form-data" id="car-brand">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id" value="{{ $manufacturer->id }}" hidden>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $manufacturer->getTranslations('name')['en'] }}">
                                <small class="text-danger" id='en_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" autocomplete="off"
                                    value="{{ $manufacturer->getTranslations('name')['ar'] }}">
                                <small class="text-danger" id='ar_name-error'></small>
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
                                <small class="text-danger" id='logo-error'></small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img width="100px" id="showImage" class="image-rec-full"
                                    src="{{ !empty($manufacturer->logo) ? asset('storage/' . $manufacturer->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                    alt="No_IMG">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== All Products ========================== --}}
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
                                        <th>Product Name</th>
                                        <th>SKUS</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($manufacturer->getAllProducts() as $product)
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td> {{ $product->slug }}</td>
                                            <td> 15 </td>

                                            <td>
                                                <div class="position-relative">
                                                    <!-- Dropdown button positioned at top-left corner -->
                                                    <div class="dropdown">
                                                        <button class="btn p-1" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icon-lg text-muted pb-3px"
                                                                data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('products.edit', $product->slug) }}">
                                                                <i data-feather="edit-2" class="icon-sm mr-2"></i>
                                                                <span class="">Edit</span></a>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="">
                                                                <i data-feather="folder-plus" class="icon-sm mr-2"></i>
                                                                <span>Download</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
