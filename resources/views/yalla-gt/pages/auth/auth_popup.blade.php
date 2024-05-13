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


                <form action="{{ route('yalla-gt.login') }}" class="login_form" method="POST">
                    @csrf
                    <div class="input_box">
                        <span class="placeholder">
                            {{ __('loginPopup.PhoneNumberorEmail') }}
                        </span>

                    </div>

                    <div class="input_box">
                        <input type="text" name="username" value="{{ old('username') ??''}}">
                        <label>Name</label>
                        <small class="text-danger d-none" id="login-username-error"></small>

                    </div>
                    <div class="input-block">
                        <input type="password" name="password" id="input-text" spellcheck="false">
                        <span class="placeholder">
                            {{ __('loginPopup.Password') }}
                        </span>
                        <small class="text-danger d-none" id="login-password-error"></small>
                    </div>
                    <p class="password_link"><a href="#">{{ __('loginPopup.ForgetPassword') }}</a></p>
                    <button type="submit">{{ __('loginPopup.login') }}</button>
                    <div class="contact_link">{{ __('loginPopup.NeedHelp') }}
                        <a href="#" class="ml-1 mr-1">{{ __('loginPopup.ContactUs') }}</a>
                    </div>
                </form>
                {{-- ---------------------------------------- register ---------------------------------------- --}}

                <form action="{{ route('yalla-gt.register') }}" class="signup_form mb-5" method="POST">
                    @csrf
                    <div class="input_field_box">

                        <div class="input_box">
                            <input type="text" name="name" value="{{ old('name') ??''}}">
                            <label>Name</label>
                            <small class="text-danger d-none" id="name-error"></small>

                        </div>
                        <div class="input_box">
                            <input type="text" name="phone" value="{{ old('phone') ??''}}">
                            <label>Phone Number</label>
                            <small class="text-danger d-none" id="phone-error"></small>
                        </div>
                        <div class="input_box">
                            <input type="text" name="email" value="{{ old('email') ??''}}">
                            <label>Email</label>
                            <small class="text-danger d-none" id="email-error"></small>
                        </div>
                        <div class="input_box">
                            <input type="text" value="{{ old('password') ??''}}" name="password">
                            <label>Password</label>
                            <small class="text-danger d-none" id="password-error"></small>
                        </div>


                    </div>

                    {{--
                    <div class="contact_link">{{ __('loginPopup.CreateAccountYouAgreeToOut') }}
                        <a href="#" class="">{{ __('loginPopup.TermsAndConditions') }}</a>
                    </div> --}}

                    <button type="submit">{{ __('loginPopup.CreateAccount') }}</button>

                    <div class="contact_link">{{ __('loginPopup.NeedHelp') }}
                        <a href="#" class="ml-1 mr-1">{{ __('loginPopup.ContactUs') }}</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
           // Focus event handler for all input fields
        $('.signup_form input').focus(function() {
            // Hide all error messages
            $('.text-danger').addClass('d-none').text('');
        });
        $('.signup_form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = $(this);
            var formData = form.serialize(); // Serialize form data

            // Determine the action URL based on the form
            var actionUrl = form.attr('action');

            // Reset error messages
            form.find('.text-danger').addClass('d-none').text('');

            // Send AJAX request
            $.ajax({
                type: form.attr('method'),
                url: actionUrl,
                data: formData,
                success: function(response) {
                 console.log(response);
                    if (response.success) {
                        // Display success message
                        

                        // Redirect
                      window.location.href = response.redirect;
                    } else {
                        // Handle other cases (if needed)
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    var errors = xhr.responseJSON.errors; // Get validation errors
                    // Loop through each error
                    $.each(errors, function(key, value) {
                        // Find the corresponding error message element by ID and display the error message
                        $('#' + key + '-error').removeClass('d-none').text(value[0]);
                    });
                }
            });
        });


        $('.login_form').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    var loginForm = $(this);
    var LoginFormData = loginForm.serialize(); // Serialize form data

    // Determine the action URL based on the form
    var loginActionUrl = loginForm.attr('action');

    // Reset error messages
    loginForm.find('.text-danger').addClass('d-none').text('');

    // Send AJAX request
    $.ajax({
        type: loginForm.attr('method'),
        url: loginActionUrl,
        data: LoginFormData,
        success: function(response) {
            console.log(response);
           
            if (response.success) {
                // Display success message
                alert(response.message);
                // Redirect
                window.location.href = response.redirect;
            } else {
                // Display error message
                alert(response.message); // You can replace this with any UI element you prefer
                $('#login-username-error').removeClass('d-none').text(response.message);
            }
        },
        error: function(xhr, status, error) {
          
            $('#login-username-error').removeClass('d-none').text(xhr.responseJSON.message);
            var errors = xhr.responseJSON.errors; // Get validation errors
            // Loop through each error
            $.each(errors, function(key, value) {
                console.log(key, value);
                // Find the corresponding error message element by ID and display the error message
                $('#login-' + key + '-error').removeClass('d-none').text(value[0]);
            });
        }
    });
});

    });
</script>