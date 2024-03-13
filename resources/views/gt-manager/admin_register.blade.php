<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GT-manager</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/Light_theme/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('gt_manager') }}/assets/images/favicon.ico">
</head>

<body class="sidebar-dark">
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">

                                <div class="container col-md-10">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">GT-manager</a>
                                        <h5 class="text-muted font-weight-normal mb-4">Hi There, Become a new member
                                            with us</h5>
                                        <form class="forms-sample" method="#" action="#">

                                            <div class="form-group">
                                                <label for="login">Name</label>
                                                <input required type="text" class="form-control" name='login'
                                                    id="login" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="login">Birth date</label>
                                                <input required type="date" class="form-control" name='login'
                                                    id="login" placeholder="Birth date">
                                            </div>
                                            <div class="form-group">
                                                <label for="login">Phone number</label>
                                                <input required type="text" class="form-control" name='login'
                                                    id="login" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="login">Email address</label>
                                                <input required type="text" class="form-control" name='login'
                                                    id="login" placeholder="Email or Phone Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="userPassword">Password</label>
                                                <input required type="password" class="form-control" name="password"
                                                    id="password" autocomplete="current-password"
                                                    placeholder="Password">
                                            </div>

                                            <button type="submit"
                                                class="btn btn-outline-success btn-icon-text mt-3 mb-2 mb-md-0">
                                                Submit
                                            </button>



                                            <a href="{{ route('admin-login') }}" class="d-block mt-3 text-muted">Have an
                                                account? Go Login</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/template.js"></script>
    <!-- endinject -->

</body>

</html>
