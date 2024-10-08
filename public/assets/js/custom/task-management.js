$(document).ready(function() {
    if ($('#task-management-list').length > 0) {
        $('#task-management-list').DataTable({
            "bFilter": false,
            "bInfo": false,
            "ordering": true,
            "autoWidth": true,
            "autoWidth": true,
            "ajax": {
                url: getTaskManagement,
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
                        return '<a href="#" class="title-name">' + row['title'] +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var category = row['category']??'-';
                        return '<a href="#" class="title-name">' + category +
                            '</a>';
                    }
                },
                {
                    "data": "client_name"
                },
                {
                    "render": function(data, type, row) {
                            var responsible_person = row['responsible_person']??'-';
                        return '<a href="#" class="title-name">' + responsible_person +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var start_date = row['start_date']??'-';
                        return '<a href="#" class="title-name">' + start_date +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                            var due_date = row['due_date']??'-';
                        return '<a href="#" class="title-name">' + due_date +
                            '</a>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        if (row['status'] == "completed") {
                            var class_name = "bg-success";
                            var status_name = "Completed"
                        } else if (row['status'] == "work started") {
                            var class_name = "bg-pending";
                            var status_name = "work started"
                        } else if (row['status'] == "pending") {
                            var class_name = "bg-wasring";
                            var status_name = "Pending"
                        }else if (row['status'] == "in progress") {
                            var class_name = "bg-warning";
                            var status_name = "In Progress"
                        } else {
                            var class_name = "";
                            var status_name = "-"
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
                        var type_of_service = row['type_of_service']??'-'
                        return '<span class="title-name">' + type_of_service + '</span>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        var priority = row['priority']??"-";
                        return '<span class="title-name">' + priority + '</span>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        var ID = row['id'];
                        var title = row['title'];
                        var category = row['category']??'';
                        var responsible_person = row['responsible_person']??"";
                        var start_date = row['start_date']??"";
                        var due_date = row['due_date'];
                        var client_name = row['client_name']??"";
                        var type_of_service = row['type_of_service']??"";
                        var status = row['status']??"";
                        var priority = row['priority']??'';
                        var description = row['description'];
                        var file_download = row['file_download']??'';
                        var canEdit = window.canEditUser ? `<a class="dropdown-item" onclick="getEditTeam('${ID}','${title}','${category}', '${responsible_person}', '${client_name}', '${start_date}', '${due_date}', '${type_of_service}', '${status}', '${priority}', '${description}', '${file_download}')" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>`:'';
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
            $('#task-management-list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });
        // Event listener for the search input
        $('#searchByDate').on('change', function() {
            $('#task-management-list').DataTable().ajax
                .reload(); // Reload table data with new search parameter
        });

        // Default sorting order
        window.sortOrder = 'desc'; // Default to ascending

        $('#searchByAsc').click(function() {
            window.sortOrder = 'asc';
            $('#task-management-list').DataTable().ajax.reload();
        });

        $('#searchByDesc').click(function() {
            window.sortOrder = 'desc';
            $('#task-management-list').DataTable().ajax.reload();
        });
    }
});




$(document).ready(function() {
    $("#create-task-management").validate({
        rules: {
            title: {
                required: true
            },
            client_name: {
                required: true
            },
            due_date: {
                required: true
            }
        },
        messages: {
            title: {
                required: "This field is required.",
            },
            client_name: {
                required: "This field is required.",
            },
            due_date: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#create-task-management-button').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: createTaskManagement,
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
                        $('#create-task-management')[0].reset();
                        $('#create-task-management-button').prop('disabled', false);
                        // Reload the DataTable
                        $('#task-management-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#create-task-management-button').prop('disabled', false);
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
                $('#task-management-list').DataTable().ajax.reload();
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
function getEditTeam(id, title, category, responsible_person,client_name, start_date, due_date,type_of_service,status,priority,description,file)
{

    $('.edit-popup').click();
    
    $('#task-id').val(id);
    $('#title-edit').val(title);
    $('#category-edit').val(category).trigger('change');
    $('#client_name-edit').val(client_name);
    $('#responsible_person-edit').val(responsible_person).trigger('change');
    $('#start_date-edit').val(start_date);
    $('#due_date-edit').val(due_date);
    $('#type_of_service-edit').val(type_of_service);
    $('#status-edit').val(status).trigger('change');
    $('#priority-edit').val(priority).trigger('change');
    $('#description-edit').val(description);
    
    // $('#downloadFile').attr('href', file_download);
    // Append the filename to the base download URL
    $("#showDownload").hide();
    if (file !== 'null' && file !== null && file !== '') {
        $("#showDownload").show();
        var file_download = downloadUrl.replace(':filename', file);
    
        // Set the href and the file name in the link
        $('#downloadFile').attr('href', file_download);
        $('#downloadFile').html(file);
    }
}

$(document).ready(function() {
    $("#update-task-management").validate({
        rules: {
            title: {
                required: true
            },
            client_name: {
                required: true
            },
            due_date: {
                required: true
            }
        },
        messages: {
            title: {
                required: "This field is required.",
            },
            client_name: {
                required: "This field is required.",
            },
            due_date: {
                required: "This field is required.",
            }
        },
        submitHandler: function(form) {
            $('#update-task-management-button').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: updateTaskManagement,
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
                        $('#update-task-management')[0].reset();
                        $('#update-task-management-button').prop('disabled', false);
                        // Reload the DataTable
                        $('#task-management-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#update-task-management-button').prop('disabled', false);
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
