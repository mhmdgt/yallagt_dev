<div class="signup_box">

    <div class="box">
        <p class="close_button">+</p>
        <div class="button_box">
            <div class="slider_button"></div>
<<<<<<< HEAD
            <button type="button" class="signup_button">Login</button>
            <button type="button" class="login_button">Sign up</button>
=======
            <button type="button" class="signup_button">{{ __('loginPopup.login') }}</button>
            <button type="button" class="login_button">{{ __('loginPopup.SignUp') }}</button>
>>>>>>> 48c7d7f4e94925780125eecc8d718ee7b503d946
        </div>

        <div class="form_box">
            <div class="form_slider">
<<<<<<< HEAD

                <form action="{{ route('yalla-gt.login') }}" class="login_form" method="POST">
                    @csrf
                    <div class="input_box">
                        <input type="text"  name="username">
                        <label>Phone Number or Email</label>
                      
                        <x-errors.display-validation-error property="username" />
                    </div>
                    <div class="input_box">
                        <input type="text"  name="password">
                        <label>Password</label>
                        <x-errors.display-validation-error property="password"/>
                    </div>


                    <p class="password_link"><a href="#">Forgot Password ?</a></p>
                    <button type="submit">Login</button>
                    <div class="contact_link">Need Help ? <a href="#">Contact Us</a></div>
                </form>

=======
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
>>>>>>> 48c7d7f4e94925780125eecc8d718ee7b503d946
                <form action="{{ route('yalla-gt.register') }}" class="signup_form" method="POST">
                    @csrf
                    <div class="input_field_box">

<<<<<<< HEAD
                        <div class="input_box">
                            <input type="text"  name="name" value="{{ old('name') ??''}}">
                            <label>Name</label>
                            <x-errors.display-validation-error property="name"/>

                        </div>
                        <div class="input_box">
                            <input type="text"  name="phone" value="{{ old('phone') ??''}}">
                            <label>Phone Number</label>
                            <x-errors.display-validation-error property="phone"/>
                        </div>
                        <div class="input_box">
                            <input type="text"  name="email" value="{{ old('email') ??''}}">
                            <label>Email</label>
                            <x-errors.display-validation-error property="email"/>
                        </div>
                        <div class="input_box">
                            <input type="text"  value="{{ old('password') ??''}}" name="password">
                            <label>Password</label>
                            <x-errors.display-validation-error property="password"/>
=======
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
>>>>>>> 48c7d7f4e94925780125eecc8d718ee7b503d946
                        </div>
                    </div>


<<<<<<< HEAD
                    <p class="link">By creating an account you agree to our <a href="#">Terms and
                            Conditions</a></p>
                    <button type="submit">Create Account</button>
                    <div class="contact_link">Need Help ? <a href="#">Contact Us</a></div>
=======
                    <div class="contact_link">{{ __('loginPopup.CreateAccountYouAgreeToOut') }}
                        <a href="#" class="">{{ __('loginPopup.TermsAndConditions') }}</a>
                    </div>

                    <button type="submit">{{ __('loginPopup.CreateAccount') }}</button>

                    <div class="contact_link">{{ __('loginPopup.NeedHelp') }}
                        <a href="#" class="ml-1 mr-1">{{ __('loginPopup.ContactUs') }}</a>
                    </div>
>>>>>>> 48c7d7f4e94925780125eecc8d718ee7b503d946
                </form>

            </div>
        </div>

    </div>

</div>
<<<<<<< HEAD


@section('script')


<script>
    Toast.fire({
    icon: 'error',
    title: 'ddd'
});
</script>

    @if ($errors->any() || Session::has('success') || Session::has('fail'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        Toast.fire({
                            icon: 'error',
                            title: '{{ $error }}'
                        });
                    @endforeach
                @endif

                @if (Session::has('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('success') }}'
                    });
                @elseif (Session::has('fail'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ Session::get('fail') }}'
                    });
                @endif
            });
        </script>
    @endif
@endsection
=======
>>>>>>> 48c7d7f4e94925780125eecc8d718ee7b503d946
