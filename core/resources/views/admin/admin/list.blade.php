@extends('admin.layouts.app')
@php
    $authAdminId = auth('admin')->id();
@endphp
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    <ul class="custom__nav nav system-management  mb-3">
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

                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Role')</th>
                                <th>@lang('Last Active')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ __($admin->name) }}</td>
                                    <td>{{ __($admin->email) }}</td>
                                    <td>
                                        <div>
                                            @forelse ($admin->roles as $role)
                                                @if ($role->name == 'Moderator')
                                                    <span class="badge badge--primary">{{ __($role->name) }}</span>
                                                @elseif($role->name == 'Super Admin')
                                                    <span class="badge badge--info">{{ __($role->name) }}</span>
                                                @else
                                                    <span class="badge badge--success">{{ __($role->name) }}</span>
                                                @endif
                                            @empty
                                                <span class="badge badge--dark">@lang('Unassigned')</span>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td>{{ showDateTime($admin->created_at) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="action-btn view-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View" data-user="{{ json_encode($admin) }}">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z" stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_726_1961">
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>

                                            <button type="button" class="action-btn delete-btn confirmationBtn" data-question=" @lang('Are you sure to remove this admin?')" data-action="{{ route('admin.delete', $admin->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                    <g>
                                                        <path d="M424 64h-88V48c0-26.467-21.533-48-48-48h-64c-26.467 0-48 21.533-48 48v16H88c-22.056 0-40 17.944-40 40v56c0 8.836 7.164 16 16 16h8.744l13.823 290.283C87.788 491.919 108.848 512 134.512 512h242.976c25.665 0 46.725-20.081 47.945-45.717L439.256 176H448c8.836 0 16-7.164 16-16v-56c0-22.056-17.944-40-40-40zM208 48c0-8.822 7.178-16 16-16h64c8.822 0 16 7.178 16 16v16h-96zM80 104c0-4.411 3.589-8 8-8h336c4.411 0 8 3.589 8 8v40H80zm313.469 360.761A15.98 15.98 0 0 1 377.488 480H134.512a15.98 15.98 0 0 1-15.981-15.239L104.78 176h302.44z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                        <path d="M256 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM336 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM176 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <x-admin.ui.table.empty_message />
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{-- <x-admin.ui.card>
                    <x-admin.ui.card.body :paddingZero=true>
                        <x-admin.ui.table.layout :renderTableFilter="false">
                            <x-admin.ui.table>
                                <x-admin.ui.table.header>
                                    <tr>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Email')</th>
                                        <th>@lang('Username')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Role')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </x-admin.ui.table.header>
                                <x-admin.ui.table.body>
                                    @forelse($admins as $admin)
                                    <tr>
                                        <td>{{ __($admin->name) }}</td>
                                        <td>{{ __($admin->email) }}</td>
                                        <td>{{ __($admin->username) }}</td>
                                        <td>
                                            <x-admin.other.status_switch :status="$admin->status" :action="route('admin.status.change', $admin->id)" title="admin" />
                                        </td>
                                        <td>
                                            <div>
                                                @forelse ($admin->roles as $role)
                                                <span class="badge badge--primary">{{ __($role->name) }}</span>
                                                @empty
                                                <span class="badge badge--dark">@lang('Unassigned')</span>
                                                @endforelse
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 flex-wrap justify-content-end">
                                                @if (($admin->id == Status::SUPPER_ADMIN_ID && $admin->id == $authAdminId) || $admin->id != Status::SUPPER_ADMIN_ID)
                                                <x-admin.ui.btn.edit tag="btn" :data-admin="$admin" />
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <x-admin.ui.table.empty_message />
                                    @endforelse
                                </x-admin.ui.table.body>
                            </x-admin.ui.table>
                        </x-admin.ui.table.layout>
                    </x-admin.ui.card.body>
                </x-admin.ui.card> --}}
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addAdminModalLabel">@lang('Add Admin')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('admin.store') }}">
                    @csrf

                    <div class="modal-body mb-3">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form--label required">@lang('Name')</label>
                                <input type="text" class="form--control form-control" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form--label required">@lang('Username')</label>
                                <input type="text" class="form--control form-control" name="username" value="{{ old('username') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form--label required">@lang('Email')</label>
                                <input type="email" class="form--control form-control" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form--label required">@lang('Password')</label>
                                <input type="password" class="form--control form-control" name="password" minlength="6" required>
                            </div>

                            <div class="col-12">
                                <label class="form--label required">@lang('Role')</label>
                                <select name="roles[]" class="form-select select2" multiple required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ __($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn Reject__btn" data-bs-dismiss="modal">
                            @lang('Cancel')
                        </button>

                        <button type="submit" class="btn approve__btn">
                            @lang('Save Admin')
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- <x-admin.ui.modal id="modal">
        <x-admin.ui.modal.header>
            <h4 class="modal-title">@lang('Add Admin')</h4>
            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                <i class="las la-times"></i>
            </button>
        </x-admin.ui.modal.header>
        <x-admin.ui.modal.body>
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>@lang('Name')</label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>@lang('Username')</label>
                    <input type="text" class="form-control" name="username" required value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label>@lang('Email')</label>
                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>@lang('Password')</label>
                    <input type="password" class="form-control" name="password" required min="6">
                </div>
                <div class="form-group">
                    <label>@lang('Role')</label>
                    <select name="roles[]" class="form-control select2 admin-role" multiple>
                        <option value="" disabled>@lang('Select One')</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ __($role->name) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-admin.ui.btn.modal />
                </div>
            </form>
        </x-admin.ui.modal.body>
    </x-admin.ui.modal> --}}


    <x-confirmation-modal />
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
        <div class="col-lg-auto">
            <button type="button" class="btn  btn--primary add-btn">
                <i class="las la-plus"></i> @lang('Add Admin User')
            </button>
        </div>
    </div>
@endpush



@push('script')
    <script>
        "use strict";
        (function ($) {
            const $modal = $('#modal');
            const $form = $modal.find('form');

            $('.add-btn').on('click', function () {
                const action = "{{ route('admin.store') }}"
                $modal.find('.modal-title').text("@lang('Add Admin')");
                $modal.find('input[name=password]').attr('required', true).parent().removeClass('d-none');
                $form.trigger('reset');
                $form.attr('action', action);
                $modal.find('.admin-role').val([]);
                select2Initialize();
                $modal.modal('show');
            });


            function select2Initialize() {
                $.each($('.select2'), function () {
                    $(this)
                        .wrap(`<div class="position-relative"></div>`)
                        .select2({
                            dropdownParent: $(this).parent(),
                        });
                    multiple: true
                });
            }
        })(jQuery);
    </script>
@endpush