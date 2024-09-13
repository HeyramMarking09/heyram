$(document).ready(function() {
    if ($('#manage-users-list').length > 0) {
        $('#manage-users-list').DataTable({
            "bFilter": false,
            "bInfo": false,
            "ordering": true,
            "autoWidth": true,
            "ajax": {
                "url": getManageUser,
                "type": "GET",
                "data": function(d) {
                     // Add custom parameters to the request
                    d.customer_name = $('#custom-search').val(); // Add search value
                    d.sortOrder = window.sortOrder; // Add sort order
                    d.startDate = $('.bookingrange').data('daterangepicker').startDate.format('YYYY-MM-DD'); // Start date
                    d.endDate = $('.bookingrange').data('daterangepicker').endDate.format('YYYY-MM-DD'); // End date    

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
                        return '<h2 class="table-avatar d-flex align-items-center"><a href="javascript:void(0);" class="profile-split d-flex flex-column">' +
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
                    "render": function(data, type, row) {
                        var class_name = row['status'] == "1" ? "bg-success" : "bg-danger";
                        var status_name = row['status'] == "1" ? "Active" : "Inactive";
                        return '<span class="badge badge-pill badge-status ' + class_name +
                            '">' + status_name + '</span>';
                    }
                },
                {
                    "render": function(data, type, row) {
                        var ID = row.id;
                        var Name = row.customer_name;
                        var Email = row.email;
                        var Phone = row.phone;
                        var Status = row.status;
                        var UserType = row.customer_no;
                        var LastName = row.last_name;
                        var isOnline = row.is_online;

                        var editOption = window.canEditUser ? 
                            `<a class="dropdown-item" onclick="openEditForm('${ID}', '${Name}','${Email}', '${Phone}', '${Status}','${UserType}','${LastName}','${isOnline}')" href="javascript:void(0);">
                                <i class="ti ti-edit text-blue"></i> Edit
                            </a>` : '';
                     
                        var deleteOption = window.canDeleteUser ? 
                            `<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact" onclick="getIDForDelete(${ID})">
                                <i class="ti ti-trash text-danger"></i> Delete
                            </a>` : '';

                        return `<div class="dropdown table-action">
                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        ${editOption}
                                        ${deleteOption}
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
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });
        // Event listener for the search input
        $('#searchByDate').on('change', function() {
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });

        $('#searchByStatus').on('click', function() {
            $('#manage-users-list').DataTable().ajax.reload(); // Reload table data with new search parameter
        });
         // Default sorting order
        window.sortOrder = 'asc'; // Default to ascending

        $('#searchByAsc').click(function() {
            window.sortOrder = 'asc';
            $('#manage-users-list').DataTable().ajax.reload();
        });

        $('#searchByDesc').click(function() {
            window.sortOrder = 'desc';
            $('#manage-users-list').DataTable().ajax.reload();
        });
    }
});


$(document).ready(function() {
    $("#manageUserForm").validate({
        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                maxlength: 12,
                minlength: 8

            },
            password: {
                required: true,
                minlength: 8
            },
            repeat_password: {
                required: true,
                equalTo: '#password'
            },
            user_type: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            last_name: {
                required: "Please enter your last name"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            phone: {
                required: "Please enter your phone",
                maxlength: "Your phone number can not be more than 12 characters",
                mixlength: "Your phone number must be at least 8 characters long",
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            repeat_password: {
                required: "Please provide a repeat password",
                equalTo: 'Your password and repeat password should be same'
            },
            user_type: {
                required: "Please select any user type ",
            }
        },
        submitHandler: function(form) {
            $('#createUserSubmitButton').prop('disabled', true);
            $.ajax({
                url: ManageUser,
                method: "POST",
                data: $(form).serialize(),

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.sidebar-close').click();
                        // Reset the form
                        $('#manageUserForm')[0].reset();
                        $('#createUserSubmitButton').prop('disabled', false);
                        // Reload the DataTable
                        $('#manage-users-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#createUserSubmitButton').prop('disabled', false);
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

function getIDForDelete(id){
    $('#userIDDelete').val(id);
}
function deleteTheUser(){
    var id = $('#userIDDelete').val();
    $('#deleteUserButton').prop('disabled', true);
    $.ajax({
        url: deleteTheUserURl,
        method: "DELETE",
        data: {
                id:id,
                _token: csrf_token
            },

        success: function(response) {
            if (response.status == true || response.status === 'true') {
                // Show a success message
                CallMesssage('success', response.message);

                $('.btn-close').click();
                $('#deleteUserButton').prop('disabled', false);
                // Reload the DataTable
                $('#manage-users-list').DataTable().ajax.reload();
            } else {
                CallMesssage('error', response.message);
                $('#deleteUserButton').prop('disabled', false);
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
function openEditForm(id,name,email,phone,status,user_type,LastName,isOnline){
    $('.edit-popup').click(); 
    $('#userId').val(id);
    $('#userName').val(name);
    $('#userLastName').val(LastName);
    $('#userEmail').val(email);
    $('#userPhone').val(phone);

    $('#userStatus').val(status).trigger('change');
    $('#userUserType').val(user_type).trigger('change');

    // Set the radio button for Online/Offline Customer
    if (isOnline == 1 || isOnline == '1') {
        $("#active").prop('checked', true);
    } else {
        $("#inactive").prop('checked', true);
    }
}

$(document).ready(function() {
    $("#editManageUser").validate({
        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: function(element) {
                    // Password is required if the field is not empty (i.e., user is changing the password)
                    return $('#userPassword').val().length > 0;
                },
                minlength: 8
            },
            repeat_password: {
                required: function(element) {
                    // Repeat password is required only if the password field is filled
                    return $('#userPassword').val().length > 0;
                },
                equalTo: '#userPassword'
            },
            phone: {
                required: true,
                maxlength: 12,
                minlength: 8

            },
            user_type: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            last_name: {
                required: "Please enter your last name"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            repeat_password: {
                required: "Please provide a repeat password",
                equalTo: "Your password and repeat password should be the same"
            },
            phone: {
                required: "Please enter your phone",
                maxlength: "Your phone number can not be more than 12 characters",
                mixlength: "Your phone number must be at least 8 characters long",
            },
            user_type: {
                required: "Please select any user type ",
            }
        },
        submitHandler: function(form) {
            $('#editUserSubmitButton').prop('disabled', true);
            $.ajax({
                url: UpdateManageUser,
                method: "POST",
                data: $(form).serialize(),

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.sidebar-close1').click();
                        // Reset the form
                        $('#editManageUser')[0].reset();
                        $('#editUserSubmitButton').prop('disabled', false);
                        // Reload the DataTable
                        $('#manage-users-list').DataTable().ajax.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#editUserSubmitButton').prop('disabled', false);
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