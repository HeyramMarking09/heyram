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
                            <div class="col-4">
                                <h4 class="page-title">Leads</h4>
                            </div>
                            <div class="col-8 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('admin.leads') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Refresh">
                                        <i class="ti ti-refresh-dot"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header">
                                        <i class="ti ti-chevrons-up"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card main-card">
                        <div class="card-body">

                            <!-- Search -->
                            <div class="search-section">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4">
                                        <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" id="custom-search" class="form-control"
                                                placeholder="Search Leads">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="btn btn-primary add-popup"><i
                                                            class="ti ti-square-rounded-plus"></i>Add Leads</a>
                                                    <a href="javascript:void(0);" style="display: none"
                                                        class="btn btn-primary edit-popup"><i
                                                            class="ti ti-square-rounded-plus"></i>Edit Leads</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->

                            <!-- Filter -->
                            <div class="filter-section filter-flex">
                                <div class="sortby-list">
                                    <ul>
                                        <li>
                                            <div class="sort-dropdown drop-down">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2"></i>Sort
                                                </a>
                                                <div class="dropdown-menu  dropdown-menu-start">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0);" id="searchByAsc">
                                                                <i class="ti ti-circle-chevron-right"></i>Ascending
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" id="searchByDesc">
                                                                <i class="ti ti-circle-chevron-right"></i>Descending
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-wrap icon-form">
                                                <span class="form-icon"><i class="ti ti-calendar"></i></span>
                                                <input type="text" id="searchByDate" class="form-control bookingrange"
                                                    placeholder="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-list">
                                    <ul>
                                        <li>
                                            <div class="form-sorts dropdown">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                    data-bs-auto-close="false"><i class="ti ti-filter-share"></i>Filter</a>
                                                <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-xl-end">
                                                    <div class="filter-set-view">
                                                        <div class="filter-set-head">
                                                            <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="filter-set-content">
                                                                <div class="filter-set-content-head">
                                                                    <a href="#" class="collapsed"
                                                                        data-bs-toggle="collapse" data-bs-target="#Status"
                                                                        aria-expanded="false" aria-controls="Status">Lead
                                                                        Status</a>
                                                                </div>
                                                                <div class="filter-set-contents accordion-collapse collapse"
                                                                    id="Status" data-bs-parent="#accordionExample">
                                                                    <div class="filter-content-list">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox" value="0">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Not Called</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox" value="1">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Not received</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="2">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Not interested</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="3">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Call back</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="4">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Interested</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="5">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Followed</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="6">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Subcribred</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            type="checkbox"
                                                                                            value="7">
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Convert into client</h5>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="filter-reset-btns">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="#" class="btn btn-light">Reset</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <button id="searchByStatus"
                                                                        class="btn btn-primary">Filter</button>
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
                            <!-- /Filter -->

                            <!-- Contact List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="leads_list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Lead Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Visa Type</th>
                                            <th>Location</th>
                                            <th>Lead Source</th>
                                            <th>Lead Status</th>
                                            <th>Created Date</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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

    <!-- Add Lead -->
    <div class="toggle-popup">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Add New Lead</h4>
                <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="create-lead">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Lead Name <span class="text-danger">*</span></label>
                                    <input type="text" required name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="number" name="phone" required maxlength="12" min="0"
                                        minlength="8" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Visa Type <span class="text-danger">*</span></label>
                                    <input type="text" name="visa_type" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Lead Source <span class="text-danger">*</span></label>
                                    <select class="select" required name="lead_source">
                                        <option value="">-Choose-</option>
                                        <option value="facebook_ad">Facebook</option>
                                        <option value="youtube_ad">Youtube</option>
                                        <option value="google_ad">Google</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Country <span class="text-danger">*</span></label>
                                        {{-- <a href="#" class="add-new add-new-company add-popups"><i
                                                class="ti ti-square-rounded-plus me-2"></i>Add New</a> --}}
                                    </div>
                                    <select class="select" required name="country">
                                        <option value="">-Choose-</option>
                                        @if (isset($counties) && count($counties) > 0)
                                            @foreach ($counties as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Assign Employee</label>
                                    <select class="select" name="assign_employee" required>
                                        <option value="">- Select -</option>
                                        @if (isset($users) && count($users) > 0)
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    {{ $item->last_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="radio-wrap form-wrap">
                                    <label class="col-form-label">Status</label>
                                    <div class="d-flex flex-wrap">
                                        <div class="radio-btn">
                                            <input type="radio" class="status-radio" value="1" id="active11"
                                                name="is_active" checked="">
                                            <label for="active1">Active</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" class="status-radio" value="0" id="inactive11"
                                                name="is_active">
                                            <label for="inactive1">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                            <button id="leadCreateButton" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Lead -->

    <!-- Edit Lead -->
    <div class="toggle-popup1">
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <h4>Edit Lead</h4>
                <a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
            </div>
            <div class="toggle-body">
                <div class="pro-create">
                    <form id="editLead">
                        @csrf
                        <input type="hidden" name="id" id="leadId">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Lead Name <span class="text-danger">*</span></label>
                                    <input type="text" required name="name" id="leadName" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="leadEmail" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="number" name="phone" id="leadPhone" required maxlength="12"
                                        min="0" minlength="8" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Visa Type <span class="text-danger">*</span></label>
                                    <input type="text" name="visa_type" id="leadVisaType" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" id="leadLocation" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Lead Source <span class="text-danger">*</span></label>
                                    <select class="select" required name="lead_source" id="leadLeadSource">
                                        <option value="">-Choose-</option>
                                        <option value="facebook_ad">Facebook</option>
                                        <option value="youtube_ad">Youtube</option>
                                        <option value="google_ad">Google</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="col-form-label">Country <span class="text-danger">*</span></label>
                                        {{-- <a href="#" class="add-new add-new-company add-popups"><i
                                                class="ti ti-square-rounded-plus me-2"></i>Add New</a> --}}
                                    </div>
                                    <select class="select" required name="country" id="leadCountry">
                                        <option value="">-Choose-</option>
                                        @if (isset($counties) && count($counties) > 0)
                                            @foreach ($counties as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Assign Employee</label>
                                    <select class="select" name="assign_employee" required id="leadAssignEmployee">
                                        <option value="">- Select -</option>
                                        @if (isset($users) && count($users) > 0)
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    {{ $item->last_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="radio-wrap form-wrap">
                                    <label class="col-form-label">Status</label>
                                    <div class="d-flex flex-wrap">
                                        <div class="radio-btn">
                                            <input type="radio" class="status-radio" value="1" id="active1"
                                                name="is_active">
                                            <label for="active1">Active</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" class="status-radio" value="0" id="inactive1"
                                                name="is_active">
                                            <label for="inactive1">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="submit-button text-end">
                            <a href="#" class="btn btn-light sidebar-close1">Cancel</a>
                            <button id="editLeadNButton" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Lead -->

    <!-- Delete Lead -->
    <div class="modal custom-modal fade" id="delete_contact" role="dialog">
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
                        <h3>Remove Leads?</h3>
                        <p class="del-info">Are you sure you want to remove
                            lead you selected.</p>
                        <input type="hidden" id="deleteLeadId">
                        <div class="col-lg-12 text-center modal-btn">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button class="btn btn-danger" id="deleteLeadButton" onclick="deleteLeadOnClick()">Yes,
                                Delete it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Lead -->

    </div>
    <!-- /Main Wrapper -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/leads.js') }}"></script>
    <script>
        var csrf_token = "{{csrf_token()}}";
        var getLeadUrl = "{{ route('admin.get-leads') }}";
        var createLeadUrl = "{{ route('admin.create-lead') }}";
        var editLeadUrl = "{{ route('admin.edit-lead') }}";
        var deleteLeadUrl = "{{ route('admin.lead-delete') }}";
    </script>
@endpush
