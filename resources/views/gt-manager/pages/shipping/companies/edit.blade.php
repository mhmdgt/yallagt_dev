@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Shipping Companies</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Company</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="{{ route('shipping-company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact Details</h6>
                            {{-- Title --}}
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Storehouse Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                                    <x-errors.display-validation-error property="name" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Manager Name</label>
                                    <input type="text" class="form-control" name="manager_name"
                                        value="{{ $company->manager_name }}">
                                    <x-errors.display-validation-error property="manager_name" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" value="{{ $company->phone }}">
                                    <x-errors.display-validation-error property="phone" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Landline</label>
                                    <input type="number" class="form-control" name="landline"
                                        value="{{ $company->landline }}">
                                    <x-errors.display-validation-error property="landline" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $company->email }}">
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
                            <h6 class="card-title">Headquarter Details</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Governorate') }}</label>
                                    <select class="js-example-basic-single w-100" name="governorate_id">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"
                                                {{ $company->governorate_id == $governorate->id ? 'selected' : '' }}>
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
                                    <input type="text" class="form-control" name="area" value="{{ $company->area }}">
                                    <x-errors.display-validation-error property="area" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Building number</label>
                                    <input type="number" class="form-control" name="building_number"
                                        value="{{ $company->building_number }}">
                                    <x-errors.display-validation-error property="building_number" />
                                </div>
                                <div class="col">
                                    <label>Street</label>
                                    <input type="text" class="form-control" name="street"
                                        value="{{ $company->street }}">
                                    <x-errors.display-validation-error property="street" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Headquarter Address</label>
                                    <input type="text" class="form-control" name="headquarter_address"
                                        value="{{ $company->headquarter_address }}">
                                    <x-errors.display-validation-error property="headquarter_address" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>GPS Link <span>(longitude and latitude)</span></label>
                                    <input type="text" class="form-control" name="gps_link"
                                        value="{{ $company->gps_link }}">
                                    <x-errors.display-validation-error property="gps_link" />
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
                                                {{ $company->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $company->status == 'hidden' ? 'checked' : '' }}>
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
            <button class="btn btn-success float-right" type="submit">
                <i class="bi bi-bookmark-star" style='color:#ffffff'></i>
                Update
            </button>
        </Form>
    </div>
@endsection
