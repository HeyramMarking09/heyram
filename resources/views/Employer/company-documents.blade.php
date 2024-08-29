@extends('Employer.layouts.app')

@section('content')
    <div class="page-wrapper cardhead">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">COMPANY DOCUMENTATION FORM</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <!-- Lightbox -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Company Document</h5>
                        </div>
                        <div class="card-body">
                            <form id="company-docs" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="input-file" class="form-label">Certificate of Incorporation</label>
                                    <input class="form-control" accept=".pdf,.doc,.docx" name="certificate_of_incorporation" type="file" id="input-file_1">
                                </div>
                                <div class="mb-3">
                                    <label for="input-file" class="form-label">Valid Business License</label>
                                    <input class="form-control" name="valid_business_license" accept=".pdf,.doc,.docx" type="file" id="input-file_2">
                                </div>
                                <div class="mb-3">
                                    <label for="input-file" class="form-label">T4 Summary of the Company</label>
                                    <input class="form-control" name="summary_of_company" type="file" id="input-file_3" accept=".pdf,.doc,.docx">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Please upload atleast one of the
                                        following document:</label>
                                    <select id="disabledSelect" onchange="getFile(this.value)" name="following_document" class="form-select">
                                        <option value="">--Select--</option>
                                        <option value="1">Your most recent T2 Schedule 100 Balance sheet information
                                            and T2 Schedule 125 Income statement information</option>
                                        <option value="6">An attestation confirming that your business is in good
                                            financial standing and
                                            will be able to meet all financial obligations to any TFW you hire for the
                                            entire
                                            duration of their employment. </option>
                                        <option value="2">Your most recent T2042 Statement of farming activities
                                        </option>

                                        <option value="3">Your most recent T2125 Statement of business or professional
                                            activities</option>
                                        <option value="4">Your most recent T3010 Registered charity information return
                                        </option>
                                        <option value="5">Your most recent T4 or payroll records for a minimum of 6
                                            weeks immediately prior
                                            to the submission of this LMIA application if the temporary foreign worker (TFW)
                                            already works for you.</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="following_document_file_one" type="file" id="input-file_4"  accept=".pdf,.doc,.docx">
                                </div>
                                <div class="mb-3" id="showHideDiv" style="display: none">
                                    <input class="form-control" type="file" id="input-file_5"  accept=".pdf,.doc,.docx" name="following_document_file_two">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <!-- Wizard JS -->
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#company-docs").validate({
                rules: {
                    certificate_of_incorporation: {
                        required: true
                    },
                    valid_business_license:{
                        required: true
                    },
                    summary_of_company:{
                        required: true
                    },
                    following_document:{
                        required: true
                    },
                    following_document_file_one:{
                        required: true
                    }
                },
                messages: {
                    certificate_of_incorporation: {
                        required: "Please select a file."
                    },
                    valid_business_license: {
                        required: "Please select a file."
                    },
                    summary_of_company: {
                        required: "Please select a file."
                    },
                    following_document: {
                        required: "Select it please."
                    },
                    following_document_file_one: {
                        required: "Please select a file."
                    }
                },
                submitHandler: function(form) {
                    var companyInfoFormData = new FormData($("#company-docs")[0]);

                    $.ajax({
                        url: "{{ route('employer.create-company-docs') }}", // Your endpoint to handle form submission
                        method: 'POST',
                        data: companyInfoFormData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false, // Prevent jQuery from setting Content-Type
                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                CallMesssage('success', response.message);
                                window.location.href =
                                    "{{ route('employer.company-documents') }}";
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
        function getFile(type) {
            if (type == '1' || type === 1) {
                $('#showHideDiv').show();
            } else {
                $('#showHideDiv').hide();
            }
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
@endpush
