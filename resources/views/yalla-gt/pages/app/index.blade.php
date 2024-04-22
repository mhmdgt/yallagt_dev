@extends('yalla-gt.layout.app')
@section('content')
    <!-- Slider area start-->
    <div class="owl-slider">
        <div id="carousel" class="owl-carousel">
            <div class="item">
                <img src="yalla_gt/assets/img/home_slider/1688828797.webp" alt="">
            </div>
            <div class="item">
                <img src="yalla_gt/assets/img/home_slider/1688828827.webp" alt="">
            </div>
            <div class="item">
                <img src="yalla_gt/assets/img/home_slider/1688828869.webp" alt="">
            </div>
        </div>
    </div>

    <!-- Services area start-->
    <div class="new-section banner_area">
        <div class="container-fluid">
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
                                    <h4 class="h-service">PRODUCTS</h4>
                                    <p class="p-service">FAST AND EASY</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="#">See
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Service-->

                <!--Shop Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/stock_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">Stock Cars</h4>
                                    <p class="p-service">FAST AND EASY</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="#">See
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Service-->

                <!--Shop Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/sale_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">Sale Cars</h4>
                                    <p class="p-service">FAST AND EASY</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="">See
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Service-->

                <!--Shop Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/media/main_services/sell_cars.png"></a>
                                </div>
                                <div class="col-md-5 col-12 text-center">
                                    <h4 class="h-service">Sell Car</h4>
                                    <p class="p-service">FAST AND EASY</p>
                                    <div class="border-divider"></div>
                                    <a class="btn btn-dark a-service" href="">See
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shop Service-->


            </div>
        </div>
    </div>

    <!-- Sale Car area start  -->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>Cars for sale</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12 ">

                    {{-- <div class="carsforsaleContainer owl-carousel "> --}}
                    <div class="carsforsaleContainer owl-carousel ">
                        <!-- loop starts here -->
                        <div class="card cars_for_sale_home_layout" style="border-radius: 15px;">
                            <a href="#">
                                <div class="card-image sale_car_img">
                                    <img src="yalla_gt/assets/img/sale_cars_img/IMG_1408.JPG" alt="no_img">
                                </div>
                            </a>
                            <div class="card-body container-fluid">
                                <a href="#">
                                    <h4 class="card-text">
                                        <span>New</span>
                                        Mercedes
                                        C180
                                        2023
                                    </h4>
                                </a>
                                <h3 class="card-text-h3 mt-3">
                                    <span class="text-dark">EGP:</span>23,000,000
                                </h3>
                                <div class="card-text-4 mt-2 mb-3">
                                    <i class="bi bi-geo-alt"></i>
                                    <span class="badge_icon mr-2 h6">Cairo</span>
                                    <i class="bi bi-stopwatch"></i>
                                    <span class="badge_icon_second mr-2 h6">5 moths ago</span>
                                </div>
                                <div class="detailedSearch__content--badge row no-gutters card-text-4"
                                    style="display:flex; flex-direction:column">
                                    <span class="badge badge_icon_5">300,000 Km </span>
                                    <span class="badge" style="margin-top: 10px;">Automatic</span>
                                </div>
                            </div>

                        </div>
                        <!-- loop end here -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Car Brands area start  -->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>CAR BRANDS</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brand_container owl-carousel ">
                        <!-- loop starts here -->

                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/mazda.png" alt=""></a>
                        </div>
                        <!-- loop end here -->

                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/nissan.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/Mercedes-Benz.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/Volkswagen.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/skoda.png" alt=""></a>
                        </div>
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
                    <img src="yalla_gt/assets/img/ad_imgaes/1688832343.webp" class="w-100 mb-3" alt="">
                </div>
                <div class="col-md-6">
                    <img src="yalla_gt/assets/img/ad_imgaes/1688832364.webp" class="w-100 mb-3" alt="">
                </div>
            </div>

        </div>
    </section>

    <!-- Categories area start-->
    <section class="new-section category_section_1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>Featured Categories</h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="product_container" style="width: 1390px;">
                <div class="row no-gutters align-items-center">

                    <!-- loop starts here -->
                    <div class="featured_categories owl-carousel">

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/battery.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Filters</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/SeekPng.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Car breaks</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/engine-parts.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Engine parts</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/pngwing.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Suspension</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/clutch-parts.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Clutch parts</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb ">
                                <a class="primary_img">
                                    <img src="assets/img/categories/turbochargers.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content ">
                                <h6 class="category_name">Turbo chargers</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/custom-wheels.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Custom wheels</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <article class="single_category">
                            <div class="category_thumb">
                                <a class="primary_img">
                                    <img src="assets/img/categories/pngegg.png" alt="">
                                </a>
                            </div>
                            <figcaption class="category_content">
                                <h6 class="category_name">Custom wheels</h6>
                                <h4 class="properities">4 groups</h4>
                            </figcaption>
                        </article>

                        <!-- loop end here -->
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!--New Arrival area start-->
    <section class="new-section product_area product_deals">
        <div class="container-fluid">

            <!-- title -->
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>New arrivals</h2>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- End title -->

            <div class="product_container">
                <div class="row product_carousel no-gutters">

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Single Card -->
                    <div class="col-md-20 col-6 product_item">
                        <div class="single_product">

                            <div>
                                <div class="container-fluid product_thumb">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <img src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>

                                </div>

                                <div class="container-fluid">

                                    <div class="mt-4">

                                        <h6 class="brand fw-700">Brand:
                                            <span>Liquid Moly</span>
                                        </h6>
                                        <a href="#">
                                            <h4 class="product_name">Fuel System Treatment 300ml </h4>
                                        </a>

                                    </div>

                                    <div class="d-flex mt-4">
                                        <div class="p-0">
                                            <span>EGP </span> <span class="fs-4"
                                                style="font-size: 24px;
                                                    font-weight: bold;">9,999</span>
                                            <span class="GFG2 h6">900,000</span><span
                                                class="GT-COLOR old_price old_price_percentage"> 25%</span>
                                        </div>
                                        <div class="ml-auto p-0">
                                            <img width="80" height="80"
                                                src="yalla_gt/assets/img/cart/cart_icon.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                </div>
            </div>


        </div>
    </section>

    <!-- Manufacturers area start-->
    <section class="new-section brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2> Featured manufacturers</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brand_container owl-carousel ">
                        <!-- loop starts here -->
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/BOSCH.png" alt=""></a>
                        </div>
                        <!-- loop end here -->

                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/Bilstein.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/luk.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/motocraft.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="yalla_gt/assets/img/brand/SACHS.png" alt=""></a>
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
                                                src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>
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
                                                src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>
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
                                                src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>
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
                                                src="yalla_gt/assets/img/product_imgs/1688582470.webp" alt=""></a>
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

    <!-- Blog area start-->
    <section class="new-section car_brand_area brand_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title section_title_border en-style">
                        <h2>Latest Blog posts</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-12 ">

                    <div class="carsforsaleContainer owl-carousel ">
                        <!-- loop starts here -->
                        <!-- <div class="card cars_for_sale_home_layout" style="  width:auto; border-radius: 16px; ">
                                                <a href="#">
                                                    <div class="card-image sale_car_img">
                                                        <img src="yalla_gt/assets/img/sale_cars_img/honda.jpg" alt="NO_IMG">
                                                    </div>
                                                </a>
                                                <div class="card-body">

                                                    <a href="#">
                                                        <h4 class="font-weight-bold" style="line-height: 28px">
                                                            <a href="#">تضعك مدرسة BMW M4 GT4 في سيارة سباق حقيقية</a>
                                                        </h4>
                                                    </a>

                                                    <h5 class="mt-3">بواسطة: محمد أحمد</h5>

                                                    <div class="card-text-4 mb-2">
                                                        <span class="badge_icon_second">قبل: 5 أشهر</span>
                                                        <i class="fa-regular fa-clock"></i>
                                                    </div>
                                                    <div class="courses-info font-weight-bold">
                                                        <a href="#" class="section-btn btn btn-primary btn-block mt-2">اقرأ
                                                            المزيد</a>
                                                    </div>
                                                </div>
                                            </div> -->
                        <div class="card cars_for_sale_home_layout" style="border-radius: 16px;">
                            <a href="#">
                                <div class="card-image sale_car_img">
                                    <img src="yalla_gt/assets/img/sale_cars_img/honda.jpg" alt="NO_IMG">
                                </div>
                            </a>
                            <div class="card-body">

                                <a href="#">
                                    <h4 class="font-weight-bold">
                                        <a href="#">BMW's M4 GT4 School Puts You In a Real-Deal Race
                                            Car</a>
                                    </h4>
                                </a>

                                <h5 class="mt-3">
                                    <i class="bi bi-bookmark-check"></i>
                                    By Mohamed Ahmed
                                </h5>

                                <div class="card-text-4 mb-2">
                                    <i class="bi bi-stopwatch"></i>
                                    <span class="badge_icon_second">5 moths ago</span>
                                </div>
                                <div class="courses-info">
                                    <a href="#" class="section-btn btn btn-primary btn-block mt-2">
                                        Read More
                                        <i class="fa-regular fa-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- loop end here -->
            </div>

        </div>
        </div>
        </div>
        </div>
    </section>

    <!-- ========================= ========================= Footer ========================= ========================= -->

    <!--shipping area start-->
    <div class="shipping_area pt-6">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-4 col-md-8 text-xl-left text-md-center  mb-3">
                    <div class="shipping_area--content">
                        <h4>We are ready to help you</h4>
                        <p>Contact us through any of the following support channels:</p>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex contact_info">
                                <div class="icon">
                                    <img src="yalla_gt/assets/img/icon/call__contact.png" alt="">
                                </div>
                                <div class="content">
                                    <p>Call us anytime</p>
                                    <a href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex contact_info">
                                <div class="icon">
                                    <img src="yalla_gt/assets/img/icon/msg.png" alt="">
                                </div>
                                <div class="content">

                                    <p>E-mail Support</p>
                                    <a href="mailto:Support@yallagt.com">Support@yallagt.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex contact_info">
                                <div class="icon">
                                    <img src="yalla_gt/assets/img/icon/info.png" alt="">
                                </div>
                                <div class="content">
                                    <p>Help center</p>
                                    <a href="Help.yallagt.com">Help.yallagt.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
