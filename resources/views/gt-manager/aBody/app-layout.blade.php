<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Yalla GT</title>
    <!-- ------------------------------- Head Injectors ------------------------------- -->

    <!-- Select2 ############################# -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/select2/select2.css">

    <!--  dropzone ############################# -->
    {{-- <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/dropzone/dropzone.min.css"> --}}
    {{-- <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script> --}}
    {{-- <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css"> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <link rel="stylesheet"
        href="{{ asset('gt_manager') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->

    <!-- plugin css for icon pages -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- end plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- plugin css for Data Tables -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- end plugin css for Data Tables -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/light_theme/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/dark_theme/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/custom.css">

    <!-- Loader bar -->
    {{-- <link rel="stylesheet" href="{{ asset('/gt_manager/assets/css/loader/loader-style.css') }}"> --}}

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('gt_manager') }}/assets/images/favicon.ico" />

    <!-- ------------------------------- END Head Inject ------------------------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body class="sidebar-dark">
    @include('sweetalert::alert')

    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('gt-manager.aBody.sidebar')

        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('gt-manager.aBody.header')
            <!-- partial -->

            @yield('content')

            <!-- partial:partials/_footer.html -->
            @include('gt-manager.aBody.footer')
            <!-- partial -->

        </div>
    </div>

    <!-- ------------------------------- Inject:js ------------------------------- -->

    <!-- jqaury -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- core:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/core/core.js"></script>

    <!-- plugin js for this page -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- inject:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/template.js"></script>

    <!-- custom js for this page -->
    <script src="{{ asset('gt_manager') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/datepicker.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/file-upload.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/select2.js"></script>

    <!-- plugin js for Data Tables -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/data-table.js"></script>

    <!-- Loader bar -->
    {{-- <scipt src="{{ asset('/gt_manager/assets/js/loader-style.js') }}"></scipt> --}}

    <!-- jqaury -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}

    <!-- Valdation JS -->
    {{-- <script src="{{ asset('gt_manager') }}/assets/js/validate.min.js"></script> --}}

    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/select2.js"></script>

    {{-- Dropzone --}}
    <script src="{{ asset('gt_manager') }}/assets/vendors/dropzone/dropzone.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/dropzone.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> --}}

    <!-- Image Real-Time JS -->
    <script src="{{ asset('gt_manager') }}/assets/js/imageRealTime.js"></script>

    <!-- ------------------------------- END Inject:js ------------------------------- -->

    @yield('script')

</body>

</html>
