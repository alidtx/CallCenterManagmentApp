<ul class="menu-inner py-1">
    <!-- Dashboards -->
    @if (Auth::user()->hasAnyPermission(['dashboard.view']))
        <li class="menu-item {{ Route::is('home') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
            @can('dashboard.view')
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="menu-link">
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>
                </ul>
            @endcan
        </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['User-view']))
        <li class="menu-item {{ Route::is('users.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                @can('User-view')
                    <li class="menu-item {{ Route::is('users.*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endif

    @if (Auth::user()->hasAnyPermission(['role-list']))
        <li class="menu-item {{ Route::is('roles.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            @can('role-list')
            
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('roles.*') ? 'active ' : '' }}">
                        <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                        </a>
                    </li>
                </ul>
            @endcan
        </li>
    @endif

    @if (Auth::user()->hasAnyPermission(['lead.list']))
    <li class="menu-item {{ Route::is('lead.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Lead">Leads</div>
        </a>
        @can('role-list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('lead.*') ? 'active ' : '' }}">
                    <a href="{{ route('lead.list') }}" class="menu-link">
                        <div data-i18n="Lead">Lead</div>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
@endif

@if (Auth::user()->hasAnyPermission(['salary.list']))
    <li class="menu-item {{ Route::is('salary.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Employee Salary">Employee Salary</div>
        </a>
        @can('salary.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('salary.*') ? 'active ' : '' }}">
                    <a href="{{ route('salary.list') }}" class="menu-link">
                        <div data-i18n="Salary">Salary</div>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
@endif

@if (Auth::user()->hasAnyPermission(['campaign.list']))
    <li class="menu-item {{ Route::is('campaign.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Campaign">Campaign</div>
        </a>
        @can('campaign.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('campaign.*') ? 'active ' : '' }}">
                    <a href="{{ route('campaign.list') }}" class="menu-link">
                        <div data-i18n="Camapign">Camapign</div>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
@endif
   
@if (Auth::user()->hasAnyPermission(['department.list']))
    <li class="menu-item {{ Route::is('campaign.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Department">Department</div>
        </a>
        @can('campaign.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('department.*') ? 'active ' : '' }}">
                    <a href="{{ route('department.list') }}" class="menu-link">
                        <div data-i18n="Department">Department</div>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
@endif



@if (Auth::user()->hasAnyPermission(['designation.list']))
    <li class="menu-item {{ Route::is('designation.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Designation">Designation</div>
        </a>
        @can('designation.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('designation.*') ? 'active ' : '' }}">
                    <a href="{{ route('designation.list') }}" class="menu-link">
                        <div data-i18n="Designation">Designation</div>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
@endif

@if (Auth::user()->hasAnyPermission(['employee.list']))
    <li class="menu-item {{ Route::is('employee.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Employee">Employee</div>
        </a>
        @can('employee.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('employee.*') ? 'active ' : '' }}">
                    <a href="{{ route('employee.list') }}" class="menu-link">
                        <div data-i18n="Employee">Employee</div>
                    </a>
                </li>
                
            </ul>
        @endcan
    </li>
@endif

@if (Auth::user()->hasAnyPermission(['attendance.list']))
    <li class="menu-item {{ Route::is('attendance.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Attendance">Attendance</div>
        </a>
        @can('attendance.list')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('attendance.*') ? 'active ' : '' }}">
                    <a href="{{ route('attendance.list') }}" class="menu-link">
                        <div data-i18n="Attendance">Attendance</div>
                    </a>
                </li>
            </ul>
        @endcan

        @can('attendance.late_attend')
        
        <ul class="menu-sub">
            <li class="menu-item {{ Route::is('attendance.*') ? 'active ' : '' }}">
                <a href="{{ route('attendance.late_attend') }}" class="menu-link">
                    <div data-i18n="Late In">Late In</div>
                </a>
            </li>
        </ul>
    @endcan

    </li>
@endif


@if (Auth::user()->hasAnyPermission(['leave.add']))
    <li class="menu-item {{ Route::is('leave.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Apply For Leave">Apply For Leave</div>
        </a>
        @can('leave.add')
        
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('leave.*') ? 'active ' : '' }}">
                    <a href="{{ route('leave.add') }}" class="menu-link">
                        <div data-i18n="Apply for Leave">Apply For Leave</div>
                    </a>
                </li>
                
            </ul>
        @endcan
    </li>
@endif




</ul>
