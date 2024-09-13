@extends('Admin.layouts.app')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Apply for an LMIA</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form id="lmia-form">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-lg-12 col-form-label fw-bold">Is this LMIA application for an Employee already working in the company?</label>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" onclick="getValues(1)" type="radio" name="employee_already_working_in_the_company"  id="employee_already_working_in_the_company" value="1" checked>
                                            <label class="form-check-label" for="employee_already_working_in_the_company">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" onclick="getValues(0)" name="employee_already_working_in_the_company" id="gender_female" value="0">
                                            <label class="form-check-label" for="employee_already_working_in_the_company">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="EmployeeDetail">
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="use-esign">
                                            <div class="sign-content">
                                                <div class="row">
                                                    <div class="row mb-3">
                                                        <label class="col-lg-12 col-form-label fw-bold">First need to select one of the options from the drop-down menu</label>
                                                        <div class="col-lg-6">
                                                            <select class="form-select" name="need_to_select_0" required>
                                                                <option value="">--Select--</option>
                                                                <option value="1">It is to only support for PR application of an employee and help them to get 50/200 points in express entry</option>
                                                                <option value="2">It is for both, obtain work permit and support permanent residency application</option>
                                                                <option value="3">It is just for work permit application</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-3">
                                                            <label class="col-lg-12 col-form-label fw-bold">What job title do you want to apply for in this LMIA application?</label>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control" required name="job_title_0">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">Name of the Employee</label>
                                                                <div class="col-lg-12">
                                                                    <input type="text" name="employee_name_0" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">Current job title</label>
                                                                <div class="col-lg-12">
                                                                    <input type="text" name="current_job_title_0" required class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">Current pay</label>
                                                                <div class="col-lg-12">
                                                                    <input type="number" name="current_pay_0" required min="0" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">Start Date</label>
                                                                <div class="col-lg-12">
                                                                    <input type="text" name="start_date_0" required class="form-control" id="datepicker">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">What are their basic job duties in the company?</label>
                                                                <div class="col-lg-12">
                                                                    {{-- <input type="text" required class="form-control" name="job_duties_0"> --}}
                                                                    <textarea name="job_duties_0" required class="form-control" cols="30" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="col-lg-12 col-form-label fw-bold">How did you happen to hire these persons in this company?</label>
                                                                <div class="col-lg-12">
                                                                    {{-- <input type="text" class="form-control" required name="hiring_reason_0"> --}}
                                                                    <textarea name="hiring_reason_0" required class="form-control" cols="30" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-btn form-wrap">
                                                            <a href="javascript:void(0);" class="add-sign-lmia" style="color: red"><i class="ti ti-circle-plus"></i>Add More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="AnotherDetail" style="display: none">
                                    <div class="row mb-3">
                                        <div class="col-xl-3">
                                            <label class="col-lg-12 col-form-label fw-bold">Suggested Job Title:</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="suggested_job_title" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <label class="col-lg-12 col-form-label fw-bold">Number of Vacancies :</label>
                                            <div class="col-lg-12">
                                                <input type="number" min="0" required name="number_of_vacancies" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-12 col-form-label fw-bold">Do you require Worker to Speak basic English?</label>
                                        <div class="col-lg-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="speak_english"  value="1">
                                                <label class="form-check-label" for="gender_male">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="speak_english" value="0" checked>
                                                <label class="form-check-label" for="gender_female">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-12 col-form-label fw-bold">Do you require Worker to Write basic English?</label>
                                        <div class="col-lg-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="write_english" value="1">
                                                <label class="form-check-label" for="gender_male">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="write_english" value="0" checked>
                                                <label class="form-check-label" for="gender_female">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-9 col-form-label fw-bold">How many TFWs are currently employed in the same occupation in which the LMIA(s) is/are requested?</label>
                                        <div class="col-lg-6">
                                            <input type="number" min="0" required name="same_occupation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-12 col-form-label fw-bold">Is any employee currently in same occupation in which LMIA is requested?</label>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="employee_currenty_in_same_occupation" id="employee_currenty_in_same_occupation_yes" value="1">
                                            <label class="form-check-label" for="employee_currenty_in_same_occupation">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="employee_currenty_in_same_occupation" id="employee_currenty_in_same_occupation_no" value="0">
                                            <label class="form-check-label" for="employee_currenty_in_same_occupation">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-lg-9 col-form-label fw-bold">Total number of Canadian Citizens/ Permanent Residents in the same occupation in which LMIA is requested:</label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" maxlength="10" name="total_number_of_canadian" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-9 col-form-label fw-bold">Choose Employer</label>
                                    <div class="col-lg-6">
                                        <select class="form-select" name="employer_id" required>
                                            <option value="">--Select--</option>
                                            @if (isset($UserData) && count($UserData) >0)
                                                @foreach ($UserData as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>  
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var LmiaForm = "{{ route('admin.lmia-form') }}"; 
        </script>
    @else
        <script>
            var LmiaForm = "{{ route('employee.lmia-form') }}"; 
        </script>
    @endif
    <!-- Wizard JS -->
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>
    <script>
        function getValues(value) {
            if (value == 0 || value === 0) {
                $('#AnotherDetail').show();
                $('#EmployeeDetail').hide();
            } else {
                $('#EmployeeDetail').show();
                $('#AnotherDetail').hide();
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#lmia-form").validate({
                rules: {
                    need_to_select: {
                        required: function(element) {
                            // Check if employee_already_working_in_the_company is true
                            return $("#employee_already_working_in_the_company").val() === 'true'  || $("#employee_already_working_in_the_company").val() == 1;
                        }
                    },
                    employee_currenty_in_same_occupation:{
                        required:true
                    },
                    total_number_of_canadian:{
                        required:true
                    }
                },
                messages: {
                    need_to_select: {
                        required: "Please select a file."
                    },
                    employee_currenty_in_same_occupation:{
                        required:"Please choose one."
                    },
                    total_number_of_canadian:{
                        required:"This is required."
                    }
                },
                submitHandler: function(form) {
                    var companyInfoFormData = new FormData($("#lmia-form")[0]);

                    $.ajax({
                        url: LmiaForm, // Your endpoint to handle form submission
                        method: 'POST',
                        data: companyInfoFormData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false, // Prevent jQuery from setting Content-Type
                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                CallMesssage('success', response.message);
                                $('#lmia-form').trigger('reset');
                            } else {
                                CallMesssage('error', response.message);
                            }
                        },
                        error: function(error) {
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
        })
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
        $(document).ready(function() {
            // Initialize the date picker
            $('#datepicker').datepicker({
                dateFormat: 'mm/dd/yy', // Set the date format (e.g., mm/dd/yyyy)
                showAnim: 'slideDown'   // Choose an animation for the date picker (optional)
            });
        });
    </script>
@endpush
