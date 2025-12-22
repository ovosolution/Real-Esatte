@extends('admin.layouts.app')
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    @include('admin.users.user_header')

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table mt-4 table--responsive--md">
                                <thead>
                                    <tr>
                                        <th>@lang('Company Name')</th>
                                        <th>@lang('Contact Person')</th>
                                        <th>@lang('Email')</th>
                                        <th>@lang('Phone')</th>
                                        <th>@lang('Location')</th>
                                        <th>@lang('Properties')</th>
                                        <th>@lang('Actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($developers as $developer)
                                        <tr>
                                            <td>{{ $developer->name }}</td>
                                            <td>{{ $developer->contact_person }}</td>
                                            <td>{{ $developer->email }}</td>
                                            <td>{{ $developer->phone }}</td>
                                            <td>{{ $developer->location }}</td>
                                            <td>
                                                <span class="badge badge--primary">{{ $developer->properties->count() }}</span>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button type="button" class="action-btn edit-btn" data-resource="{{ $developer }}">
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
                                                    <button type="button" class="action-btn confirmationBtn" data-question=" @lang('Are you sure to remove this developer?')" data-action="{{ route('admin.developer.delete', $developer->id) }}">
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
                                        <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @if ($developers->hasPages())
            <div class="mt-3">
                {{ paginateLinks($developers) }}
            </div>
        @endif
    </div>

    <x-confirmation-modal  />
@endsection

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5 modal-title-text" id="addModalLabel">@lang('Add Developer')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.developer.store') }}" method="POST" class="plan-form">
                @csrf

                <input type="hidden" name="id" class="developer-id">

                <div class="modal-body mb-3">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form--label required">@lang('Name')</label>
                            <input type="text" class="form--control form-control developer-name" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="col-6">
                            <label class="form--label required">@lang('Contact Person')</label>
                            <input type="text" class="form--control form-control developer-contact" name="contact_person" value="{{ old('contact_person') }}">
                        </div>
                        <div class="col-6">
                            <label class="form--label required">@lang('Email')</label>
                            <input type="email" class="form--control form-control developer-email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-6">
                            <label class="form--label required">@lang('Phone')</label>
                            <input type="text" class="form--control form-control developer-phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="col-6">
                            <label class="form--label required">@lang('Location')</label>
                            <input type="text" class="form--control form-control developer-location" name="location" value="{{ old('location') }}">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn approve__btn submit-btn">
                        <i class="las la-plus"></i> @lang('Add Developer')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



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
            <button type="button" class="btn btn--primary add-btn">
                <i class="las la-plus"></i> @lang('Add Developer')
            </button>
        </div>
    </div>
@endpush


@push('script')
    <script>
        (function ($) {
            const modal = $('#addModal');
            const form = modal.find('form');
            const title = modal.find('#addModalLabel');
            const submitBtn = modal.find('.submit-btn');

            $('.add-btn').on('click', function () {
                form.trigger('reset');
                form.attr('action', "{{ route('admin.developer.store') }}");
                title.text("@lang('Add Developer')");
                submitBtn.html('<i class="las la-plus"></i> @lang("Add Developer")');

                modal.modal('show');
            });

            $('.edit-btn').on('click', function () {
                const developer = $(this).data('resource');
                form.trigger('reset');
                form.attr('action', "{{ route('admin.developer.store', ':id') }}".replace(':id', developer.id));
                title.text("@lang('Edit developer Type')");
                submitBtn.html('<i class="las la-edit"></i> @lang("Update Developer")');
                modal.find('.developer-id').val(developer.id);
                modal.find('.developer-name').val(developer.name);
                modal.find('.developer-contact').val(developer.contact_person);
                modal.find('.developer-email').val(developer.email);
                modal.find('.developer-phone').val(developer.phone);
                modal.find('.developer-location').val(developer.location);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush