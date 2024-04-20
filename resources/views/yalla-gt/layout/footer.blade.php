<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container-fluid">
            <!-- Mobile Footer -->
            <div class="widget_inner">
                <div class="widget_list widget_categories">
                    <ul>
                        <!-- Services -->
                        <li class="widget_sub_categories sub_categories1">
                            <a href="javascript:void(0)">Services</a>
                            <ul class="widget_dropdown_categories dropdown_categories1" style="display: none;">
                                <li><a href="#">New Car Prices</a></li>
                                <li><a href="#">Sell Your Car</a></li>
                                <li><a href="#">Cars For Sale</a></li>
                                <li><a href="#">Products Shop</a></li>
                                <li><a href="#">Car News & Advice</a></li>

                            </ul>
                        </li>
                        <!-- Company -->
                        <li class="widget_sub_categories sub_categories2">
                            <a href="javascript:void(0)">Company</a>
                            <ul class="widget_dropdown_categories dropdown_categories2">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Sales and Refunds</a></li>
                                <li><a href="#">Terms & Conditions Of Use</a></li>
                            </ul>
                        </li>
                        <!-- My Account -->
                        <li class="widget_sub_categories sub_categories3"><a href="javascript:void(0)">My
                                Account</a>
                            <ul class="widget_dropdown_categories dropdown_categories3">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Sign Up</a></li>
                                <li><a href="#">Explore New Deals</a></li>
                                <li><a href="#">Yalla GT Newsroom</a></li>
                            </ul>
                        </li>
                        <!-- Connections -->
                        <li class="widget_sub_categories sub_categories4">
                            <a href="javascript:void(0)">Find More</a>
                            <ul class="widget_dropdown_categories dropdown_categories4">
                                <p><span class="font-weight-bold">Address:</span>
                                    {{ get_contact_us()->headqurter_address }}</p>
                                <p><span class="font-weight-bold">Email:</span>
                                    <a
                                        href="{{ get_contact_us()->support_email }}">{{ get_contact_us()->support_email }}</a>
                                </p>
                                <p><span class="font-weight-bold">Tel:</span>
                                    <a href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a>
                                </p>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Web Footer -->
            <div class="row footer_top--text">
                <!-- Services -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widgets_container widget_menu">
                        <div class="section_title section_title_border en-style">
                            <h4>Services</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">New Car Prices</a></li>
                                <li><a href="#">Sell Your Car</a></li>
                                <li><a href="#">Cars For Sale</a></li>
                                <li><a href="#">Products Shop</a></li>
                                <li><a href="#">Car News & Advice</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Company -->
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <div class="section_title section_title_border en-style">
                            <h4>Company</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">

                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Sales and Refunds</a></li>
                                <li><a href="#">Terms & Conditions Of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- My Account -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widgets_container widget_menu">
                        <div class="section_title section_title_border en-style">
                            <h4>My Account</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Sign Up</a></li>
                                <li><a href="#">Explore New Deals</a></li>
                                <li><a href="#">Yalla GT Newsroom</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Connections -->
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="section_title section_title_border en-style">
                        <h4>Find More</h4>
                        <hr>
                    </div>
                    <div class="widgets_container contact_us">
                        <p><span>Address:</span>{{ get_contact_us()->headqurter_address }}</p>
                        <p><span>Email:</span> <a href="{{ get_contact_us()->support_email }}">
                                {{ get_contact_us()->support_email }} </a></p>
                        <p><span>Tel:</span> <a
                                href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a> </p>
                    </div>
                </div>
            </div>
            <!-- Coming soon & Social Media -->
            <div class="row justify-content-between align-items-center">
                <div class="pt-2 col-lg-6">
                    <div class="footer_widgets--content">
                        <div class="row align-items-center justify-content-between footer_widgets--content-row">
                            <div class="col-lg-7">
                                <h4>Coming soon on</h4>
                                <h4>All services in one place</h4>
                            </div>

                            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="mr-2" width="180px" height="20px"
                                    src="yalla_gt/media/social_media_icons/google_play.png" alt="">
                                <img class="mr-2" width="180px" height="20px"
                                    src="yalla_gt/media/social_media_icons/app_store.png"alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media -->
                <div class="col-lg-3">
                    <ul class="list-unstyled footer_widgets--ul">
                        <li><a href="{{ get_contact_us()->facebook }}"><img src="yalla_gt/assets/img/icon/facebook.png"
                                    alt=""></a></li>
                        <li><a href="{{ get_contact_us()->phone }}"><img src="yalla_gt/assets/img/icon/instgram.png"
                                    alt=""></a></li>
                        <li><a href="https://wa.me/{{ get_contact_us()->phone }}"><img
                                    src="yalla_gt/assets/img/icon/whatsapp.png" alt=""></a></li>
                        <li><a href="https://maps.app.goo.gl/kd17T8JzX4Sjek5CA"><img
                                    src="yalla_gt/assets/img/icon/location.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright and country on Footer -->
    <div class="container-fluid">
        <hr class="my-0">
    </div>
    <div class="footer_bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="copyright_area">
                        <p>Copyright © 2024 Yalla GT. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-custom-direction">
                    <p>Egypt</p>
                </div>

            </div>
        </div>
    </div>
</footer>
