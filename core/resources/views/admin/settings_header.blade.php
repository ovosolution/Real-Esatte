@php
    $admin = auth('admin')->user();
@endphp

<ul class="custom__nav nav system-management  mb-3">
    @if ($admin->can("view admin"))
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->routeIs('admin.list') ? 'active' : '' }}" href="{{ route('admin.list') }}">@lang('Team Management')</a>
        </li>
    @endif
    @if ($admin->can("security settings"))
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->routeIs('admin.password') ? 'active' : '' }}" href="{{ route('admin.password') }}">@lang('Security')</a>
        </li>
    @endif
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.activities') ? 'active' : '' }}" href="{{ route('admin.activities') }}">@lang('Activity Logs')</a>
    </li>
    @if ($admin->can("view roles"))
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->routeIs('admin.role.list') ? 'active' : '' }}" href="{{ route('admin.role.list') }}">@lang('Role and Permissions')</a>
        </li>
    @endif
</ul>