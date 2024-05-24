@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Storehouses</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Storehouse</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="{{ route('storehouses.update', $storehouseData->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact Details</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Seller</label>
                                    <input type="text" class="form-control" readonly value="{{$seller->name}}">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Storehouse Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$storehouseData->name}}">
                                    <x-errors.display-validation-error property="name" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Manager Name</label>
                                    <input type="text" class="form-control" name="manager_name" value="{{$storehouseData->manager_name}}">
                                    <x-errors.display-validation-error property="manager_name" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" value="{{$storehouseData->phone}}">
                                    <x-errors.display-validation-error property="phone" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Landline</label>
                                    <input type="number" class="form-control" name="landline" value="{{$storehouseData->landline}}">
                                    <x-errors.display-validation-error property="landline" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$storehouseData->email}}">
                                    <x-errors.display-validation-error property="email" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Address --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Address Details</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Governorate') }}</label>
                                    <select class="js-example-basic-single w-100" name="governorate_id">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"
                                                {{ $storehouseData->governorate_id == $governorate->id ? 'selected' : '' }}>
                                                {{ $governorate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="governorate_id" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area" value="{{$storehouseData->area}}">
                                    <x-errors.display-validation-error property="area" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Building number</label>
                                    <input type="number" class="form-control" name="building_number" value="{{$storehouseData->building_number}}">
                                    <x-errors.display-validation-error property="building_number" />
                                </div>
                                <div class="col">
                                    <label>Street</label>
                                    <input type="text" class="form-control" name="street" value="{{$storehouseData->street}}">
                                    <x-errors.display-validation-error property="street" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Full Address</label>
                                    <input type="text" class="form-control" name="full_address" value="{{$storehouseData->full_address}}">
                                    <x-errors.display-validation-error property="full_address" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>GPS Link <span>(longitude and latitude)</span></label>
                                    <input type="text" class="form-control" name="gps_link" value="{{$storehouseData->gps_link}}">
                                    <x-errors.display-validation-error property="gps_link" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-success float-right" type="submit">
                <i class="bi bi-bookmark-star" style='color:#ffffff'></i>
                Update
            </button>
        </Form>
    </div>
@endsection
