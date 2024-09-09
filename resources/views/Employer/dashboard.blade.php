@extends('Employer.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <style>
        #add_compose {
            --bs-modal-width: 827px;
        }
        .card .card-body{
            background-color: #c5c52e;
            padding:28px;
        }
    </style>
    <div class="page-wrapper">
        @if (session('need_to_add'))
            <div class="card-body" style="width: 590px; padding-left: 20px">
                <div class="alert alert-solid-primary alert-dismissible fade show">
                    {{ session('need_to_add') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
                </div>
            </div>
        @endif
        <div class="content">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="row align-items-center ">
                            <div class="col-md-4">
                                <h3 class="page-title">Dashboard</h3>
                            </div>
                            <div class="col-md-8 float-end ms-auto">
                                <div class="d-flex title-head">
                                    <div class="daterange-picker d-flex align-items-center justify-content-center">
                                        <div class="form-sort me-2">
                                            <a href="{{ route('employer.apply-for-an-lmia') }}" class="btn btn-primary">Apply For An LMIA</a>
                                        </div>
                                        <div class="head-icons mb-0">
                                            <a href="{{ route('employer.dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Collapse" id="collapse-header"><i
                                                    class="ti ti-chevrons-up"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>


                </div>
                <div class="col-md-4">	
                    <div class="card">
                        <div class="card-body">
                            <h5>Total LMIA</h5>
                            <h6 class="counter">{{ count($totalLmias) }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">	
                    <div class="card">
                        <div class="card-body">
                            <h5>Pending LMIA</h5>
                            <h6 class="counter">{{ count($pendingLmias) }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">	
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Jobs</h5>
                            <h6 class="counter">{{ count($totalJobs) }}</h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">	
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Sales</h5>
                            <h6 class="counter">10,000</h6>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
    <!-- Show Video -->
    <div class="modal custom-modal fade" id="add_compose" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">How it works?</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <video width="100%" controls autoplay loop>
                        <source src="{{ asset('assets/vidoes/employer-video.mp4') }}" type="video/mp4">
                    </video>
                    <div class="form-wrap">
                        <div class="text-center">
                            <a href="{{ route('employer.retainer-agreement') }}" class="btn btn-primary"><span>Next</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Show Video -->
@endsection
@if ($videoShow == 0)
    @push('scripts')
        <script>
            // Trigger the second popup after a delay
            $(document).ready(function() {
                setTimeout(function() {
                    $('#add_compose').modal('show');
                    $.ajax({
                        url: "{{ route('employer.change-video-show') }}", // Replace 'your-route-here' with your actual route
                        type: "GET",
                        success: function(response) {
                            // Handle the successful response here
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle any errors here
                            console.error(error);
                        }
                    });

                }, 3000); // Show it again after 5 seconds
            })
        </script>
    @endpush
@endif
