@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        @include('yalla-gt.partials.account_head')
        {{-- When No Addresses --}}
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body ar-style">
                        {{-- Title --}}
                        <div class="p-2 mb-4 text-dark ar-style">
                            <div class="d-flex align-items-center">
                                {{-- <a href="">
                                    <button class="rounded btn btn-light gt-gray text-dark" type="submit">Delete</button>
                                </a> --}}
                                <i class="bi bi-geo-alt ml-1 mr-1"></i>
                                <span style="font-size: 22px; font-weight: 500;">Edit Address</span>
                            </div>
                            <p class="mt-2 gt-gray">Manage your saved addresses</p>
                        </div>

                        {{-- Form --}}
                        <form action="{{ route('user.addressUpdate', $user_address->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Contact Data --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h6 class="card-title">Type</h6>
                                    <div class="form-check form-check-inline border rounded p-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                   id="optionsRadios5" value="home"
                                                   {{ $user_address->type == 'home' ? 'checked' : '' }}>
                                            Home
                                            <i class="input-frame"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline border rounded p-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                   id="optionsRadios6" value="work"
                                                   {{ $user_address->type == 'work' ? 'checked' : '' }}>
                                            Work
                                            <i class="input-frame"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $user_address->name }}">
                                    <x-errors.display-validation-error property="name" />
                                </div>
                                <div class="col">
                                    <label for="exampleInputPhone1">Phone number</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $user_address->phone }}">
                                    <x-errors.display-validation-error property="phone" />
                                </div>
                            </div>
                            {{-- Address Data --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Governorate') }}</label>
                                    <select class="js-example-basic-single w-100" name="governorate_id">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"
                                                {{ $user_address->governorate_id == $governorate->id ? 'selected' : '' }}>
                                                {{ $governorate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="governorate" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area" value="{{ $user_address->area }}">
                                    <x-errors.display-validation-error property="area" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Building number</label>
                                    <input type="text" class="form-control" name="building_number" value="{{ $user_address->building_number }}">
                                    <x-errors.display-validation-error property="building_number" />
                                </div>

                                <div class="col">
                                    <label>Street</label>
                                    <input type="text" class="form-control" name="street" value="{{ $user_address->street }}">
                                    <x-errors.display-validation-error property="street" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Full Address</label>
                                    <input type="text" class="form-control" name="full_address" value="{{ $user_address->full_address }}">
                                    <x-errors.display-validation-error property="full_address" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>GPS Link <span>( Location )</span></label>
                                    <input type="url" class="form-control" name="gps_link" value="{{$user_address->gps_link}}">
                                    <x-errors.display-validation-error property="gps_link" />
                                </div>
                            </div>


                            <button type="submit"
                                class="btn btn-light mt-2 rounded gradient-green-bg text-white">
                                <i class="bi bi-bookmark-check"></i>
                                Update
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {{-- @include('yalla-gt.layout.upper-footer') --}}
    @include('yalla-gt.layout.footer')
@endsection
