@extends('Admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="page-title">Manage Users</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('admin.manage-users') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Refresh"><i
                                            class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card main-card">
                        <div class="card-body">
                            <div class="search-section">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4">
                                        <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" id="custom-search"
                                                placeholder="Search User">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                @can('access-permission', ['Manage User', 'create'])
                                                    <li>
                                                        <a href="javascript:void(0);" class="btn btn-primary add-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Add User</a>
                                                        <a style="display: none" href="javascript:void(0);" class="btn btn-primary edit-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Edit User</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->
                            <!-- Filter -->
                            <div class="filter-section filter-flex">
                                <div class="sortby-list">
                                    <ul>
                                        <li>
                                            <div class="sort-dropdown drop-down">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-sort-ascending-2"></i>Sort
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-start">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0);" id="searchByAsc">
                                                                <i class="ti ti-circle-chevron-right"></i>Ascending
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" id="searchByDesc">
                                                                <i class="ti ti-circle-chevron-right"></i>Descending
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-wrap icon-form">
                                                <span class="form-icon"><i class="ti ti-calendar"></i></span>
                                                <input type="text" class="form-control bookingrange" id="searchByDate"
                                                    placeholder="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-list">
                                    <ul>
                                        <li>
                                            <div class="form-sorts dropdown">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                    data-bs-auto-close="false"><i class="ti ti-filter-share"></i>Filter</a>
                                                <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-end">
                                                    <div class="filter-set-view">
                                                        <div class="filter-set-head">
                                                            <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="filter-set-content">
                                                                <div class="filter-set-content-head">
                                                                    <a href="#" class="collapsed"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseSix" aria-expanded="false"
                                                                        aria-controls="collapseSix">Status</a>
                                                                </div>
                                                                <div class="filter-set-contents accordion-collapse collapse"
                                                                    id="collapseSix" data-bs-parent="#accordionExample">
                                                                    <div class="filter-content-list">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            value="1" type="checkbox"
                                                                                            checked>
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Active</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            value="0" type="checkbox"
                                                                                            checked>
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Inactive</h5>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="filter-reset-btns">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button class="btn btn-primary"
                                                                        id="searchByStatus">Filter</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Filter -->
                            <!-- Manage Users List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="manage-users-list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
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
                            <!-- /Manage Users List -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
    <!-- Add User -->
    <div class="toggle-popup" id="userPopup">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Add New User</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="manageUserForm">
                        @csrf
                        <div class="accordion-lists" id="list-accord">
                            <!-- Basic Info -->
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="last_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Phone<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"><i class="ti ti-eye-off"></i></span>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Repeat Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"><i class="ti ti-eye-off"></i></span>
                                                    <input type="password" name="repeat_password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> User Type <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="user_type">
                                                    <option value="">-Select-</option>
                                                    <option value="customer">Customer</option>
                                                    <option value="employer">Employer</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="manager">Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-wrap">
                                                <label class="col-form-label">Online/Offline Customer</label>
                                                <div class="d-flex flex-wrap">
                                                    <div class="radio-btn">
                                                        <input type="radio" class="status-radio" id="active1"
                                                            name="is_online" checked="" value="1">
                                                        <label for="active1">Online</label>
                                                    </div>
                                                    <div class="radio-btn">
                                                        <input type="radio" class="status-radio" id="inactive1"
                                                            name="is_online" value="0">
                                                        <label for="inactive1">Offline</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Status <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button type="submit" id="createUserSubmitButton" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add User -->

    <!-- Delete User -->
    <div class="modal custom-modal fade" id="delete_contact" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 m-0 justify-content-end">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="userIDDelete" name="id">
                    <div class="success-message text-center">
                        <div class="success-popup-icon">
                            <i class="ti ti-trash-x"></i>
                        </div>
                        <h3>Remove User?</h3>
                        <p class="del-info">Are you sure you want to remove it.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button class="btn btn-danger" id="deleteUserButton" onclick="deleteTheUser()">Yes, Delete
                                it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete User -->
    <!-- Edit User -->
    <div class="toggle-popup1">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Edit User</h4>
                <a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="editManageUser">
                        @csrf
                        <div class="accordion-lists" id="list-accords">
                            <!-- Basic Info -->
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <input type="hidden" name="id" id="userId">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" id="userName"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="last_name" id="userLastName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <input type="email" name="email" id="userEmail" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Phone<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone" id="userPhone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"><i class="ti ti-eye-off"></i></span>
                                                    <input type="password" name="password" id="userPassword"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Repeat Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"><i class="ti ti-eye-off"></i></span>
                                                    <input type="password" name="repeat_password" id="userRepeatPassword" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> User Type <span class="text-danger">*</span></label>
                                                <select class="select" name="user_type" id="userUserType">
                                                    <option value="customer">Customer</option>
                                                    <option value="employer">Employer</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="manager">Manager</option>
                                                </select>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="radio-wrap">
                                                <label class="col-form-label">Online/Offline Customer</label>
                                                <div class="d-flex flex-wrap">
                                                    <div class="radio-btn">
                                                        <input type="radio" class="status-radio" id="active"
                                                            name="is_online" value="1">
                                                        <label for="active">Online</label>
                                                    </div>
                                                    <div class="radio-btn">
                                                        <input type="radio" class="status-radio" id="inactive"
                                                            name="is_online" value="0">
                                                        <label for="inactive">Offline</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Status <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="status" id="userStatus">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close1">Cancel</a>
                            <button type="submit" id="editUserSubmitButton" class="btn btn-primary">Update Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit User -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/manage-users.js') }}"></script>
    <script>
        var csrf_token = "{{ csrf_token() }}";
        var getManageUser = "{{ route('admin.get-manage-users') }}";
        var ManageUser = "{{ route('admin.manage.user.form') }}";
        var UpdateManageUser = "{{ route('admin.update.manage.user') }}";
        var deleteTheUserURl = "{{ route('admin.manage.user.delete') }}";
    </script>
@endpush
