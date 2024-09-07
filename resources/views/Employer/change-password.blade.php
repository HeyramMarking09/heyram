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
                                    <a href="{{ route('employer.change-password') }}" data-bs-toggle="tooltip" data-bs-placement="top"
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
                                            {{-- <li>
                                                <a href="{{ route('employer.profile') }}"
                                                    class="{{ request()->routeIs('employer.profile') ? 'active' : '' }}">Profile</a>
                                            </li> --}}
                                            <li>
                                                <a href="{{ route('employer.change-password') }}"
                                                    class="{{ request()->routeIs('employer.change-password') ? 'active' : '' }}">Change
                                                    Password</a>
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
                                <form id="changePassword">
                                    @csrf
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Change Password
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="form-text1" class="form-label fs-14">Enter Old Password</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-user"></i></div>
                                                <input type="password" class="form-control" name="old_password" id="form-text1" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-password1" class="form-label fs-14">Enter
                                                New Password</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-lock"></i></div>
                                                <input type="password" class="form-control" name="new_password" id="form-password1" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-password" class="form-label fs-14">Enter Repeat Password</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-lock"></i></div>
                                                <input type="password" class="form-control" name="repeat_password" id="form-password" placeholder="">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="changePasswordButton" type="submit">Submit</button>
                                    </div>
                                </form>
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

    <script>
        $(document).ready(function() {
            $.validator.addMethod("notEqualToOldPassword", function(value, element) {
                return value !== $('#form-text1').val(); // Compare with the old password
            }, "New password should not be the same as the old password.");
            $("#changePassword").validate({
                rules: {
                    old_password: {
                        required: true,
                        minlength:8
                    },
                    new_password: {
                        required: true,
                        minlength:8,
                        notEqualToOldPassword: true // Use the custom validation method
                    },
                    repeat_password: {
                        required: true,
                        equalTo: '#form-password1'
                    }
                },
                messages: {
                    old_password:{
                        required:"Please provide a passsword",
                        minlength: "Your password must be at least 8 characters long",
                    },
                    new_password: {
                        required: "Please provide a password",
                        minlength: "Your new password must be at least 8 characters long",
                        notEqualToOldPassword: "New password should not be the same as the old password"
                    },
                    repeat_password: {
                        required: "Please provide a repeat password",
                        equalTo: "Your new password and repeat password should be the same"
                    }
                },
                submitHandler: function(form) {
                    $('#changePasswordButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('employer.change-password-form') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);
                                $('#changePassword')[0].reset();
                                $('#changePasswordButton').prop('disabled', false);
                                // Reload the DataTable

                            } else {
                                CallMesssage('error', response.message);
                                $('#changePasswordButton').prop('disabled', false);
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
    </script>
    <script>
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
@endpush
