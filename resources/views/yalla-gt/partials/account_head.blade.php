{{-- Main Profile --}}
<div class="row ar-style">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="profile-card">
                <div class="align-items-center">
                    <a class="text-dark" href="{{ route('user.profile') }}" class="card-link text-dark">
                        <div class="col-12 col-md-9 row">
                            <img class="image-in-box ml-4 mr-2" src="{{ asset('yalla_gt/media/no_image.jpg') }}"
                                alt="No Image">
                            <div class=" profile-info">
                                <span class="profile-name">{{ __('profile.ahlan') }}
                                    {{ getFirstName(user_data()->name) }}</span>
                                <span class="profile-email">{{ user_data()->email }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Shortcuts --}}
<div class="row mt-2 ar-style">
    <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
        <div class="card">
            <div class="shortcut-card d-flex align-items-center">
                <i class="bi bi-bag-check"></i>
                <div class="ml-3 mr-3">
                    <h6 class="card-title font-weight-bold mb-1">{{ __('profile.Orders') }}</h6>
                    <p class="sub-title gt-gray">{{ __('profile.manageAndTrack') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
        <div class="card">
            <div class="shortcut-card d-flex align-items-center">
                <i class="bi bi-bootstrap-reboot"></i>
                <div class="ml-3 mr-3">
                    <h6 class="card-title font-weight-bold mb-1">{{ __('profile.Returns') }}</h6>
                    <p class="sub-title gt-gray">{{ __('profile.ActiveRequests') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
        <a href="{{ route('gt_car.create') }}" class="card-link">
            <div class="card">
                <div class="shortcut-card d-flex align-items-center text-dark">
                    <i class="bi bi-card-checklist"></i>
                    <div class="ml-3 mr-3">
                        <h6 class="card-title font-weight-bold mb-1">{{ __('profile.SellYourCar') }}</h6>
                        <p class="sub-title gt-gray">{{ __('profile.TotallyFree') }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-lg-3 grid-margin stretch-card mb-2">
        <a href="{{ route('user.ads') }}" class="card-link">
            <div class="card">
                <div class="shortcut-card d-flex align-items-center text-dark">
                    <i class="bi bi-star"></i>
                    <div class="ml-3 mr-3">
                        <h6 class="card-title font-weight-bold mb-1">{{ __('profile.MyAds') }}</h6>
                        <p class="sub-title gt-gray">{{ __('profile.ActiveAds') }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
