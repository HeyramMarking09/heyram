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
                            <div class="col-8">
                                <h4 class="page-title">Job Bank</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('employer.job-bank') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Refresh"><i
                                            class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="card main-card">
                        <div class="card-body">

                            <!-- Contact List -->
                            <div class="table-responsive custom-table">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Job Title</th>
                                            <th>Number Of Vacancies</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Bank Job Ad Number</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data))
                                            @php
                                                $LISTNO1 = 1;
                                            @endphp
                                            @foreach ($data as $item)
                                                <tr class="odd">
                                                    <td>
                                                        {{ $LISTNO1 }}</a>
                                                    </td>
                                                    <td><a href="#"
                                                            class="title-name">{{ $item->job_title }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $item->number_of_vacancies }}
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
                                                </tr>
                                                @php
                                                    $LISTNO1++;
                                                @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="datatable-length"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="datatable-paginate"></div>
                                </div>
                            </div>
                            <!-- /Contact List -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
@endsection
