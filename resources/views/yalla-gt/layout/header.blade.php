<header>
    <div class="sticky-header">
        <div class="main_header">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between px-3">
                    <div class="logo">
                        <a href="{{ route('yalla-index') }}"><img src="{{ asset('yalla_gt') }}/media/logo/logo.png"
                                alt=""></a>
                    </div>
                    <div class="search_container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="{{ __('header.search') }}..." type="text">
                                <button type="submit" class="search_icon_bar">
                                    <i class='bx bx-search-alt' style='color:#ffffff; font-size: 24px;'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="header_account_area">
                        <div class="header_account_list  mini_cart_wrapper d-flex align-items-center">
                            @auth
                                <a href="{{ route('user.profile') }}" class="btn btn-light text-dark ml-2">
                                    <i class="bi bi-person-check"></i>
                                    <p class="ml-1">{{ getFirstName(user_data()->name) }}</p>
                                </a>
                            @else
                                <a class="loginPopUpForm btn btn-light text-dark ml-2">
                                    <i class="bi bi-box-arrow-in-left ml-2"></i>
                                    <p class="ml-1">{{ __('header.login') }}</p>
                                </a>
                            @endauth
                            {{-- <a class="btn btn-primary" href="{{route('gt_car.create')}}">
                                <i class="bi bi-plus-circle"></i>
                                <p class="ml-2 mr-2"> Sell </p>
                            </a> --}}
                            <a href="{{route('cart.index')}}"><img width="60"
                                    src="{{ asset('yalla_gt') }}/media/icon/shopping-cart-header-solid.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
