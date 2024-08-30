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
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<!-- Wizard CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.css') }}">

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

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="preloader">
            <span class="loader"></span>
        </div>

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left active" >
                <a href="{{ route('employer.dashboard') }}" class="logo logo-normal ">
                    <img src="{{ asset('assets/img/heyram-logo.jfif') }}" alt="Logo" style="height: 60px; width:auto;">
                    <img src="{{ asset('assets/img/heyram-logo.jfif') }}" class="white-logo" alt="Logo">
                </a>
                <a href="{{ route('employer.dashboard') }}" class="logo-small">
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
                            {{-- <li class="nav-item dropdown">
								<a href="javascript:void(0);" class="btn btn-header-list" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid-add"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end menus-info">
									<div class="row">
										<div class="col-md-6">
											<ul class="menu-list">
												<li>
													<a href="contacts.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-violet">
																<i class="ti ti-user-up"></i>
															</span>
															<div class="menu-details-content">
																<p>Contacts</p>
																<span>Add New Contact</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="pipeline.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-green">
																<i class="ti ti-timeline-event-exclamation"></i>
															</span>
															<div class="menu-details-content">
																<p>Pipline</p>
																<span>Add New Pipline</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="activities.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-pink">
																<i class="ti ti-bounce-right"></i>
															</span>
															<div class="menu-details-content">
																<p>Activities</p>
																<span>Add New Activity</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="analytics.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-info">
																<i class="ti ti-analyze"></i>
															</span>
															<div class="menu-details-content">
																<p>Analytics</p>
																<span>Shows All Information</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="projects.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-danger">
																<i class="ti ti-atom-2"></i>
															</span>
															<div class="menu-details-content">
																<p>Projects</p>
																<span>Add New Project</span>
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>
										<div class="col-md-6">
											<ul class="menu-list">
												<li>
													<a href="deals.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-info">
																<i class="ti ti-medal"></i>
															</span>
															<div class="menu-details-content">
																<p>Deals</p>
																<span>Add New Deals</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="leads.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-secondary">
																<i class="ti ti-chart-arcs"></i>
															</span>
															<div class="menu-details-content">
																<p>Leads</p>
																<span>Add New Leads</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="companies.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-tertiary">
																<i class="ti ti-building-community"></i>
															</span>
															<div class="menu-details-content">
																<p>Company</p>
																<span>Add New Company</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="tasks.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-success">
																<i class="ti ti-list-check"></i>
															</span>
															<div class="menu-details-content">
																<p>Tasks</p>
																<span>Add New Task</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="campaign.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-purple">
																<i class="ti ti-brand-campaignmonitor"></i>
															</span>
															<div class="menu-details-content">
																<p>Campaign</p>
																<span>Add New Campaign</span>
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li> --}}
                        </ul>
                    </li>
                    <!-- /Nav List -->

                    <!-- Email -->
                    {{-- <li class="nav-item nav-item-email nav-item-box">
						<a href="email.html">
							<i class="ti ti-message-circle-exclamation"></i>
							<span class="badge rounded-pill">14</span>
						</a>
					</li> --}}
                    <!-- /Email -->

                    <!-- Notifications -->
                    {{-- <li class="nav-item dropdown nav-item-box">
						<a href="javascript:void(0);" class="nav-link" data-bs-toggle="dropdown">
							<i class="ti ti-bell"></i>
							<span class="badge rounded-pill">13</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end notification-dropdown">
							<div class="topnav-dropdown-header">
								<h4 class="notification-title">Notifications</h4>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="activities.html">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="Profile">
													<span class="badge badge-info rounded-pill"></span>
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details">Ray Arnold left 6 comments on Isla Nublar SOC2 compliance report</p>
													<p class="noti-time">Last Wednesday at 9:42 am</p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img src="{{ asset('assets/img/profiles/avatar-03.jpg') }}" alt="Profile">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details">Denise Nedry replied to Anna Srzand</p>
													<p class="noti-sub-details">“Oh, I finished de-bugging the phones, but the system's compiling for eighteen minutes, or twenty.  So, some minor systems may go on and off for a while.”</p>
													<p class="noti-time">Last Wednesday at 9:42 am</p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img alt="" src="{{ asset('assets/img/profiles/avatar-06.jpg') }}">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details">John Hammond attached a file to Isla Nublar SOC2 compliance report</p>
													<div class="noti-pdf">
														<div class="noti-pdf-icon">
															<span><i class="ti ti-chart-pie"></i></span>
														</div>
														<div class="noti-pdf-text">
															<p>EY_review.pdf</p>
															<span>2mb</span>
														</div>
													</div>
													<p class="noti-time">Last Wednesday at 9:42 am</p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="activities.html" class="view-link">View all</a>
								<a href="javascript:void(0);" class="clear-link">Clear all</a>
							</div>
						</div>
					</li> --}}
                    <!-- /Notifications -->

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
                                <a class="dropdown-item" href="{{ route('employer.dashboard') }}">
                                    <i class="ti ti-layout-2"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('employer.profile') }}">
									<i class="ti ti-user-pin"></i> My Profile
								</a>
                                <a class="dropdown-item" href="{{ route('employer.logout') }}">
                                    <i class="ti ti-lock"></i> Logout
                                </a>
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
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                        <i class="ti ti-layout-2"></i> Dashboard
                    </a>
                    <a class="dropdown-item" href="{{ route('employer.profile') }}">
                        <i class="ti ti-user-pin"></i> My Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('employer.logout') }}">
                        <i class="ti ti-lock"></i> Logout
                    </a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /Header -->

        @include('Employer.partials.slider')
