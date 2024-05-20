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
                                        <h3 class="mb-2">Get in touch</h3>
                                        <div class="mb-4">Your connect is very important to us, Feel free to send what you want.</div>

                                        <form method="POST" class="contactForm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="subject">Full Nme</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label" for="name">Phone Number</label>
                                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label" for="email">Email Address</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="subject">Subject</label>
                                                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label" for="#">Message</label>
                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Send Message" class="btn btn-primary">
                                                        <div class="submitting"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 d-flex align-items-stretch text-dark">
                                    <div class="info-wrap card w-100 p-md-5 p-4 pro-gradient-grey">
                                        <h3>Let's get in touch</h3>
                                        <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-telephone"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-envelope-arrow-down"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Email:</span> <a
                                                        href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <i class="bi bi-info-circle"></i>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Help Center</span> <a href="#">yallagt.com</a></p>
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
