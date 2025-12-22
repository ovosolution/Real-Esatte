<ul class="custom__nav nav user-management  nav-pills mb-3">
    <li class="nav-item" role="presentation">
        <a class="nav-link @if(request()->routeIs(['admin.users.all', 'admin.users.active', 'admin.users.pending'])) active @endif" href="{{ route('admin.users.all') }}">@lang('Realtors')</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link @if(request()->routeIs('admin.developer.index')) active @endif" href="{{ route('admin.developer.index') }}">@lang('Developers')</a>
    </li>
</ul>