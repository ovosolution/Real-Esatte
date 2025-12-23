@extends('admin.layouts.app')
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    @include('admin.settings_header')

                    <div class="card table__card__wrap">
                        <div class="table__heading d-flex align-items-center justify-content-between">
                            <p class="table__heading__title mb-0">@lang('Admin Roles')</p>
                        </div>
                        <table class="table border-0 p-0 mt-4 table--responsive--md">

                            <thead>
                                <tr>
                                    <th>@lang('Role Name')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button type="button" class="action-btn edit-btn" data-resource="{{ $role }}">
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
                                                <a class="btn btn--primary" href="{{ route('admin.role.permission', $role->id) }}">
                                                    @lang('Permissions')
                                                </a>
                                                {{-- <button type="button" class="action-btn confirmationBtn" data-question=" @lang('Are you sure to remove this location?')" data-action="{{ route('admin.location.delete', $role->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="M424 64h-88V48c0-26.467-21.533-48-48-48h-64c-26.467 0-48 21.533-48 48v16H88c-22.056 0-40 17.944-40 40v56c0 8.836 7.164 16 16 16h8.744l13.823 290.283C87.788 491.919 108.848 512 134.512 512h242.976c25.665 0 46.725-20.081 47.945-45.717L439.256 176H448c8.836 0 16-7.164 16-16v-56c0-22.056-17.944-40-40-40zM208 48c0-8.822 7.178-16 16-16h64c8.822 0 16 7.178 16 16v16h-96zM80 104c0-4.411 3.589-8 8-8h336c4.411 0 8 3.589 8 8v40H80zm313.469 360.761A15.98 15.98 0 0 1 377.488 480H134.512a15.98 15.98 0 0 1-15.981-15.239L104.78 176h302.44z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                            <path d="M256 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM336 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM176 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                        </g>
                                                    </svg>
                                                </button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
                    <h3 class="dashboard-body__title">@lang('System Setup')</h3>
                    <p class="dashboard-body__desc">@lang('Add and manage system settings')</p>
                </div>
            </div>
        </div>

        <div class="col-lg-auto">
            <button type="button" class="btn btn--primary add-role-btn">
                <i class="las la-plus"></i> @lang('Add Role')
            </button>
        </div>
    </div>
@endpush


<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content property-modal">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="addModalLabel">@lang('Add Role')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.role.create') }}" method="post">
                @csrf
                <input type="hidden" name="id" class="role-id">
                <div class="modal-body pt-3">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form--label required">@lang('Role Name')</label>
                            <input type="text" class="form--control form-control role-name" name="name" value="{{ old('name') }}" placeholder="@lang('e.g., Admin')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn Reject__btn" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn approve__btn submit-btn">@lang('Save role')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        (function ($) {
            "use strict";

            const modal = $('#addModal');
            const form = modal.find('form');
            const statusWrapper = modal.find('.status-wrapper');
            const checkbox = modal.find('input[type="checkbox"][name="status"]');
            const title = modal.find('#addModalLabel');
            const submitBtn = modal.find('.submit-btn');

            $('.add-role-btn').on('click', function () {
                form.trigger('reset');
                form.attr('action', "{{ route('admin.role.create') }}");
                title.text("@lang('Add Role')");
                submitBtn.text("@lang('Save Role')");

                statusWrapper.addClass('d-none');
                checkbox.prop('checked', true);

                modal.modal('show');
            });

            $('.edit-btn').on('click', function () {
                const role = $(this).data('resource');
                form.trigger('reset');
                form.attr('action', "{{ route('admin.role.update', ':id') }}".replace(':id', role.id));
                title.text("@lang('Edit Role Type')");
                submitBtn.text("@lang('Update Role')");
                modal.find('.role-id').val(role.id);
                modal.find('.role-name').val(role.name);

                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush