@extends('Employer.layouts.app')

@section('content')
    <div class="page-wrapper cardhead">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">COMPANY DOCUMENTATION</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <!-- Lightbox -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Details of Document - *All Document should be upload mandatory</h5>
                        </div>
                        <div class="card-body">
                            <form id="company-docs" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-lg-6">
                                    <label for="input-file" class="form-label fw-bold">Certificate of Incorporation</label>
                                    @if (isset($userData->companyDoc->certificate_of_incorporation))
                                        <span style="color: red"><a style="color: red" href="{{ route('employer.download.company_docs', ['file'=>$userData->companyDoc->certificate_of_incorporation]) }}">Download File</a></span>
                                    @endif
                                    <input class="form-control" accept=".pdf,.doc,.docx" name="certificate_of_incorporation" type="file" id="input-file_1">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="input-file" class="form-label fw-bold">Valid Business License</label>
                                    @if (isset($userData->companyDoc->valid_business_license))
                                        <span style="color: red"><a style="color: red" href="{{ route('employer.download.company_docs', ['file'=>$userData->companyDoc->valid_business_license]) }}">Download File</a></span>
                                    @endif
                                    <input class="form-control" name="valid_business_license" accept=".pdf,.doc,.docx" type="file" id="input-file_2">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="input-file" class="form-label fw-bold">T4 Summary of the Company</label>
                                    @if (isset($userData->companyDoc->summary_of_company))
                                        <span style="color: red"><a style="color: red" href="{{ route('employer.download.company_docs', ['file'=>$userData->companyDoc->summary_of_company]) }}">Download File</a></span>
                                    @endif
                                    <input class="form-control" name="summary_of_company" type="file" id="input-file_3" accept=".pdf,.doc,.docx">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="disabledSelect" class="form-label fw-bold">Please upload atleast one of the
                                        following document:</label>
                                    <select id="disabledSelect" onchange="getFile(this.value)" name="following_document" class="form-select">
                                        <option value="">--Select--</option>
                                        <option value="1" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 1) selected @endif>Your most recent T2 Schedule 100 Balance sheet information
                                            and T2 Schedule 125 Income statement information</option>
                                        <option value="6" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 6) selected @endif>An attestation confirming that your business is in good
                                            financial standing and
                                            will be able to meet all financial obligations to any TFW you hire for the
                                            entire
                                            duration of their employment. </option>
                                        <option value="2" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 2) selected @endif>Your most recent T2042 Statement of farming activities
                                        </option>

                                        <option value="3" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 3) selected @endif>Your most recent T2125 Statement of business or professional
                                            activities</option>
                                        <option value="4" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 4) selected @endif>Your most recent T3010 Registered charity information return
                                        </option>
                                        <option value="5" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 5) selected @endif>Your most recent T4 or payroll records for a minimum of 6
                                            weeks immediately prior
                                            to the submission of this LMIA application if the temporary foreign worker (TFW)
                                            already works for you.</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="input-file" class="form-label fw-bold">Following Document</label>
                                    @if (isset($userData->companyDoc->following_document_file_one))
                                        <span style="color: red"><a style="color: red" href="{{ route('employer.download.company_docs', ['file'=>$userData->companyDoc->following_document_file_one]) }}">Download File</a></span>
                                    @endif
                                    <input class="form-control" name="following_document_file_one" type="file" id="input-file_4"  accept=".pdf,.doc,.docx">
                                </div>
                                <div class="mb-3 col-lg-6" id="showHideDiv" @if (isset($userData->companyDoc->following_document) && $userData->companyDoc->following_document == 1)  style="display: block" @else  style="display: none" @endif >
                                    <label for="input-file" class="form-label fw-bold">Following Document</label>
                                    @if (isset($userData->companyDoc->following_document_file_two))
                                        <span style="color: red"><a style="color: red" href="{{ route('employer.download.company_docs', ['file'=>$userData->companyDoc->following_document_file_two]) }}">Download File</a></span>
                                    @endif
                                    <input class="form-control" type="file" id="input-file_5"  accept=".pdf,.doc,.docx" name="following_document_file_two">
                                </div>
                                @if (!isset($userData->companyDoc))
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Lightbox -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Requeired Documents</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12 table-responsive">
                                <table class="table no-footer" style="width: 1241px;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                rowspan="1" colspan="1"
                                                aria-label="Lead Name: activate to sort column ascending"
                                                style="width: 20px;">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                rowspan="1" colspan="1"
                                                aria-label="Lead Name: activate to sort column ascending"
                                                style="width: 30px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                rowspan="1" colspan="1"
                                                aria-label="Company Name: activate to sort column ascending"
                                                style="width: 93px;">Dead Line Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                rowspan="1" colspan="1"
                                                aria-label="Created Date: activate to sort column ascending"
                                                style="width: 35px;">Simple File</th>
                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                rowspan="1" colspan="1"
                                                aria-label="Created Date: activate to sort column ascending"
                                                style="width: 35px;">Docs File</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($userData->AdditionalDocument))
                                            @php
                                                $LISTNO2 = 1;
                                            @endphp
                                            @foreach ($userData->AdditionalDocument as $item)
                                                <tr class="odd">
                                                    <td>{{ $LISTNO2 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->dead_line_date }}</td>
                                                    <td><span> <a style="color:red" href="{{ route('admin.download.file', ['filename' => $item->simple_file]) }}"> <i class="ti ti-download text-danger"></i> Downlaod File</a></span></td>
                                                    <td>
                                                        @if (!is_null($item->docs_file))
                                                            <span> <a style="color:red" href="{{ route('admin.download.file', ['filename' => $item->docs_file]) }}"><i class="ti ti-download text-danger"></i> Downlaod File</a></span></td>
                                                        @else
                                                            <span style="color: red"> <a style="color: red" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact" onclick="getIdOfAdditional('{{ $item->id }}')"><i class="ti ti-upload text-danger"></i> Upload File</a> </span>
                                                        @endif
                                                </tr>
                                                @php
                                                    $LISTNO2++;
                                                @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Delete Lead -->
    <div class="modal custom-modal fade" id="delete_contact" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 justify-content-between align-items-center">
                    <h4 class="mb-0">Upload File</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <form action="{{ route('employer.upload-additional-docs') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="additional-id">
                            <div class="mb-4">
                                <label for="input-file_1" class="form-label fw-bold">Choose File</label>
                                <input class="form-control form-control-lg" required accept=".pdf,.doc,.docx" name="docs_file" type="file" id="input-file_1">
                            </div>
                            <div class="d-flex mt-4 float-end">
                                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" >Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>       
    <!-- /Delete Lead -->
@endsection

@push('scripts')
    <!-- Wizard JS -->
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>
    <script>
        function getIdOfAdditional(id)
        {
            $('#additional-id').val(id);
        }
    </script>
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
