<header>
    <div class="header_bottom">
        <div class="container-fluid">
            <div class="row align-items-center px-3">
                <div class="main_menu menu_position">
                    <nav>
                        <ul class="align-items-center">
                            <li><a href="{{ route('yalla-index') }}"><img src="{{ asset('yalla_gt') }}/media/icon/home.png" alt=""></a></li>
                            <li><a href="#">{{ __('header.stock_cars') }}</a></li>
                            <li><a href="#">{{ __('header.sale_car') }}</a></li>
                            <li><a href="#">{{ __('header.product_shop') }}</a></li>
                            {{-- <li><a class="" href="#">{{ __('header.oils') }}
                                    <i class='bx bxs-down-arrow' style='color:#ffffff'></i>
                                </a>
                                <ul class="sub_menu home_sub_menu d-flex">
                                    <ul>
                                        <li><a href="#">Engine Oil</a></li>
                                        <li><a href="#">Transmission Oil</a></li>
                                        <li><a href="#">Break Oil</a></li>
                                    </ul>
                                </ul>
                            </li>
                            <li><a class="" href="#">{{ __('header.filters') }}
                                    <i class='bx bxs-down-arrow' style='color:#ffffff'></i>
                                </a>
                                <ul class="sub_menu home_sub_menu d-flex">
                                    <ul>
                                        <li><a href="#">Engine Oil</a></li>
                                        <li><a href="#">Transmission Oil</a></li>
                                        <li><a href="#">Break Oil</a></li>
                                    </ul>
                                </ul>
                            </li> --}}
                            <li><a href="#">{{ __('header.CarNews') }}</a></li>
                            <li><a href="{{route('about_us')}}">{{ __('header.about_us') }}</a></li>
                            <li><a href="#">{{ __('header.contact_us') }}</a></li>
                        </ul>
                    </nav>
                </div>
                <!--main menu end-->
            </div>
        </div>
    </div>
</header>
