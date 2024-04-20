<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- upper bar color for mobile -->
    <meta content="#fff" name="theme-color" />
    <title>Yalla GT | Home </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="yalla_gt/assets/img/fav_icon/favicon.ico">

    <!-- ========================= Start CSS ========================= -->

    <link rel="stylesheet" href="yalla_gt/assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/slick.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/magnific-popup.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/animate.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/slinky.menu.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/plugins.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/theme.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/select2.min.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/style_en.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/login_popup_en.css" />
    <!-- <link rel="stylesheet" href="yalla_gt/assets/css/style_ar.css" /> -->
    <!-- <link rel="stylesheet" href="yalla_gt/assets/css/login_popup_ar.css" /> -->


    <link rel="stylesheet" href="yalla_gt/assets/css/mobile_nav.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="yalla_gt/assets/css/dselect.scss" />
    <link rel="stylesheet" href="yalla_gt/assets/css/jquery.tagselect.scss">
    <link rel="stylesheet" href="yalla_gt/assets/css/jquery.tagselect.css">

        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- ========================= End CSS ========================= -->
</head>

<body>
        @include('yalla-gt.layout.header')

    <!-- ========================= ========================= Content ========================= ========================= -->

    <!-- start main Content -->
    <main>
        <section class="main_content">

        @yield('content')


        @include('yalla-gt.layout.footer')
        </section>
    </main>

    <!-- Pop-up -->
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

                    <form action="#" class="login_form">

                        <div class="input_box">
                            <input type="text" required>
                            <label>Phone Number or Email</label>
                        </div>
                        <div class="input_box">
                            <input type="text" required>
                            <label>Password</label>
                        </div>


                        <p class="password_link"><a href="#">Forgot Password ?</a></p>
                        <button type="submit">Login</button>
                        <div class="contact_link">Need Help ? <a href="#">Contact Us</a></div>
                    </form>

                    <form action="#" class="signup_form">

                        <div class="input_field_box">

                            <div class="input_box">
                                <input type="text" required>
                                <label>Name</label>
                            </div>
                            <div class="input_box">
                                <input type="text" required>
                                <label>Phone Number</label>
                            </div>
                            <div class="input_box">
                                <input type="text" required>
                                <label>Email</label>
                            </div>
                            <div class="input_box">
                                <input type="text" required>
                                <label>Password</label>
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

    <!-- ========================= JS ========================= -->

    <script src="yalla_gt/assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="yalla_gt/assets/js/popper.js"></script>
    <script src="yalla_gt/assets/js/bootstrap.min.js"></script>
    <script src="yalla_gt/assets/js/owl.carousel.min.js"></script>
    <script src="yalla_gt/assets/js/slick.min.js"></script>
    <script src="yalla_gt/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="yalla_gt/assets/js/jquery.counterup.min.js"></script>
    <script src="yalla_gt/assets/js/jquery.countdown.js"></script>
    <script src="yalla_gt/assets/js/jquery.ui.js"></script>
    <script src="yalla_gt/assets/js/jquery.elevatezoom.js"></script>
    <script src="yalla_gt/assets/js/isotope.pkgd.min.js"></script>
    <script src="yalla_gt/assets/js/slinky.menu.js"></script>
    <script src="yalla_gt/assets/js/jquery.instagramFeed.min.js"></script>
    <script src="yalla_gt/assets/js/tippy-bundle.umd.js"></script>
    <script src="yalla_gt/assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="yalla_gt/assets/js/main.js"></script>

    <!-- Mobile NAV JS -->
    <script src="yalla_gt/assets/js/mobile_nav.js"></script>

    <!-- Pop up -->
    <script src="yalla_gt/assets/js/login_popup_en.js"></script>
    <!-- <script src="yalla_gt/assets/js/login_popup_ar.js"></script> -->


    @yield('script')

</body>

</html>
