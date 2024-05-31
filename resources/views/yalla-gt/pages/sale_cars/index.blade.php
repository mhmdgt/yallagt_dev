@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="col-md-8">
                {{-- Search Brands --}}
                {{-- <div class="rounded card choose__card ar-style">
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select required class="js-example-basic-single form-control">
                                            <option>{{__('gt_cars_create.brand')}}</option>
                                            @foreach ($brandsWithSaleCars as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select required class="js-example-basic-single form-control">
                                            <option>{{__('gt_cars_create.model')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-third rounded w-100 gradient-f25e3d mt-2">{{__('home_page.Search')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                {{-- Active Brands --}}
                <div class="choose_container mt-4">
                    <div class="row">
                        @foreach ($brandsWithSaleCars as $brand)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                <div class="card choose__card--brands">
                                    <a href="{{route('sale-car.gtList' , $brand->slug )}}">
                                        <div class="card-body">
                                            <img src="{{ display_img($brand->logo) }}" alt="">
                                        </div>
                                    </a>
                                </div>
                                <p class="text-center mt-3 text-dark">{{ $brand->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Chose cars --}}
            @include('yalla-gt.partials.choose_sale_car_vertical')
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
@section('script')
@endsection
