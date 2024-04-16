@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Product Categories</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Category
                </button>
            </div>
        </nav>
        {{-- ========================== All Categories ========================== --}}
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    @csrf
                    {{-- Tabs --}}
                    <ul class="nav nav-tabs " id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Deatails-tab" data-toggle="tab" data-target="#Deatails"
                                type="button" role="tab" aria-controls="Deatails"
                                aria-selected="true">Deatails</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Media-tab" data-toggle="tab" data-target="#Media" type="button"
                                role="tab" aria-controls="Media" aria-selected="false">Media</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Stock-tab" data-toggle="tab" data-target="#Stock" type="button"
                                role="tab" aria-controls="Stock" aria-selected="false">Price &Stock</button>
                        </li>

                    </ul>
                    {{-- Forms --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- Deatails --}}
                        <div class="tab-pane fade show active " id="Deatails" role="tabpanel"
                            aria-labelledby="Deatails-tab">
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
                                            <div class="form-group row pt-0">
                                                <div class="col">
                                                    <label>Year</label>
                                                    <div>
                                                        <select class="js-example-basic-single w-100">
                                                            <option value="TX">2013</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Color</label>
                                                    <div>
                                                        <select class="js-example-basic-single w-100">
                                                            <option value="KN">Silver</option>
                                                            <option value="HW">Red</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row pt-0">
                                                <div class="col">
                                                    <h6 class="mt-3 mb-2 font-weight-light">Condition</h6>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="optionsRadios5" id="optionsRadios5" value="option5">
                                                            New
                                                            <i class="input-frame"></i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="optionsRadios5" id="optionsRadios6" value="option5">
                                                            Used
                                                            <i class="input-frame"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Files & Media --}}
                        <div class="tab-pane fade" id="Media" role="tabpanel" aria-labelledby="Media-tab">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Media</h6>
                                            {{-- <div>
                                                        <label>Upload your images</label>
                                                        <form action="#" enctype="multipart/form-data" class="dropzone" id="image-upload">
                                                        </form>
                                                    </div> --}}
                                            {{-- <div id="dropzoneDargArea" class="dz-default dz-message dropzone dropzoneDargArea" >
                                                            <span>upload File</span>
                                                        </div>
                                                        <div class="dropzone-reviews"></div> --}}

                                            <div>
                                                {{-- <input type="file" name="logo" class="file-upload-default" id="image"> --}}
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info"
                                                        disabled="" placeholder="Upload Image" multiple>
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-success"
                                                            type="button">Upload</button>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Price & Stock --}}
                        <div class="tab-pane fade" id="Stock" role="tabpanel" aria-labelledby="Stock-tab">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Contact Details</h6>
                                            <div class="form-group row pt-0">
                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="optionsRadios5" id="optionsRadios5"
                                                                value="option5">
                                                            Personal
                                                            <i class="input-frame"></i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="optionsRadios5" id="optionsRadios6"
                                                                value="option5">
                                                            Bussiness
                                                            <i class="input-frame"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ow pt-0">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    autocomplete="off" name="name" value="">
                                            </div>
                                            <div class="form-group row pt-0">
                                                <div class="col">
                                                    <label for="exampleInputNumber1">Phone Number</label>
                                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                                </div>
                                            </div>
                                            <div class="form-group row pt-0 mt-4">
                                                <div class="col">
                                                    <label>Governorate</label>
                                                    <div>
                                                        <select class="js-example-basic-single w-100">
                                                            <option value="TX">Cairo</option>
                                                            <option value="NY">Diesel</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Area</label>
                                                    <div>
                                                        <select class="js-example-basic-single w-100">
                                                            <option value="TX">Zamalek</option>
                                                            <option value="NY">1000 cc</option>
                                                            <option value="FL">1200 cc</option>
                                                            <option value="KN">1300 cc</option>
                                                            <option value="HW">1400 cc</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <button class="btn btn-success float-right" type="submit">Save & Publish</button>
                </form>

            </div>
        </div>





    </div>
@endsection
