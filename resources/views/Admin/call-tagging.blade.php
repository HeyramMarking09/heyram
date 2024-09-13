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
                            <div class="col-4">
                                <h4 class="page-title">Call Tagging</h4>
                            </div>
                            <div class="col-8 text-end">
                                <div class="head-icons">
                                    <a href=" @if (Auth::guard('admin')->check()) {{ route('admin.call-tagging') }} @else {{ route('employee.call-tagging') }} @endif" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Refresh">
                                        <i class="ti ti-refresh-dot"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header">
                                        <i class="ti ti-chevrons-up"></i>
                                    </a>
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
                                        <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" id="custom-search"
                                                placeholder="Search By Name">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                <li>
                                                    @can('access-permission', ['Call Tagging', 'create'])
                                                        <a href="javascript:void(0);" class="btn btn-primary add-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Add</a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" style="display: none" id="editLink" class="btn btn-primary edit-popup"><i
                                                            class="ti ti-square-rounded-plus"></i>Edit</a>
                                                </li>
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
                                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2"></i>Sort
                                                </a>
                                                <div class="dropdown-menu  dropdown-menu-start">
                                                    <ul>
                                                        <li id="searchByAsc">
                                                            <a href="javascript:void(0);">
                                                                <i class="ti ti-circle-chevron-right"></i>Ascending
                                                            </a>
                                                        </li>
                                                        <li id="searchByDesc">
                                                            <a href="javascript:void(0);">
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
                                                <input type="text" id="searchByDate" class="form-control bookingrange"
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
                                                <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-xl-end">
                                                    <div class="filter-set-view">
                                                        <div class="filter-set-head">
                                                            <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="filter-set-content">
                                                                <div class="filter-set-content-head">
                                                                    <a href="#" class="collapsed"
                                                                        data-bs-toggle="collapse" data-bs-target="#Status"
                                                                        aria-expanded="false" aria-controls="Status">Lead
                                                                        Status</a>
                                                                </div>
                                                                <div class="filter-set-contents accordion-collapse collapse"
                                                                    id="Status" data-bs-parent="#accordionExample">
                                                                    <div class="filter-content-list">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            name="search_status"
                                                                                            value="100" checked>
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>All</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio" value="1"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Query in-review</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="2"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Query Resolve/Closed</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="3"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Talk to client/closed</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="4"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Not Reachable</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="5"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Busy</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="6"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Contacted</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="7"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Not Interested</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="8"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Potential Client</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="9"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Appointment Schedule</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            value="10"
                                                                                            name="search_status">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Query in progress/Accelated</h5>
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
                                                                    <a href="#" class="btn btn-light">Reset</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <button type="button" class="btn btn-primary"
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

                            <!-- Contact List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="call_tagging_list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>User Type</th>
                                            <th>Visa Type</th>
                                            <th>Status</th>
                                            <th>Comment</th>
                                            <th>Call Back Date</th>
                                            <th>Created Date</th>
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
                            <!-- /Contact List -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Add Lead -->
    <div class="toggle-popup">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Add Call Tagging</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="callTaggingForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">User Type <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" onchange="changeUserType()" id="user_type" name="user_type">
                                        <option value="">Choose</option>
                                        <option value="client">Client</option>
                                        <option value="employer">Employer</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Type <span class="text-danger">*</span></label>
                                    </div>
                                    <select name="type" id="type" required onchange="getUsers(this.value)"
                                        class="select">
                                        <option value="">Choose</option>
                                        <option value="existing">Existing</option>
                                        <option value="new">New</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="userList">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Users <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" required name="user_id" id="usersDropdown">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="userListSelect" style="display: none">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Select <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" onchange="lead_or_other(this.value)" name="lead_other"
                                        id="anotherSelect">
                                        <option value="">Choose</option>
                                        <option value="lead">Lead</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="leadList" style="display: none">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Leads <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" name="lead_id" id="leadsDropdown">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="number" min="0" name="phone" disabled id="phone"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Visa Type <span class="text-danger">*</span></label>
                                        <input type="text" name="visa_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                        <select class="select" name="status">
                                            <option value="">Choose</option>
                                            <option value="1">Query in-review</option>
                                            <option value="2">Query Resolve/Closed</option>
                                            <option value="3">Talk to client/closed</option>
                                            <option value="4">Not Reachable</option>
                                            <option value="5">Busy</option>
                                            <option value="6">Contacted</option>
                                            <option value="7">Not Interested</option>
                                            <option value="8">Potential Client</option>
                                            <option value="9">Appointment Schedule</option>
                                            <option value="10">Query in progress/Accelated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Call Back Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="call_back_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Client Query <span class="text-danger">*</span></label>
                                    <textarea name="client_query" id="" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button type="submit" id="callTaggingSubmitButton" class="btn btn-primary">Create</submit>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Lead -->

    <!-- Edit Lead -->
    <div class="toggle-popup1">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Edit Call Tagging</h4>
                <a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="editCallTaggingForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id" id="edit_id">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">User Type <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" onchange="editChangeUserType()" id="edit_user_type" name="user_type">
                                        <option value="">Choose</option>
                                        <option value="client">Client</option>
                                        <option value="employer">Employer</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Type <span class="text-danger">*</span></label>
                                    </div>
                                    <select name="type" id="edit_type" required onchange="editGetUsers(this.value)"
                                        class="select">
                                        <option value="">Choose</option>
                                        <option value="existing">Existing</option>
                                        <option value="new">New</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="editUserList">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Users <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select user_id" required name="user_id" id="editUsersDropdown">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="editUserListSelect" style="display: none">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Select <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select lead_other" onchange="edit_lead_or_other(this.value)" name="lead_other"
                                        id="editAnotherSelect">
                                        <option value="">Choose</option>
                                        <option value="lead">Lead</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="editLeadList" style="display: none">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Leads <span class="text-danger">*</span></label>
                                    </div>
                                    <select class="select" name="lead_id" id="editLeadsDropdown">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="editName" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="number" min="0" name="phone" disabled id="editPhone"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="editEmail" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Visa Type <span class="text-danger">*</span></label>
                                        <input type="text" name="visa_type" id="visa_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                        <select class="select" id="edit_status" name="status">
                                            <option value="">Choose</option>
                                            <option value="1">Query in-review</option>
                                            <option value="2">Query Resolve/Closed</option>
                                            <option value="3">Talk to client/closed</option>
                                            <option value="4">Not Reachable</option>
                                            <option value="5">Busy</option>
                                            <option value="6">Contacted</option>
                                            <option value="7">Not Interested</option>
                                            <option value="8">Potential Client</option>
                                            <option value="9">Appointment Schedule</option>
                                            <option value="10">Query in progress/Accelated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Call Back Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="call_back_date" id="call_back_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Client Query <span class="text-danger">*</span></label>
                                    <textarea name="client_query" id="edit_client_query" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close1">Cancel</a>
                            <button type="submit" id="editCallTaggingSubmitButton" class="btn btn-primary">Update</submit>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Lead -->

    <!-- Delete Lead -->
    <div class="modal custom-modal fade" id="delete_contact" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 m-0 justify-content-end">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="success-message text-center">
                        <div class="success-popup-icon">
                            <i class="ti ti-trash-x"></i>
                        </div>
                        <input type="hidden" id="callTaggingDeleteId">
                        <h3>Remove Call Tagging?</h3>
                        <p class="del-info">Are you sure you want to remove
                            call tagging you selected.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="button" onclick="deleteCall()" id="deleteButton" class="btn btn-danger">Yes,
                                Delete it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Lead -->
	{{-- Add Comments --}}
	<div class="modal custom-modal fade" id="comment_contact" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header border-0 m-0 align-items-center">
					<h5 class="modal-title ms-3">Add Comment</h5> <!-- Header aligned to the left -->
					<button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="success-message">
						<form id="commentForm">
							@csrf
                            <input type="hidden" name="id" id="commentId">
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="form-wrap mb-3">
										<label for="leadName" class="form-label d-block text-start">Comment <span class="text-danger">*</span></label>
										<textarea name="comments" required id="" placeholder="Enter Comment" class="form-control" cols="30" rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-12 modal-btn d-flex justify-content-end">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" id="commentFormButton" class="btn btn-danger">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{-- Add Comments --}}
	

    </div>
    <!-- /Main Wrapper -->
