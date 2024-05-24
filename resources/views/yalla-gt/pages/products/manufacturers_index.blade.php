@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="col-md-8">
                {{-- Search Brands --}}
                <div class="card choose__card">
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select required class="js-example-basic-single form-control">
                                            <option> Search </option>
                                            @foreach ($manufacturerWithSkus as $manufacturer)
                                                <option value="{{ $manufacturer->id }}">
                                                    {{ $manufacturer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-third rounded w-100 gradient-f25e3d mt-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Active Brands --}}
                <div class="choose_container mt-4">
                    <div class="row">
                        @foreach ($manufacturerWithSkus as $manufacturer)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                <div class="card choose__card--brands">
                                    <a href="{{route('product.manufacturer-products' , $manufacturer->slug )}}">
                                        <div class="card-body">
                                            <img src="{{ display_img($manufacturer->logo) }}" alt="">
                                        </div>
                                    </a>
                                </div>
                                <p class="text-center mt-3 text-dark">{{ $manufacturer->name }}</p>
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
