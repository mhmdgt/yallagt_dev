@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('stock-car.index') }}">Brands</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a
                            href="{{ route('stock-car.show', $brand->slug) }}">{{ $brand->name }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ $brandModel->name }}</a></li>
                    <li class="breadcrumb-item"><a>Edit Category</a></li>
                </ol>


                <button type="button" class="btn btn-danger btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#confirmDeleteModal{{ $stockCarCategory->id }}" title="Edit">
                    <i class="bi bi-trash3"></i>
                    Delete
                </button>
                <x-modal.confirm-delete-modal route="{{ route('model-category.destroy', $stockCarCategory->id) }}"
                    id="{{ $stockCarCategory->id }}" />
            </div>
        </nav>
        <form action="{{ route('model-category.update', $stockCarCategory->id) }}" method="POST">
            @csrf
            @method('put')
            {{-- Name & Price --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <input hidden type="text" class="form-control" name="id" value="{{ $stockCarCategory->id }}">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="name">Name</label>
                                    <input class="typeahead form-control" type="text" id="name" name="name"
                                        value="{{ old('name') ?? $stockCarCategory->name }}">
                                    <x-errors.display-validation-error property="name" />
                                </div>
                                <div class="col">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" oninput="formatNumber(this)"
                                    value="{{ old('price') ?? number_format($stockCarCategory->price, 0, '.', ',') }}">
                                    <x-errors.display-validation-error property="price" />
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
                                    <label for="body_shape">Body Shape</label>
                                    <select class="js-example-basic-single w-100" id="body_shape" name="body_shape_id">
                                        @foreach ($bodyShapes as $bodyShape)
                                            <option value="{{ $bodyShape->id }}" @selected($stockCarCategory->body_shape_id == $bodyShape->id))>
                                                {{ $bodyShape->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="body_shape_id" />
                                </div>
                                <div class="col">
                                    <label for="number_of_seat">Number of seats</label>
                                    <input type="number" class="form-control" id="number_of_seat" name="number_of_seat"
                                        value="{{ old('number_of_seat') ?? $stockCarCategory->number_of_seat }}">
                                    <x-errors.display-validation-error property="number_of_seat" />
                                </div>
                                <div class="col">
                                    <label for="rims_size">Rims Size</label>
                                    <input type="number" class="form-control" id="rims_size" name="rims_size"
                                        value="{{ old('rims_size') ?? $stockCarCategory->rims_size }}">
                                    <x-errors.display-validation-error property="rims_size" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="trunk_size">Trunk Size</label>
                                    <input type="number" class="form-control" id="trunk_size" name="trunk_size"
                                        value="{{ old('trunk_size') ?? $stockCarCategory->trunk_size }}">
                                    <x-errors.display-validation-error property="trunk_size" />
                                </div>
                                <div class="col">
                                    <label for="fuel_tank_capacity">Fuel Tank Capacity</label>
                                    <input type="number" class="form-control" id="fuel_tank_capacity"
                                        name="fuel_tank_capacity"
                                        value="{{ old('fuel_tank_capacity') ?? $stockCarCategory->fuel_tank_capacity }}">
                                    <x-errors.display-validation-error property="fuel_tank_capacity" />
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
                                        <select class="js-example-basic-single w-100" name="engine_cc_id">
                                            @foreach ($engineCapacities as $engineCapacity)
                                                <option value="{{ $engineCapacity->id }}" @selected($stockCarCategory->engine_cc_id == $engineCapacity->id)>
                                                    {{ $engineCapacity->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <x-errors.display-validation-error property="engine_capacity_id" />
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="engin_aspiration">Engine Aspirations</label>

                                    <div>
                                        <select class="js-example-basic-single w-100" name="engine_aspiration_id">
                                            @foreach ($enginAspirations as $enginAspiration)
                                                <option value="{{ $enginAspiration->id }}" @selected($stockCarCategory->engine_aspiration_id == $enginAspiration->id)>
                                                    {{ $enginAspiration->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <x-errors.display-validation-error property="engine_aspiration_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="cylinder">Cylinders</label>
                                    <input class="typeahead form-control" type="number" placeholder="Torque"
                                        id="cylinder" name="cylinder"
                                        value="{{ old('cylinder') ?? $stockCarCategory->cylinder }}">
                                    <x-errors.display-validation-error property="cylinder" />

                                </div>
                                <div class="col">
                                    <label for="acceleration">Acceleration</label>
                                    <input type="number" class="form-control" id="acceleration" name="acceleration"
                                        value="{{ old('acceleration') ?? $stockCarCategory->acceleration }}">
                                    <x-errors.display-validation-error property="acceleration" />

                                </div>
                            </div>
                            <div class="form-group row pt-0">

                                <div class="col">
                                    <label for="maximum_speed">Maximum Speed</label>
                                    <input type="number" class="form-control" id="maximum_speed" name="maximum_speed"
                                        value="{{ old('maximum_speed') ?? $stockCarCategory->maximum_speed }}">
                                    <x-errors.display-validation-error property="maximum_speed" />

                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for=" Horsepower ">Horsepower</label>
                                    <input class="typeahead form-control" type="number" placeholder="Horsepower"
                                        id="horsepower" name="horsepower"
                                        value="{{ old('horsepower') ?? $stockCarCategory->horsepower }}">
                                    <x-errors.display-validation-error property="horsepower" />

                                </div>
                                <div class="col">
                                    <label for="newton_meter">Newton meter</label>
                                    <input class="typeahead form-control" type="number" placeholder="Torque"
                                        id="newton_meter" name="newton_meter"
                                        value="{{ old('newton_meter') ?? $stockCarCategory->newton_meter }}">
                                    <x-errors.display-validation-error property="newton_meter" />

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
                                    <div>
                                        <select class="js-example-basic-single w-100" name="transmission_type_id">
                                            @foreach ($transmissionTypes as $transmissionType)
                                                <option value="{{ $transmissionType->id }}" @selected($stockCarCategory->transmission_type_id == $transmissionType->id)>
                                                    {{ $transmissionType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="transmission_type_id" />

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Transmission Speeds</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1"
                                        name="transmission_speed"
                                        value="{{ old('transmission_speed') ?? $stockCarCategory->transmission_speed }}">
                                    <x-errors.display-validation-error property="transmission_speed" />
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
                                        <select class="js-example-basic-single w-100" name="fuel_type_id">
                                            @foreach ($fuelTypes as $fuelType)
                                                <option value="{{ $fuelType->id }}" @selected($stockCarCategory->fuel_type_id == $fuelType->id)>
                                                    {{ $fuelType->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="fuel_type_id" />

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputNumber1">Fuel Consumption</label>
                                    <input type="number" class="form-control" id="exampleInputNumber1"
                                        name="fuel_consumption"
                                        value="{{ old('fuel_consumption') ?? $stockCarCategory->fuel_consumption }}">
                                    <x-errors.display-validation-error property="fuel_consumption" />
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
                                    <h6 class="card-title">Status</h6>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios5" value="active"
                                                {{ $stockCarCategory->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $stockCarCategory->status == 'hidden' ? 'checked' : '' }}>
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
            <div class="form-group float-right">
                <button class="btn btn-primary mr-2" type="submit">
                    <i class="bi bi-bookmark-check"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
