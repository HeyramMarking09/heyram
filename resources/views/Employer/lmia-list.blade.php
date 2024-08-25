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
                            <div class="col-8">
                                <h4 class="page-title">Lmia Request</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('employer.lmia.list') }}" data-bs-toggle="tooltip"
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
                                                    <a href="{{ route('employer.apply-for-an-lmia') }}"
                                                        class="btn btn-primary"><i
                                                            class="ti ti-square-rounded-plus"></i>Apply For An Lmia</a>
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
                                                                                            name="status[]" value="0">
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
                                                                                            name="status[]" value="1">
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
                                            <th>Employee Currenty In Same Occupation</th>
                                            <th>Employee Already Working In The Company</th>
                                            <th>Total Number Of Canadian</th>
                                            <th>Created At</th>
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
                        "url": "{{ route('employer.get-list-of-lmias') }}", // Endpoint to fetch company data
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
                                if (row['employee_currenty_in_same_occupation'] == "0") {
                                    var status_name = "No"
                                } else {
                                    var status_name = "Yes"
                                }
                                return status_name;
                            }
                        },
                        {
                            "render": function(data, type, row) {
                                if (row['employee_already_working_in_the_company'] == "0") {
                                    var status_name = "No"
                                } else {
                                    var status_name = "Yes"
                                }
                                return status_name;
                            }
                        },
                        {
                            "data": "total_number_of_canadian"
                        },
                        {
                            "data": "created"
                        },
                        {
                            "render": function(data, type, row) {
                                if (row['status'] == "0") {
                                    var class_name = "bg-warning";
                                    var status_name = "Pending"
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
                                var lmiaDetail = "{{ route('employer.lmia-detail', ['id' => '__ID__']) }}".replace('__ID__', row.id);
                                return '<div class="dropdown table-action"><a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item edit-popup" href="javascript:void(0);"><i class="ti ti-edit text-blue"></i> Edit</a><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a><a class="dropdown-item" href="' +
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
@endpush
