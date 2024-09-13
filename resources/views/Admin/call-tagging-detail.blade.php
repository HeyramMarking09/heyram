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
                                <h4 class="page-title">Detial</h4>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <div class="head-icons">
                                    <a href="@if (Auth::guard('admin')->check()) {{ route('admin.call-tagging-detail', ['id' => request()->id]) }} @else {{ route('employee.call-tagging-detail',['id'=>request()->id]) }}  @endif " data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
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
                                    <li><a href="@if (Auth::guard('admin')->check()) {{ route('admin.call-tagging') }}  @else {{ route('employee.call-tagging') }} @endif "><i class="ti ti-arrow-narrow-left"></i>Call Tagging</a></li>
                                    <li>{{ $data->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contact-wrap">
                        <div class="contact-profile">
                            <div class="name-user">
                                <h5>{{ $data->name }}</h5>
                                <p class="mb-0"><i class="ti ti-phone"></i> {{ $data->phone }}</p>
                                <p class="mb-1"><i class="ti ti-mail"></i> {{ $data->email }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Leads User -->

                </div>

                <!-- Leads Sidebar -->
                <div class="col-xl-3">
                    <div class="contact-sidebar">
                        <h6>Information</h6>
                        <ul class="other-info">
                            <li><span class="other-title">Status</span><span>
                                @if ($data->status == 1)
                                    Query in-review
                                @elseif ($data->status == 2)
                                    Query Resolve/Closed
                                @elseif ($data->status == 3)
                                    Talk to client/closed
                                @elseif ($data->status == 4)
                                    Not Reachable
                                @elseif ($data->status == 5)
                                    Busy
                                @elseif ($data->status == 6)
                                    Contacted
                                @elseif ($data->status == 7)
                                    Not Interested
                                @elseif ($data->status == 8)
                                    Potential Client
                                @elseif ($data->status == 9)
                                    Appointment Schedule
                                @elseif ($data->status ==  10)
                                    Query in progress/Accelated
                                @endif
                                </span></li>
                            <li><span class="other-title">Type</span><span>{{ $data->type }}</span></li>
                            <li><span class="other-title">User Type</span><span>{{ $data->user_type }}</span></li>
                            <li><span class="other-title">Date Created</span><span>{{ $data->created_at->format('d M Y, h:i a') }}</span></li>
                            <li><span class="other-title">Visa Type</span><span>{{ $data->visa_type }}</span></li>
                            <li><span class="other-title">Call Back Date</span><span>{{ $data->call_back_date }}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /Leads Sidebar -->

                <!-- Leads Details -->
                <div class="col-xl-9">
                    <div class="contact-tab-wrap">
                        <ul class="contact-nav nav">
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#clientQuery" class="active"><i
                                        class="ti ti-search"></i>Client Query</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="tab" data-bs-target="#comments"><i
                                        class="ti ti-notes"></i>Comments</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="contact-tab-view">
                        <div class="tab-content pt-0">

                            <!-- Activities -->
                            <div class="tab-pane " id="comments">
                                <div class="view-header">
                                    <h4>Comments</h4>
                                    <ul >
                                        <li >
                                            <div class="form-sort">
                                                <a href="#" data-bs-target="#comment_contact" data-bs-toggle="modal" onclick="commentClick({{ request()->id }})" class="btn btn-primary">Add Comments</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-activity">
                                    <ul>
                                        @if (isset($data->comments) && !is_null($data->comments))
                                            @php
                                                $comments_decode = json_decode($data->comments);
                                            @endphp
                                            @foreach ($comments_decode as $item)
                                                <li class="activity-wrap">
                                                    <span class="activity-icon bg-orange">
                                                        <i class="ti ti-notes"></i>
                                                    </span>
                                                    <div class="activity-info">
                                                        <p>{{ $item }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- /Activities -->

                            <!-- client Query -->
                            <div class="tab-pane active show" id="clientQuery">
                                <div class="view-header">
                                    <h4>Client Query</h4>
                                </div>
                                <div class="contact-activity">
                                    <ul>
                                        @if (isset($data->client_query) && !is_null($data->client_query))
                                            <li class="activity-wrap">
                                                <span class="activity-icon bg-orange">
                                                    <i class="ti ti-search"></i>
                                                </span>
                                                <div class="activity-info">
                                                    <p>{{ $data->client_query }}</p>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- /Activities -->


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

    {{-- Add Comments --}}
	<div class="modal custom-modal fade" id="comment_contact" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header border-0 m-0 align-items-center">
					<h5 class="modal-title ms-3">Add Comment</h5> <!-- Header aligned to the left -->
					<button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="success-message">
						<form id="commentForm">
							@csrf
                            <input type="hidden" name="id" id="commentId">
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="form-wrap mb-3">
										<label for="leadName" class="form-label d-block text-start">Comment <span class="text-danger">*</span></label>
										<textarea name="comments" required id="" placeholder="Enter Comment" class="form-control" cols="30" rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-12 modal-btn d-flex justify-content-end">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" id="commentFormButton" class="btn btn-danger">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{-- Add Comments --}}
@endsection

@push('scripts')
    @if (Auth::guard('admin')->check())
        <script>
            var addComments  = "{{ route('admin.add-comments') }}";
        </script>
    @else
        <script>
            var addComments  = "{{ route('employee.add-comments') }}";
        </script>
    @endif
<script>
        function commentClick(id)
        {
            $('#commentId').val(id);
        }
    </script>
    <script>
        $(document).ready(function() {
           $("#commentForm").validate({
               rules: {
                   comments: {
                       required: true
                   }
               },
               messages: {
                   comments: {
                       required: "This field is required.",
                   }
               },
               submitHandler: function(form) {
                   $('#commentFormButton').prop('disabled', true);
                   $.ajax({
                       url: addComments,
                       method: "POST",
                       data: $(form).serialize(),

                       success: function(response) {
                           if (response.status == true || response.status === 'true') {
                               // Show a success message
                               CallMesssage('success', response.message);

                               $('.btn-close').click();
                               // Reset the form
                               $('#commentForm')[0].reset();
                               $('#commentFormButton').prop('disabled', false);
                               // Reload the DataTable
                            //    $('#call_tagging_list').DataTable().ajax.reload();
                                window.location.reload();
                           } else {
                               CallMesssage('error', response.message);
                               $('#commentFormButton').prop('disabled', false);
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
@endpush