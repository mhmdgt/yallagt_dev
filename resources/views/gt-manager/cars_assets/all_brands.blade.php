@extends('gt-manager.aBody.app-layout')
@section('content')
<div class="page-content">
    {{-- ========================== NAV Section ========================== --}}
    <nav class="page-breadcrumb">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Brands & Models</li>
            </ol>
            {{-- ====== Modal button ====== --}}
            <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                data-target="#addNewCarModal">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add Brand
            </button>
        </div>
    </nav>
    {{-- ========================== All Brands ========================== --}}
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card-body">
                        <h6 class="card-title">All Car Brands</h6>
                        <div class="row">
                            @foreach ($brands as $brand )
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                <a href="{{ route('car-brand.show',$brand->id) }}">
                                    <div class="border border-light rounded shadow-sm">
                                        <div class="card-logo ">
                                            <img width="100px"
                                                src="{{ asset('gt_manager/media/car_brands_logo/'.$brand->logo) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <p class="text-center mt-3 text-dark ">{{ $brand->name}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add new brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- brand store --}}
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" id="car-brand" >
                        @csrf

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

                        <h6 class="mt-4 mb-2">Media Section</h6>
                        <div class="form-group">
                            <label>Brand Logo</label>
                            <input type="file" name="logo" class="file-upload-default" id="image">

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled=""
                                    placeholder="Upload Image" name="logo">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                </span>
                            </div>
                            <small class="text-danger" id='logo-error'></small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmaill" class="form-label"> </label>
                            <img id="showImage" class="image-rec-full"
                                src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="add_employee_btn" class="btn btn-primary">Save changes</button>
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
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#car-brand').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('car-brand.store') }}",
                type: "POST",
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
    });
</script>


@endsection
