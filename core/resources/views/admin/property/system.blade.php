<ul class="custom__nav nav system-management  mb-3">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.property.type.index') ? 'active' : '' }}" href="{{ route('admin.property.type.index') }}">@lang('Property Type')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.location.index') ? 'active' : '' }}" href="{{ route('admin.location.index') }}">@lang('Location')</a>
    </li>
</ul>