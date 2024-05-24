<header>
    <div class="main_mobile_nav nav_section_mobile d-block d-lg-none">
        <ul class="nav-content d-flex align-items-center justify-content-between">
            <li class="nav-list">
                <a href="{{ route('yalla-index') }}" class="link-item active">
                    <i class='bx bxs-home link-icon'></i>
                    <span class="link-text">{{ __('header.home') }}</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="{{route('product.manufacturers-index')}}" class="link-item">
                    <i class='bx bxs-shopping-bags link-icon'></i>
                    <span class="link-text">{{ __('header.shop') }}</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="{{route('gt_car.create')}}" class="link-item">
                    <i class='bx bxs-message-square-add link-icon'></i>
                    <span class="link-text">{{ __('header.sell') }}</span>
                </a>
            </li>
            <li class="nav-list">
                <a href="{{route('user-carts.index')}}" class="link-item">
                    <i class="bi bi-basket-fill link-icon"></i>
                    <span class="link-text">{{ __('header.cart') }}</span>
                </a>
            </li>
            <li class="nav-list">
                @auth
                    <a href="{{ route('user.profile') }}" class="loginPopUpFormMobile link-item">
                        <i class='bx bxs-user link-icon'></i>
                        <span class="link-text">{{ __('header.account') }}</span>
                    </a>
                @else
                    <a class="loginPopUpFormMobile link-item">
                        <i class='bx bxs-user link-icon'></i>
                        <span class="link-text">{{ __('header.account') }}</span>
                    </a>
                @endauth
                {{-- <a class="loginPopUpFormMobile link-item">
                    <i class='bx bxs-user link-icon'></i>
                    <span class="link-text">Profile</span>
                </a> --}}

            </li>
        </ul>
    </div>
</header>
