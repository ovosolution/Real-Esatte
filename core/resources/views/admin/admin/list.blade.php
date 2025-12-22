@extends('admin.layouts.app')
@php
    $authAdminId = auth('admin')->id();
@endphp
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    @include('admin.settings_header')

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
                                            <button type="button" class="action-btn edit-btn" data-resource="{{ $admin }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                    <g>
                                                        <defs>
                                                            <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                                                <path d="M0 512h512V0H0Z" fill="#000000" opacity="1" data-original="#000000"></path>
                                                            </clipPath>
                                                        </defs>
                                                        <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                                            <path d="M0 0h-220c-22.092 0-40-17.908-40-40v-320c0-22.092 17.908-40 40-40h320c22.092 0 40 17.908 40 40v220" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(275 415)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                            <path d="m0 0-226.274-226.273-70.711-14.143 14.142 70.711L-56.569 56.569c7.81 7.81 20.474 7.81 28.284 0L0 28.284C7.81 20.474 7.81 7.811 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(491.143 434.573)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                            <path d="m0 0 56.568-56.568" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(406.29 462.857)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                        </g>
                                                    </g>
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
                                <input type="text" class="form--control form-control admin-name" name="name" required>

                                {{-- <input type="text" class="form--control form-control" name="name" value="{{ old('name') }}" required> --}}
                            </div>

                            <div class="col-md-6">
                                <label class="form--label required">@lang('Email')</label>
                                <input type="email" class="form--control form-control admin-email" name="email" required>
                                {{-- <input type="email" class="form--control form-control" name="email" value="{{ old('email') }}" required> --}}
                            </div>

                            <div class="col-md-6 password-field">
                                <label class="form--label required">@lang('Password')</label>
                                <input type="password" class="form--control form-control admin-password" name="password" minlength="6">
                            </div>


                            {{-- <div class="col-md-6">
                                <label class="form--label required">@lang('Password')</label>
                                <input type="password" class="form--control form-control" name="password" minlength="6" required>
                            </div> --}}

                            <div class="col-6">
                                <label class="form--label required">@lang('Role')</label>
                                {{-- <select name="roles[]" class="form-select select2" multiple required> --}}
                                    <select name="roles[]" class="form-select select2 admin-role" multiple required>
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

            $('.edit-btn').on('click', function () {
                const action = "{{ route('admin.update', ':id') }}";
                const admin = $(this).data('resource');
                const roleId = admin.roles.map((role) => role.id);

                $modal.find('.modal-title').text("@lang('Edit Admin')");
                $form.trigger('reset');
                $modal.find('.admin-name').val(admin.name);
                $modal.find('.admin-email').val(admin.email);
                $modal.find('input[name=password]').attr('required', false).parent().addClass('d-none');
                $modal.find('.admin-role').val(roleId);
                $form.attr('action', action.replace(':id', admin.id));
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