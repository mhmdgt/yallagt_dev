<nav class="sidebar">
    {{-- upper Section --}}
    <div class="sidebar-header">
        <a href="{{ route('manager-index') }}" class="sidebar-brand">
            GT-Manger
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    {{-- END of upper Section --}}
    <div class="sidebar-body">
        <ul class="nav">
            {{-- Main --}}
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('manager-index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#CarsAssets" role="button" aria-expanded="false"
                    aria-controls="CarsAssets">
                    <i class="link-icon" data-feather="slack"></i>
                    <span class="link-title">Car Assets</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="CarsAssets">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('car-brand.index') }}" class="nav-link">
                                Brands & Models</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('spec-categories.index') }}" class="nav-link">
                                Spec Categories</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ProdutcAssets" role="button" aria-expanded="false"
                    aria-controls="ProdutcAssets">
                    <i class="link-icon" data-feather="save"></i>
                    <span class="link-title">Product Assets</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="ProdutcAssets">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('product-categories.index')}}" class="nav-link">
                                Product Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manufacturers.index')}}" class="nav-link">
                                Manufacturers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">All Products</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Shipping" role="button" aria-expanded="false"
                    aria-controls="Shipping">
                    <i class="link-icon" data-feather="send"></i>
                    <span class="link-title">Shipping</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Shipping">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('shipping-service.index')}}" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Companies</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Stock Manager --}}
            <li class="nav-item nav-category">Stock Manager</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#StockCars" role="button" aria-expanded="false"
                    aria-controls="StockCars">
                    <i class="link-icon" data-feather="zap"></i>
                    <span class="link-title">Stock Cars</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="StockCars">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('stock-car.index') }}" class="nav-link">All Stock Cars</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ProductSystem" role="button" aria-expanded="false"
                    aria-controls="ProductSystem">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">in-House Products</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="ProductSystem">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('product-listings.index')}}" class="nav-link">Product Listings</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#BlogSystem" role="button" aria-expanded="false"
                    aria-controls="BlogSystem">
                    <i class="link-icon" data-feather="bold"></i>
                    <span class="link-title">Blog System</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="BlogSystem">
                    <ul class="nav sub-menu">
                        <li class="nav-item"><a href="{{ route('blog-categories.index') }}" class="nav-link">Categories</a></li>
                        <li class="nav-item"><a href="{{ route('blogs.index') }}" class="nav-link">Blog List</a></li>
                    </ul>
                </div>
            </li>
            {{-- Customer Request --}}
            <li class="nav-item nav-category">Customer Requests</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#CarsForSale" role="button" aria-expanded="false"
                    aria-controls="CarsForSale">
                    <i class="link-icon" data-feather="git-pull-request"></i>
                    <span class="link-title">Cars For Sale</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="CarsForSale">
                    <ul class="nav sub-menu">
                        <li class="nav-item"><a href="{{ route('sale-car.create') }}" class="nav-link">+ Add</a></li>
                        <li class="nav-item"><a href="{{ route('sale-car.live') }}" class="nav-link">All Live</a></li>
                        <li class="nav-item"><a href="{{ route('sale-car.pending') }}" class="nav-link">Pending</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('sale-car.declined') }}" class="nav-link">Declined</a></li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ProductOrders" role="button"
                    aria-expanded="false" aria-controls="ProductOrders">
                    <i class="link-icon" data-feather="shopping-bag"></i>
                    <span class="link-title">Product Orders</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="ProductOrders">
                    <ul class="nav sub-menu">
                        <li class="nav-item"><a href="{{route('orders.pending')}}" class="nav-link">All New Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Approved</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">in-Processing</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Delivered</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Refunded</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Cancelled</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Completed</a></li>
                    </ul>
                </div>
            </li>
            {{-- Users --}}
            <li class="nav-item nav-category">Users</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#admins" role="button" aria-expanded="false"
                    aria-controls="admins">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title">Admins</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="admins">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('admins.show')}}" class="nav-link">Admins List</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Sellers" role="button" aria-expanded="false"
                    aria-controls="Sellers">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Sellers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Sellers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('sellers.index')}}" class="nav-link">Sellers List</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('storehouses.index')}}" class="nav-link">Storehouses</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#customers" role="button" aria-expanded="false"
                    aria-controls="customers">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Customers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="customers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('customers.index')}}" class="nav-link">Customers List</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Customer Web --}}
            <li class="nav-item nav-category">Customer Theme</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#webMedia" role="button" aria-expanded="false"
                    aria-controls="webMedia">
                    <i class="link-icon" data-feather="sliders"></i>
                    <span class="link-title">Web Media</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="webMedia">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Branding</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link load-animation-link">Sliders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Built-in Ads</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#webSettings" role="button" aria-expanded="false"
                    aria-controls="webSettings">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">Web Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="webSettings">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('cst_web.contact_us') }}" class="nav-link">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('web-settigns.termsIndex')}}" class="nav-link load-animation-link">Terms of Use</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('web-settigns.privacyIndex')}}" class="nav-link load-animation-link">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="#" class="nav-link load-animation-link">FAQ</a> --}}
                        </li>
                    </ul>
                </div>
            </li>
            {{-- End of list --}}
        </ul>
    </div>
</nav>

