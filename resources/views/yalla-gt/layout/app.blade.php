<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- upper bar color for mobile -->
    <meta content="#fff" name="theme-color" />
    <title>Yalla GT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="yalla_gt/assets/img/fav_icon/favicon.ico">

    <!-- ========================= Start CSS ========================= -->

    <link rel="stylesheet" href="yalla_gt/assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/slick.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/magnific-popup.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/animate.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/slinky.menu.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/plugins.css" />

    {{-- Style CSS --}}
    <link rel="stylesheet" href="yalla_gt/assets/css/style/theme.css" />
    <link rel="stylesheet" href="yalla_gt/assets/css/style/style_app.css" />

    <link rel="stylesheet" href="yalla_gt/assets/css/style/style_en.css" />
    {{-- <link rel="stylesheet" href="yalla_gt/assets/css/style/style_ar.css" /> --}}

    {{-- Login pop-up --}}
    <link rel="stylesheet" href="yalla_gt/assets/vendors/login_popup/login_popup_en.css" />
    {{-- <link rel="stylesheet" href="yalla_gt/assets/vendors/login_popup/login_popup_ar.css" /> --}}

    {{-- Mobile NAVBAR --}}
    <link rel="stylesheet" href="yalla_gt/assets/vendors/mobile_navbar/mobile_navbar.css" />

    {{-- OWL Carousel --}}
    <link rel="stylesheet" href="yalla_gt/assets/vendors/owl_carousel/owl.carousel.min.css" />

    {{-- -------------------------- ONLINE -------------------------- --}}

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    @include('yalla-gt.layout.header')

    <!-- ========================= ========================= Content ========================= ========================= -->

    <main>
        <section class="main_content">

            @yield('content')


            @include('yalla-gt.layout.footer')
        </section>
    </main>

    <!-- Pop-up -->
    @include('yalla-gt.layout.auth_popup')

    <!-- ========================= ========================= Content ========================= ========================= -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="yalla_gt/assets/js/popper.js"></script>
    <script src="yalla_gt/assets/js/bootstrap.min.js"></script>
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

    <script src="yalla_gt/assets/js/owl_carousel/owl.carousel.min.js"></script>

    <!-- Main JS -->
    <script src="yalla_gt/assets/js/main.js"></script>

    <!-- Mobile NAV JS -->
    <script src="yalla_gt/assets/js/mobile_navbar.js"></script>

    <!-- Pop up -->
    <script src="yalla_gt/assets/js/auth_popup/login_popup_en.js"></script>
    {{-- <script src="yalla_gt/assets/js/auth_popup/login_popup_ar.js"></script> --}}

    {{-- Add more --}}





    @yield('script')

</body>

</html>
