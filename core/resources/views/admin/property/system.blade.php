<ul class="custom__nav nav system-management  mb-3">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.property.type.index') ? 'active' : '' }}" href="{{ route('admin.property.type.index') }}">@lang('Property Type')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.location.index') ? 'active' : '' }}" href="{{ route('admin.location.index') }}">@lang('Location')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.cron.index') ? 'active' : '' }}" href="{{ route('admin.cron.index') }}">@lang('Cron')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.gateway.automatic.index') ? 'active' : '' }}" href="{{ route('admin.gateway.automatic.index') }}">@lang('Payment Gateway')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.setting.notification.email') ? 'active' : '' }}" href="{{ route('admin.setting.notification.email') }}">@lang('Email Setting')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.setting.notification.sms') ? 'active' : '' }}" href="{{ route('admin.setting.notification.sms') }}">@lang('SMS Setting')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ request()->routeIs('admin.setting.notification.push') ? 'active' : '' }}" href="{{ route('admin.setting.notification.push') }}">@lang('Push Notification Setting')</a>
    </li>
</ul>