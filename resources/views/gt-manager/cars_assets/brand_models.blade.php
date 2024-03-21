@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('car-brand.index') }}">All Car
                            Brands</a></li>
                    <li class="breadcrumb-item"><a>Brand Details</a></li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add New Model
                </button>
            </div>
        </nav>
        @error('logo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        {{-- ====== Brand Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <img class="image-in-box"
                                src="{{ asset('gt_manager/media/car_brands_logo/' . $carBrand->logo) }}" alt="...">
                            <span class="profile-name ml-3 h4">{{ $carBrand->name }}</span>

                                <td>
                                    <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                        data-target="#EditCarBrand" title="Edit">
                                        edit
                                    </button>

                                    <a href="{{ route('car-brand.destroy', $carBrand->id) }}" class="btn btn-inverse-danger"
                                        data-confirm-delete="true">
                                        delete
                                    </a>
                                </td>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== All Models ====== --}}
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
                                                    <i data-feather="edit"></i>
                                                </button>

                                                <a href="{{ route('car-brand-model.destroy', $model->id) }}"
                                                    class="btn btn-inverse-danger" data-confirm-delete="true">
                                                    delete
                                                </a>
                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <div class="modal fade" id="editModel{{ $model->id }}" tabindex="-1" role="dialog"
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
                        <form id="car-brand-model" class="forms-sample" method="POST">

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
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
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

                        <form class="forms-sample" method="POST" enctype="multipart/form-data" id="car-brand">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $carBrand->getTranslations('name')['en'] }}">
                                <small class="text-danger" id='en_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" autocomplete="off"
                                    value="{{ $carBrand->getTranslations('name')['ar'] }}">
                                <small class="text-danger" id='ar_name-error'></small>
                            </div>

                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo" class="file-upload-default" id="image">
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
                                <img id="showImage" class="image-rec-full"
                                    src="{{ asset('gt_manager/media/car_brands_logo/' . $carBrand->logo) }}"
                                    alt="...">
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


@section('script')
    <script>
        // CSRF Token Setup // CSRF Token Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            //######################################## update car brand ###################################################
            $('#car-brand').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                let url = "{{ route('car-brand.update', $carBrand->id) }}";
                $.ajax({
                    url: url,
                    type: "POST", // Change the method to PUT
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        // Show success message
                        window.location.href = "{{ route('car-brand.index') }}";
                        // Reload the page after a successful request
                        location.reload(true); // Force reload from server
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        // Error handling
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            // Handle validation errors
                            if (errors.hasOwnProperty('name_en')) {
                                $("#en_name-error").text(errors.name_en[0]);
                            }
                            if (errors.hasOwnProperty('name_ar')) {
                                $("#ar_name-error").text(errors.name_ar[0]);
                            }
                            if (errors.hasOwnProperty('logo')) {
                                $("#logo-error").text(errors.logo[0]);
                            }
                        } else {
                            // Handle other types of errors
                        }
                    }
                });
            });

            // #################################### store car brand model#######################################################
            $('#car-brand-model').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                console.log(formData);
                $('#car-brand-model').submit(function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    console.log(formData);
                    let url = "{{ route('car-brand-model.store') }}"; // Adjust the URL

                    $.ajax({
                        url: url,
                        type: "POST", // Change the method to PUT
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            // Show success message
                            window.location.href =
                                "{{ route('car-brand.show', $carBrand->id) }}";
                            // Reload the page after a successful request
                            location.reload(true); // Force reload from server
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            // Error handling
                            if (xhr.status == 422) {
                                var errors = xhr.responseJSON.errors;
                                // Handle validation errors
                                if (errors.hasOwnProperty('name_en')) {
                                    $("#en_name-error").text(errors.name_en[0]);
                                }
                                if (errors.hasOwnProperty('name_ar')) {
                                    $("#ar_name-error").text(errors.name_ar[0]);
                                }

                            }
                        }
                    });
                });
            });

            // ############################## update car brand model ######################################
            $('.car-brand-model-edit').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let modelId = $(this).data('model-id'); // Retrieve the model ID from the form
                let url = "{{ route('car-brand-model.update', ':id') }}";
                url = url.replace(':id', modelId);

                $.ajax({
                    url: url,
                    type: "POST", // No need to override method here, since we're using @method('PUT') in the form
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        // Show success message
                        window.location.href = "{{ route('car-brand.show', $carBrand->id) }}";
                        // Reload the page after a successful request
                        location.reload(true); // Force reload from server
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        // Error handling
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            // Handle validation errors
                            if (errors.hasOwnProperty('name_en')) {
                                $("#en_name-error").text(errors.name_en[0]);
                            }
                            if (errors.hasOwnProperty('name_ar')) {
                                $("#ar_name-error").text(errors.name_ar[0]);
                            }
                        }
                    }
                });
            });


        });
    </script>
@endsection
