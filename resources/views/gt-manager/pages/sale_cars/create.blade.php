@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a>Add Car For Sale</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <Form action="" id="carForSaleID" method="POST" enctype="multipart/form-data">
            @csrf
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
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios5" value="option5">
                                            New
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios6" value="option5">
                                            Used
                                            <i class="input-frame"></i></label>
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
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image" multiple>
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Price --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    {{-- <h6 class="mt-3 mb-2 font-weight-bold">Payment</h6> --}}
                                    <h6 class="card-title">Payment</h6>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios5" value="option5">
                                            Cash
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios6" value="option5">
                                            Down-Payment
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Price</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Body Shape & Tanssmission --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Details</h6>
                            <div class="form-group row pt-0 mt-4">
                                <div class="col">
                                    <label>Body Shape</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Sedan</option>
                                            <option value="NY">HatchBack</option>
                                            <option value="FL">Florida</option>
                                            <option value="KN">Kansas</option>
                                            <option value="HW">Hawaii</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0 mt-2">
                                <div class="col">
                                    <label>Transmission</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Manual</option>
                                            <option value="NY">Auto</option>
                                            <option value="FL">CVT</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- Engine Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Engine</h6>
                            <div class="form-group row pt-0 mt-4">
                                <div class="col">
                                    <label>Fule Type</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Banzen</option>
                                            <option value="NY">Diesel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Engine Capacity <span class="text-danger">(CC)</span></label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">800 cc</option>
                                            <option value="NY">1000 cc</option>
                                            <option value="FL">1200 cc</option>
                                            <option value="KN">1300 cc</option>
                                            <option value="HW">1400 cc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Engine Aspiration</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Natural</option>
                                            <option value="NY">Turbo-Charger</option>
                                            <option value="FL">Super-Charger</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Kilometers</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact Details</h6>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios5" value="option5">
                                            Personal
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios5"
                                                id="optionsRadios6" value="option5">
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
                                            Pending
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">Submit form</button>
        </Form>


    </div>
@endsection
