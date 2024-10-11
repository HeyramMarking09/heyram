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
									<h4 class="page-title">Updates</h4>
								</div>
								<div class="col-8 text-end">
									<div class="head-icons">
										<a href="{{ route('admin.update-index') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh">
											<i class="ti ti-refresh-dot"></i>
										</a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
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
											{{-- <div class="form-wrap icon-form">
												<span class="form-icon"><i class="ti ti-search"></i></span>
												<input type="text" class="form-control" id="custom-search" placeholder="Search Task Management">
											</div>							 --}}
										</div>		
										<div class="col-md-7 col-sm-8">					
											<div class="export-list text-sm-end">
												<ul>								
                                                    @can('access-permission', ['Updates', 'create'])                                                    
                                                        <li>
                                                            <a href="javascript:void(0);" class="btn btn-primary add-popup"><i class="ti ti-square-rounded-plus"></i>Add</a>
                                                        </li>
                                                    @endcan
                                                    <a style="display: none" href="javascript:void(0);" class="btn btn-primary edit-popup"><i class="ti ti-square-rounded-plus"></i>Add</a>
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
													<a href="javascript:void(0);" class="dropdown-toggle"  data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2"></i>Sort </a>
													<div class="dropdown-menu  dropdown-menu-start">
					    								<ul>
					    									<li>
					    										<a id="searchByAsc" href="javascript:void(0);">
					    											<i class="ti ti-circle-chevron-right"></i>Ascending
					    										</a>
					    									</li>
					    									<li>
					    										<a id="searchByDesc" href="javascript:void(0);">
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
													<input type="text" id="searchByDate" class="form-control bookingrange" placeholder="">
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Filter -->

								<!-- Contact List -->
								<div class="table-responsive custom-table">
									<table class="table" id="updates-list">
										<thead class="thead-light">
											<tr>
												<th>ID</th>
												<th>Client Name</th>
												<th>Visa Type</th>
												<th>Application Name</th>
												<th>Date</th>
												<th>Created Date</th>
												<th>Informed</th>
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

		<!-- Add New Task -->
		<div class="toggle-popup">
			<div class="sidebar-layout">
				<div class="sidebar-header">
					<h4>Add</h4>
					<a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
				</div>
				<div class="toggle-body">
					<form id="create-updates" enctype="multipart/form-data" method="POST" class="toggle-height">
                        @csrf
						<div class="pro-create">
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Client Name</label>
										<select class="select" required name="client_id">
											<option selected value="">Choose</option>
                                            @if (isset($clients) && count($clients) > 0)
                                                @foreach ($clients as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
										</select>
									</div>
                                    <div class="form-wrap">
										<label class="col-form-label">Visa Type<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="visa_type" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Application Number</label>
										<input type="number" class="form-control" name="application_number" required>
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Date <span class="text-danger">*</span></label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" required name="date">
	 	  							</div>
								</div>
								<div class="col-md-6">									
									<div class="form-wrap">
										<label class="col-form-label">Update</label>
										<input class="form-control" type="text" name="update" required>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Note/Comment</label>
                                        <input type="text" class="form-control" name="comment" required>
									</div>
								</div>
								<div class="col-md-6">
                                    <div class="radio-wrap">
                                        <label class="col-form-label">Informed</label>
                                        <div class="d-flex flex-wrap">
                                            <div class="radio-btn">
                                                <input type="radio" class="status-radio" id="active1"
                                                    name="informed" checked value="1">
                                                <label for="active1">Yes</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" class="status-radio" id="inactive1"
                                                    name="informed" value="0">
                                                <label for="inactive1">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="submit-button text-end">
							<a href="#" class="btn btn-light sidebar-close">Cancel</a>
							<button type="submit" id="create-updates-button" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add New Task -->

		<!-- Edit Task -->
		<div class="toggle-popup1">
			<div class="sidebar-layout">
				<div class="sidebar-header">
					<h4>Edit</h4>
					<a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
				</div>
				<div class="toggle-body">
					<form id="update-updates" enctype="multipart/form-data" method="POST" class="toggle-height">
                        @csrf
						<div class="pro-create">
							<div class="row">
								<div class="col-md-12">
                                    <input type="hidden" name="id" id="applicalition-id">
									<div class="form-wrap">
										<label class="col-form-label">Client Name</label>
										<select class="select" required name="client_id" id="client_id">
											<option selected value="">Choose</option>
                                            @if (isset($clients) && count($clients) > 0)
                                                @foreach ($clients as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
										</select>
									</div>
                                    <div class="form-wrap">
										<label class="col-form-label">Visa Type<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="visa_type" id="visa_type" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Application Number</label>
										<input type="number" class="form-control" name="application_number" id="application_number" required>
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Date <span class="text-danger">*</span></label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" required id="date" name="date">
	 	  							</div>
								</div>
								<div class="col-md-6">									
									<div class="form-wrap">
										<label class="col-form-label">Update</label>
										<input class="form-control" type="text" name="update" id="update" required>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Note/Comment</label>
                                        <input type="text" class="form-control" name="comment" id="comment" required>
									</div>
								</div>
								<div class="col-md-6">
                                    <div class="radio-wrap">
                                        <label class="col-form-label">Informed</label>
                                        <div class="d-flex flex-wrap">
                                            <div class="radio-btn">
                                                <input type="radio" class="status-radio" id="active11"
                                                    name="informed" checked value="1">
                                                <label for="active11">Yes</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" class="status-radio" id="inactive11"
                                                    name="informed" value="0">
                                                <label for="inactive11">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="submit-button text-end">
							<a href="#" class="btn btn-light sidebar-close">Cancel</a>
							<button type="submit" id="update-updates-button" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Task -->

		<!-- Delete Task -->
		<div class="modal custom-modal fade" id="delete_contact" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header border-0 m-0 justify-content-end">
						<button  class="btn-close" data-bs-dismiss="modal" aria-label="Close">	
							<i class="ti ti-x"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="success-message text-center">
							<div class="success-popup-icon">
								<i class="ti ti-trash-x"></i>
							</div>
							<h3>Remove Application?</h3>
                            <input type="hidden" id="taskId">
							<p class="del-info">Are you sure you want to remove application you selected.</p>
							<div class="col-lg-12 text-center modal-btn">
								<a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
								<button onclick="deleteFunction()" id="deleteButtonOfTask" class="btn btn-danger">Yes, Delete it</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete ActivTaskity -->

	</div>
	<!-- /Main Wrapper -->
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/task-management.js') }}"></script>
    <script src="{{ asset('assets/js/custom/updates.js') }}"></script>
    <script>
        var createUpdatesUrl = "{{ route('admin.create-updates') }}";
        var getUpdate = "{{ route('admin.get-updates') }}";
        var deleteTaskUrl = "{{ route('admin.delete-updates') }}";

        var updateUpdatesUrl = "{{ route('admin.update-update') }}";

        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script>
        window.canEditUser = @json(Auth::user()->can('access-permission', ['Updates', 'edit']));
        window.canDeleteUser = @json(Auth::user()->can('access-permission', ['Updates', 'delete']));
    </script>
@endpush
