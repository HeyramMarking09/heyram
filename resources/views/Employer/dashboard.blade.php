@extends('Employer.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <style>
        #add_compose {
            --bs-modal-width: 827px;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="row align-items-center ">
                            <div class="col-md-4">
                                <h3 class="page-title">Deals Dashboard</h3>
                            </div>
                            {{-- <div class="col-md-8 float-end ms-auto">
                                <div class="d-flex title-head">
                                    <div class="daterange-picker d-flex align-items-center justify-content-center">
                                        <div class="form-sort me-2">
                                            <i class="ti ti-calendar"></i>
                                            <input type="text" class="form-control  date-range bookingrange">
                                        </div>
                                        <div class="head-icons mb-0">
                                            <a href="index.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="Collapse" id="collapse-header"><i
                                                    class="ti ti-chevrons-up"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>


                </div>
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
                    <video width="100%" controls>
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
