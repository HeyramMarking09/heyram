<!-- Sidebar -->
<div class="sidebar" id="sidebar" style="background-color: black">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="clinicdropdown">
                    <a href="{{ route('employer.change-password') }}">
                        <img src="{{ asset('assets/img/profiles/avatar-14.jpg') }}" class="img-fluid" alt="Profile">
                        <div class="user-names">
                            <h5>{{ Auth::guard('employer')->user()->name }}</h5>
                            {{-- <h6>{{ Auth::guard('employer')->user()->email }}</h6> --}}
                        </div>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <ul>
                        <li>
                            <a href="{{ route('employer.dashboard') }}" class="{{ request()->is('employer/dashboard') ? 'active' : '' }}"><i class="ti ti-dashboard"></i><span style="{{ request()->is('employer/dashboard') ? '' : 'color: white' }} "> Dashboard</span></a>
                            <a href="{{ route('employer.company-information') }}" class="{{ request()->is('employer/company-information') ? 'active' : '' }}"><i class="ti ti-folder"></i><span style="{{ request()->is('employer/company-information') ? '' : 'color: white' }} ">Company Information</span></a>
                            <a href="{{ route('employer.company-documents') }}" class="{{ request()->is('employer/company-documents') ? 'active' : '' }}"><i class="ti ti-folder"></i><span style="{{ request()->is('employer/company-documents') ? '' : 'color: white' }} ">Company Documents</span> </a>
                            <a href="{{ route('employer.how-it-works') }}" class="{{ request()->is('employer/how-it-works') ? 'active' : '' }}"><i class="ti ti-help"></i><span style="{{ request()->is('employer/how-it-works') ? '' : 'color: white' }} ">How It Works?</span></a>
                            <a href="{{ route('employer.retainer-agreement') }}" class="{{ request()->is('employer/retainer-agreement') ? 'active' : '' }}"><i class="ti ti-file"></i><span style="{{ request()->is('employer/retainer-agreement') ? '' : 'color: white' }} ">Retainer Agreement</span></a>
                            <a href="{{ route('employer.apply-for-an-lmia') }}" class="{{ request()->is('employer/apply-for-an-lmia') ? 'active' : '' }}"><i class="ti ti-pencil"></i><span style="{{ request()->is('employer/apply-for-an-lmia') ? '' : 'color: white' }} ">Apply For An LMIA</span></a>
                            <a href="{{ route('employer.lmia.list') }}" class="{{ request()->is('employer/lmia') ? 'active' : '' }}"><i class="ti ti-receipt"></i><span style="{{ request()->is('employer/lmia') ? '' : 'color: white' }} ">LMIA Status</span></a>
                            <a href="{{ route('employer.job-bank') }}" class="{{ request()->is('employer/job-bank') ? 'active' : '' }}"><i class="ti ti-receipt"></i><span style="{{ request()->is('employer/job-bank') ? '' : 'color: white' }} ">Job Bank</span></a>
                            <a href="{{ route('employer.support') }}" class="{{ request()->is('employer/support') ? 'active' : '' }}"><i class="ti ti-tag"></i><span style="{{ request()->is('employer/support') ? '' : 'color: white' }} ">Support</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
