@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ====== Navagation ====== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('car-brand.index') }}">Brands</a></li>
                    <li class="breadcrumb-item"><a>{{ $carBrand->name }}</a></li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Model
                </button>
            </div>
        </nav>
        {{-- ====== Brand Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <img class="image-in-box"
                                src="{{ !empty($carBrand->logo) ? url('storage/' . $carBrand->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                alt="No Image">
                            <span class="profile-name ml-3 h4">{{ $carBrand->name }}</span>
                            <td>
                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                    data-target="#EditCarBrand" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button type="button" class="btn btn-inverse-danger"
                                data-toggle="modal" data-target="#confirmDeleteModal{{ $carBrand->id }}" title="Edit">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <x-modal.confirm-delete-modal route="{{ route('car-brand.destroy', $carBrand->slug) }}"
                                    id="{{ $carBrand->id }}" />
                            </td>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Edit Car Brand ========================== --}}
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
                        <form class="forms-sample" action="{{ route('car-brand.update', $carBrand->slug) }}"
                            method="POST" enctype="multipart/form-data" id="car-brand">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $carBrand->id }}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $carBrand->getTranslations('name')['en'] }}">
                                <small class="text-danger" id='en_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" dir="auto"
                                    value="{{ $carBrand->getTranslations('name')['ar'] }}">
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
                                    src="{{ !empty($carBrand->logo) ? asset('storage/' . $carBrand->logo) : asset('gt_manager/media/no_image.jpg') }}"
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
        {{-- ========================== All Models ========================== --}}
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
                                        <th>Model Name <span class="text-danger">(EN)</span></th>
                                        <th>Model Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($carBrand->models as $key => $model)
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $model->getTranslations('name')['en'] }}</td>
                                            <td> {{ $model->getTranslations('name')['ar'] }}</td>

                                            <td>
                                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                    data-target="#editModel{{ $model->id }}" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-inverse-danger"
                                                data-toggle="modal" data-target="#confirmDeleteModal{{ $model->id }}" title="Edit">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <x-modal.confirm-delete-modal route="{{ route('car-brand-model.destroy', $model->slug) }}"
                                                    id="{{ $model->id }}" />

                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <div class="modal fade" id="editModel{{ $model->id }}" tabindex="-1"
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
                                                        data-model-id="{{ $model->id }}"
                                                        action="{{ route('car-brand-model.update', $model->slug ) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input hidden type="text" class="form-control" name="id"
                                                            value="{{ $model->id }}">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(EN)</span></label>
                                                            <input type="text" class="form-control" name="name_en"
                                                                autocomplete="off" placeholder="English Name"
                                                                value="{{ $model->getTranslations('name')['en'] }}">
                                                            <small class="text-danger" id='en_name-error'></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(AR)</span></label>
                                                            <input type="text" class="form-control" name="name_ar"
                                                                placeholder="Arabic Name"
                                                                value="{{ $model->getTranslations('name')['ar'] }}">

                                                            <small class="text-danger" id='ar_name-error'></small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" id="add_employee_btn"
                                                                class="btn btn-primary">Save
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Add Modal ========================== --}}
        <div class="modal fade" id="addNewCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="car-brand-model" class="forms-sample" method="POST" action="{{ route('car-brand-model.store') }}">
                            @csrf
                            <input hidden type="text" class="form-control" name="car_brand_id"
                                value="{{ $carBrand->id }}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    placeholder="English Name">
                                <small class="text-danger" id='en_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" dir="auto"
                                placeholder="Arabic Name">
                                <small class="text-danger" id='ar_name-error'></small>
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
    </div>
@endsection
