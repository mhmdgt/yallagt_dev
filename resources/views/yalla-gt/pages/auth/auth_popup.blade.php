<div class="signup_box">

    <div class="box">
        <p class="close_button">+</p>
        <div class="button_box">
            <div class="slider_button"></div>
            <button type="button" class="signup_button">{{ __('loginPopup.login') }}</button>
            <button type="button" class="login_button">{{ __('loginPopup.SignUp') }}</button>
        </div>

        <div class="form_box">
            <div class="form_slider">
                {{-- ---------------------------------------- Login ---------------------------------------- --}}
                <form action="{{ route('yalla-gt.login') }}" class="login_form" method="POST">
                    @csrf
                    <div class="input-block">
                        <input type="text" name="username" id="input-text" required spellcheck="false">
                        <span class="placeholder">
                            {{ __('loginPopup.PhoneNumberorEmail') }}
                        </span>
                        <x-errors.display-validation-error property="username" />
                    </div>
                    <div class="input-block">
                        <input type="password" name="password" id="input-text" required spellcheck="false">
                        <span class="placeholder">
                            {{ __('loginPopup.Password') }}
                        </span>
                        <x-errors.display-validation-error property="password" />
                    </div>
                    <p class="password_link"><a href="#">{{ __('loginPopup.ForgetPassword') }}</a></p>
                    <button type="submit">{{ __('loginPopup.login') }}</button>
                    <div class="contact_link">{{ __('loginPopup.NeedHelp') }}
                        <a href="#" class="ml-1 mr-1">{{ __('loginPopup.ContactUs') }}</a>
                    </div>
                </form>
                {{-- ---------------------------------------- register ---------------------------------------- --}}
                <form action="{{ route('yalla-gt.register') }}" class="signup_form" method="POST">
                    @csrf
                    <div class="input_field_box">

                        <div class="input-block">
                            <input type="text" name="name" id="input-text" required spellcheck="false">
                            <span class="placeholder">
                                {{ __('loginPopup.name') }}
                            </span>
                            <x-errors.display-validation-error property="name" />
                        </div>
                        <div class="input-block">
                            <input type="text" name="phone" id="input-text" required spellcheck="false">
                            <span class="placeholder">
                                {{ __('loginPopup.phone') }}
                            </span>
                            <x-errors.display-validation-error property="phone" />
                        </div>
                        <div class="input-block">
                            <input type="text" name="email" id="input-text" required spellcheck="false">
                            <span class="placeholder">
                                {{ __('loginPopup.email') }}
                            </span>
                            <x-errors.display-validation-error property="email" />
                        </div>
                        <div class="input-block">
                            <input type="password" name="password" id="input-text" required spellcheck="false">
                            <span class="placeholder">
                                {{ __('loginPopup.password') }}
                            </span>
                            <x-errors.display-validation-error property="password" />
                        </div>
                    </div>


                    <div class="contact_link">{{ __('loginPopup.CreateAccountYouAgreeToOut') }}
                        <a href="#" class="">{{ __('loginPopup.TermsAndConditions') }}</a>
                    </div>

                    <button type="submit">{{ __('loginPopup.CreateAccount') }}</button>

                    <div class="contact_link">{{ __('loginPopup.NeedHelp') }}
                        <a href="#" class="ml-1 mr-1">{{ __('loginPopup.ContactUs') }}</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>
