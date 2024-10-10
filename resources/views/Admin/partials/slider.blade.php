<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="clinicdropdown">
                    <a href="@if (Auth::guard('admin')->check()) {{ route('admin.dashboard') }} @else {{ route('employee.dashboard') }}  @endif">
                        <img src="{{ asset('assets/img/profiles/avatar-14.jpg') }}" class="img-fluid" alt="Profile">
                        <div class="user-names">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
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
                                <li><a href="@if (Auth::guard('admin')->check()) {{ route('admin.dashboard') }} @else {{ route('employee.dashboard') }} @endif" class="active">Deals Dashboard</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr">User Management</h6>
                    @if (Auth::guard('admin')->check())
                        <ul>
                            @can('access-permission', ['Manage User', 'view'])
                                <li><a href="{{ route('admin.manage-users') }}"><i class="ti ti-users"></i><span>Manage Users</span></a></li>
                            @endcan
                            @can('access-permission', ['Roles And Permission', 'view'])
                                <li><a href="{{ route('admin.roles-permissions') }}"><i class="ti ti-navigation-cog"></i><span>Roles & Permissions</span></a></li>
                            @endcan
                            @can('access-permission', ['Delete Request', 'view'])
                                <li><a href="{{ route('admin.delete-request')}}"><i class="ti ti-flag-question"></i><span>Delete Request</span></a></li>
                            @endcan
                        </ul>
                    @else
                        <ul>
                            @can('access-permission', ['Manage User', 'view'])
                                <li><a href="{{ route('employee.manage-users') }}"><i class="ti ti-users"></i><span>Manage Users</span></a></li>
                            @endcan
                            @can('access-permission', ['Roles And Permission', 'view'])
                                <li><a href="{{ route('employee.roles-permissions') }}"><i class="ti ti-navigation-cog"></i><span>Roles & Permissions</span></a></li>
                            @endcan
                            @can('access-permission', ['Delete Request', 'view'])
                                <li><a href="{{ route('employee.delete-request')}}"><i class="ti ti-flag-question"></i><span>Delete Request</span></a></li>
                            @endcan
                        </ul>
                    @endif
                </li>
                <li>
                    <h6 class="submenu-hdr">Employer Dashboard</h6>
                    @if (Auth::guard('admin')->check())
                        <ul>
                            @can('access-permission', ['Employers List', 'view'])
                                <li><a href="{{ route('admin.employer-dashboard') }}"><i class="ti ti-users"></i><span>Employers List</span></a></li>
                            @endcan
                            @can('access-permission', ['Apply For An Lmia', 'create'])
                                <li><a href="{{ route('admin.apply-for-an-lmia') }}"><i class="ti ti-users"></i><span>Apply For An Lmia</span></a></li>
                            @endcan
                            @can('access-permission', ['Apply For An Lmia', 'view'])
                                <li><a href="{{ route('admin.lmia-request') }}"><i class="ti ti-users"></i><span>lmia request</span></a></li>
                            @endcan
                        </ul>
                    @else
                        <ul>
                            @can('access-permission', ['Employers List', 'view'])
                                <li><a href="{{ route('employee.employer-dashboard') }}"><i class="ti ti-users"></i><span>Employers List</span></a></li>
                            @endcan
                            @can('access-permission', ['Apply For An Lmia', 'create'])
                                <li><a href="{{ route('employee.apply-for-an-lmia') }}"><i class="ti ti-users"></i><span>Apply For An Lmia</span></a></li>
                            @endcan
                            @can('access-permission', ['Apply For An Lmia', 'view'])
                                <li><a href="{{ route('employee.lmia-request') }}"><i class="ti ti-users"></i><span>lmia request</span></a></li>
                            @endcan
                        </ul>
                    @endif
                </li>
                <li>
                    <h6 class="submenu-hdr">Leads</h6>
                    @if (Auth::guard('admin')->check())
                        <ul>
                            @can('access-permission', ['Leads', 'view'])
                                <li><a href="{{ route('admin.leads') }}"><i class="ti ti-users"></i><span>leads</span></a></li>
                            @endcan
                            @can('access-permission', ['Call Tagging', 'view'])
                                <li><a href="{{ route('admin.call-tagging') }}"><i class="ti ti-users"></i><span>Call Tagging</span></a></li>
                            @endcan
                        </ul>
                    @else
                        <ul>
                            @can('access-permission', ['Leads', 'view'])
                                <li><a href="{{ route('employee.leads') }}"><i class="ti ti-users"></i><span>leads</span></a></li>
                            @endcan
                            @can('access-permission', ['Call Tagging', 'view'])
                                <li><a href="{{ route('employee.call-tagging') }}"><i class="ti ti-users"></i><span>Call Tagging</span></a></li>
                            @endcan
                        </ul>
                    @endif
                </li>
                <li>
                    @can('access-permission', ['Support', 'view'])
                        <h6 class="submenu-hdr">Support</h6>
                        <ul>
                            @if (Auth::guard('admin')->check())
                                    <li><a href="{{ route('admin.support') }}"><i class="ti ti-users"></i><span>Support</span></a></li>
                                    <li><a href="{{ route('admin.chat') }}"><i class="ti ti-users"></i><span>Chat</span></a></li>
                                    @else
                                    <li><a href="{{ route('employee.support') }}"><i class="ti ti-users"></i><span>Support</span></a></li>
                                    <li><a href="{{ route('employee.chat') }}"><i class="ti ti-users"></i><span>Chat</span></a></li>
                            @endif
                        </ul>
                    @endcan
                </li>
                <li>
                    @can('access-permission', ['Task Management', 'view'])
                        <h6 class="submenu-hdr">Task Management</h6>
                        <ul>
                            @if (Auth::guard('admin')->check())
                                <li><a href="{{ route('admin.task-management') }}"><i class="ti ti-users"></i><span>Task Management</span></a></li>
                            @endif
                        </ul>
                    @endcan
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->