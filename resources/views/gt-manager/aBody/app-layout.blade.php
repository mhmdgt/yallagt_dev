<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Yalla GT</title>
    <!-- ------------------------------- Head Injectors ------------------------------- -->

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/select2/select2.min.css">

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/core/core.css">

    <!-- this page -->
    <link rel="stylesheet"
        href="{{ asset('gt_manager') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <!-- icon pages -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/mdi/css/materialdesignicons.min.css">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/light_theme/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/dark_theme/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/custom.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('gt_manager') }}/assets/images/favicon.ico" />

    <!-- ------------------------------- END Head ------------------------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles

</head>

<body class="sidebar-dark">

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

    <!-- inject:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/template.js"></script>

    <!-- custom js-->
    <script src="{{ asset('gt_manager') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/datepicker.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/file-upload.js"></script>

    <!-- Data Tables -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/data-table.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/select2/select2.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/select2.js"></script>

    <!-- Image Real-Time JS -->
    <script src="{{ asset('gt_manager') }}/assets/js/imageRealTime.js"></script>

    <!-- ------------------------------- END js ------------------------------- -->

    @livewireScripts
    @yield('script')

</body>

</html>
