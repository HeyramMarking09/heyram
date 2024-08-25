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
                                <h4 class="page-title">Lmia Overview </h4>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <div class="head-icons">
                                    <a href="{{ route('employer.lmia-detail', ['id' => request()->route('id')]) }}"
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
                                                class="ti ti-arrow-narrow-left"></i>Lmia List</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Leads User -->
                </div>
                <!-- Leads Sidebar -->
                <div class="col-xl-3">
                    <div class="contact-sidebar">
                        <h6>Lmia Information</h6>
                        <ul class="other-info">
                            <li><span class="other-title">Created
                                    Date</span><span>{{ $detail->created_at->format('d M Y, h:i a') }}</span></li>
                            {{-- <li><span class="other-title">Value</span><span>$25,11,145</span></li>
								<li><span class="other-title">Due Date</span><span>20 Jan 2024, 10:00 am</span></li>
								<li><span class="other-title">Follow Up</span><span>20 Jan 2024</span></li>
								<li><span class="other-title">Source</span><span>Google</span></li> --}}
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
                                <a href="#" data-bs-toggle="tab" data-bs-target="#notes"><i
                                        class="ti ti-notes"></i>User Details</a>
                            </li>
                            {{-- <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#calls"><i
                                        class="ti ti-phone"></i>Users</a>
                            </li> --}}
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
                                </div>
                            </div>
                            <!-- /Activities -->

                            <!-- Notes -->
                            <div class="tab-pane fade" id="notes">
                                <div class="view-header">
                                    <h4>User Details</h4>

                                </div>
                                <div class="notes-activity">
                                    @php
                                        $employee_detail = json_decode($detail->enployee_detail);
                                        // echo $employee_detail;
                                    @endphp
                                    @foreach ($employee_detail as $item)
                                        <div class="calls-box mb-4">
                                            <div class="caller-info d-flex justify-content-between align-items-center">
                                                <div class="calls-user">
                                                    <h6><span>Name:</span> {{ $item->employee_name }}</h6>
                                                    <p><span>Start Date:</span> {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y, h:i a') }}</p>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h5>Hiring Reason</h5>
                                                <p>{{ $item->hiring_reason }}</p>
                                            </div>
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                            <!-- /Notes -->
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
