$(document).ready(function () {
    if ($('#manage-users-list').length > 0) {
        $('#manage-users-list').DataTable({
            "bFilter": false,
            "bInfo": false,
            "ordering": true,
            "autoWidth": true,
            "ajax": {
                "url": getManageUser,
                "type": "GET",
                "data": function (d) {
                    // Add custom parameters to the request
                    d.customer_name = $('#custom-search').val(); // Add search value
                    d.sortOrder = window.sortOrder; // Add sort order
                    d.startDate = $('.bookingrange').data('daterangepicker').startDate.format('YYYY-MM-DD'); // Start date
                    d.endDate = $('.bookingrange').data('daterangepicker').endDate.format('YYYY-MM-DD'); // End date    

                    var statuses = [];
                    $('input[name="status[]"]:checked').each(function () {
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
                "render": function (data, type, row) {
                    // Generate the employer detail URL using the server-side route helper
                    var employerDetail = detailURl;

                    // Replace the placeholder with the actual row ID dynamically in JavaScript
                    employerDetail = employerDetail.replace(':id', row.id);
                    return '<h2 class="table-avatar d-flex align-items-center"><a href="'+employerDetail +'" class="profile-split d-flex flex-column">' +
                        row['customer_name'] + ' <span>' + row['customer_no'] +
                        '</span></a></h2>';
                }
            },
            {
                "data": "phone"
            },
            {
                "data": "email"
            },
            {
                "data": "created"
            },
            {
                "render": function (data, type, row) {
                    var class_name = row['status'] == "1" ? "bg-success" : "bg-danger";
                    var status_name = row['status'] == "1" ? "Active" : "Inactive";
                    return '<span class="badge badge-pill badge-status ' + class_name +
                        '">' + status_name + '</span>';
                }
            },
            {
                "render": function (data, type, row) {
                    // Generate the employer detail URL using the server-side route helper
                    var employerDetail = detailURl;

                    // Replace the placeholder with the actual row ID dynamically in JavaScript
                    employerDetail = employerDetail.replace(':id', row.id);

                    // Build the dropdown menu for table action
                    return '<div class="dropdown table-action"><a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="'+ employerDetail+'"><i class="ti ti-eye text-blue-light"></i> Preview</a></div></div>';
                }
            }
            ],
            "drawCallback": function (settings) {
                var api = this.api();
                api.column(0, {
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }
        });

        // Event listener for the search input
        $('#custom-search').on('keyup', function () {
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });
        // Event listener for the search input
        $('#searchByDate').on('change', function () {
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });

        $('#searchByStatus').on('click', function () {
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });
        // Default sorting order
        window.sortOrder = 'asc'; // Default to ascending

        $('#searchByAsc').click(function () {
            window.sortOrder = 'asc';
            $('#manage-users-list').DataTable().ajax.reload();
        });

        $('#searchByDesc').click(function () {
            window.sortOrder = 'desc';
            $('#manage-users-list').DataTable().ajax.reload();
        });
    }
});

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