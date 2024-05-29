@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Shipping Services</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Service
                </button>
            </div>
        </nav>
        {{-- ========================== Brand Table ==========================  --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Brands</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name EN</th>
                                        <th>Name AR</th>
                                        <th>Fees</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->getTranslations('name')['en'] }}</td>
                                            <td>{{ $service->getTranslations('name')['ar'] }}</td>
                                            <td>{{ $service->fee }}</td>
                                            <td>{{ $service->status }}</td>
                                            <td>{{ $service->created_at->diffForHumans() }}</td>
                                            <td>
                                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                    data-target="#editModel{{ $service->id }}" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        {{-- ========================== Edit Modal ========================== --}}
                                        <div class="modal fade" id="editModel{{ $service->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" method="POST"
                                                            data-model-id="{{ $service->id }}"
                                                            action="{{ route('shipping-service.update', $service->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input hidden type="text" class="form-control" name="id"
                                                                value="{{ $service->id }}">
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Name <span
                                                                        class="text-danger">(EN)</span></label>
                                                                <input type="text" class="form-control" name="name_en"
                                                                    autocomplete="off" placeholder="English Name"
                                                                    value="{{ $service->getTranslations('name')['en'] }}">
                                                                    <x-errors.display-validation-error property="name_en" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Name <span
                                                                        class="text-danger">(AR)</span></label>
                                                                <input type="text" class="form-control" name="name_ar"
                                                                    placeholder="Arabic Name"
                                                                    value="{{ $service->getTranslations('name')['ar'] }}">

                                                                    <x-errors.display-validation-error property="name_ar" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Fee</label>
                                                                <input type="text" class="form-control" name="fee"
                                                                    placeholder="Fee"
                                                                    value="{{ $service->fee }}">
                                                                    <x-errors.display-validation-error property="fee" />
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="car-brand-model" class="forms-sample" method="POST"
                            action="{{ route('shipping-service.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    placeholder="English Name">
                                <x-errors.display-validation-error property="name_en" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" dir="auto"
                                    placeholder="Arabic Name">
                                <x-errors.display-validation-error property="name_ar" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Fee</label>
                                <input type="text" class="form-control" name="fee" dir="auto"
                                    placeholder="Fees Price">
                                <x-errors.display-validation-error property="fee" />
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
