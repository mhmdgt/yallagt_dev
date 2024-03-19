@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">All Stock Brands</a></li>
                    <li class="breadcrumb-item"><a>Add Stock Model</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <form id="upload-form">
            {{-- Brand , Model , Year , Color & Condition --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Brand</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Kia</option>
                                            <option value="NY">Hyundai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Model</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="KN">Cerato</option>
                                            <option value="HW">Picanto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Media --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div class="mt-4">
                                        <label>Add brochure</label>
                                        <input type="file" name="logo" class="file-upload-default" id="image">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled=""
                                                placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div>
                                            <label>Model Main Photo</label>
                                            <input type="file" name="logo" class="file-upload-default" id="image">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-success"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmaill" class="form-label"> </label>
                                                <img id="showImage" class="image-rec-full"
                                                    src="{{ asset('gt_manager/assets/images/no_image.jpg') }}"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">

                                        <label>Other Photo</label>
                                        <div id="dropzoneDargArea" class="dz-default dz-message dropzone dropzoneDargArea">
                                            <span>upload File</span>
                                        </div>
                                        <div class="dropzone-reviews"></div>

                                        {{-- <div>
                                            <label>Upload your images</label>
                                            <form action="#" enctype="multipart/form-data" class="dropzone"
                                                id="image-upload">
                                            </form>
                                        </div> --}}

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Status --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    {{-- <h6 class="mt-3 mb-2 font-weight-bold">Payment</h6> --}}
                                    <h6 class="card-title">Status</h6>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios5" value="option5">
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios6" value="option5">
                                            Hidden
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary" type="submit">Submit form</button>
        </Form>

    </div>

    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Dropzone</h6>
            <p class="card-description">Read the <a href="https://www.dropzonejs.com/" target="_blank"> Official
                    Dropzone.js Documentation </a>for a full list of instructions and other options.</p>
            <form action="/file-upload" class="dropzone" id="exampleDropzone"></form>
        </div>
    </div>


    <form id="myForm" action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <!-- Dropzone area -->
        <div id="myDropzone" class="dropzone"></div>

        <button type="submit">Submit</button>
    </form>


@endsection
