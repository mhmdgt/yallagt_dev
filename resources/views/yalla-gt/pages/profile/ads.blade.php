@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        @include('yalla-gt.partials.account_head')
        {{-- Ads --}}
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mt-2 mb-4">
                    <div class="card">
                        {{-- image --}}
                        <div class="card-img-container">
                            @foreach ($car->images as $image)
                                @if ($image->main_img)
                                    <a href="{{ route('gt_car.edit', $car->slug) }}">
                                        <img src="{{ display_img($image->name) }}"
                                            class="card-img-top max-height-image" alt="No_IMG">
                                    </a>
                                    <a href="{{ route('gt_car.edit', $car->slug) }}">
                                        <button class="btn btn-light btn-icon stockCarImageEdit">
                                            <i class='bx bx-edit' style="font-size: 16px;"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-light btn-icon stockCarImageStatus">
                                        {{$car->status}}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        {{-- Details --}}
                        <div class="card-body rtl-direction">
                            <h4 class="card-text">
                                <span>{{ ucwords($conditions[$car->condition]) }}</span>
                                {{ $brands[$car->brand] }}
                                {{ $models[$car->model] }}
                                {{ $car->year }}
                            </h4>
                            <h3 class="card-text-h3 mt-3" style="color: #F25E3D; font-weight: 600;">
                                <span class="h5 text-dark">EGP: </span>{{ number_format($car->price) }}
                            </h3>
                            <div class="card-text mt-4">
                                <span class="badge bg-light p-2 h4">
                                    <i class="bi bi-speedometer2"></i>
                                    {{ $kms[$car->km] }}
                                </span>
                                <span class="badge bg-light p-2 h4">
                                    <i class="bi bi-gear-wide-connected"></i>
                                    {{ $transmissions[$car->transmission] }}
                                </span>
                            </div>
                            <div class="card-text mt-2">
                                <i class="bi bi-geo-alt"></i>
                                <span class="badge_icon mr-2 h6">{{ $governorates[$car->governorate] }}</span>
                                <i class="bi bi-calendar-check"></i>
                                <span
                                    class="badge_icon_second mr-2 h6">{{ \Carbon\Carbon::parse($car->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{-- When no Ads --}}
        @if ($cars->isEmpty())
            <div class="row align-items-center mt-5 mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Your ad is free now</h2>
                    <p class="font-italic text-muted mb-4">"Win With Us at Yallagt, Sell your car, hassle-free and
                        commission-free. Our platform offers you the opportunity to list your vehicle without any fees,
                        ensuring a seamless selling experience. Take advantage of our commitment to providing a
                        transparent
                        and cost-effective solution for selling your car. Join our community today and let's win
                        together."
                    </p>
                    <a href="{{route('gt_car.create')}}" class="btn btn-light px-5 rounded-pill shadow-sm">Sell You Car</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                        src="{{ asset('yalla_gt/media/about_us/4136944.png') }}" alt=""
                        class="img-fluid mb-4 mb-lg-0"></div>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    {{-- @include('yalla-gt.layout.upper-footer') --}}
    @include('yalla-gt.layout.footer')
@endsection
