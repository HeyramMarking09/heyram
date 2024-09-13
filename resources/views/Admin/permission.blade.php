@extends('Admin.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="page-title">Permission</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="@if (Auth::guard('admin')->check()) {{ route('admin.permission', $role->id) }} @else {{ route('employee.permission', $role->id) }} @endif " data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Refresh"><i class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Collapse" id="collapse-header"><i class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="card main-card">
                        <div class="card-body">
                            <!-- Search -->
                            <div class="search-section">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4">
                                        <div class="role-name">
                                            <h4>Role Name : <span class="text-danger">{{ $role->name }}</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">

                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->

                            <!-- Roles List -->
                            <div class="table-responsive custom-table">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Modules</th>
                                            <th>Sub Modules</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            @php
                                                // Check if the role has this permission
                                                $rolePermission = $role->permissions->find($permission->id);
                                            @endphp
                                            <tr data-permission-id="{{ $permission->id }}">
                                                <td>{{ $permission->module }}</td>
                                                <td>{{ $permission->sub_module }}</td>
                                                <td><input type="checkbox"
                                                        {{ $rolePermission && $rolePermission->pivot->can_create ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox"
                                                        {{ $rolePermission && $rolePermission->pivot->can_edit ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox"
                                                        {{ $rolePermission && $rolePermission->pivot->can_view ? 'checked' : '' }}>
                                                </td>
                                                <td><input type="checkbox"
                                                        {{ $rolePermission && $rolePermission->pivot->can_delete ? 'checked' : '' }}>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="datatable-length"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="datatable-paginate"></div>
                                </div>
                            </div>
                            <!-- /Roles List -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- /Page Wrapper -->

    <div class="modal custom-modal fade" id="add_role" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="roles-permissions.html">
                        <div class="form-wrap">
                            <label class="col-form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="edit_role" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="roles-permissions.html">
                        <div class="form-wrap">
                            <label class="col-form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Admin">
                        </div>
                        <div class="modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- /Main Wrapper -->
@endsection
@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var permissionUpdate = "{{ route('admin.permissions.update') }}";
        </script>
    @else
        <script>
            var permissionUpdate = "{{ route('employee.permissions.update') }}";
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // When any permission checkbox is clicked
            $('input[type="checkbox"]').on('change', function() {
                var $row = $(this).closest('tr');
                var permissionId = $row.data(
                    'permission-id'); // Assuming you add a data attribute for permission ID
                var roleId = "{{ $role->id }}"; // Role ID should be available in the view
                var permissionType = $(this).closest('td')
                    .index(); // 2: Create, 3: Edit, 4: View, 5: Delete
                var isChecked = $(this).is(':checked');

                // Send AJAX request to update permission
                updatePermission(roleId, permissionId, permissionType, isChecked);
            });
        });

        // Function to send AJAX request
        function updatePermission(roleId, permissionId, permissionType, isChecked) {
            $.ajax({
                url: permissionUpdate, // Update this with your route name
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: roleId,
                    permission_id: permissionId,
                    permission_type: permissionType,
                    is_checked: isChecked
                },
                success: function(response) {
                    // Handle success
                    // console.log(response.message);
                    CallMesssage('success', response.message);
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
        }
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
