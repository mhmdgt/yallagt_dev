<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GT-Manager</title>
    <!-- ------------------------------- Head Injectors ------------------------------- -->

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/core/core.css">

    <!-- this page -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/light_theme/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/dark_theme/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/custom.css">

    <!-- filepond -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('gt_manager') }}/media/favicon.ico" />

    <!-- ------------------------------- END Head ------------------------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles

    @yield('style')

</head>

<body class="sidebar-dark">
    <div class="main-wrapper">
        @include('gt-manager.layout.sidebar')

        <div class="page-wrapper">
            @include('gt-manager.layout.header')
            @yield('content')
            @include('gt-manager.layout.footer')
        </div>

    </div>
    <!-- ------------------------------- Scripts ------------------------------- -->

    <!-- jqaury -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- core:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/core/core.js"></script>

    <!-- Custom js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/datepicker.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/file-upload.js"></script>

    <!-- inject:js -->
    <script src="{{ asset('gt_manager') }}/assets/js/template.js"></script>

    <!-- Image Real-Time JS -->
    <script src="{{ asset('gt_manager') }}/assets/js/imageRealTime.js"></script>

    <!-- Data Tables -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/data-table.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- tinymce -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/tinymce.js"></script>


    <!-- ------------------------------- END js ------------------------------- -->

    @livewireScripts
    @include('gt-manager.partials.session_messages')
    @yield('script')

</body>

</html>
