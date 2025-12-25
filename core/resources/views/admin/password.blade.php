@extends('admin.layouts.app')
@section('panel')

<div class="dashboard-body">
    <div class="dashboard-body__card">
        <div class="row gy-4">
            <div class="col-lg-12">

                @include('admin.settings_header')

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



@endsection

@push('breadcrumb-plugins')
<div class="row d-flex align-items-center justify-content-between">
    <div class="col-lg-auto">
        <div class="dashboard-body__heading__wrap">
            <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            <div class="dashboard-body__heading">
                <h3 class="dashboard-body__title">@lang('User Management')</h3>
                <p class="dashboard-body__desc">@lang('Manage all registered realtors and developers')</p>
            </div>
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