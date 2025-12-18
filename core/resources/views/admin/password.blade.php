@extends('admin.layouts.app')
@section('panel')

        <div class="dashboard-body">
            <div class="dashboard-body__card">
                <div class="row gy-4">
                    <div class="col-lg-12">

                        <ul class="custom__nav nav system-management mb-3">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ request()->routeIs('admin.list') ? 'active' : '' }}" href="{{ route('admin.list') }}">@lang('Team Management')</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ request()->routeIs('admin.password') ? 'active' : '' }}" href="{{ route('admin.password') }}">@lang('Security')</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ request()->routeIs('admin.location.index') ? 'active' : '' }}" href="{{ route('admin.location.index') }}">@lang('Activity Logs')</a>
                            </li>
                        </ul>

                        <x-admin.ui.card>
                            <x-admin.ui.card.header>
                                <h4 class="card-title">@lang('Update your password')</h4>
                                <small>@lang('Please ensure your new password is at least 6 characters long to maintain the security of your account.')</small>
                            </x-admin.ui.card.header>
                            <x-admin.ui.card.body>
                                <form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>@lang('Password')</label>
                                        <input class="form-control" type="password" name="old_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('New Password')</label>
                                        <input class="form-control" type="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('Confirm Password')</label>
                                        <input class="form-control" type="password" name="password_confirmation" required>
                                    </div>
                                    <x-admin.ui.btn.submit />
                                </form>
                            </x-admin.ui.card.body>
                        </x-admin.ui.card>

                    </div>
                </div>
            </div>
        </div>



    {{-- <div class="row gy-4 justify-content-center">
        <div class="col-sm-6">
            <x-admin.ui.card>
                <x-admin.ui.card.header>
                    <h4 class="card-title">@lang('Update your password')</h4>
                    <small>@lang('Please ensure your new password is at least 6 characters long to maintain the security of your account.')</small>
                </x-admin.ui.card.header>
                <x-admin.ui.card.body>
                    <form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>@lang('Password')</label>
                            <input class="form-control" type="password" name="old_password" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('New Password')</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Confirm Password')</label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                        </div>
                        <x-admin.ui.btn.submit />
                    </form>
                </x-admin.ui.card.body>
            </x-admin.ui.card>
        </div>
    </div> --}}
@endsection

@push('breadcrumb-plugins')
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-auto">
            <div class="dashboard-body__heading__wrap">
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('User Management')</h3>
                    <p class="dashboard-body__desc">@lang('Manage all registered realtors and developers')</p>
                </div>
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            </div>
        </div>

    </div>
@endpush


{{--
@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap gap-3">
        <a class="btn btn-outline--primary  " href="{{ route('admin.profile') }}">
            <i class="la la-user"></i> @lang('My Profile')
        </a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline--dark ">
            <i class="las la-redo"></i> @lang('Dashboard')
        </a>
    </div>
@endpush --}}
