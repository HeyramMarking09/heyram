@extends('Admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="page-title">Support</h4>
                        </div>
                        <div class="col-4 text-end">
                            <div class="head-icons">
                                <a href="{{ route('admin.support') }}" data-bs-toggle="tooltip"
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

                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-8">
                                    <div class="export-list text-sm-end">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Search -->
                        <!-- Manage Users List -->
                        {{-- show massages here.. --}}
                        <!-- Activities -->
                        <div class="tab-pane">
                            <div class="contact-activity">
                                <ul>
                                    @if (isset($data) && !empty($data))
                                        @foreach ($data as $item)
                                            <li class="activity-wrap">
                                                <div class="activity-info">
                                                    <h6>{{ $item->description }}</h6>
                                                    @if (!is_null($item->answer))
                                                        <p>{{ $item->answer }}</p>
                                                    @else
                                                        <p class="mt-3">
                                                            <a onclick="getValue('{{ $item->id }}')" href="javascript:void(0);" class="btn btn-primary add-popup"><i
                                                                class="ti ti-square-rounded-plus"></i>Add Answer</a>
                                                        </p>
                                                    @endif

                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="activity-wrap">
                                            <div class="activity-info">
                                                <h6>No Data</h6>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- /Activities -->
                        <!-- /Manage Users List -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
<!-- Add User -->
<div class="toggle-popup" id="userPopup">
    <div class="sidebar-layout">
        <div class="sidebar-header">
            <h4>Answer</h4>
            <a href="#" class="sidebar-close toggle-btn"><i class="ti ti-x"></i></a>
        </div>
        <div class="toggle-body">
            <div class="pro-create">
                <form id="answerForm">
                    @csrf
                    <div class="accordion-lists" id="list-accord">
                        <!-- Basic Info -->
                        <input type="hidden" name="id" id="support-id">
                        <div class="manage-user-modal">
                            <div class="manage-user-modals">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Answer<span
                                                    class="text-danger">*</span></label>
                                            <textarea name="answer" required placeholder="Answer" class="form-control" id="" cols="30"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Basic Info -->
                    </div>
                    <div class="submit-button text-end">
                        <a href="#" class="btn btn-light sidebar-close">Cancel</a>
                        <button type="submit" id="answerSubmitButton" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add User -->    
@endsection
@push('scripts')
    <script>
        function getValue(id)
        {
            $('#support-id').val(id);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#answerForm").validate({
                rules: {
                    answer: {
                        required: true
                    }
                },
                messages: {
                    answer: {
                        required: "This Field is required.",
                    }
                },
                submitHandler: function(form) {
                    $('#answerSubmitButton').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('admin.add-answer') }}",
                        method: "POST",
                        data: $(form).serialize(),

                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                // Show a success message
                                CallMesssage('success', response.message);

                                $('.sidebar-close').click();
                                // Reset the form
                                $('#answerForm')[0].reset();
                                $('#answerSubmitButton').prop('disabled', false);
                                // Reload the DataTable
                                window.location.reload();
                            } else {
                                CallMesssage('error', response.message);
                                $('#answerSubmitButton').prop('disabled', false);
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
