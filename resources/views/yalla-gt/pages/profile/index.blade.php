@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        @include('yalla-gt.partials.account_head')
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
