@extends('yalla-gt.layout.app')
@section('content')
    {{-- Spare Parts--}}
    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">About us</h1>
                    <p class="lead text-muted mb-0">
                        Discover your perfect car, new or used, and sell yours with no limits and hassle-free at Yallagt.
                        Browse our extensive inventory of new cars at competitive prices,
                        along with a selection of spare parts. Plus, stay informed with our informative car blogs. Your
                        one-stop destination for all things automotive.
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('yalla_gt/media/about_us/3516805.png') }}"
                        alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>
    {{-- Win With Us / Looking For Spare Parts--}}
    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Win With Us</h2>
                    <p class="font-italic text-muted mb-4">"Win With Us at Yallagt, Sell your car hassle-free and
                        commission-free. Our platform offers you the opportunity to list your vehicle without any fees,
                        ensuring a seamless selling experience. Take advantage of our commitment to providing a transparent
                        and cost-effective solution for selling your car. Join our community today and let's win together."
                    </p>
                    <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                        src="{{ asset('yalla_gt/media/about_us/4136944.png') }}" alt=""
                        class="img-fluid mb-4 mb-lg-0"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto"><img src="{{ asset('yalla_gt/media/about_us/6342519.png') }}"
                        alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Looking For Spare Parts?</h2>
                    <p class="font-italic text-muted mb-4">"Look no further! At Yallagt,
                        we've got you covered. Explore our online store for a wide range of spare parts, all conveniently
                        available for purchase directly from us. With our same-day delivery service, you can get the parts
                        you need delivered to your doorstep as quickly as possible. Trust us to provide high-quality parts
                        and fast service, so you can get back on the road in no time."
                    </p>
                    <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Our Team --}}
    {{-- <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="display-4 font-weight-light">Our team</h2>
                    <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="row text-center">
                <!-- Team item-->
                <div class="col-xl-3 col-sm-6">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Samuel Hardy</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Tom Sunderland</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt=""
                            width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">John Tarly</h5><span class="small text-uppercase text-muted">CEO
                            -Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->

            </div>
        </div>
    </div> --}}
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
@endsection
