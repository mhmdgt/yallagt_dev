@extends('gt-manager.aBody.app-layout')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a>Model Specs</a></li>
            </ol>
        </div>
    </nav>
    @if ($errors->any())
    @php
    // toast('try agin','error')->autoClose(5000);
    toast('Post Updated','success','top-right')->showCloseButton();
    @endphp

    @endif


    {{-- ========================== Body Shapes ========================== --}}
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card">
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card-body">
                        {{-- Top --}}
                        <nav class="page-breadcrumb">
                            {{-- ====== Navagation ====== --}}
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h4>Body Shapes</h4>
                                {{-- ====== Modal button ====== --}}
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                    data-toggle="modal" data-target="#store-body-shape">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Add
                                </button>
                            </div>
                        </nav>
                        {{-- Data --}}
                        <div class="row">
                            {{-- Loop Starts --}}
                            @foreach ( $bodyShapes as $bodyShape)


                            <div class="left-drop-down-btn">
                                {{-- image --}}
                                <img width="40" class="pl-2"
                                    src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                {{-- name --}}
                                <h5 class="p-1 ml-2"> {{ $bodyShape->name }}</h5>
                                {{-- controller --}}
                                <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                    <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#update-body-shape{{ $bodyShape->id }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('body-shape.destroy',$bodyShape->id) }}"
                                            data-confirm-delete="true">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- ========================== update body sheps ========================== --}}
                            <div class="modal fade" id="update-body-shape{{ $bodyShape->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">update Body Shape</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="forms-sample update-body-shape" method="POST"
                                                enctype="multipart/form-data" data-model-id="{{ $bodyShape->id  }}">
                                                @csrf
                                                @method('PUT')
                                                <input hidden type="text" class="form-control" name="id"
                                                    value="{{ $bodyShape->id  }}">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Name <span
                                                            class="text-danger">(EN)</span></label>
                                                    <input type="text" class="form-control" name="name_en"
                                                        autocomplete="off" placeholder="English Name"
                                                        value="{{ old('name_en')?? $bodyShape->getTranslations('name')['en']  }}">
                                                    <small class="text-danger en_name-error" id='en_name-error'></small>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Name <span
                                                            class="text-danger">(AR)</span></label>
                                                    <input type="text" class="form-control" name="name_ar"
                                                        placeholder="Arabic Name"
                                                        value="{{ old('name_ar')?? $bodyShape->getTranslations('name')['ar'] }}">
                                                    <small class="text-danger ar_name-error" id='ar_name-error'></small>
                                                </div>

                                                <h6 class="mt-4 mb-2">Media Section</h6>
                                                <div class="form-group">
                                                    <label>Brand Logo</label>
                                                    <input type="file" name="logo" class="file-upload-default"
                                                        id="image">

                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info"
                                                            disabled="" placeholder="Upload Image" name="logo">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-success"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                    <small class="text-danger logo-error" id='logo-error'></small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmaill" class="form-label"> </label>
                                                    <img id="showImage" class="image-rec-full"
                                                        src="{{ asset('gt_manager/assets/images/no_image.jpg') }}"
                                                        alt="...">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="add_employee_btn"
                                                        class="btn btn-primary">update changes</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- Loop Ends --}}
                        </div>
                        {{-- Edit Model --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================== Add body sheps ========================== --}}
    <div class="modal fade" id="store-body-shape" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Body Shape</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="forms-sample store-body-shape" method="POST" enctype="multipart/form-data"
                        id="store-body-shape-form">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                            <input type="text" class="form-control" name="name_en" autocomplete="off"
                                placeholder="English Name" value="{{ old('name_en')??'' }}">
                            @error('name_en')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                            <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name"
                                value="{{ old('name_ar')??'' }}">
                            @error('name_ar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
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
                            @error('logo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
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
    {{-- ========================== Transmission Types ========================== --}}
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card">
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card-body">
                        {{-- Top --}}
                        <nav class="page-breadcrumb">
                            {{-- ====== Navagation ====== --}}
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h4>Transmission Types</h4>
                                {{-- ====== Modal button ====== --}}
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                    data-toggle="modal" data-target="#addNewCarModal">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Add
                                </button>
                            </div>
                        </nav>
                        {{-- Data --}}
                        <div class="row">
                            {{-- Loop Starts --}}
                            <div class="left-drop-down-btn">
                                {{-- image --}}
                                <img width="40" class="pl-2"
                                    src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                {{-- name --}}
                                <h5 class="p-1 ml-2">Automaic </h5>
                                {{-- controller --}}
                                <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                    <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Loop Ends --}}
                        </div>
                        {{-- Edit Model --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- ========================== Engine Aspiration ========================== --}}
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card">
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card-body">
                        {{-- Top --}}
                        <nav class="page-breadcrumb">
                            {{-- ====== Navagation ====== --}}
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h4>Engine Aspiration</h4>
                                {{-- ====== Modal button ====== --}}
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                    data-toggle="modal" data-target="#addNewCarModal">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Add
                                </button>
                            </div>
                        </nav>
                        {{-- Data --}}
                        <div class="row">
                            {{-- Loop Starts --}}
                            <div class="left-drop-down-btn">
                                {{-- image --}}
                                <img width="40" class="pl-2"
                                    src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                {{-- name --}}
                                <h5 class="p-1 ml-2">Automaic </h5>
                                {{-- controller --}}
                                <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                    <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Loop Ends --}}
                        </div>
                        {{-- Edit Model --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================== Fuel Types ========================== --}}
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card">
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card-body">
                        {{-- Top --}}
                        <nav class="page-breadcrumb">
                            {{-- ====== Navagation ====== --}}
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <h4>Fuel Types</h4>
                                {{-- ====== Modal button ====== --}}
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                    data-toggle="modal" data-target="#addNewCarModal">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Add
                                </button>
                            </div>
                        </nav>
                        {{-- Data --}}
                        <div class="row">
                            {{-- Loop Starts --}}
                            <div class="left-drop-down-btn">
                                {{-- image --}}
                                <img width="40" class="pl-2"
                                    src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                {{-- name --}}
                                <h5 class="p-1 ml-2">Automaic </h5>
                                {{-- controller --}}
                                <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                    <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Loop Ends --}}
                        </div>
                        {{-- Edit Model --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================== End ========================== --}}
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
        // ######################## body shape #########################
        // store
        $('#store-body-shape-form').submit(function(e) {
            
            e.preventDefault();
                 let formData = new FormData(this);
             
                let url = "{{ route('body-shape.store') }}";
            
            $.ajax({
                url: url, // Use form action attribute as URL
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                  
                    // Show success message
                    window.location.href = "{{ route('car-brand.index') }}";
                    // Reload the page after a successful request
                    location.reload(true); // Force reload from server
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseJSON.errors.name_en);
                    // Error handling
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        
                            if (errors.hasOwnProperty('name_ar')) {
                            $(".en_name-error").text(errors.name_en[0]);
                        }
                        if (errors.hasOwnProperty('name_ar')) {
                            $(".ar_name-error").text(errors.name_ar[0]);
                        }
                        if (errors.hasOwnProperty('logo')) {
                            $(".logo-error").text(errors.logo[0]);
                        }
                    }
                }
            });
        // edit
    $('.update-body-shape').submit(function(e) {      
    e.preventDefault();
         let formData = new FormData(this);
        let modelId = $(this).data('model-id'); // Retrieve the model ID from the form
        let url = "{{ route('body-shape.update', ':id') }}";
        url = url.replace(':id', modelId);
    $.ajax({
        url: url, // Use form action attribute as URL
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          
            // Show success message
            window.location.href = "{{ route('car-brand.index') }}";
            // Reload the page after a successful request
            location.reload(true); // Force reload from server
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseJSON.errors.name_en);
            // Error handling
            if (xhr.status == 422) {
                var errors = xhr.responseJSON.errors;
                
                    if (errors.hasOwnProperty('name_ar')) {
                    $(".en_name-error").text(errors.name_en[0]);
                }
                if (errors.hasOwnProperty('name_ar')) {
                    $(".ar_name-error").text(errors.name_ar[0]);
                }
                if (errors.hasOwnProperty('logo')) {
                    $(".logo-error").text(errors.logo[0]);
                }
            }
        }
    });
});

        // ######################## end body Shape ######################



          // ######################## body shape #########################
        
        // ######################## end body Shape ######################
    });
</script>
@endsection