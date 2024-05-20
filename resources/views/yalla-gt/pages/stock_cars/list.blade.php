@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="d-flex align-items-center mb-4">
                    <h3 class="detailedSearch__header--h3">Detailed Search</h3>
                    <div class=" mr-2 btn btn-primary rounded gradient-green-bg">
                        {{ $brandData->name }}
                    </div>
                </div>
                {{-- Cars --}}
                <div class="d-block">
                    <div class="row gy-3">
                        @foreach ($brandModels as $model)
                            @foreach ($model->stockCars as $stockCar)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <a class="text-dark" href="{{ route('stock-car.gtShow',
                                        ['slug' => $stockCar->slug , 'categorySlug' => $stockCar->ca] ) }}">
                                            {{-- image --}}
                                            <div>
                                                <div class="card-img-container">
                                                    @foreach ($stockCar->images as $image)
                                                        @if ($image->main_img)
                                                            <img src="{{ display_img($image->name) }}" class="card-img-top"
                                                                alt="No_IMG">
                                                            <button class="btn btn-light btn-icon StockCarBrand">
                                                                {{ $stockCar->category_count }} Categories
                                                            </button>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="detailedSearch__content--card-price">
                                                <div class="mt-2 mb-3 home-blog-title"
                                                    style="font-size: 24px; font-weight: 600;">
                                                    <span>{{ $brandData->name }}</span>
                                                    <span>{{ $model->name }}</span>
                                                    <span>{{ $stockCar->year }}</span>
                                                </div>
                                                <hr>
                                                <h4 class="">
                                                    <i class='bx bx-purchase-tag'></i>
                                                    Prices Start
                                                </h4>
                                                <div class="row no-gutters">
                                                    <div class="col-6">
                                                        <div class="d-block detailedSearch__content--card-price-label">
                                                            From
                                                        </div>
                                                        <h6
                                                            class="d-block detailedSearch__content--card-price-h6 gt-orange">
                                                            EGP: {{ number_format($stockCar->min_price, 0, ',') }}
                                                        </h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-block detailedSearch__content--card-price-label">
                                                            To
                                                        </div>
                                                        <div
                                                            class="d-block detailedSearch__content--card-price-h6 gt-orange">
                                                            EGP: {{ number_format($stockCar->max_price, 0, ',') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach



                    </div>
                </div>
                {{-- END --}}
                @include('yalla-gt.partials.choose_sale_car')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
