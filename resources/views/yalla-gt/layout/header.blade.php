<header>
    <!-- Header -->
    <div class="sticky-header">
        <!-- Main NAVBAR -->
        <div class="main_header">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between px-3">
                    <div class="logo">
                        <a href=""><img src="yalla_gt/media/logo/logo.png" alt=""></a>
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
                            <a class="loginPopUpForm btn btn-light text-dark ml-2">
                                <img width=" 20" height="20" src="yalla_gt/media/icon/login_icon.png"
                                    alt="">
                                <p class="ml-1">{{ __('header.login') }}</p>
                            </a>
                            <a href="index.html"><img width="50" height="50"
                                src="yalla_gt/media/icon/shopping-cart-header-solid.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- WEB NAVBAR -->
        <div class="header_bottom">
            <div class="container-fluid">
                <div class="row align-items-center px-3">
                    <div class="main_menu menu_position">
                        <nav>
                            <ul class="align-items-center">
                                <li><a href="#"><img src="yalla_gt/media/icon/home.png" alt=""></a></li>
                                <li><a href="#">{{ __('header.stock_car') }}</a></li>
                                <li><a href="#">{{ __('header.sale_car') }}</a></li>
                                <li><a href="#">{{ __('header.product_shop') }}</a></li>
                                <li><a class="" href="#">{{ __('header.oils') }}
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
                                </li>
                                <li><a href="#">{{ __('header.blog_news') }}</a></li>
                                <li><a href="#">{{ __('header.about_us') }}</a></li>
                                <li><a href="#">{{ __('header.contact_us') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile NAVBAR -->
    <div class="main_mobile_nav nav_section_mobile d-block d-lg-none">
        <ul class="nav-content d-flex align-items-center justify-content-between">
            <li class="nav-list">
                <a href="#" class="link-item active">
                    <i class='bx bxs-home link-icon'></i>
                    <span class="link-text">Home</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="#" class="link-item">
                    <i class='bx bxs-shopping-bags link-icon'></i>
                    <span class="link-text">Shop</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="#" class="link-item">
                    <i class='bx bxs-message-square-add link-icon'></i>
                    <span class="link-text">Sell</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="#" class="link-item">
                    <i class='bx bxs-car link-icon'></i>
                    <span class="link-text">Cars</span>
                </a>
            </li>
            <li class="nav-list">
                <a class="loginPopUpFormMobile link-item">
                    <i class='bx bxs-user link-icon'></i>
                    <span class="link-text">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</header>
