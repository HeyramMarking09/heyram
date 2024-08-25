@extends('Employer.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <h4 class="page-title">Settings</h4>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <div class="head-icons">
                                    <a href="{{ route('employer.profile') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!-- Settings Menu -->
                    <div class="card settings-tab">
                        <div class="card-body pb-0">
                            <div class="settings-menu">
                                <ul class="nav">
                                    <li>
                                        <a href="{{ route('employer.profile') }}" class="active">
                                            <i class="ti ti-settings-cog"></i> General Settings
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="company-settings.html">
                                            <i class="ti ti-world-cog"></i> Website Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoice-settings.html">
                                            <i class="ti ti-apps"></i> App Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-settings.html">
                                            <i class="ti ti-device-laptop"></i> System Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="payment-gateways.html">
                                            <i class="ti ti-moneybag"></i> Financial Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="storage.html">
                                            <i class="ti ti-flag-cog"></i> Other Settings
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Settings Menu -->

                    <div class="row">
                        <div class="col-xl-3 col-lg-12 theiaStickySidebar">

                            <!-- Settings Sidebar -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="settings-sidebar">
                                        <h4>General Settings</h4>
                                        <ul>
                                            <li>
                                                <a href="{{ route('employer.profile') }}" class="{{ request()->routeIs('employer.profile') ? 'active' : '' }}">Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('employer.change-password') }}" class="{{ request()->routeIs('employer.change-password') ? 'active' : '' }}">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Settings Sidebar -->

                        </div>

                        <div class="col-xl-9 col-lg-12">

                            <!-- Settings Info -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="settings-header">
                                        <h4>Profile Settings</h4>
                                    </div>
                                    <div class="settings-form">
                                        <form action="profile.html">
                                            <div class="settings-sub-header">
                                                <h6>Employee Information</h6>
                                                <p>Provide the information below</p>
                                            </div>
                                            <div class="form-wrap">
                                                <div class="profile-upload">
                                                    <div class="profile-upload-img">
                                                        <span><i class="ti ti-photo"></i></span>
                                                        <img id="ImgPreview" src="assets/img/profiles/avatar-02.jpg"
                                                            alt="img" class="preview1">
                                                        <button type="button" id="removeImage1" class="profile-remove">
                                                            <i class="feather-x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="profile-upload-content">
                                                        <label class="profile-upload-btn">
                                                            <i class="ti ti-file-broken"></i> Upload File
                                                            <input type="file" id="imag" class="input-img">
                                                        </label>
                                                        <p>JPG, GIF or PNG. Max size of 800K</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-details">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                First Name <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Last Name <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                User Name <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Phone Number <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Email <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-address">
                                                <div class="settings-sub-header">
                                                    <h6>Address</h6>
                                                    <p>Please enter the address details</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Address <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Country <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                State / Province <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                City <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">
                                                                Postal Code <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-button">
                                                <a href="#" class="btn btn-light">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Settings Info -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection

@push('scripts')
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
@endpush
