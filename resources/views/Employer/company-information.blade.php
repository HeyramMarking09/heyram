@extends('Employer.layouts.app')

@section('content')
<style>
    .nav-link.disabled {
        pointer-events: none;
        cursor: not-allowed;
        opacity: 0.5; /* Optional: to give a visual cue that the tab is disabled */
    }
</style>
    <div class="page-wrapper cardhead">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">COMPANY INFORMATION FORM</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <!-- Lightbox -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Company Information Form</h4>
                        </div>
                        <div class="card-body">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="nav nav-tabs twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 firstLinke disabled"
                                            data-bs-toggle="tab" data-bs-target="#seller-details">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Seller Details">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link secondLinke border-0 disabled"
                                            data-bs-toggle="tab" data-bs-target="#company-document">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Company Document">
                                                <i class="fas fa-map-pin"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- wizard-nav -->

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="seller-details">
                                        <div class="mb-4">
                                            <h5>Enter Your Personal Details</h5>
                                        </div>
                                        <form id="mainInfo">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-firstname-input" class="form-label">First
                                                            name</label>
                                                        <input type="text" name="name" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->name }}" @endif class="form-control"
                                                            id="basicpill-firstname-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-lastname-input" class="form-label">Last
                                                            name</label>
                                                        <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->last_name }}" @endif name="last_name" class="form-control"
                                                            id="basicpill-lastname-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-phoneno-input"
                                                            class="form-label">Phone</label>
                                                        <input type="number" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->phone }}" @endif  minlength="10" maxlength="10" name="phone"
                                                            class="form-control" id="basicpill-phoneno-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input" class="form-label">Email</label>
                                                        <input type="email" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->email }}" @endif name="email" class="form-control"
                                                            id="basicpill-email-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input" class="form-label">Job
                                                            Title</label>
                                                        <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->job_title }}" @endif name="job_title" class="form-control"
                                                            id="basicpill-job_title-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="float-end"><button type="submit" class="btn btn-primary">Next<i
                                                            class="bx bx-chevron-right ms-1"></i></button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane fade " id="company-document">
                                        <div>
                                            <div class="mb-4">
                                                <h5>Enter Your Address</h5>
                                            </div>
                                            <form id="company-info">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-pancard-input" class="form-label">Company
                                                                Legal Name
                                                            </label>
                                                            <input type="text" name="company_legel_name"
                                                            @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->company_legel_name }}" @endif class="form-control" id="basicpill-pancard-input">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-vatno-input" class="form-label">Company
                                                                Operating Name (if different from Legal Name)</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->company_operating_name }}" @endif name="company_operating_name"
                                                                class="form-control" id="basicpill-vatno-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-cstno-input" class="form-label">CRA
                                                                Business Number</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->cra_business_number }}" @endif name="cra_business_number"
                                                                class="form-control" id="basicpill-cstno-input">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Registered Business Address</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->registered_business_address }}" @endif name="registered_business_address"
                                                                class="form-control" id="basicpill-servicetax-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Country</label>
                                                            <select class="form-select" name="country">
                                                                <option value="">Selct Country</option>
                                                                @if (isset($countries) && count($countries) > 0)
                                                                    @foreach ($countries as $item)
                                                                        <option value="{{ $item->id }}" @if (isset($companyInformation) && $item->id == $companyInformation->country) selected @endif >
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Province (State)</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->state }}" @endif name="state" class="form-control"
                                                                id="basicpill-state-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">City</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->city }}" @endif name="city" class="form-control"
                                                                id="basicpill-city-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Postal Code</label>
                                                            <input type="text" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->postal_code }}" @endif name="postal_code" class="form-control"
                                                                id="basicpill-postal_code-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span>Total number of employees working under CRA business number</span>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-cstno-input" class="form-label">Full
                                                                Time</label>
                                                            <input type="number" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->full_time }}" @endif name="full_time" class="form-control"
                                                                id="basicpill-full_time-input" min="0">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Part Time</label>
                                                            <input type="number" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->part_time }}" @endif name="part_time" class="form-control"
                                                                id="basicpill-part_time-input" min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Company incorporation date</label>
                                                            <input type="date" @if (isset($companyInformation) && !empty($companyInformation)) value="{{ $companyInformation->company_incorporation_date }}" @endif name="company_incorporation_date"
                                                                class="form-control"
                                                                id="basicpill-company_incorporation_date-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="card">
                                                            <span class="card-title">Did business earn more than $5 million
                                                                annual gross during last tax year?</span>
                                                            <div class="card-body">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" @if (isset($companyInformation) && $companyInformation->more_then_five_million == 1) checked @endif type="radio"
                                                                        name="more_then_five_million" value="1"
                                                                        id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                    @if (isset($companyInformation) && $companyInformation->more_then_five_million == 0) checked @endif
                                                                        name="more_then_five_million"
                                                                        id="flexRadioDefault2" value="0">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="card">
                                                            <span class="card-title">Have you ever applied for LMIA
                                                                application in last 3 year?</span>
                                                            <div class="card-body">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" @if (isset($companyInformation) && $companyInformation->lmia_application_in_last_three_year == 1) checked @endif type="radio"
                                                                        name="lmia_application_in_last_three_year"
                                                                        id="flexRadioDefault3" 
                                                                        onclick="showHideJobTitle('1')" value="1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault3">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lmia_application_in_last_three_year"
                                                                        @if (isset($companyInformation) && $companyInformation->lmia_application_in_last_three_year == 0) checked @endif
                                                                        id="flexRadioDefault4"
                                                                        onclick="showHideJobTitle('2')" value="0">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault4">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="showHideDiv">
                                                    <div class="col-lg-12">
                                                        <div class="signature-wrap">
                                                            <div class="tab-content">
                                                                <div class="tab-pane show active" id="use-esign">
                                                                    <div class="sign-content">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-wrap">
                                                                                    <label class="col-form-label">Job
                                                                                        Title/Occupation</label>
                                                                                    <input class="form-control"
                                                                                        type="text"
                                                                                        name="job_title_occupation[]"
                                                                                        placeholder="Enter Job Title/Occupation">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6" @if (isset($companyInformation) && $companyInformation->lmia_application_in_last_three_year == 0) style="display: none;"  @endif >
                                                                                <div class="d-flex align-items-center">
                                                                                    <div
                                                                                        class="float-none form-wrap me-3 w-100">
                                                                                        <label
                                                                                            class="col-lg-3 col-form-label">Is
                                                                                            the person currently
                                                                                            working?</label>
                                                                                        <div class="col-lg-9">
                                                                                            <div
                                                                                                class="form-check form-check-inline">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="radio"
                                                                                                    name="is_the_person_currently_working_0"
                                                                                                    id="gender_male"
                                                                                                    value="1">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="gender_male">
                                                                                                    Yes
                                                                                                </label>
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-check form-check-inline">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="radio"
                                                                                                    name="is_the_person_currently_working_0"
                                                                                                    id="gender_female"
                                                                                                    value="0">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="gender_female">
                                                                                                    No
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-btn form-wrap">
                                                                                        <a href="javascript:void(0);"
                                                                                            class="add-sign"><i
                                                                                                class="ti ti-circle-plus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <div class="mb-3">
                                                            <label for="basicpill-servicetax-input" class="form-label">
                                                                Describe in your own words and in as much details as
                                                                possible, the principle business activity at this work
                                                                location?</label>
                                                                    <input type="text" @if (isset($companyInformation)) value="{{ $companyInformation->description }}" @endif   name="description" class="form-control"
                                                                placeholder="description"
                                                                id="basicpill-description-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-primary"><i
                                                                class="bx bx-chevron-left me-1"></i> Previous</a>
                                                    </li>
                                                    <li class="next"><button href="javascript: void(0);" @if (isset($companyInformation)) disabled @endif
                                                            class="btn btn-primary" type="submit">Next <i
                                                                class="bx bx-chevron-right ms-1"></i></button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $("#mainInfo").validate({
                rules: {
                    name: {
                        required: true
                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                    },
                    job_title: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please provide a first name"
                    },
                    last_name: {
                        required: "Please provide a last name",
                    },
                    email: {
                        required: "Please provide a email",
                        email: "Email should be valid"
                    },
                    phone: {
                        required: "Please provide a phone",
                    },
                    job_title: {
                        required: "Please provide a job title",
                    }
                },
                submitHandler: function(form) {
                    $('#company-document').addClass('show active');
                    $('.secondLinke').addClass('active');
                    $('#seller-details').removeClass('show active');
                    $('.firstLinke').removeClass('active');
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#company-info").validate({
                rules: {
                    company_legel_name: {
                        required: true
                    },
                    company_operating_name: {
                        required: true
                    },
                    cra_business_number: {
                        required: true
                    },
                    registered_business_address: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    postal_code: {
                        required: true
                    },
                    full_time: {
                        required: true
                    },
                    part_time: {
                        required: true
                    }
                },
                messages: {
                    company_legel_name: {
                        required: "Please provide a first name"
                    },
                    company_operating_name: {
                        required: "Please provide a first name"
                    },
                    cra_business_number: {
                        required: "Please provide a first name"
                    },
                    registered_business_address: {
                        required: "Please provide a first name"
                    },
                    country: {
                        required: "Please provide a first name"
                    },
                    state: {
                        required: "Please provide a first name"
                    },
                    city: {
                        required: "Please provide a first name"
                    },
                    postal_code: {
                        required: "Please provide a first name"
                    },
                    full_time: {
                        required: "Please provide a first name"
                    },
                    part_time: {
                        required: "Please provide a first name"
                    }
                },
                submitHandler: function(form) {
                    // Create FormData objects for both forms
                    var mainInfoFormData = new FormData($("#mainInfo")[0]);
                    var companyInfoFormData = new FormData($("#company-info")[0]);

                    // Create a new FormData object to combine data
                    var combinedFormData = new FormData();

                    // Append data from mainInfo form
                    for (var pair of mainInfoFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }

                    // Append data from company-info form
                    for (var pair of companyInfoFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }
                    $.ajax({
                        url: "{{ route('employer.create-company-information') }}", // Your endpoint to handle form submission
                        method: 'POST',
                        data: combinedFormData,
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
        function showHideJobTitle(type) {
            if (type == '2' || type === 2) {
                $('#showHideDiv').hide();
            } else {
                $('#showHideDiv').show();
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
