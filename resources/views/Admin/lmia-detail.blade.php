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
                            <div class="col-sm-4">
                                <h4 class="page-title">Lmia Detail</h4>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <div class="head-icons">
                                    <a href="@if (Auth::guard('admin')->check()) {{ route('admin.lmia-detail', ['id' => request()->id]) }} @else {{ route('employee.lmia-detail',['id'=>request()->id]) }}  @endif"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i
                                            class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Leads User -->
                    <div class="contact-head">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="contact-breadcrumb">
                                    <li><a href="@if (Auth::guard('admin')->check()) {{ route('admin.lmia-request') }} @else {{ route('employee.lmia-request') }} @endif"><i
                                                class="ti ti-arrow-narrow-left"></i>Lmia</a></li>
                                    <li>{{ $data->users->name }} {{ $data->users->last_name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contact-wrap">
                        <div class="contact-profile">
                            <div class="avatar company-avatar">
                                <span class="text-icon">{{ $data->users->name[0] }}</span>
                            </div>
                            <div class="name-user">
                                <h5>{{ $data->users->name }} {{ $data->users->last_name }}</h5>
                            </div>
                        </div>
                    </div>
                    <!-- /Leads User -->
                </div>

                <!-- Leads Sidebar -->
                <div class="col-xl-3">
                    <div class="contact-sidebar">
                        <h6>Employer Information</h6>
                        <ul class="other-info">
                            <li><span class="other-title">Email</span><span>{{ $data->users->email }}</span></li>
                            <li><span class="other-title">Phone</span><span>{{ $data->users->phone }}</span></li>
                            <li><span class="other-title">Created Date</span><span>
                                    {{ $data->users->created_at->format('d M Y, h:i a') }}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /Leads Sidebar -->

                <!-- Leads Details -->
                <div class="col-xl-9">
                    <div class="contact-tab-wrap">
                        <h4>Lead Pipeline Status</h4>
                        <div class="pipeline-list">
                            <ul>
                                <li><a href="javascript:void(0);" class="bg-pending">Not Contacted</a></li>
                                <li><a href="javascript:void(0);" class="bg-info">Contacted</a></li>
                                <li><a href="javascript:void(0);" class="bg-success">Closed</a></li>
                                <li><a href="javascript:void(0);" class="bg-danger">Lost</a></li>
                            </ul>
                        </div>
                        <ul class="contact-nav nav">
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#activities" class="active"><i
                                        class="ti ti-alarm-minus"></i>Activities</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#Lmia"><i
                                        class="ti ti-notes"></i>Lmia</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#AssignEmployee"><i
                                        class="ti ti-phone"></i>Assign Employee</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="contact-tab-view">
                        <div class="tab-content pt-0">

                            <!-- Activities -->
                            <div class="tab-pane active show" id="activities">
                                <div class="view-header">
                                    <h4>Activities</h4>

                                </div>
                                <div class="contact-activity">
                                    <form id="changeStatusForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="accordion-lists" id="list-accord">
                                            <!-- Basic Info -->
                                            <div class="manage-user-modal">
                                                <div class="manage-user-modals">
                                                    <input type="hidden" value="{{ request()->id }}" name="id">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label"> Status <span
                                                                        class="text-danger">*</span></label>
                                                                <select class="select" name="status" onchange="changeStatus(this.value)">
                                                                    <option value="">-Select-</option>
                                                                    <option value="1" @if ($data->status == 1 || $data->status == '1') selected @endif>Request received and approved</option>
                                                                    <option value="2" @if ($data->status == 2 || $data->status == '2') selected @endif>LMIA submitted</option>
                                                                    <option value="3" @if ($data->status == 3 || $data->status == '3') selected @endif>Payment deducted</option>
                                                                    <option value="4" @if ($data->status == 4 || $data->status == '4') selected @endif>Queued for assessment</option>
                                                                    <option value="5" @if ($data->status == 5 || $data->status == '5') selected @endif>LMIA assigned to the LMIA officer and assessment in progress</option>
                                                                    <option value="6" @if ($data->status == 6 || $data->status == '6') selected @endif>Interview Schedule</option>
                                                                    <option value="7" @if ($data->status == 7 || $data->status == '7') selected @endif>LMIA officer requested information/documents</option>
                                                                    <option value="8" @if ($data->status == 8 || $data->status == '8') selected @endif>LMIA process started, and job vacancy advertised</option>
                                                                    <option value="9" @if ($data->status == 9 || $data->status == '9') selected @endif>Other</option>
                                                                    <option value="10" @if ($data->status == 10 || $data->status == '10') selected @endif>LMIA Approved</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">File <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="file" name="status_file" accept=".pdf,.doc,.docx" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9" style="display: none" id="interviewDiv">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Date Time <span class="text-danger">*</span></label>
                                                                <input type="datetime-local" id="datetime" required class="form-control" name="interview_date_time">
                                                            </div>
                                                        </div>
                                                        <div class="row" style="display: none" id="LMIAApprovedDiv">
                                                            <div class="col-md-9">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Date of approval <span class="text-danger">*</span></label>
                                                                    <input type="date" required class="form-control" name="date_of_approval">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Date of expiry <span class="text-danger">*</span></label>
                                                                    <input type="date" required class="form-control" name="date_of_expiry">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Number of LMIA <span class="text-danger">*</span></label>
                                                                    <input type="number" required class="form-control" name="number_of_lmia">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Description <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="icon-form-end">
                                                                    <span class="form-icon"></span>
                                                                    <textarea class="form-control" name="description" id="description" cols="3" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Basic Info -->
                                        </div>
                                        <div class="submit-button text-end">
                                            <button type="submit" id="changeStatusFormButton"
                                                class="btn btn-primary">Change Status</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Activities -->

                            <!-- Notes -->
                            <div class="tab-pane fade" id="Lmia">
                                <div class="view-header">
                                    <h4>Lmia</h4>
                                </div>
                                <div class="notes-activity">
                                    {{-- lmia form --}}
                                    <div class="row">
                                        <div class="col-xl-12 mx-auto">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                        <div class="row mb-3">
                                                            <label class="col-lg-12 col-form-label fw-bold">Is this LMIA
                                                                application for an Employee already working in the
                                                                company?</label>
                                                            <div class="col-lg-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input"
                                                                        type="radio"
                                                                        name="employee_already_working_in_the_company"
                                                                        id="employee_already_working_in_the_company"
                                                                        value="1" @if ($data->employee_already_working_in_the_company == 1) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="employee_already_working_in_the_company">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="employee_already_working_in_the_company"
                                                                        id="gender_female" value="0" @if ($data->employee_already_working_in_the_company == 0) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="employee_already_working_in_the_company">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($data->employee_already_working_in_the_company == 1)    

                                                            <div id="EmployeeDetail">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane show active" id="use-esign">
                                                                        @php
                                                                            $employee_detail = json_decode($data->enployee_detail);
                                                                        @endphp
                                                                        @foreach ($employee_detail as $item)
                                                                            <div class="sign-content">
                                                                                <div class="row">
                                                                                    <div class="row mb-3">
                                                                                        <label
                                                                                            class="col-lg-12 col-form-label fw-bold">First
                                                                                            need to select one of the options from
                                                                                            the drop-down menu</label>
                                                                                        <div class="col-lg-9">
                                                                                            <select class="form-select"
                                                                                                name="need_to_select_0" >
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="1" @if ($item->need_to_select == 1) selected @endif>It is to
                                                                                                    only support for PR application
                                                                                                    of an employee and help them to
                                                                                                    get 50/200 points in express
                                                                                                    entry</option>
                                                                                                <option value="2" @if ($item->need_to_select == 2) selected @endif>It is for
                                                                                                    both, obtain work permit and
                                                                                                    support permanent residency
                                                                                                    application</option>
                                                                                                <option value="3" @if ($item->need_to_select == 3) selected @endif>It is just
                                                                                                    for work permit application
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="row mb-3">
                                                                                            <label
                                                                                                class="col-lg-9 col-form-label fw-bold">What
                                                                                                job title do you want to apply for
                                                                                                in this LMIA application?</label>
                                                                                            <div class="col-lg-12">
                                                                                                <input type="text"
                                                                                                    class="form-control" value="{{ $item->job_title }}"
                                                                                                    name="job_title_0" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">Name
                                                                                                    of the Employee</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text"
                                                                                                        name="employee_name_0"
                                                                                                        value="{{ $item->employee_name }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">Current
                                                                                                    job title</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text"
                                                                                                        name="current_job_title_0"
                                                                                                        value="{{ $item->current_job_title }}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">Current
                                                                                                    pay</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="number"
                                                                                                        name="current_pay_0"
                                                                                                        value="{{ $item->current_pay }}" min="0"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">Start
                                                                                                    Date</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <input type="text"
                                                                                                        name="start_date_0"
                                                                                                        value="{{ $item->start_date }}"
                                                                                                        class="form-control datepicker-input">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">What
                                                                                                    are their basic job duties in
                                                                                                    the company?</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <textarea name="job_duties_0" required class="form-control" cols="30" rows="3">{{ $item->job_duties }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-6">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label fw-bold">How
                                                                                                    did you happen to hire these
                                                                                                    persons in this company?</label>
                                                                                                <div class="col-lg-12">
                                                                                                    <textarea name="hiring_reason_0" required class="form-control" cols="30" rows="3">{{ $item->hiring_reason }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div id="AnotherDetail">
                                                                <div class="row mb-9">
                                                                    <div class="col-xl-6">
                                                                        <label
                                                                            class="col-lg-12 col-form-label fw-bold">Suggested
                                                                            Job Title:</label>
                                                                        <div class="col-lg-12">
                                                                            <input type="text" name="suggested_job_title"
                                                                                class="form-control" value="{{ $data->suggested_job_title }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <label class="col-lg-12 col-form-label fw-bold">Number
                                                                            of Vacancies :</label>
                                                                        <div class="col-lg-12">
                                                                            <input type="number" min="0" value="{{ $data->number_of_vacancies }}"
                                                                                name="number_of_vacancies"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-lg-12 col-form-label fw-bold">Do you
                                                                        require Worker to Speak basic English?</label>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="speak_english" value="1" @if ($data->speak_english == 1) checked @endif> 
                                                                            <label class="form-check-label"
                                                                                for="gender_male">Yes</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="speak_english" value="0" @if ($data->speak_english == 0) checked @endif>
                                                                            <label class="form-check-label"
                                                                                for="gender_female">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-lg-12 col-form-label fw-bold">Do you
                                                                        require Worker to Write basic English?</label>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="write_english" value="1" @if ($data->write_english == 1) checked @endif>
                                                                            <label class="form-check-label"
                                                                                for="gender_male">Yes</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="write_english" value="0" @if ($data->write_english == 0) checked @endif>
                                                                            <label class="form-check-label"
                                                                                for="gender_female">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-lg-9 col-form-label fw-bold">How many
                                                                        TFWs are currently employed in the same occupation in
                                                                        which the LMIA(s) is/are requested?</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="number" min="0" value="{{ $data->same_occupation }}" 
                                                                            name="same_occupation" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="row mb-3">
                                                            <label class="col-lg-12 col-form-label fw-bold">Is any employee
                                                                currently in same occupation in which LMIA is
                                                                requested?</label>
                                                            <div class="col-lg-12">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="employee_currenty_in_same_occupation"
                                                                        id="employee_currenty_in_same_occupation_yes"
                                                                        value="1" @if ($data->employee_currenty_in_same_occupation == 1) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="employee_currenty_in_same_occupation">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="employee_currenty_in_same_occupation"
                                                                        id="employee_currenty_in_same_occupation_no"
                                                                        value="0" @if ($data->employee_currenty_in_same_occupation == 0) checked @endif>
                                                                    <label class="form-check-label" 
                                                                        for="employee_currenty_in_same_occupation">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 align-items-center">
                                                            <label class="col-lg-9 col-form-label fw-bold">Total number of
                                                                Canadian Citizens/ Permanent Residents in the same
                                                                occupation in which LMIA is requested:</label>
                                                            <div class="col-lg-9">
                                                                <input type="number" min="0" maxlength="10"
                                                                    name="total_number_of_canadian" value="{{ $data->total_number_of_canadian }}" class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Notes -->

                            <!-- Calls -->
                            <div class="tab-pane fade" id="AssignEmployee">
                                <div class="view-header">
                                    <h4>Assign Employee</h4>
                                </div>
                                <div class="calls-activity">
                                    @if (isset($data->assign_employee_data) && !is_null($data->assign_employee_data))
                                        @php
                                            $AssignData = json_decode($data->assign_employee_data);
                                        @endphp
                                        <form id="AssignEmployeeForm">
                                            @csrf
                                            <div class="accordion-lists" id="list-accord">
                                                <!-- Basic Info -->
                                                <div class="manage-user-modal">
                                                    <div class="manage-user-modals">
                                                        <div class="row">
                                                            <input type="hidden" value="{{ $data->id }}" name="id" id="lmiaId">
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Job Title <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="job_title" class="form-control" value="{{ $AssignData->job_title }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Vacancies <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="vacancies" class="form-control" value="{{ is_null($AssignData->vacancies) ? '' : $AssignData->vacancies  }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="col-form-label">Mininum education requirement <span
                                                                                class="text-danger">*</span></label>
                                                                    </div>
                                                                    <input type="text" name="mininum_education_requirement" value="{{ is_null($AssignData->mininum_education_requirement) ? '' : $AssignData->mininum_education_requirement  }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Mininum experience requirement<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="mininum_experience_requirement"
                                                                        class="form-control" value="{{ is_null($AssignData->mininum_experience_requirement) ? '' : $AssignData->mininum_experience_requirement  }}"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Expected File Submission Date <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="icon-form-end">
                                                                        <span class="form-icon"></span>
                                                                        <input type="text" name="expected_file_submission_date"
                                                                            class="form-control datepicker-input" value="{{ is_null($AssignData->expected_file_submission_date) ? '' : $AssignData->expected_file_submission_date  }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Final Submission Date <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="icon-form-end">
                                                                        <span class="form-icon"></span>
                                                                        <input type="text" name="final_submission_date"
                                                                            class="form-control datepicker-input" value="{{ is_null($AssignData->final_submission_date) ? '' : $AssignData->final_submission_date  }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label"> File assign to employee <span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="select" name="file_assign_to_employee">
                                                                        <option value="">-Select-</option>
                                                                        @if (isset($UserData) && count($UserData) > 0)
                                                                            @foreach ($UserData as $item)
                                                                                <option value="{{ $item->id }}" @if (!is_null($data->file_assign_to_employee) && $data->file_assign_to_employee != 0  && $data->file_assign_to_employee == $item->id) selected @endif>{{ $item->name }}
                                                                                    {{ $item->last_name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Job Location <span class="text-danger">*</span></label>
                                                                    <input type="text" name="job_location" class="form-control datepicker-input" value="{{ is_null($AssignData->job_location) ? '' : $AssignData->job_location  }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Required Language<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="select" name="language">
                                                                        <option value="English" @if ($AssignData->language == 'English') selected @endif>English</option>
                                                                        <option value="French" @if ($AssignData->language == 'French') selected @endif>French</option>
                                                                        <option value="N/A" @if ($AssignData->language == 'N/A') selected @endif>N/A</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Description <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="icon-form-end">
                                                                        <span class="form-icon"></span>
                                                                        <textarea class="form-control" name="description" id="description" cols="3" rows="3"> {{ $AssignData->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Basic Info -->
                                            </div>
                                            <div class="submit-button text-end">
                                                <button type="submit" id="assignEmployeeSubmitButton"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <!-- /Calls -->

                        </div>
                    </div>
                    <!-- /Tab Content -->

                </div>
                <!-- /Leads Details -->

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


@endsection

@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var lmiaAssignEmployee  = "{{ route('admin.lmia-assign-employee') }}";
            var lmiaApproved  = "{{ route('admin.lmia-approved') }}";
        </script>
    @else
        <script>
            var lmiaAssignEmployee  = "{{ route('employee.lmia-assign-employee') }}";
            var lmiaApproved  = "{{ route('employee.lmia-approved') }}";
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $("#AssignEmployeeForm").validate({
                rules: {
                    job_title: {
                        required: true
                    },
                    // file_assign_to_employee: {
                    //     required: true
                    // }
                },
                messages: {
                    job_title: {
                        required: "This field is required.",
                    },
                    // file_assign_to_employee: {
                    //     required: "This field is required.",
                    // }
                },
                submitHandler: function(form) {
                    $('#assignEmployeeSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: lmiaAssignEmployee,
                        method: "POST",
                        data: $(form).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}" // Correctly add the CSRF token in the request header
                        },
                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                // $('.sidebar-close').click();
                                // Reset the form
                                // $('#AssignEmployee')[0].reset();
                                $('#assignEmployeeSubmitButton').prop('disabled', false);
                                window.location.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#assignEmployeeSubmitButton').prop('disabled', false);
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
            $('.datepicker-input').datepicker({
                dateFormat: 'mm/dd/yy', // Set the date format (e.g., mm/dd/yyyy)
                showAnim: 'slideDown'   // Choose an animation for the date picker (optional)
            });
        });
    </script>
    <script>
        function changeStatus(type)
        {
            if(type == 6 || type == '6'){
                $('#interviewDiv').show();
                $('#LMIAApprovedDiv').hide();
            }else if(type == 10 || type == '10'){
                $('#LMIAApprovedDiv').show();
                $('#interviewDiv').hide();
            }else{
                $('#interviewDiv').hide();
                $('#LMIAApprovedDiv').hide();
            }
        }
    </script>
     <script>
        $(document).ready(function() {
            $("#changeStatusForm").validate({
                rules: {
                    status: {
                        required: true
                    },
                },
                messages: {
                    status: {
                        required: "This field is required.",
                    },
                },
                submitHandler: function(form) {
                    $('#changeStatusFormButton').prop('disabled', true);
                    var changeStatusFormData = new FormData($("#changeStatusForm")[0]);

                    $.ajax({
                        url: lmiaApproved,
                        method: "POST",
                        data: changeStatusFormData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false, // Prevent jQuery from setting Content-Type
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}" // Correctly add the CSRF token in the request header
                        },
                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                // $('.sidebar-close').click();
                                // Reset the form
                                // $('#AssignEmployee')[0].reset();
                                $('#changeStatusFormButton').prop('disabled', false);
                                window.location.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#changeStatusFormButton').prop('disabled', false);
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
    </script>
@endpush
