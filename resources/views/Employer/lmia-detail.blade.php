@extends('Employer.layouts.app')

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
                                    <a href="{{ route('employer.lmia-detail', ['id' => request()->id]) }}"
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
                                    <li><a href="{{ route('employer.lmia.list') }}"><i
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
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#jobBank"><i
                                        class="ti ti-file"></i>Job Bank</a>
                            </li>
                            {{-- <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#email"><i
                                        class="ti ti-mail-check"></i>Email</a>
                            </li>  --}}
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="contact-tab-view">
                        <div class="tab-content pt-0">

                            <!-- Activities -->
                            <div class="tab-pane active show" id="activities">
                                <div class="view-header">
                                    <h4>Activities</h4>
                                    <ul>
                                        <li>
                                            <div class="form-sort">
                                                <i class="ti ti-sort-ascending-2"></i>
                                                <select class="select">
                                                    <option>Sort By Date</option>
                                                    <option>Ascending</option>
                                                    <option>Descending</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-activity">
                                    <div class="badge-day"><i class="ti ti-calendar-check"></i>29 Aug 2023</div>
                                    <ul>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-pending">
                                                <i class="ti ti-mail-code"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>You sent 1 Message to the contact.</h6>
                                                <p>10:25 pm</p>
                                            </div>
                                        </li>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-secondary-success">
                                                <i class="ti ti-phone"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>Denwar responded to your appointment schedule question by call at
                                                    09:30pm.</h6>
                                                <p>09:25 pm</p>
                                            </div>
                                        </li>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-orange">
                                                <i class="ti ti-notes"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>Notes added by Antony</h6>
                                                <p>Please accept my apologies for the inconvenience caused. It would be much
                                                    appreciated if it's possible to reschedule to 6:00 PM, or any other day
                                                    that week.</p>
                                                <p>10.00 pm</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="badge-day"><i class="ti ti-calendar-check"></i>28 Feb 2024</div>
                                    <ul>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-info">
                                                <i class="ti ti-user-pin"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>Meeting With <span class="avatar-xs"><img
                                                            src="assets/img/profiles/avatar-19.jpg" alt="img"></span>
                                                    Abraham</h6>
                                                <p>Schedueled on 05:00 pm</p>
                                            </div>
                                        </li>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-secondary-success">
                                                <i class="ti ti-phone"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>Drain responded to your appointment schedule question.</h6>
                                                <p>09:25 pm</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="badge-day"><i class="ti ti-calendar-check"></i>Upcoming Activity</div>
                                    <ul>
                                        <li class="activity-wrap">
                                            <span class="activity-icon bg-info">
                                                <i class="ti ti-user-pin"></i>
                                            </span>
                                            <div class="activity-info">
                                                <h6>Product Meeting</h6>
                                                <p>A product team meeting is a gathering of the cross-functional product
                                                    team — ideally including team members from product, engineering,
                                                    marketing, and customer support.</p>
                                                <p>25 Jul 2023, 05:00 pm</p>
                                                <div class="upcoming-info">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <p>Reminder</p>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="ti ti-clock-edit me-1"></i>Reminder<i
                                                                        class="ti ti-chevron-down ms-1"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0);">Remainder</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">1
                                                                        hr</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">10
                                                                        hr</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p>Task Priority</p>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High<i
                                                                        class="ti ti-chevron-down ms-1"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                                        <i
                                                                            class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                                        <i
                                                                            class="ti ti-square-rounded-filled me-1 text-success circle"></i>Low
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p>Assigned to</p>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><img
                                                                        src="assets/img/profiles/avatar-19.jpg"
                                                                        alt="img" class="avatar-xs">John<i
                                                                        class="ti ti-chevron-down ms-1"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                                        <img src="assets/img/profiles/avatar-19.jpg"
                                                                            alt="img" class="avatar-xs">John
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                                        <img src="assets/img/profiles/avatar-19.jpg"
                                                                            alt="img" class="avatar-xs">Peter
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
                                                                <input class="form-check-input" type="radio"
                                                                    name="employee_already_working_in_the_company"
                                                                    id="employee_already_working_in_the_company"
                                                                    value="1"
                                                                    @if ($data->employee_already_working_in_the_company == 1) checked @endif>
                                                                <label class="form-check-label"
                                                                    for="employee_already_working_in_the_company">Yes</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="employee_already_working_in_the_company"
                                                                    id="gender_female" value="0"
                                                                    @if ($data->employee_already_working_in_the_company == 0) checked @endif>
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
                                                                        $employee_detail = json_decode(
                                                                            $data->enployee_detail,
                                                                        );
                                                                    @endphp
                                                                    @foreach ($employee_detail as $item)
                                                                        <div class="sign-content">
                                                                            <div class="row">
                                                                                <div class="row mb-3">
                                                                                    <label
                                                                                        class="col-lg-12 col-form-label fw-bold">First
                                                                                        need to select one of the options
                                                                                        from
                                                                                        the drop-down menu</label>
                                                                                    <div class="col-lg-9">
                                                                                        <select class="form-select"
                                                                                            name="need_to_select_0">
                                                                                            <option value="">
                                                                                                --Select--
                                                                                            </option>
                                                                                            <option value="1"
                                                                                                @if ($item->need_to_select == 1) selected @endif>
                                                                                                It is to
                                                                                                only support for PR
                                                                                                application
                                                                                                of an employee and help them
                                                                                                to
                                                                                                get 50/200 points in express
                                                                                                entry</option>
                                                                                            <option value="2"
                                                                                                @if ($item->need_to_select == 2) selected @endif>
                                                                                                It is for
                                                                                                both, obtain work permit and
                                                                                                support permanent residency
                                                                                                application</option>
                                                                                            <option value="3"
                                                                                                @if ($item->need_to_select == 3) selected @endif>
                                                                                                It is just
                                                                                                for work permit application
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <div class="row mb-3">
                                                                                        <label
                                                                                            class="col-lg-9 col-form-label fw-bold">What
                                                                                            job title do you want to apply
                                                                                            for
                                                                                            in this LMIA
                                                                                            application?</label>
                                                                                        <div class="col-lg-12">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->job_title }}"
                                                                                                name="job_title_0">
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
                                                                                                    value="{{ $item->current_pay }}"
                                                                                                    min="0"
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
                                                                                                are their basic job duties
                                                                                                in
                                                                                                the company?</label>
                                                                                            <div class="col-lg-12">
                                                                                                <textarea name="job_duties_0" required class="form-control" cols="30" rows="3">{{ $item->job_duties }}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-6">
                                                                                            <label
                                                                                                class="col-lg-12 col-form-label fw-bold">How
                                                                                                did you happen to hire these
                                                                                                persons in this
                                                                                                company?</label>
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
                                                                            class="form-control"
                                                                            value="{{ $item->suggested_job_title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label class="col-lg-12 col-form-label fw-bold">Number
                                                                        of Vacancies :</label>
                                                                    <div class="col-lg-12">
                                                                        <input type="number" min="0"
                                                                            value="{{ $item->number_of_vacancies }}"
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
                                                                            name="speak_english" value="1"
                                                                            @if ($item->speak_english == 1) checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="gender_male">Yes</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="speak_english" value="0"
                                                                            @if ($item->speak_english == 0) checked @endif>
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
                                                                            name="write_english" value="1"
                                                                            @if ($item->write_english == 1) checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="gender_male">Yes</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="write_english" value="0"
                                                                            @if ($item->write_english == 0) checked @endif>
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
                                                                    <input type="number" min="0"
                                                                        value="{{ $item->same_occupation }}"
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
                                                                    value="1"
                                                                    @if ($data->employee_currenty_in_same_occupation == 1) checked @endif>
                                                                <label class="form-check-label"
                                                                    for="employee_currenty_in_same_occupation">Yes</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="employee_currenty_in_same_occupation"
                                                                    id="employee_currenty_in_same_occupation_no"
                                                                    value="0"
                                                                    @if ($data->employee_currenty_in_same_occupation == 0) checked @endif>
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
                                                                name="total_number_of_canadian"
                                                                value="{{ $data->total_number_of_canadian }}"
                                                                class="form-control">
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
                                        <div class="accordion-lists" id="list-accord">
                                            <!-- Basic Info -->
                                            <div class="manage-user-modal">
                                                <div class="manage-user-modals">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Job Title <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="job_title"
                                                                    class="form-control"
                                                                    value="{{ $AssignData->job_title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Vacancies <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="vacancies"
                                                                    class="form-control"
                                                                    value="{{ is_null($AssignData->vacancies) ? '' : $AssignData->vacancies }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <label class="col-form-label">Mininum education
                                                                        requirement <span
                                                                            class="text-danger">*</span></label>
                                                                </div>
                                                                <input type="text" name="mininum_education_requirement"
                                                                    value="{{ is_null($AssignData->mininum_education_requirement) ? '' : $AssignData->mininum_education_requirement }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Mininum experience
                                                                    requirement<span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    name="mininum_experience_requirement"
                                                                    class="form-control"
                                                                    value="{{ is_null($AssignData->mininum_experience_requirement) ? '' : $AssignData->mininum_experience_requirement }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Expected File Submission Date
                                                                    <span class="text-danger">*</span></label>
                                                                <div class="icon-form-end">
                                                                    <span class="form-icon"></span>
                                                                    <input type="text"
                                                                        name="expected_file_submission_date"
                                                                        class="form-control datepicker-input"
                                                                        value="{{ is_null($AssignData->expected_file_submission_date) ? '' : $AssignData->expected_file_submission_date }}">
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
                                                                        class="form-control datepicker-input"
                                                                        value="{{ is_null($AssignData->final_submission_date) ? '' : $AssignData->final_submission_date }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label"> File assign to employee
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="select" name="file_assign_to_employee">
                                                                    <option value="">-Select-</option>
                                                                    @if (isset($UserData) && count($UserData) > 0)
                                                                        @foreach ($UserData as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                @if (
                                                                                    !is_null($data->file_assign_to_employee) &&
                                                                                        $data->file_assign_to_employee != 0 &&
                                                                                        $data->file_assign_to_employee == $item->id) selected @endif>
                                                                                {{ $item->name }}
                                                                                {{ $item->last_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Job Location <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="job_location"
                                                                    class="form-control datepicker-input"
                                                                    value="{{ is_null($AssignData->job_location) ? '' : $AssignData->job_location }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Required Language<span
                                                                        class="text-danger">*</span></label>
                                                                <select class="select" name="language">
                                                                    <option value="English"
                                                                        @if ($AssignData->language == 'English') selected @endif>
                                                                        English</option>
                                                                    <option value="French"
                                                                        @if ($AssignData->language == 'French') selected @endif>
                                                                        French</option>
                                                                    <option value="N/A"
                                                                        @if ($AssignData->language == 'N/A') selected @endif>
                                                                        N/A</option>
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
                                        {{-- <div class="submit-button text-end">
                                                <button type="submit" id="assignEmployeeSubmitButton"
                                                    class="btn btn-primary">Update</button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    @endif
                                </div>
                            </div>
                            <!-- /Calls -->

                            <!-- Files -->
                            <!-- Job bank List -->
                            <div class="tab-pane fade" id="jobBank">
                                <div class="view-header">
                                    <h4>Job Bank</h4>
                                </div>
                                <div class="files-activity">
                                    <div class="files-wrap">
                                        <div class="row dt-row">
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
                                                                style="width: 30px;">Job Title</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Company Name: activate to sort column ascending"
                                                                style="width: 93px;">Number Of Vacancies</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">Location</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">Start Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">End Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">Bank Job Ad Number</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Created Date: activate to sort column ascending"
                                                                style="width: 35px;">Created Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($data->jobBank))
                                                            @php
                                                                $LISTNO1 = 1;
                                                            @endphp
                                                            @foreach ($data->jobBank as $item)
                                                                <tr class="odd">
                                                                    <td><a href="leads-details.html"
                                                                            class="title-name">{{ $LISTNO1 }}</a>
                                                                    </td>
                                                                    <td><a href="leads-details.html"
                                                                            class="title-name">{{ $item->job_title }}</a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar d-flex align-items-center">
                                                                            <a href="company-details.html"
                                                                                class="profile-split d-flex flex-column">{{ $item->number_of_vacancies }}</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->location??"-" }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->start_date??"-" }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->end_date??'-' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->bank_job_ad_number??"0" }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->status??"Pending" }}</span>
                                                                    </td>
                                                                    <td>{{ $item->created_at->format('d M Y, h:i a') }}
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $LISTNO1++;
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
                            <!-- /Files -->

                            <!-- Email -->
                            {{-- <div class="tab-pane fade" id="email">
                                <div class="view-header">
                                    <h4>Email</h4>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="com-add create-mail"
                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                data-bs-custom-class="tooltip-dark"
                                                data-bs-original-title="There are no email accounts configured, Please configured your email account in order to Send/ Create EMails"><i
                                                    class="ti ti-circle-plus me-1"></i>Create Email</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="files-activity">
                                    <div class="files-wrap">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="file-info">
                                                    <h4>Manage Emails</h4>
                                                    <p>You can send and reply to emails directly via this section.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-md-end">
                                                <ul class="file-action">
                                                    <li>
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#create_email">Connect Account</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="files-wrap">
                                        <div class="email-header">
                                            <div class="row">
                                                <div class="col top-action-left">
                                                    <div class="float-start d-none d-sm-block">
                                                        <input type="text" placeholder="Search Messages"
                                                            class="form-control search-message">
                                                    </div>
                                                </div>
                                                <div class="col-auto top-action-right">
                                                    <div class="text-end">
                                                        <button type="button" title="Refresh" data-bs-toggle="tooltip"
                                                            class="btn btn-white d-none d-md-inline-block"><i
                                                                class="fa-solid fa-rotate"></i></button>
                                                        <div class="btn-group">
                                                            <a class="btn btn-white"><i
                                                                    class="fa-solid fa-angle-left"></i></a>
                                                            <a class="btn btn-white"><i
                                                                    class="fa-solid fa-angle-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="text-muted d-none d-md-inline-block">Showing 10 of 112
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="email-content">
                                            <div class="table-responsive">
                                                <table class="table table-inbox table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="6" class="ps-2">
                                                                <input type="checkbox" class="checkbox-all">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa fa-star starred "></i></span></td>
                                                            <td class="name">John Doe</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td><i class="fa-solid fa-paperclip"></i></td>
                                                            <td class="mail-date">13:14</td>
                                                        </tr>
                                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">Envato Account</td>
                                                            <td class="subject">Important account security update from
                                                                Envato</td>
                                                            <td></td>
                                                            <td class="mail-date">8:42</td>
                                                        </tr>
                                                        <tr class="clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">Twitter</td>
                                                            <td class="subject">HRMS Bootstrap Admin Template</td>
                                                            <td></td>
                                                            <td class="mail-date">30 Nov</td>
                                                        </tr>
                                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">Richard Parker</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td></td>
                                                            <td class="mail-date">18 Sep</td>
                                                        </tr>
                                                        <tr class="clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">John Smith</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td></td>
                                                            <td class="mail-date">21 Aug</td>
                                                        </tr>
                                                        <tr class="clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">me, Robert Smith (3)</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td></td>
                                                            <td class="mail-date">1 Aug</td>
                                                        </tr>
                                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">Codecanyon</td>
                                                            <td class="subject">Welcome To Codecanyon</td>
                                                            <td></td>
                                                            <td class="mail-date">Jul 13</td>
                                                        </tr>
                                                        <tr class="clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">Richard Miles</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td><i class="fa-solid fa-paperclip"></i></td>
                                                            <td class="mail-date">May 14</td>
                                                        </tr>
                                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa-regular fa-star"></i></span></td>
                                                            <td class="name">John Smith</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td></td>
                                                            <td class="mail-date">11/11/16</td>
                                                        </tr>
                                                        <tr class="clickable-row" data-href="mail-view.html">
                                                            <td>
                                                                <input type="checkbox" class="checkmail">
                                                            </td>
                                                            <td><span class="mail-important"><i
                                                                        class="fa fa-star starred "></i></span></td>
                                                            <td class="name">Mike Litorus</td>
                                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                                                                adipiscing elit</td>
                                                            <td></td>
                                                            <td class="mail-date">10/31/16</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Email -->

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
    <script>
        $(document).ready(function() {
            // Initialize the date picker
            $('.datepicker-input').datepicker({
                dateFormat: 'mm/dd/yy', // Set the date format (e.g., mm/dd/yyyy)
                showAnim: 'slideDown' // Choose an animation for the date picker (optional)
            });
        });
    </script>
@endpush
