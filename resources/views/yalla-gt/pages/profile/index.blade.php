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
                                <div class="profile-info">
                                    <span class="profile-name">{{ __('profile.ahlan') }} {{ getFirstName(user_data()->name) }}</span>
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
                <a href="{{ route('user.ads') }}" class="card-link">
                    <div class="card">
                        <div class="shortcut-card d-flex align-items-center text-dark">
                            <i class="bi bi-star"></i>
                            <div class="ml-2 mr-2">
                                <h6 class="card-title mb-0 font-weight-bold">{{ __('profile.MyAds') }}</h6>
                                <p class="sub-title mb-0">{{ __('profile.ActiveAds') }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
        {{-- Account --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="head_title">
                    <h4>{{ __('profile.MyAccount') }}</h4>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card mt-1">
                    <div class="profile-card">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-geo-alt"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.MyAddresses') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-telephone"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.PhoneNumbers') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-credit-card-2-back"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.PaymentMethods') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif
                                </li>
                                <!-- Add more list items as needed -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Settings --}}
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <div class="head_title">
                    <h4>{{ __('profile.Settings') }}</h4>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card mt-1">
                    <div class="profile-card">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-geo-alt"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.Country') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-translate"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.Language') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                                    <a href="#">
                                        <i class="bi bi-phone"></i>
                                        <span class="ml-1 mr-1">{{ __('profile.Security') }}</span>
                                    </a>
                                    @if (App::getLocale() == 'en')
                                    <i class="bi bi-caret-right ml-auto"></i>
                                    @else
                                    <i class="bi bi-caret-left ml-auto"></i>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Log out --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="profile-card">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <a href="{{ route('yalla-gt.logout') }}">
                            <i class="bi bi-box-arrow-left"></i>
                            <span class="ml-2 mr-2">{{ __('profile.SignOut') }}</span>
                        </a>

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
