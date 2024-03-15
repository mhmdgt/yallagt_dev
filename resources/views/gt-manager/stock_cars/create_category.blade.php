@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all-stock-cars') }}">Stock Cars</a>
                    </li>
                    <li class="breadcrumb-item"><a>Add New Categorie</a></li>
                </ol>
            </div>
        </nav>

        <form>
            {{-- Name & Price --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Name</label>
                                    <div id="the-basics">
                                        <input class="typeahead" type="text">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Price</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Body --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
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
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Number of seats</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Rims Size</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Trunk Size</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Fuel Tank Capacity</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Engine --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0 mt-4">
                                <div class="col">
                                    <label>Engine Capacity</label>
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
                                    <label>Cylinders</label>
                                    <div id="bloodhound">
                                        <input class="typeahead" type="text" placeholder="Torque">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Acceleration</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Aspiration</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Manual</option>
                                            <option value="NY">Auto</option>
                                            <option value="FL">CVT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Maximum Speed</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Horsepower</label>
                                    <div id="the-basics">
                                        <input class="typeahead" type="text" placeholder="Horsepower">
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Newton meter</label>
                                    <div id="bloodhound">
                                        <input class="typeahead" type="text" placeholder="Torque">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Transmission --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0 mt-4">
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
                                <div class="col">
                                    <label for="exampleInputNumber1">Transmission Speeds</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fule --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
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
                                    <label for="exampleInputNumber1">Fuel Consumption</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Status --}}
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios5" id="optionsRadios5"
                            value="option5">
                        Active
                        <i class="input-frame"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios5" id="optionsRadios6"
                            value="option5">
                        hide
                        <i class="input-frame"></i></label>
                </div>

                {{-- Submit --}}
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div>

@endsection
