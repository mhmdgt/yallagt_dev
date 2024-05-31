@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div rtl-direction">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch ">
                                    <div class="contact-wrap w-100 p-md-5 p-4">
                                        <h3 class="mb-2">Privacy Policy</h3>
                                        <div class="mb-4">Last update: Friday</div>

                                        <div style="line-height: 1.5;">
                                            Content
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 d-flex align-items-stretch text-dark">
                                    <div class="info-wrap card w-100 p-md-5 p-4 pro-gradient-grey">
                                        <h4>{{ __('contactus.Lets_get_in_touch') }}</h4>
                                        <p class="mb-4">{{ __('contactus.Lets_get_in_touch_msg') }}</p>
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Address') }}</span>
                                                    {{ get_contact_us()->headqurter_address }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-telephone"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Phone') }}</span>
                                                    <a href="tel:{{ get_contact_us()->phone }}">
                                                        {{ get_contact_us()->phone }}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-envelope-arrow-down"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Email') }}</span>
                                                    <a href="{{ get_contact_us()->support_email }}">
                                                        {{ get_contact_us()->support_email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-info-circle"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Help_Center') }}</span>
                                                    yallagt.com/help
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('footer')
    {{-- @include('yalla-gt.layout.upper-footer') --}}
    @include('yalla-gt.layout.footer')
@endsection
