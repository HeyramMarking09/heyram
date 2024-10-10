<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="CRMS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Heyram - Dashboard</title>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/heyram-logo.jfif') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Mobile CSS-->
	<link rel="stylesheet" href="{{ asset('assets/plugins/intltelinput/css/intlTelInput.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/intltelinput/css/demo.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Wizard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.css') }}">
    
    <!-- Summernote CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}">

    <!-- Bootstrap Tagsinput CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.3/sweetalert2.all.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>

</head>
@if (Route::currentRouteName() == 'admin.chat')
    <body class="main-chat-blk">
@elseif (Route::currentRouteName() == 'employee.chat')
    <body class="main-chat-blk">
@else
<body>
@endif

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="preloader">
            <span class="loader"></span>
        </div>

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left active">
                <a href="@if (Auth::guard('admin')->check()) {{ route('admin.dashboard') }} @else {{ route('employee.dashboard') }} @endif " class="logo logo-normal">
                    <img src="{{ asset('assets/img/heyram-logo.jfif') }}" alt="Logo" style="height: 60px; width:auto;">
                    <img src="{{ asset('assets/img/heyram-logo.jfif') }}" class="white-logo" alt="Logo">
                </a>
                <a href="@if (Auth::guard('admin')->check()) {{ route('admin.dashboard') }} @else {{ route('employee.dashboard') }} @endif " class="logo-small">
                    <img src="{{ asset('assets/img/heyram-logo.jfif') }}" alt="Logo">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                    <i class="ti ti-arrow-bar-to-left"></i>
                </a>
            </div>
            <!-- /Logo -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <div class="header-user">
                <ul class="nav user-menu">

                    <!-- Search -->
                    <li class="nav-item nav-search-inputs me-auto">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                            </a>
                            <form action="#" class="dropdown">
                                <div class="searchinputs" id="dropdownMenuClickable">
                                    <input type="text" placeholder="Search">
                                    <div class="search-addon">
                                        <button type="submit"><i class="ti ti-command"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- /Search -->

                    <!-- Nav List -->
                    <li class="nav-item nav-list">
                        <ul class="nav">
                            <li class="dark-mode-list">
                                <a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle">
                                    <i class="ti ti-sun light-mode active"></i>
                                    <i class="ti ti-moon dark-mode"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /Nav List -->

                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
                            <span class="user-info">
                                <span class="user-letter">
                                    <img src="{{ asset('assets/img/profiles/avatar-20.jpg') }}" alt="Profile">
                                </span>
                                <span class="badge badge-success rounded-pill"></span>
                            </span>
                        </a>
                        <div class="dropdown-menu menu-drop-user">
                            <div class="profilename">
								@if (Auth::guard('admin')->check())
									<a class="dropdown-item" href="{{ route('admin.dashboard') }}">
										<i class="ti ti-layout-2"></i> Dashboard
									</a>
									<a class="dropdown-item" href="{{ route('admin.logout') }}">
										<i class="ti ti-lock"></i> Logout
									</a>
								@else
									<a class="dropdown-item" href="{{ route('employee.dashboard') }}">
										<i class="ti ti-layout-2"></i> Dashboard
									</a>
									<a class="dropdown-item" href="{{ route('employee.logout') }}">
										<i class="ti ti-lock"></i> Logout
									</a>
								@endif
                            </div>
                        </div>
                    </li>
                    <!-- /Profile Dropdown -->

                </ul>
            </div>

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu">
					@if (Auth::guard('admin')->check())
						<a class="dropdown-item" href="{{ route('admin.dashboard') }}">
							<i class="ti ti-layout-2"></i> Dashboard
						</a>
						<a class="dropdown-item" href="{{ route('admin.logout') }}">
							<i class="ti ti-lock"></i> Logout
						</a>
					@else
						<a class="dropdown-item" href="{{ route('employee.dashboard') }}">
							<i class="ti ti-layout-2"></i> Dashboard
						</a>
						<a class="dropdown-item" href="{{ route('employee.logout') }}">
							<i class="ti ti-lock"></i> Logout
						</a>
					@endif
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /Header -->

        @include('Admin.partials.slider')
