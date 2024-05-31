@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        @include('yalla-gt.partials.account_head')
        {{-- Addresses --}}
        @if (!$addresses->isEmpty())
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            {{-- Title --}}
                            <div class="p-2 mb-2 text-dark ar-style">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('user.addressCreate') }}">
                                        <button class="rounded btn gradient-8790f6 text-white" type="submit">Add New</button>
                                    </a>
                                    <i class="bi bi-geo-alt ml-1 mr-1"></i>
                                    <span style="font-size: 22px; font-weight: 500;">{{ __('profile.MyAddresses') }}</span>
                                </div>
                                <p class="mt-2 mb-2 gt-gray">Manage your saved addresses</p>
                            </div>
                            {{-- Stored Address --}}
                            @foreach ($addresses as $address)
                                <div class="card mb-3 ar-style">
                                    <div class="card-body">
                                        <a href="{{ route('user.addressEdit' , $address->id )}}" class="edit-link">Edit</a>
                                        <div class="row mt-3">
                                            <dt class="col-4">Name:</dt>
                                            <dd class="col-8" dir="auto"><span>{{ $address->name }}</span></dd>

                                            <dt class="col-4">Phone:</dt>
                                            <dd class="col-8"><span>{{ $address->phone }}</span></dd>

                                            <dt class="col-4">City:</dt>
                                            <dd class="col-8"><span>{{ $address->governorate->name ?? 'N/A' }}</span></dd>

                                            <dt class="col-4">Address:</dt>
                                            <dd class="col-8" dir="auto"><span>{{ $address->full_address }}</span></dd>

                                            <dt class="col-4">Type:</dt>
                                            <dd class="col-8" dir="auto"><span>{{ $address->type }}</span></dd>

                                            {{-- @if ($address->gps_link)
                                                <dt class="col-4">GPS Link:</dt>
                                                <dd class="col-8"><span><a href="{{ $address->gps_link }}"
                                                            target="_blank">{{ $address->gps_link }}</a></span></dd>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- When No Addresses --}}
        @if ($addresses->isEmpty())
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body ar-style">
                            {{-- Title --}}
                            <div class="p-2 mb-4 text-dark ar-style">
                                <i class="bi bi-geo-alt ml-1 mr-1"></i>
                                <span style="font-size: 22px; font-weight: 500;">{{ __('profile.MyAddresses') }}</span>
                                <p class="mt-2 gt-gray">Manage your saved addresses for fast and easy checkout across our
                                    marketplaces</p>
                            </div>
                            {{-- Form --}}
                            <form action="{{ route('user.addressStore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Contact Data --}}
                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <h6 class="card-title">Type</h6>
                                        <div class="form-check form-check-inline border rounded p-2">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="type"
                                                    id="optionsRadios5" value="home">
                                                Home
                                                <i class="input-frame"></i></label>
                                        </div>
                                        <div class="form-check form-check-inline border rounded p-2">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="type"
                                                    id="optionsRadios6" value="work">
                                                Work
                                                <i class="input-frame"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ user_data()->name }}">
                                        <x-errors.display-validation-error property="name" />
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPhone1">Phone number</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ user_data()->phone }}">
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
                                                    {{ old('governorate') == $governorate->id ? 'selected' : '' }}>
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
                                        <input type="text" class="form-control" name="area" value="">
                                        <x-errors.display-validation-error property="area" />
                                    </div>
                                </div>

                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label>Building number</label>
                                        <input type="text" class="form-control" name="building_number">
                                        <x-errors.display-validation-error property="building_number" />
                                    </div>

                                    <div class="col">
                                        <label>Street</label>
                                        <input type="text" class="form-control" name="street" value="">
                                        <x-errors.display-validation-error property="street" />
                                    </div>
                                </div>

                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label>Full Address</label>
                                        <input type="text" class="form-control" name="full_address" value="">
                                        <x-errors.display-validation-error property="full_address" />
                                    </div>
                                </div>

                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <label>GPS Link <span>( Location )</span></label>
                                        <input type="url" class="form-control" name="gps_link" value="">
                                        <x-errors.display-validation-error property="gps_link" />
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-light mt-2 rounded gradient-green-bg text-white float-right">
                                    <i class="bi bi-bookmark-check"></i>
                                    Save
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    {{-- @include('yalla-gt.layout.upper-footer') --}}
    @include('yalla-gt.layout.footer')
@endsection
