@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('model-specs-index') }}">Model
                            Specs</a></li>
                    <li class="breadcrumb-item"><a>Table Name</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Spec Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-md-8">
                            <span class="ml-3 h4">Table Name</span>
                            <td class="col-6 col-md-4">
                                <button type="button" class="btn btn-outline-dark btn-icon-text mb-2 ml-4 mb-md-0"
                                    data-toggle="modal" data-target="#addNewCarModal">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Type
                                </button>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== All Types ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Types</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Icon</th>
                                        <th>Type Name <span class="text-danger">(EN)</span></th>
                                        <th>Type Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- Loop Starts --}}
                                        <td>1</td>
                                        <td>
                                            <div>
                                                <img class="image-in-circle-75"
                                                    src="{{ !empty($adminData->photo)
                                                        ? url('media/' . $adminData->photo)
                                                        : asset('gt_manager/assets/images/no_image.jpg') }}"
                                                    alt="profile">
                                            </div>
                                        </td>
                                        <td> Sedan </td>
                                        <td> سيدان</td>

                                        <td>
                                            <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                data-target="#editModel#" title="Edit">
                                                <i data-feather="edit"></i>
                                            </button>

                                            <a href="#" class="btn btn-inverse-danger" data-confirm-delete="true">
                                                delete
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    {{-- <div class="modal fade" id="editModel{{ $model->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        data-model-id="{{ $model->id }}">
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
                                    </div> --}}
                                    {{-- Loop Ends --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
