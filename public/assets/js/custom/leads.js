$(document).ready(function() {
    if ($('#leads_list').length > 0) {
        $('#leads_list').DataTable({
            "bFilter": false,
            "bInfo": false,
            "ordering": true,
            "autoWidth": true,
            "autoWidth": true,
            "ajax": {
                url: getLeadUrl,
                type: "get",
                "data": function(d) {
                    // Add custom parameters to the request
                    d.name = $('#custom-search').val(); // Add search value
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
                        return '<a href="#" class="title-name">' + row['name'] +
                            '</a>';
                    }
                },
                {
                    "data": "phone"
                },
                {
                    "data": "email"
                },
                {
                    "data": "visa_type"
                },
                {
                    "data": "location"
                },
                {
                    "data": "lead_source"
                },
                {
                    "render": function(data, type, row) {
                        if (row['status'] == "0") {
                            var class_name = "bg-success";
                            var status_name = "Not Called"
                        } else if (row['status'] == "1") {
                            var class_name = "bg-success";
                            var status_name = "Not Received"
                        } else if (row['status'] == "2") {
                            var class_name = "bg-success";
                            var status_name = "Not Interested"
                        } else if (row['status'] == "3") {
                            var class_name = "bg-success";
                            var status_name = "Call Back"
                        } else if (row['status'] == "4") {
                            var class_name = "bg-success";
                            var status_name = "Interested"
                        } else if (row['status'] == "5") {
                            var class_name = "bg-success";
                            var status_name = "Followed"
                        } else if (row['status'] == "6") {
                            var class_name = "bg-success";
                            var status_name = "Subcribred"
                        } else if (row['status'] == "7") {
                            var class_name = "bg-success";
                            var status_name = "Convent Into Client"
                        } else {
                            var class_name = "bg-success";
                            var status_name = "Nothing"
                        }
                        return '<span class="badge badge-pill badge-status ' + class_name +
                            '" >' +
                            status_name + '</span>';
                    }
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
                        var Location = row['location'];
                        var Visa_type = row['visa_type'];
                        var Is_active = row['is_active'];
                        var Lead_source = row['lead_source'];
                        var Country = row['country'];
                        var Assign_employee = row['assign_employee'];
                        return `<div class="dropdown table-action"><a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" onclick="getEditLead('${ID}','${Name}','${Email}','${Phone}', '${Location}', '${Visa_type}', '${Is_active}', '${Lead_source}', '${Country}', '${Assign_employee}')" href="#"><i class="ti ti-edit text-blue"></i> Edit</a><a class="dropdown-item" href="#" data-bs-toggle="modal" onclick="deleteLead('${ID}')" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a></div></div>`;
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
            $('#leads_list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });
        // Event listener for the search input
        $('#searchByDate').on('change', function() {
            $('#leads_list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });

        $('#searchByStatus').on('click', function() {
            $('#leads_list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });
        // Default sorting order
        window.sortOrder = 'asc'; // Default to ascending

        $('#searchByAsc').click(function() {
            window.sortOrder = 'asc';
            $('#leads_list').DataTable().ajax.reload();
        });

        $('#searchByDesc').click(function() {
            window.sortOrder = 'desc';
            $('#leads_list').DataTable().ajax.reload();
        });
    }
});


$(document).ready(function() {
    $("#create-lead").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            phone: {
                required: true
            },
            visa_type: {
                required: true
            },
            location: {
                required: true
            },
            lead_source: {
                required: true
            },
            assign_employee: {
                required: true
            },
            country: {
                required: true
            }
        },
        messages: {
            name: {
                required: "This field is required.",
            },
            email: {
                required: "This field is required.",
            },
            phone: {
                required: "This field is required.",
            },
            visa_type: {
                required: "This field is required.",
            },
            location: {
                required: "This field is required.",
            },
            lead_source: {
                required: "This field is required.",
            },
            assign_employee: {
                required: "This field is required.",
            },
            country: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#leadCreateButton').prop('disabled', true);
            $.ajax({
                url: createLeadUrl,
                method: "POST",
                data: $(form).serialize(),

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.sidebar-close').click();

                        // Reset the form
                        $('#create-lead')[0].reset();
                        $('#leadCreateButton').prop('disabled', false);
                        // Reload the DataTable
                        $('#leads_list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#leadCreateButton').prop('disabled', false);
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


$(document).ready(function() {
    $("#editLead").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            phone: {
                required: true
            },
            visa_type: {
                required: true
            },
            location: {
                required: true
            },
            lead_source: {
                required: true
            },
            assign_employee: {
                required: true
            },
            country: {
                required: true
            }
        },
        messages: {
            name: {
                required: "This field is required.",
            },
            email: {
                required: "This field is required.",
            },
            phone: {
                required: "This field is required.",
            },
            visa_type: {
                required: "This field is required.",
            },
            location: {
                required: "This field is required.",
            },
            lead_source: {
                required: "This field is required.",
            },
            assign_employee: {
                required: "This field is required.",
            },
            country: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#editLeadNButton').prop('disabled', true);
            $.ajax({
                url: editLeadUrl,
                method: "POST",
                data: $(form).serialize(),

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.sidebar-close1').click();
                        // Reset the form
                        $('#editLead')[0].reset();
                        $('#editLeadNButton').prop('disabled', false);
                        // Reload the DataTable
                        $('#leads_list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#editLeadNButton').prop('disabled', false);
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


function getEditLead(id, name, email, phone, location, visa_type, is_active, lead_source, country,
    assign_employee) {
    $('.edit-popup').click();
    $('#leadId').val(id);
    $('#leadName').val(name);
    $('#leadVisaType').val(visa_type);
    $('#leadEmail').val(email);
    $('#leadPhone').val(phone);
    $('#leadLocation').val(location);
    $('#leadCountry').val(country).trigger('change');
    $('#leadAssignEmployee').val(assign_employee).trigger('change');
    $('#leadLeadSource').val(lead_source).trigger('change');

    if (is_active == 1 || is_active == '1') {
        $('#active1').prop('checked', true);
    } else {
        $('#inactive1').prop('checked', true);
    }
}


function deleteLead(id) {
    $('#deleteLeadId').val(id);
}

function deleteLeadOnClick() {
    var id = $('#deleteLeadId').val();
    $('#deleteLeadButton').prop('disabled', true);
    $.ajax({
        url: deleteLeadUrl,
        method: "DELETE",
        data: {
            id: id,
            _token: csrf_token
        },

        success: function(response) {
            if (response.status == true || response.status === 'true') {
                // Show a success message
                CallMesssage('success', response.message);

                $('.btn-close').click();
                $('#deleteLeadButton').prop('disabled', false);
                // Reload the DataTable
                $('#leads_list').DataTable().ajax.reload();
            } else {
                CallMesssage('error', response.message);
                $('#deleteLeadButton').prop('disabled', false);
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