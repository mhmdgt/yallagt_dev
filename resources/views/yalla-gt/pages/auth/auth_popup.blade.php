<div class="signup_box">

    <div class="box">
        <p class="close_button">+</p>
        <div class="button_box">
            <div class="slider_button"></div>
            <button type="button" class="signup_button">Login</button>
            <button type="button" class="login_button">Sign up</button>
        </div>

        <div class="form_box">
            <div class="form_slider">

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

                <form action="{{ route('yalla-gt.register') }}" class="signup_form" method="POST">
                    @csrf
                    <div class="input_field_box">

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
                        </div>
                    </div>


                    <p class="link">By creating an account you agree to our <a href="#">Terms and
                            Conditions</a></p>
                    <button type="submit">Create Account</button>
                    <div class="contact_link">Need Help ? <a href="#">Contact Us</a></div>
                </form>

            </div>
        </div>

    </div>

</div>


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
