<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="CRMS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>hayeram Admin - Login</title>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.3/sweetalert2.all.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper login-new">
                <div class="login-shapes">
                    <div class="login-right-shape">
                        <img src="{{ asset('assets/img/authentication/shape-01.png') }}" alt="Shape">
                    </div>
                    <div class="login-left-shape">
                        <img src="{{ asset('assets/img/authentication/shape-02.png') }}" alt="Shape">
                    </div>
                </div>
                <div class="container">
                    <div class="login-content user-login">
                        <div class="login-logo">
                            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                        </div>
                        <form id="loginForm">
                            @csrf
                            <div class="login-user-info">
                                <div class="login-heading">
                                    <h4>Log In Heyram admin</h4>
                                    <p>Access The Admin</p>
                                </div>
                                <div class="form-wrap">
                                    <label class="col-form-label">Email Address</label>
                                    <div class="form-wrap-icon">
                                        <input type="text" name="email" class="form-control">
                                        <i class="ti ti-mail"></i>
                                    </div>
                                </div>
                                <div class="form-wrap">
                                    <label class="col-form-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input form-control">
                                        <span class="ti toggle-password ti-eye-off"></span>
                                    </div>
                                </div>
                                <div class="form-wrap">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="copyright-text">
                        <p>Copyright &copy;{{ date('Y') }} - CRMS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>   
    
    <script>
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: "{{ route('admin.login.form') }}",
                        method: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            if(response.status == true || response.status === 'true'){
                                CallMesssage('success', response.message);
                                window.location.href = "{{ route('admin.dashboard') }}";
                            }else{
                                CallMesssage('error', response.message);
                            }
                        },
                        error: function(xhr) {
                            var response = JSON.parse(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error ||
                                    'An unexpected error occurred.'
                            });
                        }
                    });
                }
            });
        });

        function CallMesssage(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: icon,
                title: title
            });
        }
    </script>
</body>

</html>
