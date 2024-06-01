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
                                        <h3 class="mb-2">{{ __('contactus.Get_in_touch') }}</h3>
                                        <div class="mb-4">{{ __('contactus.Get_in_touch_msg') }}</div>

                                        <form action="{{ route('yalla.storeContactMessage') }}" method="POST" class="contactForm">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label"
                                                            for="subject">{{ __('contactus.Full_Name') }}</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label"
                                                            for="name">{{ __('contactus.Phone_Number') }}</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label"
                                                            for="email">{{ __('contactus.Email_Address') }}</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label"
                                                            for="subject">{{ __('contactus.Subject') }}</label>
                                                        <input type="text" class="form-control" name="subject"
                                                            placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label"
                                                            for="#">{{ __('contactus.Message') }}</label>
                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-success rounded"
                                                        type="submit">{{ __('contactus.Send_Message') }}</button>
                                                </div>
                                            </div>
                                        </form>

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
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Address') }}</span> 198 West
                                                    21th Street, Suite 721 New York NY 10016
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-telephone"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Phone') }}</span> <a
                                                        href="tel://1234567920">+ 1235 2355 98</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-envelope-arrow-down"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Email') }}</span> <a
                                                        href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-info-circle"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p class="ml-1 mr-1"><span>{{ __('contactus.Help_Center') }}</span> <a
                                                        href="#">yallagt.com</a></p>
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
