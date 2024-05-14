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
                <!--Shop Service-->
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
                <!--Shop Service-->
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
                <!--Shop Service-->
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
                                <div class="card-img-container">
                                    @foreach ($car->images as $image)
                                        @if ($image->main_img)
                                            <a href="{{route('sale-car.show' , $car->slug)}}">
                                                <img src="{{ asset('storage/media/sale_car_imgs/' . $image->path . '/' . $image->name) }}"
                                                    class="card-img-top" alt="No_IMG">
                                            </a>
                                            <button class="btn btn-light btn-icon stockCarImageEdit ar-style">
                                                {{ ucwords($conditions[$car->condition]) }}
                                                {{ $car->year }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-body container-fluid">
                                    <a href="#">
                                        <h4 class="card-text" dir="auto">
                                            {{ $brands[$car->brand] }}
                                            {{ $models[$car->model] }}
                                        </h4>

                                    </a>
                                    <h3 class="card-text-h3 mt-3">
                                        <span class="h5 text-dark">{{ __('home_page.EGP') }}</span>
                                        {{ number_format($car->price, 0, ',', ',') }}
                                    </h3>
                                    <div class="card-text-4 mt-3 mb-2" dir="auto">
                                        <i class="bi bi-geo-alt"></i> <span
                                            class="h6">{{ $governorates[$car->governorate] }}</span>
                                    </div>
                                    <div class="card-text-4 mt-2 mb-3" dir="auto">
                                        <i class="ml-auto mr-2 bi bi-stopwatch"></i> <span
                                            class="h6">{{ $car->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="detailedSearch__content--badge row no-gutters card-text-4"
                                        style="display:flex; flex-direction:column">
                                        <span class="badge badge_icon_5">{{ $kms[$car->km] }}</span>
                                        <span class="badge"
                                            style="margin-top: 10px;">{{ $transmissions[$car->transmission] }}</span>
                                    </div>
                                </div>

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
                                <a href="#"><img src="{{ display_img($brand->logo) }}" alt="..."></a>
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

                <div class="product_container">
                    <div class="row product_carousel no-gutters">
                        @foreach ($product_listings as $product_listing)
                            @foreach ($product_listing->skus as $sku)
                                <div class="col-md-20 col-6 product_item">
                                    <div class="single_product">
                                        <div class="product_card">
                                            <div class="container-fluid product_thumb">
                                                @foreach ($sku->images as $image)
                                                    @if ($image->main_img)
                                                        <img src="{{ display_img($image->name) }}" alt="Main Image">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="product_card_content">
                                                <div class="mt-4">
                                                    <h6 class="brand fw-700">Brand:
                                                        <span>{{ $sku->product->manufacturer->name }}</span>
                                                    </h6>
                                                    <a
                                                        href="{{ route('product_item', ['slug' => $sku->product->slug, 'sku' => $sku->sku]) }}">
                                                        <h4 class="product_name">{{ $sku->product->name }}</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="p-0">
                                                        <div>
                                                            <span>EGP:</span>
                                                            <span class="product_card_price" style="color: #F25E3D;">
                                                                {{ number_format($product_listing->selling_price, 0, ',', ',') }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <i class="bi bi-bookmark-check"></i>
                                                            <span class="product_card_precentage">HOT</span>
                                                            <span> DEALS </span>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="p-0 product_card_cart">
                                                    <img src="yalla_gt/media/cart/cart_icon.png">
                                                </div> --}}
                                                    <div class="p-0 product_card_cart">
                                                        <a
                                                            href="{{ route('user-carts.store', ['ProductSku' => $sku->sku]) }}">
                                                            <img src="yalla_gt/media/cart/cart_icon.png">
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
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

                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/BOSCH.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/Bilstein.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/BOSCH.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/Bilstein.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/BOSCH.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/Bilstein.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/BOSCH.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/media/brand/Bilstein.png" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Vertical Shop -->
    <section class="new-section vertical_shop">
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
    </section>
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
                            <div class="card cars_for_sale_home_layout" style="border-radius: 16px;">

                                <div class="card cars_for_sale_home_layout" style="border-radius: 16px;">
                                    <div class="card-img-container">
                                        @foreach ($blog->images as $image)
                                            @if ($image->main_img)
                                                <a href="#">
                                                    <img src="{{ asset('storage/media/blog_imgs/' . $image->path . '/' . $image->name) }}"
                                                        class="card-img-top" alt="No_IMG">
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <a href="#">
                                            <h4 class="font-weight-bold" dir="auto" style="line-height: 1.6;">
                                                <a href="#">{{ $blog->title }}
                                            </h4>
                                        </a>
                                        {{-- <h5 class="mt-3" dir="auto">
                                            <i class="bi bi-bookmark-check"></i>
                                            {{ $blog->user }}
                                        </h5>
                                        <div class=" card-text-4 mb-2" dir="auto">
                                            <i class="bi bi-stopwatch"></i>
                                            <span
                                                class="badge_icon_second">{{ $blog->created_at->diffForHumans() }}</span>
                                        </div> --}}
                                        <div class="courses-info">
                                            <a href="#" class="section-btn btn btn-primary btn-block mt-2">
                                                {{ __('home_page.SeeMore') }}
                                                <i class="fa-regular fa-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
