@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all-stock-cars') }}">All Stock Brands</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all-stock-models') }}">Brand Name</a></li>
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
                                    <label for="name">Name</label>
                                    <input class="typeahead form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
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
                                {{-- <div class="col">
                                    <label for="body_shape">Body Shape</label>
                                    <select class="js-example-basic-single w-100" id="body_shape" name="body_shape_id">
                                        @foreach ( $bodyShapes as  $bodyShape)
                                        <option value="{{ $bodyShape->id }}" >{{ $bodyShape->name }}</option>
                                        @endforeach


                                    </select>
                                    @error('body_shape_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                                <div class="col">
                                    <label for="number_of_seats">Number of seats</label>
                                    <input type="number" class="form-control" id="number_of_seats" name="number_of_seats" value="{{ old('number_of_seats') }}">
                                </div>
                                <div class="col">
                                    <label for="rims_size">Rims Size</label>
                                    <input type="number" class="form-control" id="rims_size" name="rims_size" value="{{ old('rims_size') }}">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="trunk_size">Trunk Size</label>
                                    <input type="number" class="form-control" id="trunk_size" name="trunk_size" value="{{ old('trunk_size') }}">
                                </div>
                                <div class="col">
                                    <label for="fuel_tank_capacity">Fuel Tank Capacity</label>
                                    <input type="number" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" value="{{ old('fuel_tank_capacity') }}">
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
                                    <label for="engine_capacity">Engine Capacity</label>

                                    <div>
                                        <select class="js-example-basic-single w-100" name="engine_capacity" >
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
                                    <label for="cylinder">Cylinders</label>
                                    <input class="typeahead form-control" type="text" placeholder="Torque" id="cylinder" name="cylinder" value="{{ old('cylinder') }}">
                                </div>
                                <div class="col">
                                    <label for="acceleration">Acceleration</label>
                                    <input type="number" class="form-control" id="acceleration" name="acceleration" value="{{ old('acceleration') }}">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                {{-- <div class="col">
                                    <label for="aspiration">Aspiration</label>
                                    <select class="js-example-basic-single w-100" id="aspiration" name="engin_aspiration_id">
                                        @foreach ($enginAspirations as $enginAspiration)
                                        <option value="{{ $enginAspiration->id }}" {{ old('engin_aspiration_id') == $enginAspiration->id ? 'selected' : '' }}>{{$enginAspiration->name }}</option>

                                        @endforeach

                                    </select>
                                    @error('engin_aspiration_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                                <div class="col">
                                    <label for="maximum_speed">Maximum Speed</label>
                                    <input type="number" class="form-control" id="maximum_speed" name="maximum_speed" value="{{ old('maximum_speed') }}">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="horsepower">Horsepower</label>
                                    <input class="typeahead form-control" type="text" placeholder="Horsepower" id="horsepower" name="horsepower" value="{{ old('horsepower') }}">
                                </div>
                                <div class="col">
                                    <label for="newton_meter">Newton meter</label>
                                    <input class="typeahead form-control" type="text" placeholder="Torque" id="newton_meter" name="newton_meter" value="{{ old('newton_meter') }}">
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
                                    <label for="transmission">Transmission</label>
                                    {{-- <select class="js-example-basic-single w-100" id="transmission" name="transmission">
                                        <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</opti
                                        </select>
                                    </div> --}}
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

@endsection
