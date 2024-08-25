<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="clinicdropdown">
                    <a href="{{ route('employer.profile') }}">
                        <img src="{{ asset('assets/img/profiles/avatar-14.jpg') }}" class="img-fluid" alt="Profile">
                        <div class="user-names">
                            <h5>{{ Auth::guard('employer')->user()->name }}</h5>
                            <h6>{{ Auth::guard('employer')->user()->email }}</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr">Main Menu</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="subdrop active">
                                <i class="ti ti-layout-2"></i><span>Dashboard</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('employer.dashboard') }}" class="active">Dashboard</a></li>
                                {{-- <li><a href="leads-dashboard.html">Leads Dashboard</a></li>
                                <li><a href="project-dashboard.html">Project Dashboard</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-brand-airtable"></i><span>Application</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('employer.company-information') }}">Company Information</a></li>
                                <li><a href="{{ route('employer.company-documents') }}">Company Documents</a></li>
                                {{-- <li class="submenu submenu-two">
                                    <a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="video-call.html">Video Call</a></li>
                                        <li><a href="audio-call.html">Audio Call</a></li>
                                        <li><a href="call-history.html">Call History</a></li>
                                    </ul>
                                </li>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="email.html">Email</a></li>
                                <li><a href="todo.html">To Do</a></li>
                                <li><a href="notes.html">Notes</a></li>
                                <li><a href="file-manager.html">File Manager</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-file-invoice"></i><span>Reports</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="deal-reports.html">Deal Reports</a></li>
                                <li><a href="contact-reports.html">Contact Reports</a></li>
                                <li><a href="company-reports.html">Company Reports</a></li>
                                <li><a href="project-reports.html">Project Reports</a></li>
                                <li><a href="task-reports.html">Task Reports</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <h6 class="submenu-hdr">CRM Settings</h6>
                    <ul>
                        <li><a href="sources.html"><i class="ti ti-artboard"></i><span>Sources</span></a></li>
                        <li><a href="lost-reason.html"><i class="ti ti-message-exclamation"></i><span>Lost Reason</span></a></li>
                        <li><a href="contact-stage.html"><i class="ti ti-steam"></i><span>Contact Stage</span></a></li>
                        <li><a href="industry.html"><i class="ti ti-building-factory"></i><span>Industry</span></a></li>
                        <li><a href="calls.html"><i class="ti ti-phone-check"></i><span>Calls</span></a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li><a href="{{ route('employer.manage-users') }}"><i class="ti ti-users"></i><span>Manage Users</span></a></li>
                        <li><a href="roles-permissions.html"><i class="ti ti-navigation-cog"></i><span>Roles & Permissions</span></a></li>
                        <li><a href="{{ route('admin.delete-request')}}"><i class="ti ti-flag-question"></i><span>Delete Request</span></a></li>
                    </ul>
                </li> --}}
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr">CRM</h6>
                    <ul>
                        <li>
                            <a href="{{ route('employer.how-it-works') }}" class="{{ request()->is('employer/how-it-works') ? 'active' : '' }}"><i class="ti ti-user-up"></i><span>How It Works?</span></a>
                            <a href="{{ route('employer.retainer-agreement') }}" class="{{ request()->is('employer/retainer-agreement') ? 'active' : '' }}"><i class="ti ti-user-up"></i><span>Retainer Agreement</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr">LMIA</h6>
                    <ul>
                        <li>
                            <a href="{{ route('employer.apply-for-an-lmia') }}" class="{{ request()->is('employer/apply-for-an-lmia') ? 'active' : '' }}"><i class="ti ti-user-up"></i><span>Apply For An Lmia</span></a>
                        </li>
                        <li>
                            <a href="{{ route('employer.lmia.list') }}" class="{{ request()->is('employer/lmia') ? 'active' : '' }}"><i class="ti ti-user-up"></i><span>Lmia Request</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
