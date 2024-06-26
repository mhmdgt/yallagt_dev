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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('yalla_gt') }}/media/fav_icon/favicon.ico">

    <!-- ========================= Start CSS ========================= -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/vendors/bootstrap/bootstrap.min.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/css/light_theme/style.css" />

    <!-- Style AR &E N -->
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/css/light_theme/style_en.css" />
    @else
        <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/css/light_theme/style_ar.css" />
    @endif

    <!-- Login popup -->
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/vendors/login_popup/login_popup_en.css" />
    @else
        <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/vendors/login_popup/login_popup_ar.css" />
    @endif

    <!-- filepond -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"rel="stylesheet" />

    <!-- Mobile NavBar -->
    <link rel="stylesheet" href="{{ asset('yalla_gt') }}/assets/vendors/mobile_navbar/mobile_navbar.css" />

    <!-- owl carousel -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/owl-carousel/owl-carousel.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/owl-carousel/owl-theme-default.min.css">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('yalla-gt.layout.header')
    @include('yalla-gt.layout.web_header')
    @include('yalla-gt.layout.mobile_header')
    <!-- ========================= ========================= Content ========================= ========================= -->
    <main>
        <section class="main_content">

            @yield('content')


            @yield('footer')
            {{-- @include('yalla-gt.layout.footer') --}}
        </section>
    </main>
    <!-- Pop-up -->
    @include('yalla-gt.pages.auth.auth_popup')
    <!-- ========================= ========================= Content ========================= ========================= -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('yalla_gt') }}/assets/js/popper.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.countdown.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.ui.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.elevatezoom.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/slinky.menu.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/jquery.instagramFeed.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/tippy-bundle.umd.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/formatNumber.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/plugins.js"></script>

    <script src="{{ asset('yalla_gt') }}/assets/js/main.js"></script>

    <!-- Mobile NAV JS -->
    <script src="{{ asset('yalla_gt') }}/assets/js/mobile_navbar.js"></script>

    <!-- Pop up -->
    @if (App::getLocale() == 'en')
        <script src="{{ asset('yalla_gt') }}/assets/js/auth_popup/login_popup_en.js"></script>
    @else
        <script src="{{ asset('yalla_gt') }}/assets/js/auth_popup/login_popup_ar.js"></script>
    @endif

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- owl carousel -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
    <script src="{{ asset('gt_manager') }}/assets/vendors/owl-carousel/owl-carousel.min.js"></script>
    <script src="{{ asset('yalla_gt') }}/assets/js/owl_carousel/custome.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('gt_manager') }}/assets/js/select2.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/select2/select2.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/tags-input.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond-plugin-file-metadata/dist/filepond-plugin-file-metadata.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    @include('yalla-gt.partials.session_messages')

    @yield('script')

</body>

</html>
