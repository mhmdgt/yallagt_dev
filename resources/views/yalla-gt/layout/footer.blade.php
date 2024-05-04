<!-- shipping -->
<div class="shipping_area pt-6">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-4 col-md-8 text-xl-left text-md-center  mb-3">
                <div class="shipping_area--content">
                    <h4>{{ __('footer.We_are_ready_to_help_you') }}</h4>
                    <p>{{ __('footer.Contact_us_through_any_of_the_following_support_channels') }}</p>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex contact_info">
                            <div class="icon ml-2" style="font-size: 26px">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <p>{{ __('footer.call_us_anytime') }}</p>
                                <a href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex contact_info">
                            <div class="icon ml-2" style="font-size: 26px">
                                <i class="bi bi-envelope-arrow-down"></i>
                            </div>
                            <div class="content">
                                <p>{{ __('footer.contact_supprt') }}</p>
                                <a href="mailto:Support@yallagt.com">Support@yallagt.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex contact_info">
                            <div class="icon ml-2" style="font-size: 26px">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div class="content">
                                <p>{{ __('footer.help_center') }}</p>
                                <a href="Help.yallagt.com">Help.yallagt.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <a href="javascript:void(0)">{{ __('footer.services') }}</a>
                            <ul class="widget_dropdown_categories dropdown_categories1" style="display: none;">
                                <li><a href="#">{{ __('footer.CarPrices') }}</a></li>
                                <li><a href="#">{{ __('footer.sellYourCar') }}</a></li>
                                <li><a href="#">{{ __('footer.saleCar') }}</a></li>
                                <li><a href="#">{{ __('footer.productsShop') }}</a></li>
                                <li><a href="#">{{ __('footer.CarNewsAndAdvice') }}</a></li>

                            </ul>
                        </li>
                        <!-- Company -->
                        <li class="widget_sub_categories sub_categories2">
                            <a href="javascript:void(0)">{{ __('footer.need_help') }}</a>
                            <ul class="widget_dropdown_categories dropdown_categories2">
                                <li><a href="#">{{ __('footer.AboutUS') }}</a></li>
                                <li><a href="#">{{ __('footer.ContactUs') }}</a></li>
                                <li><a href="#">{{ __('footer.PrivacyPolicy') }}</a></li>
                                <li><a href="#">{{ __('footer.OrdersandRefunds') }}</a></li>
                                <li><a href="#">{{ __('footer.TermsofUse') }}</a></li>
                            </ul>
                        </li>
                        <!-- My Account -->
                        <li class="widget_sub_categories sub_categories3">
                            <a href="javascript:void(0)">{{ __('footer.my_account') }}</a>
                            <ul class="widget_dropdown_categories dropdown_categories3">
                                <li><a href="#">{{ __('footer.home') }}</a></li>
                                <li><a href="#">{{ __('footer.login') }}</a></li>
                                <li><a href="#">{{ __('footer.FQA') }}</a></li>
                                <li><a href="#">{{ __('footer.ExploreNewDeals') }}</a></li>
                            </ul>
                        </li>
                        <!-- Connections -->
                        <li class="widget_sub_categories sub_categories4">
                            <a href="javascript:void(0)">{{ __('footer.find_more') }}</a>
                            <ul class="widget_dropdown_categories dropdown_categories4">
                                <li><span class="font-weight-bold">{{ __('footer.headquarters') }}:</span><a
                                        href="tel:{{ get_contact_us()->google_maps }}">{{ get_contact_us()->headqurter_address }}</a>
                                </li>
                                <li><span class="font-weight-bold">{{ __('footer.email') }}:</span><a
                                        href="{{ get_contact_us()->support_email }}">{{ get_contact_us()->support_email }}</a>
                                </li>
                                <li><span class="font-weight-bold">{{ __('footer.phone') }}:</span><a
                                        href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a>
                                </li>
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
                            <h4>{{ __('footer.services') }}</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">{{ __('footer.CarPrices') }}</a></li>
                                <li><a href="#">{{ __('footer.sellYourCar') }}</a></li>
                                <li><a href="#">{{ __('footer.saleCar') }}</a></li>
                                <li><a href="#">{{ __('footer.productsShop') }}</a></li>
                                <li><a href="#">{{ __('footer.CarNewsAndAdvice') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- need_help -->
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <div class="section_title section_title_border en-style">
                            <h4>{{ __('footer.need_help') }}</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">{{ __('footer.AboutUS') }}</a></li>
                                <li><a href="#">{{ __('footer.ContactUs') }}</a></li>
                                <li><a href="#">{{ __('footer.PrivacyPolicy') }}</a></li>
                                <li><a href="#">{{ __('footer.OrdersandRefunds') }}</a></li>
                                <li><a href="#">{{ __('footer.TermsofUse') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- My Account -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="widgets_container widget_menu">
                        <div class="section_title section_title_border en-style">
                            <h4>{{ __('footer.my_account') }}</h4>
                            <hr>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">{{ __('footer.home') }}</a></li>
                                <li><a href="#">{{ __('footer.login') }}</a></li>
                                <li><a href="#">{{ __('footer.FQA') }}</a></li>
                                <li><a href="#">{{ __('footer.ExploreNewDeals') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Connections -->
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="section_title section_title_border en-style">
                        <h4>{{ __('footer.find_more') }}</h4>
                        <hr>
                    </div>
                    <div class="widgets_container contact_us">
                        <p><span>{{ __('footer.headquarters') }}:</span>
                            {{ get_contact_us()->headqurter_address }}
                        </p>
                        <p><span>{{ __('footer.email') }}:</span>
                            <a href="{{ get_contact_us()->support_email }}"> {{ get_contact_us()->support_email }}
                            </a>
                        </p>
                        <p><span>{{ __('footer.phone') }}:</span>
                            <a href="tel:{{ get_contact_us()->phone }}">{{ get_contact_us()->phone }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Coming soon & Social Media -->
            <div class="row justify-content-between align-items-center mt-5">
                <div class="pt-2 col-lg-6">
                    <div class="footer_widgets--content">
                        <div class="row align-items-center justify-content-between footer_widgets--content-row">
                            <div class="col-lg-7">
                                <h4>{{ __('footer.coming_soon_on') }}</h4>
                                <h4>{{ __('footer.allServiceInOnePlance') }}</h4>

                            </div>

                            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="mr-2" width="140px"
                                    src="yalla_gt/media/social_media_icons/google_play.png" alt="">
                                <img class="mr-2" width="140px"
                                    src="yalla_gt/media/social_media_icons/app_store.png"alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media -->
                <div class="col-lg-3">
                    <ul class="list-unstyled footer_widgets--ul">
                        <div class="media_icons mb-4">
                            <a href="#"><i class='bx bxl-facebook-square'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            <a href="#"><i class='bx bxl-youtube'></i></a>
                            <a href="#"><i class='bx bxl-whatsapp-square'></i></a>
                            <a href="#"><i class='bx bxs-map'></i></a>
                        </div>
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

                <div class="col-lg-6">
                    <div class="copyright_area">
                        <h5>{{ __('footer.copywrite') }}</h5>
                    </div>
                </div>

                <div class="col-lg-6 text-left text-lg-right">
                    <div class="text-center language_switcher ">
                        @php
                            $currentLocale = LaravelLocalization::getCurrentLocale();
                            $switchLocale = $currentLocale == 'ar' ? 'en' : 'ar';
                        @endphp
                            <span class="font-weight-bold">{{ __('footer.egypt') }} |</span>
                        <a class="ml-2" href="{{ LaravelLocalization::getLocalizedURL($switchLocale) }}">
                            <img width="120" height="120" src="yalla_gt/media/icon/trans_lang.png"
                                alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
