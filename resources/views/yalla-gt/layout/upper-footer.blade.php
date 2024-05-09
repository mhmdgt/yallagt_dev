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
                                <a>{{ get_contact_us()->support_email }}</a>
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
