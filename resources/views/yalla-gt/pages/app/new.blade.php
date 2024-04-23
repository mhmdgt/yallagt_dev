@extends('yalla-gt.layout.app')
@section('content')

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


    <div class="">
        <div class="container-fluid ">
            <div class="owl-carousel ">
                <!--Shop Service-->
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/assets/media/main_services/shop.png"></a>
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
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/assets/media/main_services/stock_cars.png"></a>
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
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/assets/media/main_services/sale_cars.png"></a>
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
                <div class="col-xl-3 col-6">
                    <div class="card card_banner">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 text-center">
                                    <a href="#"><img src="yalla_gt/assets/media/main_services/sell_cars.png"></a>
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
            </div>
        </div>
    </div>


@endsection
