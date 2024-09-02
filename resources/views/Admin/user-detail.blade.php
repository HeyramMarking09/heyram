@extends('Admin.layouts.app')


@section('content')

    <style>
        .company-card {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .company-card h5 {
            margin-bottom: 15px;
            font-weight: bold;
        }

        .company-card p {
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <h4 class="page-title">Employer Overview </h4>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <div class="head-icons">
                                    <a href="{{ route('admin.employer-detail', ['id' => request()->id]) }}"
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
                                    <li><a href="{{ route('admin.employer-dashboard') }}"><i
                                                class="ti ti-arrow-narrow-left"></i>Employers</a></li>
                                    <li>{{ $data->name }} {{ $data->last_name }}</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                            </div>
                        </div>
                    </div>
                    <div class="contact-wrap">
                        <div class="contact-profile">
                            <div class="avatar company-avatar">
                                <span class="text-icon">{{ $data->name[0] }}</span>
                            </div>
                            <div class="name-user">
                                <h5>{{ $data->name }} {{ $data->last_name }}</h5>
                            </div>
                        </div>
                        <div class="contacts-action">
                            <button class="btn btn-primary edit-popup me-2"><i
                                    class="ti ti-square-rounded-plus"></i>Addition Docs</button>
                            {{-- <button class="btn btn-primary me-2 add-popups"><i class="ti ti-square-rounded-plus"></i>Job Edit</button> --}}
                            <button class="btn btn-primary add-popup"><i class="ti ti-square-rounded-plus"></i>Job
                                Add</button>
                        </div>
                    </div>
                    <!-- /Leads User -->

                </div>

                <!-- Leads Sidebar -->
                <div class="col-xl-3">
                    <div class="contact-sidebar">
                        <h6>User Information</h6>
                        <ul class="other-info">
                            <li><span class="other-title">Email</span><span>{{ $data->email }}</span></li>
                            <li><span class="other-title">Phone</span><span>{{ $data->phone }}</span></li>
                            <li><span
                                    class="other-title">Status</span><span>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</span>
                            </li>
                            <li><span class="other-title">User
                                    type</span><span>{{ $data->is_online == 1 ? 'Online' : 'Offline' }}</span></li>
                            <li><span class="other-title">Created
                                    At</span><span>{{ $data->created_at->format('d M Y, h:i a') }}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /Leads Sidebar -->

                <!-- Leads Details -->
                <div class="col-xl-9">
                    <div class="contact-tab-wrap">
                        <ul class="contact-nav nav">
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#activities" class="active"><i
                                        class="ti ti-alarm-minus"></i>Activities</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#company_informations"><i
                                        class="ti ti-mail-check"></i>Company Information</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#company_document"><i
                                        class="ti ti-mail-check"></i>Company Document</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#retainer_agreement"><i
                                        class="ti ti-mail-check"></i>Retainer Agreement</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#lmiaList"><i
                                        class="ti ti-mail-check"></i>Lmia List</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#jobBank"><i
                                        class="ti ti-mail-check"></i>Job Bank List</a>
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

                            <!-- Email -->
                            <div class="tab-pane fade" id="lmiaList">
                                <div class="view-header">
                                    <h4>Lmias</h4>
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
                                                                style="width: 30px;">Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Company Name: activate to sort column ascending"
                                                                style="width: 93px;">Company Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Lead Status: activate to sort column ascending"
                                                                style="width: 30px;">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="leads_list"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Created Date: activate to sort column ascending"
                                                                style="width: 35px;">Created Date</th>

                                                            <th class="text-end sorting" tabindex="0"
                                                                aria-controls="leads_list" rowspan="1" colspan="1"
                                                                aria-label="Action: activate to sort column ascending"
                                                                style="width: 43px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($data->lmias))
                                                            @php
                                                                $LISTNO = 1;
                                                            @endphp
                                                            @foreach ($data->lmias as $item)
                                                                <tr class="odd">
                                                                    <td><a href="{{ route('admin.lmia-detail',['id'=>$item->id]) }}"
                                                                            class="title-name">{{ $LISTNO }}</a>
                                                                    </td>
                                                                    <td><a href="{{ route('admin.lmia-detail',['id'=>$item->id]) }}"
                                                                            class="title-name">{{ $data->name }}
                                                                            {{ $data->last_name }}</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar d-flex align-items-center">
                                                                            <a href="#"
                                                                                class="profile-split d-flex flex-column">{{ $data->companyInformation->company_legel_name ?? '-' }}</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        @if ($item->status == 0)
                                                                            <span>Pending</span>
                                                                        @elseif ($item->status == 1)
                                                                            <span>Request received and approved </span>
                                                                        @elseif ($item->status == 2)
                                                                            <span>LMIA submitted</span>
                                                                        @elseif ($item->status == 3)
                                                                            <span>Payment deducted</span>
                                                                        @elseif ($item->status == 4)
                                                                            <span>Queued for assessment</span>
                                                                        @elseif ($item->status == 5)
                                                                            <span>LMIA assigned to the LMIA officer and
                                                                                assessment in progress</span>
                                                                        @elseif ($item->status == 6)
                                                                            <span>Interview Schedule</span>
                                                                        @elseif ($item->status == 7)
                                                                            <span>LMIA officer requested
                                                                                information/documents</span>
                                                                        @elseif ($item->status == 8)
                                                                            <span>LMIA process started, and job vacancy
                                                                                advertised</span>
                                                                        @elseif ($item->status == 9)
                                                                            <span>Other</span>
                                                                        @elseif ($item->status == 10)
                                                                            <span>LMIA Approved </span>
                                                                        @else
                                                                            <span>{{ $item->status }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $item->created_at->format('d M Y, h:i a') }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown table-action"><a
                                                                                href="#" class="action-icon "
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item edit-popup"
                                                                                    href="#"><i
                                                                                        class="ti ti-edit text-blue"></i>
                                                                                    Edit</a><a class="dropdown-item"
                                                                                    href="#" data-bs-toggle="modal"
                                                                                    data-bs-target="#delete_contact"><i
                                                                                        class="ti ti-trash text-danger"></i>
                                                                                    Delete</a><a class="dropdown-item"
                                                                                    href="#"><i
                                                                                        class="ti ti-clipboard-copy text-blue-light"></i>
                                                                                    Clone</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $LISTNO++;
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

                            <!-- /Comapny Information -->
                            <div class="tab-pane fade" id="company_informations">
                                <div class="notes-activity">
                                    <div class="row">
                                        <!-- Lightbox -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Company Information</h4>
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="float-end">
                                                            <div class="export-dropdwon">
                                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="ti ti-package-export"></i>Export</a>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    style="">
                                                                    <ul>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('admin.download.dynamic', ['type' => 'pdf', 'id' => $data->id]) }}">
                                                                                <i
                                                                                    class="ti ti-file-type-pdf text-danger"></i>
                                                                                Export as PDF
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('admin.download.dynamic', ['type' => 'csv', 'id' => $data->id]) }}">
                                                                                <i
                                                                                    class="ti ti-file-type-xls text-green"></i>
                                                                                Export as CSV
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                                        <ul class="nav nav-tabs twitter-bs-wizard-nav"
                                                            style="margin-left: 165px;">
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 firstLinke disabled"
                                                                    data-bs-toggle="tab" data-bs-target="#seller-details">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Seller Details">
                                                                        <i class="far fa-user"></i>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link secondLinke border-0 disabled"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#company-document">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Company Document">
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
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="basicpill-firstname-input"
                                                                                class="form-label">First
                                                                                name</label>
                                                                            <input type="text" name="name"
                                                                                @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->name }}" @endif
                                                                                class="form-control"
                                                                                id="basicpill-firstname-input">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="basicpill-lastname-input"
                                                                                class="form-label">Last
                                                                                name</label>
                                                                            <input type="text"
                                                                                @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->last_name }}" @endif
                                                                                name="last_name" class="form-control"
                                                                                id="basicpill-lastname-input">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="basicpill-phoneno-input"
                                                                                class="form-label">Phone</label>
                                                                            <input type="number"
                                                                                @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->phone }}" @endif
                                                                                minlength="10" maxlength="10"
                                                                                name="phone" class="form-control"
                                                                                id="basicpill-phoneno-input">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="basicpill-email-input"
                                                                                class="form-label">Email</label>
                                                                            <input type="email"
                                                                                @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->email }}" @endif
                                                                                name="email" class="form-control"
                                                                                id="basicpill-email-input">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="basicpill-email-input"
                                                                                class="form-label">Job
                                                                                Title</label>
                                                                            <input type="text"
                                                                                @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->job_title }}" @endif
                                                                                name="job_title" class="form-control"
                                                                                id="basicpill-job_title-input">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                    <li class="next disabled"><a
                                                                            href="javascript: void(0);"
                                                                            class="btn btn-primary">Next <i
                                                                                class="bx bx-chevron-right ms-1"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- tab pane -->
                                                            <div class="tab-pane fade " id="company-document">
                                                                <div>
                                                                    <div class="mb-4">
                                                                        <h5>Enter Your Address</h5>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-pancard-input"
                                                                                    class="form-label">Company
                                                                                    Legal Name
                                                                                </label>
                                                                                <input type="text"
                                                                                    name="company_legel_name"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->company_legel_name }}" @endif
                                                                                    class="form-control"
                                                                                    id="basicpill-pancard-input">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-vatno-input"
                                                                                    class="form-label">Company
                                                                                    Operating Name (if different from Legal
                                                                                    Name)</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->company_operating_name }}" @endif
                                                                                    name="company_operating_name"
                                                                                    class="form-control"
                                                                                    id="basicpill-vatno-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-cstno-input"
                                                                                    class="form-label">CRA
                                                                                    Business Number</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->cra_business_number }}" @endif
                                                                                    name="cra_business_number"
                                                                                    class="form-control"
                                                                                    id="basicpill-cstno-input">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">Registered Business
                                                                                    Address</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->registered_business_address }}" @endif
                                                                                    name="registered_business_address"
                                                                                    class="form-control"
                                                                                    id="basicpill-servicetax-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Country</label>
                                                                                <select class="form-select"
                                                                                    name="country">
                                                                                    <option value="">Selct Country
                                                                                    </option>
                                                                                    @if (isset($countries) && count($countries) > 0)
                                                                                        @foreach ($countries as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}"
                                                                                                @if (isset($data) && !empty($data->companyInformation) && $item->id == $data->companyInformation->country) selected @endif>
                                                                                                {{ $item->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">Province
                                                                                    (State)</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->state }}" @endif
                                                                                    name="state" class="form-control"
                                                                                    id="basicpill-state-input">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">City</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->city }}" @endif
                                                                                    name="city" class="form-control"
                                                                                    id="basicpill-city-input">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">Postal Code</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->postal_code }}" @endif
                                                                                    name="postal_code"
                                                                                    class="form-control"
                                                                                    id="basicpill-postal_code-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <span>Total number of employees working under CRA
                                                                            business number</span>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-cstno-input"
                                                                                    class="form-label">Full
                                                                                    Time</label>
                                                                                <input type="number"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->full_time }}" @endif
                                                                                    name="full_time" class="form-control"
                                                                                    id="basicpill-full_time-input"
                                                                                    min="0">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">Part Time</label>
                                                                                <input type="number"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->part_time }}" @endif
                                                                                    name="part_time" class="form-control"
                                                                                    id="basicpill-part_time-input"
                                                                                    min="0">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">Company
                                                                                    incorporation date</label>
                                                                                <input type="date"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->company_incorporation_date }}" @endif
                                                                                    name="company_incorporation_date"
                                                                                    class="form-control"
                                                                                    id="basicpill-company_incorporation_date-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="card">
                                                                                <span class="card-title">Did business earn
                                                                                    more than $5 million
                                                                                    annual gross during last tax
                                                                                    year?</span>
                                                                                <div class="card-body">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            @if (isset($data) && !empty($data->companyInformation) && $data->companyInformation->more_then_five_million == 1) checked @endif
                                                                                            type="radio"
                                                                                            name="more_then_five_million"
                                                                                            value="1"
                                                                                            id="flexRadioDefault1">
                                                                                        <label class="form-check-label"
                                                                                            for="flexRadioDefault1">
                                                                                            Yes
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            @if (isset($data) && !empty($data->companyInformation) && $data->companyInformation->more_then_five_million == 0) checked @endif
                                                                                            name="more_then_five_million"
                                                                                            id="flexRadioDefault2"
                                                                                            value="0">
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
                                                                                <span class="card-title">Have you ever
                                                                                    applied for LMIA
                                                                                    application in last 3 year?</span>
                                                                                <div class="card-body">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            @if (isset($data) &&
                                                                                                    !empty($data->companyInformation) &&
                                                                                                    $data->companyInformation->lmia_application_in_last_three_year == 1) checked @endif
                                                                                            type="radio"
                                                                                            name="lmia_application_in_last_three_year"
                                                                                            id="flexRadioDefault3"
                                                                                            onclick="showHideJobTitle('1')"
                                                                                            value="1">
                                                                                        <label class="form-check-label"
                                                                                            for="flexRadioDefault3">
                                                                                            Yes
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="lmia_application_in_last_three_year"
                                                                                            @if (isset($data) &&
                                                                                                    !empty($data->companyInformation) &&
                                                                                                    $data->companyInformation->lmia_application_in_last_three_year == 0) checked @endif
                                                                                            id="flexRadioDefault4"
                                                                                            onclick="showHideJobTitle('2')"
                                                                                            value="0">
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
                                                                                    <div class="tab-pane show active"
                                                                                        id="use-esign">
                                                                                        <div class="sign-content">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-wrap">
                                                                                                        <label
                                                                                                            class="col-form-label">Job
                                                                                                            Title/Occupation</label>
                                                                                                        <input
                                                                                                            class="form-control"
                                                                                                            type="text"
                                                                                                            name="job_title_occupation[]"
                                                                                                            placeholder="Enter Job Title/Occupation">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6"
                                                                                                    @if (isset($data) &&
                                                                                                            !empty($data->companyInformation) &&
                                                                                                            $data->companyInformation->lmia_application_in_last_three_year == 0) style="display: none;" @endif>
                                                                                                    <div
                                                                                                        class="d-flex align-items-center">
                                                                                                        <div
                                                                                                            class="float-none form-wrap me-3 w-100">
                                                                                                            <label
                                                                                                                class="col-lg-3 col-form-label">Is
                                                                                                                the person
                                                                                                                currently
                                                                                                                working?</label>
                                                                                                            <div
                                                                                                                class="col-lg-9">
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
                                                                                                        <div
                                                                                                            class="input-btn form-wrap">
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
                                                                                <label for="basicpill-servicetax-input"
                                                                                    class="form-label">
                                                                                    Describe in your own words and in as
                                                                                    much details as
                                                                                    possible, the principle business
                                                                                    activity at this work
                                                                                    location?</label>
                                                                                <input type="text"
                                                                                    @if (isset($data) && !empty($data->companyInformation)) value="{{ $data->companyInformation->description }}" @endif
                                                                                    name="description"
                                                                                    class="form-control"
                                                                                    placeholder="description"
                                                                                    id="basicpill-description-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                        <li class="previous"><a
                                                                                href="javascript: void(0);"
                                                                                class="btn btn-primary"><i
                                                                                    class="bx bx-chevron-left me-1"></i>
                                                                                Previous</a>
                                                                        </li>
                                                                    </ul>
                                                                    {{-- </form> --}}
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
                            <!-- /Comapny Information -->
                            <!-- /Comapny Document -->
                            <div class="tab-pane fade" id="company_document">
                                <div class="notes-activity">
                                    <div class="row">

                                        <!-- Lightbox -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Company Document</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="input-file" class="form-label">Certificate of
                                                            Incorporation</label>
                                                        @if (isset($data) && !empty($data->companyDoc))
                                                            <span> <a style="color:red"
                                                                    href="{{ route('admin.download.file', ['filename' => $data->companyDoc->certificate_of_incorporation]) }}">
                                                                    Downlaod File</a></span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input-file" class="form-label">Valid Business
                                                            License</label>
                                                        @if (isset($data) && !empty($data->companyDoc))
                                                            <span> <a style="color:red"
                                                                    href="{{ route('admin.download.file', ['filename' => $data->companyDoc->valid_business_license]) }}">
                                                                    Downlaod File</a></span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input-file" class="form-label">T4 Summary of the
                                                            Company</label>
                                                        @if (isset($data) && !empty($data->companyDoc))
                                                            <span> <a style="color:red"
                                                                    href="{{ route('admin.download.file', ['filename' => $data->companyDoc->summary_of_company]) }}">
                                                                    Downlaod File</a></span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledSelect" class="form-label">Please upload
                                                            atleast one of the
                                                            following document:</label>
                                                        <select id="disabledSelect" class="form-select">
                                                            <option value="">--Select--</option>
                                                            <option value="1"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 1) selected @endif>Your
                                                                most recent T2 Schedule 100 Balance sheet information and T2
                                                                Schedule 125 Income statement information</option>
                                                            <option value="6"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 6) selected @endif>An
                                                                attestation confirming that your business is in good
                                                                financial standing and will be able to meet all financial
                                                                obligations to any TFW you hire for the entire duration of
                                                                their employment. </option>
                                                            <option value="2"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 2) selected @endif>Your
                                                                most recent T2042 Statement of farming activities</option>
                                                            <option value="3"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 3) selected @endif>Your
                                                                most recent T2125 Statement of business or professional
                                                                activities</option>
                                                            <option value="4"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 4) selected @endif>Your
                                                                most recent T3010 Registered charity information return
                                                            </option>
                                                            <option value="5"
                                                                @if (isset($data->companyDoc->following_document) && $data->companyDoc->following_document == 5) selected @endif>Your
                                                                most recent T4 or payroll records for a minimum of 6 weeks
                                                                immediately prior to the submission of this LMIA application
                                                                if the temporary foreign worker (TFW) already works for you.
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledSelect" class="form-label">Following
                                                            File</label>
                                                        @if (isset($data) && !empty($data->companyDoc))
                                                            <span> <a style="color:red"
                                                                    href="{{ route('admin.download.file', ['filename' => $data->companyDoc->following_document_file_one]) }}">
                                                                    Downlaod File</a></span>
                                                        @endif
                                                    </div>
                                                    @if (isset($data->companyDoc->following_document_file_two) && !is_null($data->companyDoc->following_document_file_two))
                                                        <div class="mb-3">
                                                            <label for="disabledSelect" class="form-label">Following
                                                                File</label>
                                                            <span> <a style="color:red"
                                                                    href="{{ route('admin.download.file', ['filename' => $data->companyDoc->following_document_file_two]) }}">
                                                                    Downlaod File</a></span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Requeired Document</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-sm-12 table-responsive">
                                                        <table class="table no-footer" style="width: 1241px;">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="leads_list" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Lead Name: activate to sort column ascending"
                                                                        style="width: 20px;">Id</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="leads_list" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Lead Name: activate to sort column ascending"
                                                                        style="width: 30px;">Name</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="leads_list" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Company Name: activate to sort column ascending"
                                                                        style="width: 93px;">Dead Line Date</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="leads_list" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Created Date: activate to sort column ascending"
                                                                        style="width: 35px;">Simple File</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="leads_list" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Created Date: activate to sort column ascending"
                                                                        style="width: 35px;">Docs File</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (isset($data->AdditionalDocument))
                                                                    @php
                                                                        $LISTNO2 = 1;
                                                                    @endphp
                                                                    @foreach ($data->AdditionalDocument as $item)
                                                                        <tr class="odd">
                                                                            <td>{{ $LISTNO2 }}</td>
                                                                            <td>{{ $item->name }}</td>
                                                                            <td>{{ $item->dead_line_date }}</td>
                                                                            <td><span> <a style="color:red"
                                                                                        href="{{ route('admin.download.file', ['filename' => $item->simple_file]) }}"><i
                                                                                            class="ti ti-download text-danger"></i>
                                                                                        Downlaod File</a></span></td>
                                                                            <td>
                                                                                @if (!is_null($item->docs_file))
                                                                                    <span> <a style="color:red"
                                                                                            href="{{ route('admin.download.file', ['filename' => $item->docs_file]) }}"><i
                                                                                                class="ti ti-download text-danger"></i>
                                                                                            Downlaod File</a></span>
                                                                            </td>
                                                                        @else
                                                                            -
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
                            <!-- /Comapny Document -->
                            <!-- /Retainer Agreement -->
                            <div class="tab-pane fade" id="retainer_agreement">
                                <div class="notes-activity">
                                    <div class="row">
                                        <!-- Lightbox -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Retainer Agreement</h4>
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="float-end">
                                                            <div class="export-dropdwon">
                                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="ti ti-package-export"></i>Export</a>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    style="">
                                                                    <ul>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('admin.download.retainer_agreement', ['type' => 'pdf', 'id' => $data->id]) }}">
                                                                                <i
                                                                                    class="ti ti-file-type-pdf text-danger"></i>
                                                                                Export as PDF
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('admin.download.retainer_agreement', ['type' => 'csv', 'id' => $data->id]) }}">
                                                                                <i
                                                                                    class="ti ti-file-type-xls text-green"></i>
                                                                                Export as CSV
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                                        <ul class="nav nav-tabs twitter-bs-wizard-nav">
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 disabled firstList"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#seller-details-update">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Seller Details">
                                                                        1
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 disabled secondLink"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#company-document-update">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Company Document">
                                                                        2
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 disabled thirdLink"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#bank-detail-update">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Bank Details">
                                                                        3
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 disabled fourthLink"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#bank-detail-2-update">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Bank Details">
                                                                        4
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="javascript:void(0);"
                                                                    class="nav-link border-0 disabled fifthLInk"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#bank-detail-3-update">
                                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Bank Details">
                                                                        5
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!-- wizard-nav -->

                                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                                            <div class="tab-pane show active" id="seller-details-update">
                                                                <div class="row">
                                                                    <p class="lead"><b>RCIC Membership Number: R526789
                                                                            <span style="float: right;"> Client File
                                                                                Number:
                                                                                {{ $data->id }}</span></b></p>
                                                                    <div class="row w-100">
                                                                        <div class="col-md-12">
                                                                            <p>This Initial Consultation Agreement is made
                                                                                on this <b>
                                                                                    @if (isset($data))
                                                                                        {{ $data->date }}
                                                                                    @else
                                                                                        {{ date('d-m-Y') }}
                                                                                    @endif
                                                                                </b>, for the Service purchased for <b>Post
                                                                                    Graduation Work Permit</b> application,
                                                                            </p>
                                                                            <p>Between <b>Regulated Canadian Immigration
                                                                                    Consultant (RCIC)
                                                                                    <ul class="member-info">
                                                                                        <li>Mr. Shivam Sharma </li>
                                                                                        <li>Heyram Consulting Ltd. </li>
                                                                                        <li>Address: 13370 78 Ave Unit 54,
                                                                                            Surrey, BC V3W 0H6 </li>
                                                                                        <li>Tel: (778) 664-8164 </li>
                                                                                        <li>Email: info@heyram.ca</li>
                                                                                    </ul>
                                                                                </b>

                                                                                AND, CLIENT
                                                                            </p>
                                                                            <p><b>
                                                                                    <ul class="member-info">
                                                                                        <li>{{ $data->name }} </li>
                                                                                        <li>Address: </li>
                                                                                        <li>Tel: {{ $data->phone }} </li>
                                                                                        <li>Email: {{ $data->email }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </b>
                                                                            </p>
                                                                            <div class="form-check">
                                                                                <input disabled class="form-check-input"
                                                                                    type="checkbox" checked
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    I accept
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                    <li class="next"><a href="javascript: void(0);"
                                                                            class="btn btn-primary"
                                                                            onclick="firstClick('1')">Next
                                                                            <i class="bx bx-chevron-right ms-1"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- tab pane -->
                                                            <div class="tab-pane fade" id="company-document-update">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p>WHEREAS the RCIC and the Client wish to
                                                                                enter into a written
                                                                                agreement which contains the agreed upon
                                                                                terms and conditions
                                                                                upon
                                                                                which the RCIC will provide his/her
                                                                                services to the Client.</p>
                                                                            <p>AND WHEREAS the RCIC is a licensee of the
                                                                                College of Immigration
                                                                                and
                                                                                Citizenship Consultants (“the College”),
                                                                                the regulator in Canada
                                                                                for
                                                                                immigration consultants.</p>
                                                                            <p></p>
                                                                            <p>IN CONSIDERATION of the mutual covenants
                                                                                contained in this
                                                                                Agreement,
                                                                                the parties agree as follows:</p>
                                                                            <p><b>1. Definitions</b></p>
                                                                            <p>The terms set out in this Retainer
                                                                                Agreement, have the meaning
                                                                                given
                                                                                to such terms in the Retainer Agreement
                                                                                Regulation and By-law of
                                                                                the
                                                                                College, as amended from time to time.
                                                                            </p>
                                                                            <p><b>2. RCIC Responsibilities and
                                                                                    Commitments </b></p>
                                                                            <p>The Client asked the RCIC, and the RCIC
                                                                                has agreed, to act for
                                                                                the
                                                                                Client in the matter of this application
                                                                                for <b></b></p>
                                                                            <p>In consideration of the fees paid and the
                                                                                matter said above, the
                                                                                RCIC
                                                                                agrees to do the following:</p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>a) Client Consultation in order to
                                                                                    answer the questions or
                                                                                    concerns or doubts the client might
                                                                                    have regarding the
                                                                                    application. </li>
                                                                                <li>b) Inform and provide the client
                                                                                    with the Documents
                                                                                    Checklist
                                                                                    and Required Information for the
                                                                                    purpose of this application
                                                                                </li>
                                                                                <li>c) Gather required documents and
                                                                                    information required for
                                                                                    the
                                                                                    purpose of this application</li>
                                                                                <li>d) Prepare and Submit the
                                                                                    application for <b></b> </li>
                                                                                <li>e) Provide client with the login
                                                                                    credentials of the accounts
                                                                                    created by the RCIC for the purpose
                                                                                    of this application (
                                                                                    Examples of the accounts are My CIC
                                                                                    account, PNP account, or
                                                                                    IRCC portal account) </li>
                                                                                <li>f) Check file updates and recommend
                                                                                    further steps only when
                                                                                    requested by the client via email as
                                                                                    a written request.
                                                                                </li>

                                                                            </ul>
                                                                            </p>
                                                                            <p><b>3. Client Responsibilities and
                                                                                    Commitments</b></p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>3.1 The Client must provide, upon
                                                                                    request from the RCIC:
                                                                                    <ul class="member-info-details">
                                                                                        <li>● All necessary
                                                                                            documentation.</li>
                                                                                        <li>● All documentation in
                                                                                            English or French, or with
                                                                                            an
                                                                                            English or French
                                                                                            translation.</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>3.2 The Client understands that
                                                                                    he/she must be accurate and
                                                                                    honest in the information he/she
                                                                                    provides and that any
                                                                                    misrepresentations or omissions may
                                                                                    void
                                                                                    this Agreement,
                                                                                    or seriously affect the outcome of
                                                                                    the application or the
                                                                                    retention of
                                                                                    any immigration status he/she may
                                                                                    obtain. The RCIC’s
                                                                                    obligations
                                                                                    under
                                                                                    the Retainer Agreement are null and
                                                                                    void if the Client
                                                                                    knowingly
                                                                                    provides
                                                                                    any inaccurate, misleading, or false
                                                                                    material information.
                                                                                    The Client’s financial obligations
                                                                                    remain.
                                                                                </li>
                                                                                <li>
                                                                                    3.3 In the event Immigration,
                                                                                    Refugees and Citizenship
                                                                                    Canada
                                                                                    (IRCC) or
                                                                                    Employment and Social Development
                                                                                    Canada (ESDC) or
                                                                                    Provincial
                                                                                    Government
                                                                                    Administrator or processing Visa
                                                                                    Office should contact the
                                                                                    Client directly,
                                                                                    the Client is instructed to notify
                                                                                    the RCIC immediately.
                                                                                </li>
                                                                                <li>
                                                                                    3.4 The Client is to immediately
                                                                                    advise the RCIC of any
                                                                                    change
                                                                                    in the marital,
                                                                                    family, or civil status or change of
                                                                                    physical address or
                                                                                    contact
                                                                                    information
                                                                                    for any person included in the
                                                                                    application.
                                                                                </li>
                                                                                <li>3.5 In the event of a Joint Retainer
                                                                                    Agreement,
                                                                                    the Clients agree that the RCIC must
                                                                                    share information among
                                                                                    all
                                                                                    clients,
                                                                                    as required. Furthermore, if a
                                                                                    conflict develops that cannot
                                                                                    be
                                                                                    resolved,
                                                                                    the RCIC cannot continue to act for
                                                                                    both or all the Clients
                                                                                    and
                                                                                    may have to
                                                                                    withdraw completely from
                                                                                    representation.
                                                                                </li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>The client acknowledges that they have
                                                                                    properly read all the
                                                                                    terms
                                                                                    of this section.
                                                                                    <input type="text"
                                                                                        class="text-container"
                                                                                        name="name_first"
                                                                                        @if (isset($data) && !empty($data->retainerAgreements)) value="{{ $data->retainerAgreements->name_first }}" @endif
                                                                                        placeholder="Name">(client
                                                                                    firstname
                                                                                    first word Lastname first
                                                                                    word)</b></p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" disabled
                                                                                    type="checkbox" checked
                                                                                    id="flexCheckDefault1">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault1">
                                                                                    I accept
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                        <li class="previous"><a onclick="firstClick('2')"
                                                                                href="javascript: void(0);"
                                                                                class="btn btn-primary"><i
                                                                                    class="bx bx-chevron-left me-1"></i>
                                                                                Previous</a></li>
                                                                        <li class="float-end"><a onclick="firstClick('3')"
                                                                                class="btn btn-primary">Next <i
                                                                                    class="bx bx-chevron-right ms-1"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- tab pane -->
                                                            <div class="tab-pane fade" id="bank-detail-update">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p><b>4. Refund Policy:</b></p>
                                                                            <p>The money paid by the client to the RCIC
                                                                                is deemed earned and is
                                                                                nonrefundable.
                                                                                The Client acknowledges to the following
                                                                                terms and conditions in
                                                                                relation to the refund policy:</p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>● There is <b>no refund</b> in the
                                                                                    event of an application
                                                                                    is refused as RCIC cannot control
                                                                                    the outcome of any
                                                                                    application. The granting of a visa
                                                                                    or any immigration
                                                                                    status is at the sole discretion of
                                                                                    the government of Canada
                                                                                    (or Government Authorities) and not
                                                                                    the RCIC. </li>
                                                                                <li>● There is <b>no refund</b> if the
                                                                                    application takes more
                                                                                    than normal processing time. The
                                                                                    time required for
                                                                                    processing the application is at the
                                                                                    sole discretion of the
                                                                                    government of Canada (or Government
                                                                                    Authorities) and not the
                                                                                    RCIC. In other words, the processing
                                                                                    times of the
                                                                                    application are not in hands of the
                                                                                    RCIC. The client cannot
                                                                                    blame RCIC for the processing time
                                                                                    and ask for refunds of
                                                                                    any kind</li>
                                                                                <li>● There is <b>no refund</b> if the
                                                                                    client decides to NOT
                                                                                    pursue with the RCIC, for any
                                                                                    reasons whatsoever, after
                                                                                    signing this retainer agreement
                                                                                </li>
                                                                                <li>● There is <b>no refund</b> if the
                                                                                    client abandons the case.
                                                                                </li>
                                                                                <li>● There is <b>no refund</b> if the
                                                                                    client decided to
                                                                                    withdraw their application once it
                                                                                    has been submitted.</li>
                                                                                <li>● There is <b>no refund</b> if there
                                                                                    is any changes in
                                                                                    federal or provincial rules/laws
                                                                                    (CIC or PNP) that might
                                                                                    affect client’s ability to become
                                                                                    eligible in a certain
                                                                                    program or pathway discussed at time
                                                                                    of this retainer
                                                                                    agreement. All fees paid till date
                                                                                    are deemed earned and the
                                                                                    RCIC is not liable to refund any
                                                                                    amounts that are paid at
                                                                                    signing of this agreement </li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>The client acknowledges that they have
                                                                                    properly read all the
                                                                                    terms of this section.
                                                                                    <input type="text"
                                                                                        class="text-container"
                                                                                        placeholder="Name"
                                                                                        @if (isset($data) && !empty($data->retainerAgreements)) value="{{ $data->retainerAgreements->second_name }}" @endif
                                                                                        name="second_name">(client
                                                                                    firstname first word Lastname first
                                                                                    word)</b></p>
                                                                            <p><b>Important NOTES:</b></p>
                                                                            <p><b>
                                                                                    <ul class="member-info-details">
                                                                                        <li>● All fees paid up to this
                                                                                            point is DEEMED EARNED
                                                                                            and NON-REFUNDABLE. </li>
                                                                                        <li>● It is important to note
                                                                                            that If the client wants
                                                                                            to lodge a new application
                                                                                            in case the outcome of
                                                                                            the current file is negative
                                                                                            (the application is
                                                                                            refused), a new retainer
                                                                                            agreement must be signed.
                                                                                        </li>
                                                                                        <li>● The Client acknowledges
                                                                                            that only the
                                                                                            responsibilities and duties
                                                                                            covered under section 2
                                                                                            of this agreement are
                                                                                            covered under this
                                                                                            agreement.
                                                                                            Any additional services
                                                                                            requested by the client
                                                                                            requires the client to sign
                                                                                            a new retainer
                                                                                            agreement. </li>
                                                                                        <li>● Once the file is
                                                                                            submitted, the RCIC will
                                                                                            share
                                                                                            the login credentials with
                                                                                            the client via email for
                                                                                            any accounts created such as
                                                                                            PNP accounts/My CIC
                                                                                            Account/IRCC Portal Account.
                                                                                            Once the login
                                                                                            credentials have been
                                                                                            shared, the RCIC is not
                                                                                            responsible for any missed
                                                                                            updates or request
                                                                                            letters or any updates of
                                                                                            any kind. It is sole
                                                                                            responsibility of the client
                                                                                            to check for the
                                                                                            updates in their accounts
                                                                                        </li>
                                                                                        <li>● If the client provides
                                                                                            RCIC with fraudulent
                                                                                            documents, the RCIC has
                                                                                            right to inform the
                                                                                            government about it and file
                                                                                            a lawsuit against the
                                                                                            client, if it damages the
                                                                                            image of the RCIC and the
                                                                                            corporation the RCIC is
                                                                                            associated with.</li>
                                                                                    </ul>
                                                                                </b>
                                                                            </p>
                                                                            <p><b>The client acknowledges that they have
                                                                                    properly read all the
                                                                                    terms of this section.
                                                                                    <input type="text"
                                                                                        class="text-container"
                                                                                        placeholder="Name"
                                                                                        @if (isset($data) && !empty($data->retainerAgreements)) value="{{ $data->retainerAgreements->third_name }}" @endif
                                                                                        name="third_name">(client
                                                                                    firstname
                                                                                    first word Lastname first word)</b>
                                                                            </p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" checked disabled>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault2">
                                                                                    I accept
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                        <li class="previous"><a
                                                                                href="javascript: void(0);"
                                                                                class="btn btn-primary"
                                                                                onclick="firstClick('4')"><i
                                                                                    class="bx bx-chevron-left me-1"></i>
                                                                                Previous</a></li>
                                                                        <li class="float-end"><a onclick="firstClick('5')"
                                                                                class="btn btn-primary">Next <i
                                                                                    class="bx bx-chevron-right ms-1"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- tab pane -->
                                                            <div class="tab-pane fade" id="bank-detail-2-update">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p><b>5. Confidentiality</b></p>
                                                                            <p>All information and documentation
                                                                                received by the RCIC,
                                                                                required by IRCC and all other governing
                                                                                bodies,
                                                                                and used for the preparation of the
                                                                                application will not be
                                                                                divulged to any third party,
                                                                                other than agents and employees of the
                                                                                RCIC, without prior
                                                                                consent,
                                                                                except as demanded by the College or
                                                                                required under law.
                                                                                The RCIC, and all agents and employees
                                                                                of the RCIC,
                                                                                are also bound by the confidentiality
                                                                                requirements of Article 8
                                                                                of the Code of Professional Ethics.
                                                                            </p>
                                                                            <p>The Client agrees to the use of
                                                                                electronic communication and
                                                                                storage of confidential information
                                                                                on a cloud-based database. The RCIC will
                                                                                use his/her best
                                                                                efforts to maintain a high degree
                                                                                of security for electronic communication
                                                                                and information
                                                                                storage.
                                                                            </p>
                                                                            <p><b>6. Force Majeure</b></p>
                                                                            <p>The RCIC’s failure to perform any term of
                                                                                this Retainer
                                                                                Agreement,
                                                                                because of conditions beyond his/her
                                                                                control such as,
                                                                                but not limited to, governmental
                                                                                restrictions or subsequent
                                                                                legislation,
                                                                                war, strikes, or acts of God, shall not
                                                                                be deemed a breach of
                                                                                this Agreement.</p>
                                                                            <p><b>7. Change Policy</b></p>
                                                                            <p>The Client acknowledges that if the RCIC
                                                                                is asked to act on the
                                                                                Client’s
                                                                                behalf on matters other than those
                                                                                outlined above in the scope
                                                                                of this Agreement,
                                                                                or because of a material change in the
                                                                                Client’s circumstances,
                                                                                or because of material facts not
                                                                                disclosed at the outset of the
                                                                                application,
                                                                                or because of a change in government
                                                                                legislation regarding the
                                                                                processing of immigration
                                                                                or citizenship-related applications, the
                                                                                Agreement can be
                                                                                modified accordingly.</p>
                                                                            <p>This Agreement may only be altered or
                                                                                amended when such changes
                                                                                are made in writing and executed
                                                                                by the parties hereto. All changes
                                                                                and/or edits must be
                                                                                initialled and dated by
                                                                                both the Licensee and the Client. Any
                                                                                substantial changes to
                                                                                this agreement may
                                                                                require that the parties enter into a
                                                                                new Retainer Agreement.
                                                                            </p>
                                                                            <p><b>8. Termination</b></p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>8.1 This Agreement is considered
                                                                                    terminated upon completion
                                                                                    of tasks identified under section 2
                                                                                    of this agreement.</li>
                                                                                <li>8.2 This Agreement is considered
                                                                                    terminated if material
                                                                                    changes occur to the Client’s
                                                                                    application or eligibility,
                                                                                    which make it impossible to proceed
                                                                                    with services detailed
                                                                                    in section 2 of this Agreement.</li>
                                                                                <li>8.3 This Agreement is considered
                                                                                    terminated if the client
                                                                                    asks the RCIC to anything unlawful.
                                                                                </li>
                                                                                <li>8.4 This Agreement is considered
                                                                                    terminated if the RCIC
                                                                                    finds that the documents presented
                                                                                    to the RCIC are
                                                                                    fraudulent. </li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>9. Discharge or Withdrawal of
                                                                                    Representation</b></p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>9.1 The Client may discharge
                                                                                    representation and terminate
                                                                                    this Agreement, upon writing, at
                                                                                    which time any outstanding
                                                                                    or unearned fees or Disbursements
                                                                                    will be refunded by the
                                                                                    RCIC to the Client and/or any
                                                                                    outstanding fees or
                                                                                    Disbursements will be paid by the
                                                                                    Client to the RCIC. </li>
                                                                                <li>9.2 Pursuant to Article 11 of the
                                                                                    Code of Professional
                                                                                    Ethics, the RCIC may withdraw
                                                                                    representation and terminate
                                                                                    this Agreement, upon writing,
                                                                                    provided withdrawal does not
                                                                                    cause prejudice to the Client, at
                                                                                    which time any outstanding
                                                                                    or unearned fees or Disbursements
                                                                                    will be refunded by the
                                                                                    RCIC to the Client and/or any
                                                                                    outstanding fees or
                                                                                    Disbursements will be paid by the
                                                                                    Client to the RCIC.</li>
                                                                                <li>9.3 At the time of withdrawal or
                                                                                    discharge, the RCIC must
                                                                                    provide the Client with an invoice
                                                                                    detailing all services
                                                                                    that have been rendered or
                                                                                    accounting for the time that has
                                                                                    been spent on the Client’s file.
                                                                                </li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>10. Governing Law</b></p>
                                                                            <p>This Agreement shall be governed by the
                                                                                laws in effect in the
                                                                                Province/Territory of British Columbia, and
                                                                                the
                                                                                federal laws of Canada applicable
                                                                                therein
                                                                                and except for disputes pursuant to
                                                                                Section 9 hereof, any
                                                                                dispute with respect to the terms
                                                                                of this Agreement shall be decided by a
                                                                                court of competent
                                                                                jurisdiction within the
                                                                                Province/Territory of
                                                                                British Columbia.
                                                                            </p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" checked disabled>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault3">
                                                                                    I accept
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                        <li class="previous"><a
                                                                                href="javascript: void(0);"
                                                                                onclick="firstClick('6')"
                                                                                class="btn btn-primary"><i
                                                                                    class="bx bx-chevron-left me-1"></i>
                                                                                Previous</a></li>
                                                                        <li class="float-end"><a onclick="firstClick('7')"
                                                                                class="btn btn-primary">Next <i
                                                                                    class="bx bx-chevron-right ms-1"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- tab pane -->
                                                            <div class="tab-pane fade" id="bank-detail-3-update">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p><b>11. Miscellaneous</b></p>
                                                                            <p>
                                                                            <ul class="member-info-details">
                                                                                <li>11.1 The Client expressly authorizes
                                                                                    the RCIC to act on
                                                                                    his/her behalf to the extent of the
                                                                                    specific functions which
                                                                                    the RCIC was retained to perform, as
                                                                                    per Section 2 hereof.
                                                                                </li>
                                                                                <li>11.2 This Agreement constitutes the
                                                                                    entire agreement between
                                                                                    the parties with respect to the
                                                                                    subject matter hereof and
                                                                                    supersedes all prior agreements,
                                                                                    understandings, warranties,
                                                                                    representations, negotiations and
                                                                                    discussions, whether oral
                                                                                    or written, of the parties except as
                                                                                    specifically set forth
                                                                                    herein.</li>
                                                                                <li>11.3 This Agreement shall be binding
                                                                                    upon the parties hereto
                                                                                    and their respective heirs,
                                                                                    administrators, successors and
                                                                                    permitted assigns.</li>
                                                                                <li>11.4 The Costs enumerated in this
                                                                                    Agreement are to be paid
                                                                                    by the Client.</li>
                                                                                <li>11.5 This Agreement may only be
                                                                                    altered or amended when such
                                                                                    changes are made in writing and
                                                                                    executed by the parties
                                                                                    hereto. All changes and/or edits
                                                                                    must be initialled and
                                                                                    dated by both the Licensee and the
                                                                                    Client. Any substantial
                                                                                    changes to this Agreement may
                                                                                    require that the parties enter
                                                                                    into a new Retainer Agreement.</li>
                                                                                <li>11.6 The Client may, after a
                                                                                    Retainer Agreement is signed,
                                                                                    appoint a Designate to act on their
                                                                                    behalf when dealing with
                                                                                    the RCIC. A Designate must not be
                                                                                    compensated by the Client
                                                                                    or the RCIC for acting in the
                                                                                    capacity of a Designate. </li>
                                                                                <li>11.7 The provisions of this
                                                                                    Agreement shall be deemed
                                                                                    severable. If any provision of this
                                                                                    Agreement shall be held
                                                                                    unenforceable by any court of
                                                                                    competent jurisdiction, such
                                                                                    provision shall be severed from this
                                                                                    Agreement, and the
                                                                                    remaining provisions shall remain in
                                                                                    full force and effect.
                                                                                </li>
                                                                                <li>11.8 The headings utilized in this
                                                                                    Agreement are for
                                                                                    convenience only and are not to be
                                                                                    construed in any way as
                                                                                    additions to or limitations of the
                                                                                    covenants and agreements
                                                                                    contained in this Agreement.</li>
                                                                                <li>11.9 Each of the parties hereto must
                                                                                    do and execute or cause
                                                                                    to be done or executed all such
                                                                                    further and other things,
                                                                                    acts, deeds, documents, and
                                                                                    assurances as may be necessary
                                                                                    or reasonably required to carry out
                                                                                    the intent and purpose
                                                                                    of this Agreement fully and
                                                                                    effectively.</li>
                                                                                <li>11.10 The Client acknowledges that
                                                                                    he/she has had sufficient
                                                                                    time to review this Agreement and
                                                                                    has been given an
                                                                                    opportunity to obtain independent
                                                                                    legal advice and
                                                                                    translation prior to the execution
                                                                                    and delivery of this
                                                                                    Agreement. <br>
                                                                                    In the event the Client did not seek
                                                                                    independent legal
                                                                                    advice prior to signing this
                                                                                    Agreement, he/she did so
                                                                                    voluntarily without any undue
                                                                                    pressure and agrees that the
                                                                                    failure to obtain independent legal
                                                                                    advice must not be used
                                                                                    as a defence to the enforcement of
                                                                                    obligations created by
                                                                                    this Agreement. </li>
                                                                                <li>11.11 Furthermore, the Client
                                                                                    acknowledges that he/she has
                                                                                    received a copy of this Agreement
                                                                                    and agrees to be bound by
                                                                                    its terms. </li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>12. Dispute Resolution</b></p>
                                                                            <p>Please be advised that __Shivam Sharma_
                                                                                is a member in good
                                                                                standing of the Immigration Consultants
                                                                                of Canada Regulatory
                                                                                Council
                                                                                (ICCRC), and as such, is bound by its
                                                                                By-laws, Code of
                                                                                Professional Ethics, and associated
                                                                                Regulations.</p>
                                                                            <p>In the event of a dispute, the Client(s)
                                                                                and RCIC are to make
                                                                                every effort to resolve the matter
                                                                                between the two parties. In
                                                                                the event a resolution
                                                                                cannot be reached, the Client(s) are to
                                                                                present the complaint in
                                                                                writing to the RCIC and allow the RCIC
                                                                                30 days to respond to the
                                                                                Client(s). In
                                                                                the event the dispute is still
                                                                                unresolved, the Client(s) may
                                                                                follow the complaint and discipline
                                                                                procedure outlined by ICCRC
                                                                                on their website:
                                                                                <a
                                                                                    href="http://www.iccrc-crcic.ca/public/complaintsDiscipline.cfm">http://www.iccrc-crcic.ca/public/complaintsDiscipline.cfm<a>
                                                                                        <b>NOTE: All complaint forms
                                                                                            must be signed.</b>
                                                                            </p>

                                                                            <p><b>ICCRC Contact Information:</b></p>
                                                                            <p>
                                                                            <ul class="member-info">
                                                                                <li><b>ICCRC Contact Information:</b>
                                                                                </li>
                                                                                <li>Immigration Consultants of Canada
                                                                                    Regulatory Council (ICCRC)
                                                                                </li>
                                                                                <li>5500 North Service Rd., Suite 1002
                                                                                </li>
                                                                                <li>Burlington, ON, L7L 6W6</li>
                                                                                <li>Toll free: 1-877-836-7543</li>
                                                                            </ul>
                                                                            </p>
                                                                            <p><b>13. Contact Information</b></p>

                                                                            <p><b>
                                                                                    <ul class="member-info">
                                                                                        <li>{{ $data->name }} </li>
                                                                                        <li>Address: </li>
                                                                                        <li>Tel: {{ $data->phone }}
                                                                                        </li>
                                                                                        <li>Email: {{ $data->email }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </b>
                                                                            </p>
                                                                            <p class="client-sign">
                                                                            <div class="client-sign-1"><input
                                                                                    type="text" name="client_signature"
                                                                                    @if (isset($data) && !empty($data->retainerAgreements)) value="{{ $data->retainerAgreements->client_signature }}" @endif
                                                                                    id="client_signature"><br />
                                                                                <b>Signature of Client </b>
                                                                            </div>
                                                                            <div class="client-sign-2"
                                                                                style="float: right;">
                                                                                <img style="width:80px"
                                                                                    src="{{ asset('assets/img/heyram-logo.jfif') }}">
                                                                                <br>
                                                                                <b>Signature of RCIC</b>
                                                                            </div>
                                                                            </p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" checked disabled>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault4">
                                                                                    I accept
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                        <li class="previous"><a onclick="firstClick('8')"
                                                                                href="javascript: void(0);"
                                                                                class="btn btn-primary"><i
                                                                                    class="bx bx-chevron-left me-1"></i>
                                                                                Previous</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- tab pane -->
                                                        </div>
                                                        <!-- end tab content -->
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Retainer Agreement -->

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

                                                            <th class="text-end sorting" tabindex="0"
                                                                aria-controls="leads_list" rowspan="1" colspan="1"
                                                                aria-label="Action: activate to sort column ascending"
                                                                style="width: 43px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($data->jobBank))
                                                            @php
                                                                $LISTNO1 = 1;
                                                            @endphp
                                                            @foreach ($data->jobBank as $item)
                                                                <tr class="odd">
                                                                    <td><a href="#"
                                                                            class="title-name">{{ $LISTNO1 }}</a>
                                                                    </td>
                                                                    <td><a href="#"
                                                                            class="title-name">{{ $item->job_title }}</a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar d-flex align-items-center">
                                                                            <a href="#"
                                                                                class="profile-split d-flex flex-column">{{ $item->number_of_vacancies }}</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->location ?? '-' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->start_date ?? '-' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->end_date ?? '-' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->bank_job_ad_number ?? '0' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>{{ $item->status ?? 'Pending' }}</span>
                                                                    </td>
                                                                    <td>{{ $item->created_at->format('d M Y, h:i a') }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown table-action"><a
                                                                                href="#" class="action-icon "
                                                                                data-bs-toggle="dropdown" 
                                                                                aria-expanded="false"><i
                                                                                    class="fa fa-ellipsis-v"></i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item add-popups" onclick="getValueForBankJob('{{ $item->id }}','{{ $item->job_title }}','{{ $item->number_of_vacancies }}','{{ $item->location }}','{{ $item->start_date }}','{{ $item->end_date }}','{{ $item->bank_job_ad_number }}','{{ $item->status }}')"
                                                                                    href="#"><i
                                                                                        class="ti ti-edit text-blue"></i>
                                                                                    Edit</a><a class="dropdown-item"
                                                                                    href="#" data-bs-toggle="modal"
                                                                                    onclick="getBankDelete('{{ $item->id }}')"
                                                                                    data-bs-target="#bank_job_delete_contact"><i
                                                                                        class="ti ti-trash text-danger"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
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

    <!-- Add User -->
    <div class="toggle-popup" id="userPopup">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Add Job</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="manageUserForm">
                        @csrf
                        <div class="accordion-lists" id="list-accord">
                            <!-- Basic Info -->
                            <input type="hidden" name="employer_id" value="{{ request()->id }}">
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Job Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="job_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Number Of Vacancies</label>
                                                <input type="number" min="0" name="number_of_vacancies"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Location</label>
                                                </div>
                                                <input type="text" name="location" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Start Date</label>
                                                <input type="text" name="start_date" class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">End Date</label>
                                                <input type="text" name="end_date" class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Bank Job ad Number </label>
                                                <input type="number" min="0" name="bank_job_ad_number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> Status</label>
                                                <select class="select" name="status">
                                                    <option value="">-Select-</option>
                                                    <option value="advertised">Advertised</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="decline">Decline</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button type="submit" id="createUserSubmitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add User -->
    <!-- Edit User -->
    <div class="toggle-popup1">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Add Request For Additional Documents</h4>
                <a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="AdditionalDocs" enctype="multipart/form-data">
                        @csrf
                        <div class="accordion-lists" id="list-accords">
                            <!-- Basic Info -->
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <input type="hidden" name="employer_id" value="{{ request()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Document </label>
                                                <input type="text" required name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Dead Line To Upload The Document </label>
                                                <input type="date" name="dead_line_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Simple Fine </label>
                                                </div>
                                                <input type="file" name="simple_file" accept=".pdf,.doc,.docx"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close1">Cancel</a>
                            <button type="submit" id="DocumentSubmitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit User -->
    <!-- Add User -->
    <div class="toggle-popup2" id="userPopup2">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Update Job</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="JobFormUpdate">
                        @csrf
                        <div class="accordion-lists" id="list-accord">
                            <!-- Basic Info -->
                            <input type="hidden" name="id" id="job_id">
                            <div class="manage-user-modal">
                                <div class="manage-user-modals">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Job Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="job_title" id="job_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Number Of Vacancies</label>
                                                <input type="number" min="0" id="number_of_vacancies" name="number_of_vacancies"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="col-form-label">Location</label>
                                                </div>
                                                <input type="text" name="location" id="location" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Start Date</label>
                                                <input type="text" name="start_date" id="start_date"
                                                    class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">End Date</label>
                                                <input type="text" name="end_date" id="end_date" class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Bank Job ad Number </label>
                                                <input type="number" min="0" id="bank_job_ad_number" name="bank_job_ad_number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> Status</label>
                                                <select class="select" id="status" name="status">
                                                    <option value="">-Select-</option>
                                                    <option value="advertised">Advertised</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="decline">Decline</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button type="submit" id="JobUpdateSubmitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add User -->

    <!-- Delete Contact -->
    <div class="modal custom-modal fade" id="bank_job_delete_contact" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 m-0 justify-content-end">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="success-message text-center">
                        <div class="success-popup-icon">
                            <i class="ti ti-trash-x"></i>
                        </div>
                        <h3>Remove Job Bank?</h3>
                        <input type="hidden" name="id" id="job-bank-id">
                        <p class="del-info">Are you sure you want to remove Job Bank you selected.</p>
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button class="btn btn-danger" id="deleteBankJobButton" onclick="deleteBankJob()">Yes,
                                Delete it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Contact -->
@endsection
@push('scripts')
    <!-- Wizard JS -->
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>
    <script>
        function firstClick(type) {
            if (type == 1) {
                $("#company-document-update").addClass('show active');
                $("#seller-details-update").removeClass('show active');
            } else if (type == 2) {
                $("#company-document-update").removeClass('show active');
                $("#seller-details-update").addClass('show active');
            } else if (type == 3) {
                $("#company-document-update").removeClass('show active');
                $("#bank-detail-update").addClass('show active');
            } else if (type == 4) {
                $("#company-document-update").addClass('show active');
                $("#bank-detail-update").removeClass('show active');
            } else if (type == 5) {
                $("#bank-detail-2-update").addClass('show active');
                $("#bank-detail-update").removeClass('show active');
            } else if (type == 6) {
                $("#bank-detail-update").addClass('show active');
                $("#bank-detail-2-update").removeClass('show active');
            } else if (type == 7) {
                $("#bank-detail-3-update").addClass('show active');
                $("#bank-detail-2-update").removeClass('show active');
            } else if (type == 8) {
                $("#bank-detail-2-update").addClass('show active');
                $("#bank-detail-3-update").removeClass('show active');
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#manageUserForm").validate({
                rules: {
                    job_title: {
                        required: true
                    },
                    // number_of_vacancies: {
                    //     required: true
                    // },
                    // location: {
                    //     required: true
                    // },
                    // start_date: {
                    //     required: true
                    // },
                    // end_date: {
                    //     required: true
                    // },
                    // bank_job_ad_number: {
                    //     required: true
                    // },
                    // status: {
                    //     required: true
                    // }
                },
                messages: {
                    job_title: {
                        required: "This Field is required.",
                    },
                    // number_of_vacancies: {
                    //     required: "This Field is required."
                    // },
                    // location: {
                    //     required: "This Field is required."
                    // },
                    // start_date: {
                    //     required: "This Field is required."
                    // },
                    // end_date: {
                    //     required: "This Field is required."
                    // },
                    // bank_job_ad_number: {
                    //     required: "This Field is required."
                    // },
                    // status: {
                    //     required: "This Field is required.",
                    // }
                },
                submitHandler: function(form) {
                    $('#createUserSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.create-job') }}",
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
                                window.location.reload();
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
    </script>
    <script>
        $(document).ready(function() {
            $("#AdditionalDocs").validate({
                rules: {
                    name: {
                        required: true
                    },
                    dead_line_date: {
                        required: true
                    },
                    simple_file: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "This field is required.",
                    },
                    dead_line_date: {
                        required: "This field is required."
                    },
                    simple_file: {
                        required: "This field is required."
                    }
                },
                submitHandler: function(form) {
                    $('#DocumentSubmitButton').prop('disabled', true);
                    var AdditionalDocsData = new FormData($("#AdditionalDocs")[0]);

                    $.ajax({
                        url: "{{ route('admin.add-additional-docs') }}",
                        method: "POST",
                        data: AdditionalDocsData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false,

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close1').click();
                                // Reset the form
                                $('#AdditionalDocs')[0].reset();
                                $('#DocumentSubmitButton').prop('disabled', false);
                                window.location.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#DocumentSubmitButton').prop('disabled', false);
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
            $('.datepicker').datepicker({
                dateFormat: 'mm/dd/yy', // Set the date format (e.g., mm/dd/yyyy)
                showAnim: 'slideDown' // Choose an animation for the date picker (optional)
            });
        });
    </script>
    <script>
        function getBankDelete(id) {
            $('#job-bank-id').val(id);
        }
    </script>
    <script>
        function deleteBankJob() {
            var id = $('#job-bank-id').val();
            $('#deleteBankJobButton').prop('disabled', true);
            $.ajax({
                url: "{{ route('admin.delete-bank-job') }}",
                method: "DELETE",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },

                success: function(response) {
                    if (response.status == true || response.status === 'true') {
                        // Show a success message
                        CallMesssage('success', response.message);

                        $('.btn-close').click();
                        $('#deleteBankJobButton').prop('disabled', false);
                        // Reload the DataTable
                        window.location.reload();
                    } else {
                        CallMesssage('error', response.message);
                        $('#deleteBankJobButton').prop('disabled', false);
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
    </script>
    <script>
        function getValueForBankJob(id,job_title,number_of_vacancies,location,start_date,end_date,bank_job_ad_number,status)
        {
            $('#job_id').val(id);
            $('#job_title').val(job_title);
            $('#number_of_vacancies').val(number_of_vacancies);
            $('#location').val(location);
            $('#start_date').val(start_date);
            $('#end_date').val(end_date);
            $('#bank_job_ad_number').val(bank_job_ad_number);
            $('#status').val(status);
        }   
    </script>
     <script>
        $(document).ready(function() {
            $("#JobFormUpdate").validate({
                rules: {
                    job_title: {
                        required: true
                    },
                    // number_of_vacancies: {
                    //     required: true
                    // },
                    // location: {
                    //     required: true
                    // },
                    // start_date: {
                    //     required: true
                    // },
                    // end_date: {
                    //     required: true
                    // },
                    // bank_job_ad_number: {
                    //     required: true
                    // },
                    // status: {
                    //     required: true
                    // }
                },
                messages: {
                    job_title: {
                        required: "This Field is required.",
                    },
                    // number_of_vacancies: {
                    //     required: "This Field is required."
                    // },
                    // location: {
                    //     required: "This Field is required."
                    // },
                    // start_date: {
                    //     required: "This Field is required."
                    // },
                    // end_date: {
                    //     required: "This Field is required."
                    // },
                    // bank_job_ad_number: {
                    //     required: "This Field is required."
                    // },
                    // status: {
                    //     required: "This Field is required.",
                    // }
                },
                submitHandler: function(form) {
                    $('#JobUpdateSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.update-job') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close').click();
                                // Reset the form
                                $('#JobFormUpdate')[0].reset();
                                $('#JobUpdateSubmitButton').prop('disabled', false);
                                window.location.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#JobUpdateSubmitButton').prop('disabled', false);
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
