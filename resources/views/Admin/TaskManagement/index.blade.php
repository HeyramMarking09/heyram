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
									<h4 class="page-title">Task Management</h4>
								</div>
								<div class="col-8 text-end">
									<div class="head-icons">
										<a href="{{ route('admin.create-task-management') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh">
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
											<div class="form-wrap icon-form">
												<span class="form-icon"><i class="ti ti-search"></i></span>
												<input type="text" class="form-control" id="custom-search" placeholder="Search Task Management">
											</div>							
										</div>		
										<div class="col-md-7 col-sm-8">					
											<div class="export-list text-sm-end">
												<ul>								
													<li>
														<a href="javascript:void(0);" class="btn btn-primary add-popup"><i class="ti ti-square-rounded-plus"></i>Add</a>
														<a style="display: none" href="javascript:void(0);" class="btn btn-primary edit-popup"><i class="ti ti-square-rounded-plus"></i>Add</a>
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
									<table class="table" id="task-management-list">
										<thead class="thead-light">
											<tr>
												<th>ID</th>
												<th>Title</th>
												<th>Task For</th>
												<th>Name</th>
												<th>Assign To</th>
												<th>Start Date</th>
												<th>Due Date</th>
												<th>Status</th>
												<th>Created Date</th>
												<th>Service Type</th>
												<th>Priority</th>
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
					<h4>Add New Task</h4>
					<a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
				</div>
				<div class="toggle-body">
					<form id="create-task-management" enctype="multipart/form-data" method="POST" class="toggle-height">
                        @csrf
						<div class="pro-create">
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Title <span class="text-danger">*</span></label>
										<input type="text" name="title" class="form-control" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Category</label>
										<select class="select" name="category">
											<option selected value="">Choose</option>
											<option value="client">Client</option>
											<option value="employer">Employer</option>
										</select>
									</div>
                                    <div class="form-wrap">
										<label class="col-form-label">Client Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="client_name" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Responsible Persons</label>
										<select class="select" name="responsible_person">
											<option value="">-Select-</option>
                                            @if (isset($employees) && count($employees) > 0)
                                                @foreach ($employees as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Start Date</label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" name="start_date">
	 	  							</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Due Date <span class="text-danger">*</span></label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" required name="due_date">
	 	  							</div>
								</div>
								<div class="col-md-12">									
									<div class="form-wrap">
										<label class="col-form-label">Type of service </label>
										<input class="form-control" type="text" name="type_of_service">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-wrap">
										<label class="col-form-label">Priority</label>
										<div class="select-priority">
											<span class="select-icon"><i class="ti ti-square-rounded-filled"></i></span>
											<select class="select" name="priority">
												<option value="">-Select-</option>
												<option value="high">High</option>
												<option value="low">Low</option>
												<option value="medium">Medium</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-wrap">
										<label class="col-form-label">Status</label>
										<select class="select" name="status">
											<option value="" selected>-Select-</option>
											<option value="in progress">In Progress</option>
											<option value="completed">Completed</option>
											<option value="work started">Work Started</option>
											<option value="pending">Pending(Waiting for additional information)</option>
										</select>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">File</label>
                                        <input type="file" class="form-control" name="file_name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Description</label>
                                        <textarea  class="form-control" name="description" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-button text-end">
							<a href="#" class="btn btn-light sidebar-close">Cancel</a>
							<button type="submit" id="create-task-management-button" class="btn btn-primary">Create</button>
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
					<h4>Edit Task</h4>
					<a href="#" class="sidebar-close1 toggle-btn"><i class="ti ti-x"></i></a>
				</div>
				<div class="toggle-body">
					<form id="update-task-management" enctype="multipart/form-data" method="POST" class="toggle-height">
                        @csrf
						<div class="pro-create">
							<div class="row">
								<div class="col-md-12">
                                    <input type="hidden" id="task-id" name="id">
									<div class="form-wrap">
										<label class="col-form-label">Title <span class="text-danger">*</span></label>
										<input type="text" name="title" id="title-edit" class="form-control" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Category</label>
										<select class="select" name="category" id="category-edit">
											<option selected value="">Choose</option>
											<option value="client">Client</option>
											<option value="employer">Employer</option>
										</select>
									</div>
                                    <div class="form-wrap">
										<label class="col-form-label">Client Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="client_name" id="client_name-edit" required>
									</div>
									<div class="form-wrap">
										<label class="col-form-label">Responsible Persons</label>
										<select class="select" name="responsible_person" id="responsible_person-edit">
											<option value="">-Select-</option>
                                            @if (isset($employees) && count($employees) > 0)
                                                @foreach ($employees as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Start Date</label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" id="start_date-edit" name="start_date">
	 	  							</div>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Due Date <span class="text-danger">*</span></label>
									<div class="form-wrap icon-form">
	 	 								<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
	 	  								<input type="text" class="form-control datetimepicker" id="due_date-edit" required name="due_date">
	 	  							</div>
								</div>
								<div class="col-md-12">									
									<div class="form-wrap">
										<label class="col-form-label">Type of service </label>
										<input class="form-control" type="text" id="type_of_service-edit" name="type_of_service">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-wrap">
										<label class="col-form-label">Priority</label>
										<div class="select-priority">
											<span class="select-icon"><i class="ti ti-square-rounded-filled"></i></span>
											<select class="select" id="priority-edit" name="priority">
												<option value="">-Select-</option>
												<option value="high">High</option>
												<option value="low">Low</option>
												<option value="medium">Medium</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-wrap">
										<label class="col-form-label">Status</label>
										<select class="select" id="status-edit" name="status">
											<option value="" selected>-Select-</option>
											<option value="in progress">In Progress</option>
											<option value="completed">Completed</option>
											<option value="work started">Work Started</option>
											<option value="pending">Pending(Waiting for additional information)</option>
										</select>
									</div>
								</div>
                                <div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">File</label>
										<span class="float-end text-danger" id="showDownload">
											<i class="ti ti-download">
											</i>
											<a href="" class="text-danger" id="downloadFile">
	
											</a>
										</span>
                                        <input type="file" class="form-control" name="file_name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-wrap">
										<label class="col-form-label">Description</label>
                                        <textarea  class="form-control" id="description-edit" name="description" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-button text-end">
							<a href="#" class="btn btn-light sidebar-close">Cancel</a>
							<button type="submit" id="update-task-management-button" class="btn btn-primary">Update</button>
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
							<h3>Remove Task?</h3>
                            <input type="hidden" id="taskId">
							<p class="del-info">Are you sure you want to remove task you selected.</p>
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

		<!-- Add New View -->
		<div class="modal custom-modal fade" id="save_view" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New View</h5>
						<button  class="btn-close" data-bs-dismiss="modal" aria-label="Close">	
							<i class="ti ti-x"></i>
						</button>
					</div>
					<div class="modal-body">
						<form action="campaign.html">
							<div class="form-wrap">
								<label class="col-form-label">View Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="modal-btn text-end">
								<a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-danger">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add New View -->

	</div>
	<!-- /Main Wrapper -->
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/task-management.js') }}"></script>
    <script>
        var createTaskManagement = "{{ route('admin.create-task-management') }}";
        var updateTaskManagement = "{{ route('admin.update-task-management') }}";
        var getTaskManagement = "{{ route('admin.get-task-management') }}";
        var deleteTaskUrl = "{{ route('admin.delete-task-management') }}";
		var downloadUrl = "{{ route('admin.download.file', ['filename' => ':filename']) }}";

        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script>
        window.canEditUser = @json(Auth::user()->can('access-permission', ['Task Management', 'edit']));
        window.canDeleteUser = @json(Auth::user()->can('access-permission', ['Task Management', 'delete']));
    </script>
@endpush
