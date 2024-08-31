@extends('Admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="page-title">Employers</h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="head-icons">
                                    <a href="{{ route('admin.employer-dashboard') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Refresh"><i
                                            class="ti ti-refresh-dot"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Collapse" id="collapse-header"><i
                                            class="ti ti-chevrons-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card main-card">
                        <div class="card-body">
                            <div class="search-section">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4">
                                        <div class="form-wrap icon-form">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" id="custom-search"
                                                placeholder="Search User">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="export-list text-sm-end">
                                            <ul>
                                                @can('access-permission', ['Manage User', 'create'])
                                                    <li>
                                                        <a href="javascript:void(0);" style="display: none" class="btn btn-primary add-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Add User</a>
                                                        <a style="display: none" href="javascript:void(0);" class="btn btn-primary edit-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Edit User</a>
                                                    </li>
                                                @endcan
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
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-sort-ascending-2"></i>Sort
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-start">
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
                                                <input type="text" class="form-control bookingrange" id="searchByDate"
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
                                                <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-end">
                                                    <div class="filter-set-view">
                                                        <div class="filter-set-head">
                                                            <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="filter-set-content">
                                                                <div class="filter-set-content-head">
                                                                    <a href="#" class="collapsed"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseSix" aria-expanded="false"
                                                                        aria-controls="collapseSix">Status</a>
                                                                </div>
                                                                <div class="filter-set-contents accordion-collapse collapse"
                                                                    id="collapseSix" data-bs-parent="#accordionExample">
                                                                    <div class="filter-content-list">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            value="1" type="checkbox"
                                                                                            checked>
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Active</h5>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="filter-checks">
                                                                                    <label class="checkboxs">
                                                                                        <input name="status[]"
                                                                                            value="0" type="checkbox"
                                                                                            checked>
                                                                                        <span class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="collapse-inside-text">
                                                                                    <h5>Inactive</h5>
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
                                                                    <button class="btn btn-primary"
                                                                        id="searchByStatus">Filter</button>
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
                            <!-- Manage Users List -->
                            <div class="table-responsive custom-table">
                                <table class="table" id="manage-users-list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Assign Employee</th>
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
                            <!-- /Manage Users List -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
    <!-- Add Note -->
		<div class="modal custom-modal fade modal-padding" id="add_notes" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Assign Employee</h5>
						<button type="button" class="btn-close position-static" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body p-0">
						<form action="{{ route('admin.assign.employee.form') }}" method="post">
                            @csrf
							 <div class="form-wrap">
								<label class="col-form-label">Employees <span class="text-danger"> *</span></label>
                                <input type="hidden" id="employerId" name="id">
                                <select name="assign_employee" id="employee_assign" class="select" required>
                                    <option value="">Select</option>
                                    @if (isset($UserData))
                                        @foreach ($UserData as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
							 </div>
							 <div class="col-lg-12 text-end modal-btn">
								<a class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
								<button class="btn btn-primary" type="submit">Assign</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Note -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/employer-dashbaord.js') }}"></script>
    <script>
        var getManageUser = "{{ route('admin.employers') }}";
        var detailURl = "{{ route('admin.employer-detail', ['id' => ':id']) }}";
    </script>
@endpush
