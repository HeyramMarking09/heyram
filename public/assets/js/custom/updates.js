$(document).ready(function() {
    $("#create-updates").validate({
        rules: {
            title: {
                required: true
            }
        },
        messages: {
            title: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#create-updates-button').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: createUpdatesUrl,
                method: "POST",
                data: formData,
                contentType: false, // Important for file upload
                processData: false,  // Important for file upload
                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);
                        $('.sidebar-close').click();
                        // Reset the form
                        $('#create-updates')[0].reset();
                        $('#create-updates-button').prop('disabled', false);
                        // Reload the DataTable
                        $('#updates-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#create-updates-button').prop('disabled', false);
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
    $("#update-updates").validate({
        rules: {
            title: {
                required: true
            }
        },
        messages: {
            title: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#update-updates-button').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: updateUpdatesUrl,
                method: "POST",
                data: formData,
                contentType: false, // Important for file upload
                processData: false,  // Important for file upload
                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);
                        $('.sidebar-close1').click();
                        // Reset the form
                        $('#update-updates')[0].reset();
                        $('#update-updates-button').prop('disabled', false);
                        // Reload the DataTable
                        $('#updates-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#update-updates-button').prop('disabled', false);
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
    if ($('#updates-list').length > 0) {
        $('#updates-list').DataTable({
            "bFilter": false,
            "bInfo": false,
            "ordering": true,
            "autoWidth": true,
            "autoWidth": true,
            "ajax": {
                url: getUpdate,
                type: "get",
                "data": function(d) {
                    // Add custom parameters to the request
                    d.name = $('#custom-search').val(); // Add search value
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
                        return '<a href="#" class="title-name">' + row['client_name'] +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var visa_type = row['visa_type']??'-';
                        return '<a href="#" class="title-name">' + visa_type +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var application_number = row['application_number']??'-';
                        return '<a href="#" class="title-name">' + application_number +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var date = row['date']??'-';
                        return '<a href="#" class="title-name">' + date +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        return '<span class="title-name">' + row['created'] + '</span>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        var informed = row['informed'] == '1' ? 'Yes' : "No"; 
                        return '<span class="title-name">' + informed + '</span>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        var ID = row['id'];
                        var date = row['date'];
                        var informed = row['informed'];
                        var application_number = row['application_number'];
                        var client_id = row['client_id'];
                        var visa_type = row['visa_type'];
                        var update = row['update'];
                        var comment = row['comment'];
                        var canEdit = window.canEditUser ? `<a class="dropdown-item" onclick="getEditTeam('${ID}', '${client_id}', '${visa_type}','${application_number}', '${update}' , '${comment}' ,'${date}' ,'${informed}')" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>`:'';
                        var canDelete = window.canDeleteUser ? `<a class="dropdown-item" href="#" data-bs-toggle="modal" onclick="deleteTask('${ID}')" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>`:'';
                        return `<div class="dropdown table-action">
                                    <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        
                                        ${canEdit}
                                        ${canDelete}
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
            $('#updates-list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });
        // Event listener for the search input
        $('#searchByDate').on('change', function() {
            $('#updates-list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });

        // Default sorting order
        window.sortOrder = 'desc'; // Default to ascending

        $('#searchByAsc').click(function() {
            window.sortOrder = 'asc';
            $('#updates-list').DataTable().ajax.reload();
        });

        $('#searchByDesc').click(function() {
            window.sortOrder = 'desc';
            $('#updates-list').DataTable().ajax.reload();
        });
    }
});


function deleteTask(id)
{
    $('#taskId').val(id);
}
function deleteFunction()
{
    var id = $('#taskId').val();
    $('#deleteButtonOfTask').prop('disabled', true);
    $.ajax({
        url: deleteTaskUrl,
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
                $('#deleteButtonOfTask').prop('disabled', false);
                // Reload the DataTable
                $('#updates-list').DataTable().ajax.reload();
            } else {
                CallMesssage('error', response.message);
                $('#deleteButtonOfTask').prop('disabled', false);
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


function getEditTeam(ID,client_id,visa_type,application_number,update,comment,date,informed)
{
    $('.edit-popup').click();
    $('#applicalition-id').val(ID);
    $('#comment').val(comment);
    $('#client_id').val(client_id).trigger('change');
    $('#visa_type').val(visa_type);
    $('#application_number').val(application_number);
    $('#update').val(update);
    $('#date').val(date);
    if(informed === '1' || informed === 1 || informed === true || informed === 'true'){
        $('#active11').attr('checked', 'checked');
    }else{
        $('#inactive11').attr('checked', 'checked');
    }
}


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