@endsection
@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var getAllCallLeads = "{{ route('admin.get-call-leads') }}";
            var getUsers =  "{{ route('admin.get-users') }}";
            var createCallTagging =  "{{ route('admin.create-call-tagging') }}";
            var getCallTaggingList ="{{ route('admin.get-call-tagging-list') }}";
            var callTaggingDetail = "{{ route('admin.call-tagging-detail', ['id' => ':id']) }}";
            var deleteCallTagging = "{{ route('admin.delete-call-tagging') }}";
            var addComments = "{{ route('admin.add-comments') }}";
            var updateCallTagging = "{{ route('admin.update-call-tagging') }}";
        </script>
    @else
        <script>
            var getAllCallLeads = "{{ route('employee.get-call-leads') }}";
            var getUsers =  "{{ route('employee.get-users') }}";
            var createCallTagging =  "{{ route('employee.create-call-tagging') }}";
            var getCallTaggingList ="{{ route('employee.get-call-tagging-list') }}";
            var callTaggingDetail = "{{ route('employee.call-tagging-detail', ['id' => ':id']) }}";
            var deleteCallTagging = "{{ route('employee.delete-call-tagging') }}";
            var addComments = "{{ route('employee.add-comments') }}";
            var updateCallTagging = "{{ route('employee.update-call-tagging') }}";
        </script>
    @endif
    <script>
        window.canEdit = @json(Auth::user()->can('access-permission', ['Call Tagging', 'edit']));
        window.canDelete = @json(Auth::user()->can('access-permission', ['Call Tagging', 'delete']));
        window.canView = @json(Auth::user()->can('access-permission', ['Call Tagging', 'view']));
    </script>
    <script>
        var leadsList = [];
        function lead_or_other(value) {
            $('#name').prop('disabled', true);
            $('#phone').prop('disabled', true);
            $('#email').prop('disabled', true);
            if (value == 'lead') {
                $('#leadList').show();
                $.ajax({
                    url: getAllCallLeads, // The route you defined
                    type: 'GET',
                    success: function(response) {
                        $('#leadsDropdown').html('');
                        var lead = response.leads;
                        leadsList = lead
                        // Populate the select dropdown
                        var select = $('#leadsDropdown');
                        select.append('<option value="">Choose</option>');
                        lead.forEach(function(user) {
                            select.append('<option value="' + user.id + '">' + user.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching users:', xhr);
                    }
                });
            } else {
                $('#leadList').hide();
                // Enable the input fields
                $('#name').prop('disabled', false);
                $('#phone').prop('disabled', false);
                $('#email').prop('disabled', false);
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
            }
        }

        function changeUserType() {
            $('#name').prop('disabled', true);
            $('#phone').prop('disabled', true);
            $('#email').prop('disabled', true);

            $('#type').val();

            $('#usersDropdown').html('');
            // Populate the select dropdown
            var select = $('#usersDropdown');
            select.append('<option value="">Choose</option>');
        }
        
        var userList = []; // Array to store user data
        function getUsers(type) {
            $('#name').prop('disabled', true);
            $('#phone').prop('disabled', true);
            $('#email').prop('disabled', true);

            $('#leadList').hide();
            var userType = $('#user_type').val();
            if (userType == '') {
                CallMesssage('error', 'First Choose User Type!');
                $('#type').val('');
                return false;
            }
            if (type == 'new') {
                $("#userList").hide();
                $("#userListSelect").show();

            } else {
                $("#userList").show();
                $("#userListSelect").hide();
                $.ajax({
                    url: getUsers, // The route you defined
                    type: 'GET',
                    data: {
                        'user_type': userType
                    },
                    success: function(response) {
                        $('#usersDropdown').html('');
                        var users = response.user;
                        userList = users; // Store users in global variable
                        // Populate the select dropdown
                        var select = $('#usersDropdown');
                        select.append('<option value="">Choose</option>');
                        users.forEach(function(user) {
                            select.append('<option value="' + user.id + '">' + user.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching users:', xhr);
                    }
                });
            }
        }
    </script>
    <script>
        var editLeadsList = [];
        function edit_lead_or_other(value) {
            $('#editName').prop('disabled', true);
            $('#editPhone').prop('disabled', true);
            $('#editEmail').prop('disabled', true);
            if (value == 'lead') {
                $('#editLeadList').show();
                $.ajax({
                    url: getAllCallLeads, // The route you defined
                    type: 'GET',
                    success: function(response) {
                        $('#editLeadsDropdown').html('');
                        var lead = response.leads;
                        editLeadsList = lead
                        // Populate the select dropdown
                        var select = $('#editLeadsDropdown');
                        select.append('<option value="">Choose</option>');
                        lead.forEach(function(user) {
                            select.append('<option value="' + user.id + '">' + user.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching users:', xhr);
                    }
                });
            } else {
                $('#editLeadList').hide();
                // Enable the input fields
                $('#editName').prop('disabled', false);
                $('#editPhone').prop('disabled', false);
                $('#editEmail').prop('disabled', false);
                $('#editName').val('');
                $('#editPhone').val('');
                $('#editEmail').val('');
            }
        }
        function editChangeUserType() {
            $('#editName').prop('disabled', true);
            $('#editPhone').prop('disabled', true);
            $('#editEmail').prop('disabled', true);

            $('#edit_type').val();

            $('#editUsersDropdown').html('');
            // Populate the select dropdown
            var select = $('#editUsersDropdown');
            select.append('<option value="">Choose</option>');
        }
        var editUserList = []; // Array to store user data
        function editGetUsers(type) {
            $('#editName').prop('disabled', true);
            $('#editPhone').prop('disabled', true);
            $('#editEmail').prop('disabled', true);

            $('#editLeadList').hide();
            var userType = $('#edit_user_type').val();
            if (userType == '') {
                CallMesssage('error', 'First Choose User Type!');
                $('#edit_type').val('');
                return false;
            }
            if (type == 'new') {
                $("#editUserList").hide();
                $("#editUserListSelect").show();

            } else {
                $("#editUserList").show();
                $("#editUserListSelect").hide();
                $.ajax({
                    url: getUsers, // The route you defined
                    type: 'GET',
                    data: {
                        'user_type': userType
                    },
                    success: function(response) {
                        $('#editUsersDropdown').html('');
                        var users = response.user;
                        editUserList = users; // Store users in global variable
                        // Populate the select dropdown
                        var select = $('#editUsersDropdown');
                        select.append('<option value="">Choose</option>');
                        users.forEach(function(user) {
                            select.append('<option value="' + user.id + '">' + user.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching users:', xhr);
                    }
                });
            }
        }
    </script>
    <script>
        // Add change event listener
        $(document).ready(function() {
            $('#usersDropdown').on('change', getUserData);
        });
        // Function to handle dropdown selection
        function getUserData() {
            var userId = $('#usersDropdown').val();
            if (userId) {
                // Find the selected user by ID from the userList array
                var selectedUser = userList.find(user => user.id == userId);
                if (selectedUser) {
                    $('#name').val(selectedUser.name);
                    $('#email').val(selectedUser.email);
                    $('#phone').val(selectedUser.phone);
                    // Use the selectedUser data as needed
                }
            }
        }
    </script>
    <script>
        // Add change event listener
        $(document).ready(function() {
            $('#editUsersDropdown').on('change', editGetUserData);
        });
        // Function to handle dropdown selection
        function editGetUserData() {
            var userId = $('#editUsersDropdown').val();            
            if (userId) {
                // Find the selected user by ID from the userList array
                var selectedUser = editUserList.find(user => user.id == userId);
                if (selectedUser) {
                    $('#editName').val(selectedUser.name);
                    $('#editEmail').val(selectedUser.email);
                    $('#editPhone').val(selectedUser.phone);
                    // Use the selectedUser data as needed
                }
            }
        }
    </script>
    <script>
        // Add change event listener
        $(document).ready(function() {
            $('#leadsDropdown').on('change', getLeadsData);
        });
        // Function to handle dropdown selection
        function getLeadsData() {
            var userId = $('#leadsDropdown').val();
            if (userId) {
                // Find the selected user by ID from the userList array
                var selectedUser = leadsList.find(user => user.id == userId);
                if (selectedUser) {
                    $('#name').val(selectedUser.name);
                    $('#email').val(selectedUser.email);
                    $('#phone').val(selectedUser.phone);
                    // Use the selectedUser data as needed
                }
            }
        }
    </script>
    <script>
        // Add change event listener
        $(document).ready(function() {
            $('#editLeadsDropdown').on('change', editGetLeadsData);
        });
        // Function to handle dropdown selection
        function editGetLeadsData() {
            var userId = $('#editLeadsDropdown').val();
            if (userId) {
                // Find the selected user by ID from the userList array
                var selectedUser = editLeadsList.find(user => user.id == userId);
                if (selectedUser) {
                    $('#editName').val(selectedUser.name);
                    $('#editEmail').val(selectedUser.email);
                    $('#editPhone').val(selectedUser.phone);
                    // Use the selectedUser data as needed
                }
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#callTaggingForm").validate({
                rules: {
                    user_type: {
                        required: true
                    }
                },
                messages: {
                    user_type: {
                        required: "This field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#callTaggingSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: createCallTagging,
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close').click();
                                // Reset the form
                                $('#callTaggingForm')[0].reset();
                                $('#callTaggingSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#call_tagging_list').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#callTaggingSubmitButton').prop('disabled', false);
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
        $(document).ready(function() {
            if ($('#call_tagging_list').length > 0) {
                $('#call_tagging_list').DataTable({
                    "bFilter": false,
                    "bInfo": false,
                    "ordering": true,
                    "autoWidth": true,
                    "autoWidth": true,
                    "ajax": {
                        url: getCallTaggingList,
                        type: "get",
                        "data": function(d) {
                            // Add custom parameters to the request
                            d.name = $('#custom-search').val(); // Add search value
                            d.sortOrder = window.sortOrder; // Add sort order
                            d.startDate = $('.bookingrange').data('daterangepicker').startDate.format(
                                'YYYY-MM-DD'); // Start date
                            d.endDate = $('.bookingrange').data('daterangepicker').endDate.format(
                                'YYYY-MM-DD'); // End date    

                            // Get the value of the selected radio button
                            var status = $('input[name="search_status"]:checked').val();
                            d.status = status;
                        }
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
                            "data": null,
                            "title": "ID",
                            "orderable": false
                        },
                        {
                            "render": function(data, type, row) {
                                var Preview = callTaggingDetail.replace(':id', row.id); 
                                return '<a href="'+ Preview +'" class="title-name">' + row['name'] +'</a>';
                            }
                        },
                        {
                            "data": "email"
                        },
                        {
                            "data": "phone"
                        },
                        {
                            "data": "user_type"
                        },
                        {
                            "render": function(data, type, row) {
                                return row['visa_type'] ?? '-'
                            }
                        },
                        {
                            "render": function(data, type, row) {
                                if (row['status'] == "0") {
                                    var class_name = "bg-info";
                                    var status_name = "Pending"
                                } else if (row['status'] == "1") {
                                    var class_name = "bg-info";
                                    var status_name = "Query in-review"
                                } else if (row['status'] == "2") {
                                    var class_name = "bg-success";
                                    var status_name = "Query Resolve/Closed"
                                } else if (row['status'] == "3") {
                                    var class_name = "bg-success";
                                    var status_name = "Talk to client/closed"
                                } else if (row['status'] == "4") {
                                    var class_name = "bg-danger";
                                    var status_name = "Not Reachable"
                                } else if (row['status'] == "5") {
                                    var class_name = "bg-danger";
                                    var status_name = "Busy"
                                } else if (row['status'] == "6") {
                                    var class_name = "bg-success";
                                    var status_name = "Contacted"
                                } else if (row['status'] == "7") {
                                    var class_name = "bg-success";
                                    var status_name = "Not Interested"
                                } else if (row['status'] == "8") {
                                    var class_name = "bg-warning";
                                    var status_name = "Potential Client"
                                } else if (row['status'] == "9") {
                                    var class_name = "bg-success";
                                    var status_name = "Appointment Schedule"
                                } else if (row['status'] == "10") {
                                    var class_name = "bg-info";
                                    var status_name = "Query in progress/Accelated"
                                }
                                return '<span class="badge badge-pill badge-status ' + class_name +
                                    '" >' +
                                    status_name + '</span>';
                            }
                        },
						{
							"render": function(data, type, row) {
                                return  window.canEdit ? '<a class="dropdown-item" style="background-color: rgba(228, 31, 7, 0.05); color:red;" href="#" data-bs-toggle="modal" onclick="commentClick('+row.id+')" data-bs-target="#comment_contact">Comment</a>' : '-';
                                // return ;
                            }
						},
                        {
                            "data": "call_back_date"
                        },
                        {
                            "render": function(data, type, row) {
                                return '<span class="title-name">' + row['created'] + '</span>';
                            }
                        },
                        {
                            "render": function(data, type, row) {                                
                                var ID = row['id'];
                                var Name = row['name'];
                                var Email = row['email'];
                                var Phone = row['phone'];
                                var Visa_type = row['visa_type'];
                                var client_query = row['client_query'];
                                var call_back_date = row['call_back_date'];
                                var user_type = row['user_type'];
                                var type = row['type'];
                                var status = row['status'];
                                var lead_other = row['lead_other'];
                                var Preview = callTaggingDetail.replace(':id', ID); 
                                var canEditt = window.canEdit ?`<a class="dropdown-item" onclick="getEditTagging('${ID}','${Name}','${Email}','${Phone}', '${Visa_type}', '${client_query}', '${call_back_date}','${user_type}', '${type}', '${status}','${lead_other}')" href="#">
                                                        <i class="ti ti-edit text-blue"></i> Edit
                                            </a>` : '';
                                var canDeletee = window.canDelete ? `<a class="dropdown-item" href="#" data-bs-toggle="modal" onclick="deleteCallTagging('${ID}')" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>`:'';
                                var canPrevieww = window.canView ? `<a class="dropdown-item" href="${Preview}"><i class="ti ti-eye text-blue"></i> Preview</a>` : '';
                            return `<div class="dropdown table-action">
                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            ${canEditt}
                                            ${canDeletee}
                                            ${canPrevieww}
                                        </div>
                                    </div>`;
                            }
                        }
                    ],
                    "drawCallback": function(settings) {
                        var api = this.api();
                        api.column(0, {
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }
                });
                // Event listener for the search input
                $('#custom-search').on('keyup', function() {
                    $('#call_tagging_list').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });
                // Event listener for the search input
                $('#searchByDate').on('change', function() {
                    $('#call_tagging_list').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });

                $('#searchByStatus').on('click', function() {
                    $('#call_tagging_list').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });
                // Default sorting order
                window.sortOrder = 'desc'; // Default to ascending

                $('#searchByAsc').click(function() {
                    window.sortOrder = 'asc';
                    $('#call_tagging_list').DataTable().ajax.reload();
                });

                $('#searchByDesc').click(function() {
                    window.sortOrder = 'desc';
                    $('#call_tagging_list').DataTable().ajax.reload();
                });
            }
        });
    </script>
    <script>
        function getEditTagging(id,name,email,phone,visa_type,client_query,call_back_date,user_type,type,status,lead_other)
        {
            $('#editLink').click();

            $('#edit_id').val(id);
            $('#edit_client_query').val(client_query);
            $('#call_back_date').val(call_back_date);
            $('#editName').val(name);
            $('#editEmail').val(email);
            $('#editPhone').val(phone);
            $('#visa_type').val(visa_type);
            $('#edit_user_type').val(user_type);

            $('#edit_status').val(status).trigger('change');
            $('#edit_user_type').val(user_type).trigger('change');
            $('#edit_type').val(type).trigger('change');
            $('.lead_other').val(lead_other).trigger('change');

        }
    </script>
    <script>
        function deleteCallTagging(id) {
            $('#callTaggingDeleteId').val(id)
        }

        function deleteCall() {
            $('#deleteButton').prop('disabled', false);
            var id = $('#callTaggingDeleteId').val();
            $.ajax({
                url: deleteCallTagging, // The route you defined
                type: 'DELETE', // Use uppercase 'DELETE' for the HTTP method
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the headers
                },
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.status == 'true' || response.status == true) {
                        $('.btn-close').click();
                        CallMesssage('success', response.message);
                        $('#deleteButton').prop('disabled', true);
                        $('#call_tagging_list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#deleteButton').prop('disabled', true);
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching users:', xhr);
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
    <script>
        function commentClick(id)
        {
            $('#commentId').val(id);
        }
    </script>
    <script>
         $(document).ready(function() {
            $("#commentForm").validate({
                rules: {
                    comments: {
                        required: true
                    }
                },
                messages: {
                    comments: {
                        required: "This field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#commentFormButton').prop('disabled', true);
                    $.ajax({
                        url: addComments,
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.btn-close').click();
                                // Reset the form
                                $('#commentForm')[0].reset();
                                $('#commentFormButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#call_tagging_list').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#commentFormButton').prop('disabled', false);
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
        $(document).ready(function() {
            $("#editCallTaggingForm").validate({
                rules: {
                    user_type: {
                        required: true
                    }
                },
                messages: {
                    user_type: {
                        required: "This field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#editCallTaggingSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: updateCallTagging,
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close1').click();
                                // Reset the form
                                $('#editCallTaggingForm')[0].reset();
                                $('#editCallTaggingSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#call_tagging_list').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#editCallTaggingSubmitButton').prop('disabled', false);
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
@endpush
