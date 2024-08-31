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
                                <h4 class="page-title">Lmia Request</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('admin.lmia-request') }}" data-bs-toggle="tooltip"
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
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('admin.apply-for-an-lmia') }}"
                                                        class="btn btn-primary"><i
                                                            class="ti ti-square-rounded-plus"></i>Apply For An Lmia</a>
                                                    <a href="javascript:void(0);" style="display: none"
                                                        class="btn btn-primary add-popup"><i
                                                            class="ti ti-square-rounded-plus"></i>Add User</a>
                                                    <a class="btn btn-primary change-status" style="display: none"
                                                        href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#user-profile-new">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
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
                                                                        aria-expanded="false"
                                                                        aria-controls="Status">Status</a>
                                                                </div>
                                                                <div class="filter-set-contents accordion-collapse collapse"
                                                                    id="Status" data-bs-parent="#accordionExample">
                                                                    <div class="filter-content-list">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            name="status[]" value="100"
                                                                                            checked>
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
                                                                                        <input type="radio"
                                                                                            name="status[]"
                                                                                            value="0">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Pending</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input type="radio"
                                                                                            name="status[]"
                                                                                            value="1">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Accept</h5>
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

                            <!-- Contact List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="companieslist">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Change Status</th>
                                            <th>Assign Employees</th>
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

    <!-- Delete Company -->
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
                        <h3>Remove Companies?</h3>
                        <p class="del-info">Company ”NovaWaveLLC” from your Account.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <a href="companies.html" class="btn btn-danger">Yes, Delete it</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Company -->
    </div>
    <!-- /Main Wrapper -->

    <a href="javascript:void(0);" class="btn btn-primary add-popup"><i class="ti ti-square-rounded-plus"></i>Add User</a>

    <!-- Add User -->
    <div class="toggle-popup" id="userPopup">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Assign Employee</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="AssignEmployee">
                        @csrf
                        <div class="accordion-lists" id="list-accord">
                            <!-- Basic Info -->
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <div class="row">
                                        <input type="hidden" name="id" id="lmiaId">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Job Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="job_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Vacancies <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="vacancies" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Mininum education requirement <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <input type="text" name="mininum_education_requirement"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Mininum experience requirement<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="mininum_experience_requirement"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Expected File Submission Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"></span>
                                                    <input type="date" name="expected_file_submission_date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Final Submission Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"></span>
                                                    <input type="date" name="final_submission_date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> File assign to employee <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="file_assign_to_employee">
                                                    <option value="">-Select-</option>
                                                    @if (isset($UserData) && count($UserData) > 0)
                                                        @foreach ($UserData as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                                {{ $item->last_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Job Location <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="job_location">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Required Language<span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="language">
                                                    <option value="English">English</option>
                                                    <option value="French">French</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Description <span
                                                        class="text-danger">*</span></label>
                                                <div class="icon-form-end">
                                                    <span class="form-icon"></span>
                                                    <textarea class="form-control" name="description" id="description" cols="3" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button type="submit" id="assignEmployeeSubmitButton"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add User -->
    <!-- details popup -->
    <div class="modal fade" id="user-profile-new">
        <div class="modal-dialog history-modal-profile">
            <div class="modal-content">
                <div class="page-wrapper details-blk">
                     <h3>Interview Schedule</h3>
                    <div class="content">
                        <form id="InterviewScheduleForm">
                            @csrf
                            <div class="modal-profile-detail">
                                <div class="row">
                                    <input type="hidden" name="id" id="lmiaIdForInterviewSechule">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Date Time <span class="text-danger">*</span></label>
                                            <input type="datetime-local" id="datetime" class="form-control" name="interview_date_time">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-button text-end">
                                <button type="submit" id="InterviewSchuleSubmitButton"
                                    class="btn btn-primary">Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /details popup -->
    <!-- details popup -->
    <div class="modal fade" id="user-profile-new-two">
        <div class="modal-dialog history-modal-profile">
            <div class="modal-content">
                <div class="page-wrapper details-blk">
                     <h3>LMIA Approved</h3>
                    <div class="content">
                        <form id="LmiaApproved">
                            @csrf
                            <div class="modal-profile-detail">
                                <div class="row">
                                    <input type="hidden" name="id" id="lmiaIdForApproved">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Date of approval <span class="text-danger">*</span></label>
                                            <input type="date" required class="form-control" name="date_of_approval">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Date of expiry <span class="text-danger">*</span></label>
                                            <input type="date" required class="form-control" name="date_of_expiry">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Number of LMIA <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" name="number_of_lmia">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-button text-end">
                                <button type="submit" id="LmiaApprovedSubmitButton"
                                    class="btn btn-primary">Approved</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /details popup -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Companies List
            if ($('#companieslist').length > 0) {
                $('#companieslist').DataTable({
                    "bFilter": false,
                    "bInfo": false,
                    "autoWidth": true,
                    "ajax": {
                        "url": "{{ route('admin.get-list-of-lmias') }}", // Endpoint to fetch company data
                        "type": "GET",
                        "data": function(d) {
                            d.sortOrder = window.sortOrder; // Add sort order
                            d.startDate = $('.bookingrange').data('daterangepicker').startDate.format(
                                'YYYY-MM-DD'); // Start date
                            d.endDate = $('.bookingrange').data('daterangepicker').endDate.format(
                                'YYYY-MM-DD'); // End date    

                            var statuses = [];
                            $('input[name="status[]"]:checked').each(function() {
                                statuses.push($(this).val());
                            });
                            d.statuses = statuses;
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
                                var lmiaDetail = "{{ route('admin.lmia-detail', ['id' => '__ID__']) }}".replace('__ID__', row.id);
                                return '<a href="'+lmiaDetail+'">'+ row['name'] +' </a>';
                                // return row['name'];
                            }
                        },
                        {
                            "render": function(data, type, row) {
                                // return row['email'];
                                var lmiaDetail = "{{ route('admin.lmia-detail', ['id' => '__ID__']) }}".replace('__ID__', row.id);
                                return '<a href="'+lmiaDetail+'">'+ row['email'] +' </a>';

                            }
                        },
                        {
                            "render": function(data, type, row) {
                                return row['company_legel_name'];
                            }
                        },
                        {
                            "data": "created"
                        },
                        {
                            "render": function(data, type, row) {
                                if (row['status'] == "0") {
                                    var class_name = "bg-warning";
                                    var status_name = "Pending"
                                } else if (row['status'] == "1") {
                                    var class_name = "bg-success";
                                    var status_name = "Approved"
                                } else {
                                    var class_name = "bg-danger";
                                    var status_name = "Inactive"
                                }
                                return '<span class="badge badge-pill badge-status ' + class_name +
                                    '" >' +
                                    status_name + '</span>';
                            }
                        },
                        {
                            "render": function(data, type, row) {
                                var lmiaDetail =
                                    "{{ route('employer.lmia-detail', ['id' => '__ID__']) }}"
                                    .replace('__ID__', row.id);
                                var ID = row.id;
                                // return `<div class="dropdown table-action">
                                //             <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                //             <div class="dropdown-menu dropdown-menu-right">
                                //                 <a class="dropdown-item" onclick="changeStatus('1', '${ID}')" href="javascript:void(0);">1. Request received and approved</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('2', '${ID}')" href="javascript:void(0);">2. LMIA submitted</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('3', '${ID}')" href="javascript:void(0);">3. Payment deducted</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('4', '${ID}')" href="javascript:void(0);">4. Queued for assessment</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('5', '${ID}')" href="javascript:void(0);">5. LMIA assigned to the LMIA officer and assessment in progress</a>
                                //                 <a class="dropdown-item" onclick="InterViewSchedule('6', '${ID}')" href="javascript:void(0);">6. Interview Schedule</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('7', '${ID}')" href="javascript:void(0);">7. LMIA officer requested information/documents</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('8', '${ID}')" href="javascript:void(0);">8. LMIA process started, and job vacancy advertised</a>
                                //                 <a class="dropdown-item" onclick="changeStatus('9', '${ID}')" href="javascript:void(0);">9. Other</a>
                                //                 <a class="dropdown-item" onclick="InterViewSchedule('10', '${ID}')" href="javascript:void(0);">10. LMIA Approved</a>
                                //             </div>
                                //         </div>`;
                                return `<div class="dropdown table-action">
                                            <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" onclick="changeStatus('1', '${ID}')" href="javascript:void(0);">1. Request received and approved</a>
                                                <a class="dropdown-item" onclick="InterViewSchedule('11', '${ID}')" href="javascript:void(0);">2. LMIA Denied</a>
                                            </div>
                                        </div>`;
                            }
                        },
                        {
                            "render": function(data, type, row) {
                                var employeeList = '';
                                var data = row['EmployesData'];
                                var number = 1; // Initialize the number outside the loop
                                data.forEach(element => {
                                    employeeList +=
                                        '<a class="dropdown-item" href="javascript:void(0);">' +
                                        number + '. ' + element.name + ' ' + element
                                        .last_name + '</a>';
                                    number++;
                                });
                                var ID = row.id;
                                if (row['status'] == "1") {
                                    return `<div class="dropdown table-action">
                                            <a href="#" class="btn btn-primary" onclick="assignEmployees('${ID}')">Assign Employee</a></div>`;
                                } else {
                                    return '-';
                                }

                            }
                        },
                        {
                            "render": function(data, type, row) {
                                var lmiaDetail =
                                    "{{ route('admin.lmia-detail', ['id' => '__ID__']) }}"
                                    .replace('__ID__', row.id);
                                return '<div class="dropdown table-action"><a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="' +
                                    lmiaDetail +
                                    '"><i class="ti ti-eye text-blue-light"></i> Preview</a></div></div>';
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
                window.sortOrder = 'desc'; // Default to ascending

                $('#searchByAsc').click(function() {
                    window.sortOrder = 'asc';
                    $('#companieslist').DataTable().ajax.reload();
                });

                $('#searchByDesc').click(function() {
                    window.sortOrder = 'desc';
                    $('#companieslist').DataTable().ajax.reload();
                });

                // Event listener for the search input
                $('#searchByDate').on('change', function() {
                    $('#companieslist').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });
                $('#searchByStatus').on('click', function() {
                    $('#companieslist').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                    $('.filter-dropdown-menu').removeClass('show');
                });
            }
        })
    </script>
    <script>
        function changeStatus(status, id) {
            $.ajax({
                url: "{{ route('admin.change-lmia-status') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    if (response.status == true) {
                        CallMesssage('success', response.message);
                        $('#companieslist').DataTable().ajax
                            .reload(); // Reload table data with new search parameter
                    } else {
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
    </script>
    <script>
        $(document).ready(function() {
            $("#AssignEmployee").validate({
                rules: {
                    job_title: {
                        required: true
                    },
                    // file_assign_to_employee: {
                    //     required: true
                    // }
                },
                messages: {
                    job_title: {
                        required: "This field is required.",
                    },
                    // file_assign_to_employee: {
                    //     required: "This field is required.",
                    // }
                },
                submitHandler: function(form) {
                    $('#assignEmployeeSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.lmia-assign-employee') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close').click();
                                // Reset the form
                                $('#AssignEmployee')[0].reset();
                                $('#assignEmployeeSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#companieslist').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#assignEmployeeSubmitButton').prop('disabled', false);
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
    <script>
        function assignEmployees(id) {
            $('.add-popup').click();
            $('#lmiaId').val(id)
        }
    </script>
    <script>
        function InterViewSchedule(status, id) {
            if(status == 6 || status === '6'){
                // this is for Interview schedule
                $('#lmiaIdForInterviewSechule').val(id);
                $('#user-profile-new').modal('show');
            }else{
                // this is for lmia approval
                $('#lmiaIdForApproved').val(id);
                $('#user-profile-new-two').modal('show');
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#LmiaApproved").validate({
                rules: {
                    date_of_expiry: {
                        required: true
                    },
                    date_of_approval: {
                        required: true
                    },
                    number_of_lmia: {
                        required: true
                    }
                },
                messages: {
                    date_of_expiry: {
                        required: "This field is required.",
                    },
                    date_of_approval: {
                        required: "This field is required.",
                    },
                    number_of_lmia: {
                        required: "This field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#LmiaApprovedSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.lmia-approved') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                // $('.sidebar-close').click();
                                $('#user-profile-new-two').modal('hide');

                                // Reset the form
                                $('#LmiaApproved')[0].reset();
                                $('#LmiaApprovedSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#companieslist').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#LmiaApprovedSubmitButton').prop('disabled', false);
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
            $("#InterviewScheduleForm").validate({
                rules: {
                    interview_date_time: {
                        required: true
                    }
                },
                messages: {
                    interview_date_time: {
                        required: "This field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#InterviewSchuleSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.lmia-interview-schedule') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                // $('.sidebar-close').click();
                                $('#user-profile-new').modal('hide');

                                // Reset the form
                                $('#InterviewScheduleForm')[0].reset();
                                $('#InterviewSchuleSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                $('#companieslist').DataTable().ajax.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#InterviewSchuleSubmitButton').prop('disabled', false);
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
