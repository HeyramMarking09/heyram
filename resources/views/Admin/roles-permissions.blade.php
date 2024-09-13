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
                                <h4 class="page-title">Roles</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="@if (Auth::guard('admin')->check()) {{ route('admin.roles-permissions') }} @else {{ route('employee.roles-permissions') }} @endif" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Refresh"><i
                                            class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
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
                                        {{-- <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Search Roles">
                                        </div> --}}
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                @can('access-permission', ['Roles And Permission', 'create'])
                                                    <li>
                                                        <a href="javascript:void(0);" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#add_role"><i
                                                                class="ti ti-square-rounded-plus"></i>Add New Role</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->

                            <!-- Roles List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="roles_list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Created at</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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

    <!-- Add Role -->
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
                    <form id="create-roles-permissions">
                        @csrf
                        <div class="form-wrap">
                            <label class="col-form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
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
    <!-- /Add Role -->

    <!-- Edit Role -->
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
                    <form id="edit-roles-permissions">
                        @csrf
                        <input type="hidden" name="id" id="RoleId">
                        <div class="form-wrap">
                            <label class="col-form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="RoleName" required>
                        </div>
                        <div class="modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Role -->

    </div>
    <!-- /Main Wrapper -->
@endsection

@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var getRolesPermissions = "{{ route('admin.get-roles-permissions') }}";
            var permissionsURl = "{{ route('admin.permission', ['id' => '__ID__']) }}";
            var createRolePermission  = "{{ route('admin.create-roles-permissions') }}";
            var editRolesPermission = "{{ route('admin.edit-roles-permissions') }}";

        </script>
    @else
        <script>
            var getRolesPermissions = "{{ route('employee.get-roles-permissions') }}";
            var permissionsURl = "{{ route('employee.permission', ['id' => '__ID__']) }}";
            var createRolePermission  = "{{ route('employee.create-roles-permissions') }}";
            var editRolesPermission = "{{ route('employee.edit-roles-permissions') }}";
        </script>
    @endif
    <script src="{{ asset('assets/js/roles-permissions.js') }}"></script>
    <script>
        // Check permissions in Blade and pass them to JavaScript
        window.canViewRoleAndPermission = @json(Auth::user()->can('access-permission', ['Roles And Permission', 'view']));
        window.canEditRoleAndPermission = @json(Auth::user()->can('access-permission', ['Roles And Permission', 'edit']));
    </script>

    <script>
        var csrf_token = "{{ csrf_token() }}";


        if ($('#roles_list').length > 0) {
            $('#roles_list').DataTable({
                "bFilter": false,
                "bInfo": false,
                "ordering": true,
                "autoWidth": true,
                "ajax": {
                    url: getRolesPermissions,
                    type: "GET"
                },
                "language": {
                    search: ' ',
                    sLengthMenu: '_MENU_',
                    searchPlaceholder: "Search",
                    info: "_START_ - _END_ of _TOTAL_ items",
                    "lengthMenu": "Show _MENU_ entries",
                    paginate: {
                        next: 'Next <i class=" fa fa-angle-right"></i> ',
                        previous: '<i class="fa fa-angle-left"></i> Prev '
                    },
                },
                initComplete: (settings, json) => {
                    $('.dataTables_paginate').appendTo('.datatable-paginate');
                    $('.dataTables_length').appendTo('.datatable-length');
                },
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "created"
                    },
                    {
                        "render": function(data, type, row) {
                            var ID = row.id;
                            var Name = row.name;
                            var PermissionRoute = permissionsURl.replace('__ID__', row.id);
                            var canViewRoleAndPermission = window.canViewRoleAndPermission ? `<a class="dropdown-item" href="${PermissionRoute}"><i class="ti ti-shield text-success"></i> Permission</a>` : '';
                            var canEditRoleAndPermission = window.canEditRoleAndPermission ? `<a class="dropdown-item edit-popup" href="javascript:void(0);" data-bs-toggle="modal" onclick="openEditForm('${ID}', '${Name}')" data-bs-target="#edit_role"><i class="ti ti-edit text-blue"></i> Edit</a>` : '';
                            return `<div class="dropdown table-action">
                                <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    ${canEditRoleAndPermission}
                                    ${canViewRoleAndPermission} 
                                </div>
                            </div>`;
                        }
                    }
                ]
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#create-roles-permissions').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                $.ajax({
                    url: createRolePermission, // The route that handles the request
                    type: 'POST',
                    data: $(this).serialize(), // Serialize the form data
                    success: function(response) {
                        if (response.status == true || response.status === 'true') {
                            // Show a success message
                            CallMesssage('success', response.message);
                            $('#roles_list').DataTable().ajax.reload();
                            $('#create-roles-permissions')[0].reset(); // Optionally reset the form
                            $('.btn-close').click();

                        }else{
                            CallMesssage('error', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors (e.g., show error messages)
                        alert('Error: ' + xhr.responseText);
                    }
                });
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
    <script>
        function openEditForm(id, name)
        {
            $("#RoleId").val(id);
            $("#RoleName").val(name);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#edit-roles-permissions').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                $.ajax({
                    url: editRolesPermission, // The route that handles the request
                    type: 'POST',
                    data: $(this).serialize(), // Serialize the form data
                    success: function(response) {
                        if (response.status == true || response.status === 'true') {
                            // Show a success message
                            CallMesssage('success', response.message);
                            $('#roles_list').DataTable().ajax.reload();
                            $('#edit-roles-permissions')[0].reset(); // Optionally reset the form
                            $('.btn-close').click();

                        }else{
                            CallMesssage('error', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors (e.g., show error messages)
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
