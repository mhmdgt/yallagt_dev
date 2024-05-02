<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GT-manager</title>
    <!-- ------------------------------- Head Injectors ------------------------------- -->
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/core/core.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('gt_manager') }}/assets/css/Light_theme/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('gt_manager') }}/media/favicon.ico">
    <!-- ------------------------------- END Head Inject ------------------------------- -->
</head>
<body class="sidebar-dark">
    @include('sweetalert::alert')

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
                                        <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your
                                            account.</h5>

                                        <form id="targetForm" class="forms-sample" method="POST"
                                            action="{{ route('admin.check.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="login_credentials">Email address or phone number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Email or Phone Number" name='login_credentials'
                                                    id="login_credentials">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" placeholder="Password"
                                                    name="password" id="password" autocomplete="current-password">
                                            </div>
                                            <div class="form-check form-check-flat form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    Remember me
                                                </label>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-outline-success btn-icon-text mt-3 mb-2 mb-md-0">
                                                Login
                                            </button>
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

    <!-- ------------------------------- Inject:js ------------------------------- -->
    <!-- core:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/core/core.js"></script>

    <!-- injected:js -->
    <script src="{{ asset('gt_manager') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('gt_manager') }}/assets/js/template.js"></script>

    <!-- jqaury -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Valdation JS -->
    <script src="{{ asset('gt_manager') }}/assets/js/validate.min.js"></script>
    <!-- ------------------------------- END Inject:js ------------------------------- -->
    <!-- Form Valdation JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#targetForm').validate({
                rules: {
                    login_credentials: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    login_credentials: {
                        required: 'Please Enter Your Email or Phone number',
                    },
                    password: {
                        required: 'Password Must Be Entered',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

</body>
</html>
