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
                            <div class="col-sm-8">
                                <h4 class="page-title">Delete Account Request<span class="count-title">123</span></h4>
                            </div>
                            <div class="col-sm-4 text-sm-end">
                                <div class="head-icons">
                                    <a href="delete-request.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
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
                                        <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" id="custom-search"
                                                placeholder="Search User">
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
                            </div>
                            <!-- /Filter -->

                            <!-- Delete Request List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="delete_request">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Requisition Date</th>
                                            <th>Delete Request Date</th>
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
                            <!-- /Delete Request List -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Delete User -->
    <div class="modal custom-modal fade" id="delete_account">
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
                        <h3>Delete Account Request?</h3>
                        <input type="hidden" id="deleteUserId">
                        <p class="del-info">Are you sure you want to remove it.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button id="deletePermanentUser" class="btn btn-danger">Yes, Delete it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete User -->
    <!-- Delete User -->
    <div class="modal custom-modal fade" id="recover_account">
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
                        <h3>Do you wanna recover this account?</h3>
                        <input type="hidden" id="recoverUserId">
                        <p class="del-info">Are you sure you want to recover it.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button id="RecoverUser" class="btn btn-danger">Yes, Recover it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete User -->


    </div>
    <!-- /Main Wrapper -->
@endsection

@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var csrf_token = "{{ csrf_token() }}";
            var getDeleteRequest = "{{ route('admin.get-delete-request') }}";
            var parmanentDeleteRequest = "{{ route('admin.permanent-delete-request') }}";
            var recoverDeleteRequest  = "{{ route('admin.recover-delete-request') }}";
        </script>
    @else
        <script>
            var csrf_token = "{{ csrf_token() }}";
            var getDeleteRequest = "{{ route('employee.get-delete-request') }}";
            var parmanentDeleteRequest = "{{ route('employee.permanent-delete-request') }}";
            var recoverDeleteRequest  = "{{ route('employee.recover-delete-request') }}";
        </script>
    @endif
    <script>
        window.canDeleteUser = @json(Auth::user()->can('access-permission', ['Delete Request', 'delete']));
        window.canEditUser = @json(Auth::user()->can('access-permission', ['Delete Request', 'edit']));
    </script>

    <script>
        $(document).ready(function() {
            if ($('#delete_request').length > 0) {
                $('#delete_request').DataTable({
                    "bFilter": false,
                    "bInfo": false,
                    "ordering": true,
                    "autoWidth": true,
                    "ajax": {
                        "url": getDeleteRequest,
                        "type": "GET",
                        "data": function(d) {
                            d.customer_name = $('#custom-search').val(); // Add search value
                            d.sortOrder = window.sortOrder; // Add sort order
                            d.startDate = $('.bookingrange').data('daterangepicker').startDate.format(
                                'YYYY-MM-DD'); // Start date
                            d.endDate = $('.bookingrange').data('daterangepicker').endDate.format(
                                'YYYY-MM-DD'); // End date  
                        }
                    },
                    "language": {
                        search: ' ',
                        sLengthMenu: '_MENU_',
                        searchPlaceholder: "Search",
                        info: "_START_ - _END_ of _TOTAL_ items",
                        lengthMenu: "Show _MENU_ entries",
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
                                return '<h2 class="table-avatar d-flex align-items-center"><a href="javascript:void(0);" class="profile-split d-flex flex-column">' +
                                    row['customer_name'] + ' <span>' + row['customer_no'] +
                                    ' </span></a></h2>';
                            }
                        },
                        {
                            "data": "created"
                        },
                        {
                            "data": "delete_request"
                        },
                        {
                            "render": function(data, type, row) {
                                var optionDelete = window.canDeleteUser ? `<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_account" onclick="getDelelePermanent(` +row.id +`)"><i class="ti ti-eye text-blue-light"></i>Permanent Delete</a>` : '';
                                var optionEdit = window.canEditUser ? `<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#recover_account" onclick="getDelelePermanent(` +row.id +`)" ><i class="ti ti-trash text-blue-light"></i>Recover Again</a>` : '';

                                return `<div class="dropdown table-action">
                                            <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                ${optionDelete}
                                                ${optionEdit}
                                            </div>
                                        </div>`;
                            }
                        },
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
                    $('#delete_request').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });
                // Event listener for the search input
                $('#searchByDate').on('change', function() {
                    $('#delete_request').DataTable().ajax
                        .reload(); // Reload table data with new search parameter
                });
                // Default sorting order
                window.sortOrder = 'asc'; // Default to ascending
                $('#searchByAsc').click(function() {
                    window.sortOrder = 'asc';
                    $('#delete_request').DataTable().ajax.reload();
                });

                $('#searchByDesc').click(function() {
                    window.sortOrder = 'desc';
                    $('#delete_request').DataTable().ajax.reload();
                });
            }
        })
    </script>
    <script>
        function getDelelePermanent(id) {
            $("#deleteUserId").val(id);
            $("#recoverUserId").val(id);
        }
        $("#deletePermanentUser").on('click', function() {
            var id = $('#deleteUserId').val();
            $('#deletePermanentUser').prop('disabled', true);
            $.ajax({
                url: parmanentDeleteRequest,
                method: "DELETE",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.btn-close').click();
                        $('#deletePermanentUser').prop('disabled', false);
                        // Reload the DataTable
                        $('#delete_request').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#deletePermanentUser').prop('disabled', false);
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
        })
        $("#RecoverUser").on('click', function() {
            var id = $('#recoverUserId').val();
            $('#RecoverUser').prop('disabled', true);
            $.ajax({
                url: recoverDeleteRequest,
                method: "DELETE",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.btn-close').click();
                        $('#RecoverUser').prop('disabled', false);
                        // Reload the DataTable
                        $('#delete_request').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#RecoverUser').prop('disabled', false);
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
        })

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
