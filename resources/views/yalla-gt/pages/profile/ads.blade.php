@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        {{-- Main Profile --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="profile-card">
                        <div class=" align-items-center">
                            <div class="col-12 col-md-9 row">
                                <img class="image-in-box ml-4 mr-2" src="{{ asset('yalla_gt/media/no_image.jpg') }}"
                                    alt="No Image">
                                {{-- <i class='bx bxs-user-account' style='color:#1db954; font-size: 40px;'></i> --}}
                                <div class="profile-info ">
                                    <span class="profile-name">{{ __('profile.ahlan') }}
                                        {{ getFirstName(user_data()->name) }}</span>
                                    <span class="profile-email">{{ user_data()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Shortcuts --}}
        <div class="row mt-2">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
                <div class="card">
                    <div class="shortcut-card d-flex align-items-center">
                        <i class="bi bi-bag-check"></i>
                        <div class="ml-2 mr-2">
                            <h6 class="card-title mb-0 font-weight-bold">{{ __('profile.Orders') }}</h6>
                            <p class="sub-title mb-0">{{ __('profile.manageAndTrack') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
                <div class="card">
                    <div class="shortcut-card d-flex align-items-center">
                        <i class="bi bi-bootstrap-reboot"></i>
                        <div class="ml-2 mr-2">
                            <h6 class="card-title mb-0 font-weight-bold">{{ __('profile.Returns') }}</h6>
                            <p class="sub-title mb-0">{{ __('profile.ActiveRequests') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
                <div class="card">
                    <div class="shortcut-card d-flex align-items-center">
                        <i class="bi bi-card-checklist"></i>
                        <div class="ml-2 mr-2">
                            <h6 class="card-title mb-0 font-weight-bold">{{ __('profile.Wishlist') }}</h6>
                            <p class="sub-title mb-0">{{ __('profile.SavedItems') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
                <div class="card">
                    <div class="shortcut-card d-flex align-items-center">
                        <i class="bi bi-star"></i>
                        <div class="ml-2 mr-2">
                            <h6 class="card-title mb-0 font-weight-bold">{{ __('profile.MyAds') }}</h6>
                            <p class="sub-title mb-0">{{ __('profile.ActiveAds') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Content --}}
        <div class="row">

            @foreach ($cars as $car)
                <div class="col-md-4 mt-2 mb-4">
                    <div class="card">
                        {{-- image --}}
                        <div>
                            <div class="card-img-container">
                                @foreach ($car->images as $image)
                                    @if ($image->main_img)
                                    <a href="{{ route('gt_car.edit', $car->slug) }}">
                                        <img src="{{ asset('storage/media/sale_car_imgs/' . $image->path . '/' . $image->name) }}"
                                            class="card-img-top" alt="No_IMG">
                                        </a>
                                    @break
                                @endif
                            @endforeach
                        </div>
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
</div>
@endsection
@section('footer')
{{-- @include('yalla-gt.layout.upper-footer') --}}
@include('yalla-gt.layout.footer')
@endsection
