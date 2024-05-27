@extends('yalla-gt.layout.app')
@section('content')
    <!-- Slider -->
    <div class="owlslider">
        <div class="owl-carousel" id="carousel">
            <div class="item">
                <img src="yalla_gt/media/home_slider/1688828797.webp" alt="">
            </div>
            <div class="item">
                <img src="yalla_gt/media/home_slider/1688828827.webp" alt="">
            </div>
            <div class="item">
                <img src="yalla_gt/media/home_slider/1688828869.webp" alt="">
            </div>
        </div>
    </div>
    <!-- Services -->
    <div class="banner_area">
        <div class="container-fluid ">
            <div class="row">
                <!--Shop Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/shop.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">{{ __('home_page.Products') }}</h4>
                                    <p class="p-service">{{ __('home_page.FastandEasy') }}</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="#">{{ __('home_page.SeeMore') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Car Prices Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/stock_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">{{ __('home_page.StockCars') }}</h4>
                                    <p class="p-service">{{ __('home_page.AllYouNeed') }}</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="#">{{ __('home_page.SeeMore') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cars For Sale Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/sale_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">{{ __('home_page.SaleCars') }}</h4>
                                    <p class="p-service">{{ __('home_page.BestDeals') }}</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="">{{ __('home_page.SeeMore') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sell Car Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/sell_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">{{ __('home_page.sellYourCar') }}</h4>
                                    <p class="p-service">{{ __('home_page.WithOneClick') }}</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service"
                                        href="{{ route('gt_car.create') }}">{{ __('home_page.SeeMore') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale Car -->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.SaleCars') }}</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="carsforsaleContainer owl-carousel">
                        @foreach ($cars as $car)
                            <div class="card cars_for_sale_home_layout">
                                <a class="text-dark" href="{{ route('sale-car.show', $car->slug) }}">
                                    <div class="card-img-container">
                                        @foreach ($car->images as $image)
                                            @if ($image->main_img)
                                                <img src="{{ display_img($image->name) }}" class="card-img-top"
                                                    alt="No_IMG">
                                                <button class="btn btn-light btn-icon stockCarImageEdit ar-style">
                                                    {{ ucwords($conditions[$car->condition]) }}
                                                    {{ $car->year }}
                                                </button>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-body container-fluid">
                                        <h4 class="card-text home-blog-title" dir="auto">
                                            {{ $brands[$car->brand] }}
                                            {{ $models[$car->model] }}
                                        </h4>

                                        <h3 class="card-text-h3 mt-1">
                                            <span class="h5 text-dark">{{ __('home_page.EGP') }}</span>
                                            {{ number_format($car->price, 0, ',', ',') }}
                                        </h3>
                                        <div class="card-text-4 mb-2" dir="auto">
                                            <i class="bi bi-geo-alt"></i> <span
                                                class="h6">{{ $governorates[$car->governorate] }}</span>
                                        </div>
                                        <div class="card-text-4 mb-2" dir="auto">
                                            <i class="bi bi-stopwatch"></i> <span
                                                class="h6">{{ $car->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="mt-2 detailedSearch__content--badge row no-gutters card-text-4"
                                            style="display:flex; flex-direction:column">
                                            <span class="badge badge_icon_5">{{ $kms[$car->km] }}</span>
                                            <span class="badge mt-2">{{ $transmissions[$car->transmission] }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Brands -->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.CarBrands') }}</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brand_container BrandOWL owl-carousel">
                        @foreach ($brandsWithStockCar as $brand)
                            <div class="single_brand">
                                <a href="{{ route('stock-car.gtList', $brand->slug) }}"><img
                                        src="{{ display_img($brand->logo) }}" alt="..."></a>
                            </div>
                        @endforeach
                        {{-- <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/motocraft.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/mazda.png" alt=""></a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories -->
    {{-- <section class="new-section category_section_1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.FeaturedCategories') }}</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="ProductCatedoryOWL owl-carousel">
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="yalla_gt/media/categories/battery.png" alt="">
                                </a>
                            </div>
                            <div class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Products Shop -->
    <section class="new-section product_area product_deals">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.ProductShop') }}</h2>
                        <hr>
                    </div>
                </div>

                <div class="col-12">
                    <div class="product_container">
                        <div class="row product_carousel no-gutters" id="shop_filter">

                            @foreach ($sellersStock as $seller)
                                @foreach ($seller->storehouses as $storehouse)
                                    @foreach ($storehouse->productListings as $productListing)
                                        @foreach ($productListing->skus as $sku)
                                            <div class="col-md-20 col-6 product_item">
                                                <article class="single_product">
                                                    <figure>
                                                        <a class="text-dark"
                                                            href="{{ route('product-item', ['slug' => $sku->product->slug, 'sku' => $sku->sku]) }}">
                                                            <div class="container-fluid product_thumb">
                                                                @foreach ($sku->images as $image)
                                                                    @if ($image->main_img)
                                                                        <img src="{{ display_img($image->name) }}">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_card_content">
                                                                <div class="mt-4 mb-4">
                                                                    <h6 class="brand fw-700">{{ __('home_page.Brand') }}:
                                                                        <span>{{ $sku->product->manufacturer->name }}</span>
                                                                    </h6>
                                                                    <h4 class="product_name home-blog-title">
                                                                        {{ $sku->sku_name }}</h4>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="p-0">
                                                                        <div>
                                                                            <span>{{ __('home_page.EGP') }}:</span>
                                                                            <span class="product_card_price"
                                                                                style="color: #F25E3D;">
                                                                                {{ number_format($productListing->selling_price, 0, ',', ',') }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="ar-style">
                                                                            <i class="bi bi-bookmark-check"></i>
                                                                            <span
                                                                                class="product_card_precentage">{{ __('home_page.Sold') }}:</span>
                                                                            <span>{{ $seller->name }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="p-0 product_card_cart">
                                                                        <form action="{{ route('user-carts.store', ['ProductSku' => $sku->sku]) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="addToCartButton">
                                                                                <img src="yalla_gt/media/cart/cart_icon.png" alt="Cart Icon">
                                                                            </button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Manufacturers -->
    <section class="new-section brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.FeaturedManufacturers') }}</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brand_container BrandOWL owl-carousel">
                        @foreach ($manufacturerWithSkus as $manufacturer)
                            <div class="single_manufacturer">
                                <a href="{{ route('product.manufacturer-products', $manufacturer->slug) }}"><img
                                        src="{{ display_img($manufacturer->logo) }}" alt="..."></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Vertical Shop -->
    {{-- <section class="new-section vertical_shop">
        <div class="container-fluid">
            <div class="row">
                <!-- Single Column -->
                <div class="col-xl-3 col-md-6">
                    <div class="section_title section_title_border en-style">
                        <h2>Liquid molly</h2>
                        <hr>
                    </div>
                    <div class="small_product_area product_carousel  vertical_shop_carousel">
                        <!-- loop starts here -->
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="#"><img
                                                src="yalla_gt/media/product_imgs/1688582470.webp" alt=""></a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">Liquid Safari 20W50 - 4 Liter</h4>
                                        <div class="bottom_section mb-0">
                                            <div class="price_box mr-1 mt-1">
                                                <span class="current_price ">EGP 9,999</span>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>

                        </div>
                        <!-- loop end here -->

                    </div>
                </div>
                <!-- Single Column -->
                <div class="col-xl-3 col-md-6">
                    <div class="section_title section_title_border en-style">
                        <h2>Liquid molly</h2>
                        <hr>
                    </div>
                    <div class="small_product_area product_carousel  vertical_shop_carousel">
                        <!-- loop starts here -->
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="#"><img
                                                src="yalla_gt/media/product_imgs/1688582470.webp" alt=""></a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">Liquid Safari 20W50 - 4 Liter</h4>
                                        <div class="bottom_section mb-0">
                                            <div class="price_box mr-1 mt-1">
                                                <span class="current_price ">EGP 9,999</span>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>

                        </div>
                        <!-- loop end here -->

                    </div>
                </div>
                <!-- Single Column -->
                <div class="col-xl-3 col-md-6">
                    <div class="section_title section_title_border en-style">
                        <h2>Liquid molly</h2>
                        <hr>
                    </div>
                    <div class="small_product_area product_carousel  vertical_shop_carousel">
                        <!-- loop starts here -->
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="#"><img
                                                src="yalla_gt/media/product_imgs/1688582470.webp" alt=""></a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">Liquid Safari 20W50 - 4 Liter</h4>
                                        <div class="bottom_section mb-0">
                                            <div class="price_box mr-1 mt-1">
                                                <span class="current_price ">EGP 9,999</span>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>

                        </div>
                        <!-- loop end here -->

                    </div>
                </div>
                <!-- Single Column -->
                <div class="col-xl-3 col-md-6">
                    <div class="section_title section_title_border en-style">
                        <h2>Liquid molly</h2>
                        <hr>
                    </div>
                    <div class="small_product_area product_carousel  vertical_shop_carousel">
                        <!-- loop starts here -->
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="#"><img
                                                src="yalla_gt/media/product_imgs/1688582470.webp" alt=""></a>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name">Liquid Safari 20W50 - 4 Liter</h4>
                                        <div class="bottom_section mb-0">
                                            <div class="price_box mr-1 mt-1">
                                                <span class="current_price ">EGP 9,999</span>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>

                        </div>
                        <!-- loop end here -->

                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- Blog -->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>{{ __('home_page.LatestBlogNews') }}</h2>

                        <hr>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="carsforsaleContainer owl-carousel">
                        @foreach ($blogs as $blog)
                            <div class="card cars_for_sale_home_layout">
                                <a class="text-dark" href="{{ route('blog-post', $blog->slug) }}">
                                    <div class="card-img-container">
                                        @foreach ($blog->images as $image)
                                            @if ($image->main_img)
                                                <img src="{{ display_img($image->name) }}" class="card-img-top">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <h4 class="font-weight-bold home-blog-title" dir="auto">
                                            {{ $blog->title }}
                                        </h4>
                                        {{-- <hr>
                                        <div class="btn rounded gradient-green-bg text-white">
                                            {{ __('home_page.SeeMore') }}</div> --}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ad Start area -->
    <section class="new-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="yalla_gt/media/ad_imgaes/1688832343.webp" class="w-100 mb-3" alt="">
                </div>
                <div class="col-md-6">
                    <img src="yalla_gt/media/ad_imgaes/1688832364.webp" class="w-100 mb-3" alt="">
                </div>
            </div>

        </div>
    </section>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all buttons with the class 'addToCartButton'
            const addToCartButtons = document.querySelectorAll('.addToCartButton');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    @if (Auth::check())
                        // Allow default behavior, which is navigating to the add-to-cart action
                        return true;
                    @else
                        event.preventDefault(); // Prevent default navigation
                        Swal.fire({
                            icon: 'warning',
                            title: 'You must be logged in to add items to the cart',
                            showConfirmButton: true,
                            confirmButtonText: 'Login',
                        });
                    @endif
                });
            });
        });
    </script>
@endsection
