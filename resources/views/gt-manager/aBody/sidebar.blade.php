<nav class="sidebar">
    {{-- upper Section --}}
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
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

            {{-- 1st Section --}}
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item">
                <a href="{{ route('index-page') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manager-home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#cstTheme" role="button" aria-expanded="false"
                    aria-controls="cstTheme">
                    <i class="link-icon" data-feather="sliders"></i>
                    <span class="link-title">Customer Theme</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="cstTheme">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link load-animation-link">C-Home Sliders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Built-in Ads</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#CarsSystem" role="button" aria-expanded="false"
                    aria-controls="CarsSystem">
                    <i class="link-icon" data-feather="navigation-2"></i>
                    <span class="link-title">Cars Assets</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="CarsSystem">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('car-brand.index') }}" class="nav-link">
                                Brands & Models</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('model-specs-index') }}" class="nav-link">
                                Model Specs</a>
                        </li>

                    </ul>
                </div>
            </li>
            {{-- END 1st Section --}}

            {{-- 2nd Section --}}
            <li class="nav-item nav-category">Stock Manager</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#StockCars" role="button" aria-expanded="false"
                    aria-controls="StockCars">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Stock Cars</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="StockCars">
                    <ul class="nav sub-menu">
                        {{-- <li class="nav-item">
                            <a href="{{ route('create-stock-cars') }}" class="nav-link">Add Stock Car</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('all-stock-car-brands') }}" class="nav-link">All Stock Brands</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ProductSystem" role="button" aria-expanded="false"
                    aria-controls="ProductSystem">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Products System</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="ProductSystem">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                Manufactures</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/compose.html" class="nav-link">Final Product</a>
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
                        <li class="nav-item"><a href="pages/email/inbox.html" class="nav-link">Add New Blog</a></li>
                        <li class="nav-item"><a href="pages/email/compose.html" class="nav-link">Add Categorie</a>
                        </li>
                        <li class="nav-item"><a href="pages/email/read.html" class="nav-link">Categories List</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- END 2nd Section --}}

            {{-- 3rd Section --}}
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
                        <li class="nav-item">
                            <a href="{{ route('add-car-for-sale') }}" class="nav-link">+ Add</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/alerts.html" class="nav-link">All Live</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/badges.html" class="nav-link">Pending</a>
                        </li>

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
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">All Orders</a>
                        </li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">All New
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Approved
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">In-House
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Third-party
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Processed
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Courier
                                Orders</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Customer
                                received</a></li>
                        <li class="nav-item"><a href="pages/advanced-ui/cropper.html" class="nav-link">Order
                                Placed</a></li>
                    </ul>
                </div>
            </li>
            {{-- END 3rd Section --}}

            {{-- 4th Section --}}
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
                            <a href="#" class="nav-link">Admins List</a>
                        </li>
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
                            <a href="pages/ui-components/alerts.html" class="nav-link">Customers List</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- END 4th Section --}}

            {{-- 5th Section --}}
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
                {{-- <a href="{{ route('create-category') }}" class="nav-link"> --}}
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Branding</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">Contact Us</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="link"></i>
                    <span class="link-title">Social Media</span>
                </a>
            </li>
            {{-- END 5th Section --}}

        </ul>
    </div>
</nav>
