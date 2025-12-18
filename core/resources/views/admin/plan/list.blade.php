@extends('admin.layouts.app')
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">

            <p class="pricing__title">@lang('Available Plans')</p>

            <div class="row gy-4 justify-content-center plans-wrapper">
                @foreach ($plans as $key => $plan)
                    <div class="col-xxl-3 col-md-4 col-sm-6">
                        <div class="pricing__card plan-item {{ $key == 0 ? 'active' : '' }}" data-name="{{ ucfirst($plan->name) }}" data-features='@json($plan->features)'>
                            <div class="pricing__card__content d-flex align-items-center justify-content-between">
                                <p class="pricing__card__title m-0">{{ ucfirst($plan->name) }}</p>

                                <span class="plan-radio"></span>
                            </div>

                            <div class="pricing__card__price">
                                <h2 class="mb-0">{{ gs('cur_sym') }}{{ showAmount($plan->price) }}</h2>
                                <p class="pricing__date">/{{ planDuration($plan->duration) }}</p>
                            </div>
                            <div>
                                <p>
                                    {{ $plan->description }}
                                </p>
                            </div>
                            <div class="pricing__card__btn mt-4">
                                <button type="button" class="btn w-100 btn--primary pricing__btn edit-plan-btn" data-plan="{{ $plan }}">
                                    @lang('Edit Plan')
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-lg-9">
                    <div class="role__card card">
                        <h5 class="mb-3">@lang('Premium Features')</h5>

                        <ul class="pricing__list__wrap feature-list">

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-lg-3">
                    <div class="role__card card">
                        <span class="role__card__icon">
                            <h3 class="role__card__title">@lang('Free Trial Users')</h3>
                        </span>
                        <span>
                            <h3 class="role__card__price">100</h3>
                        </span>
                        <p class="role__card__desc">44% @lang('of total')</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="role__card card">
                        <span class="role__card__icon">
                            <h3 class="role__card__title">@lang('Basic Subscribers')</h3>
                        </span>
                        <span>
                            <h3 class="role__card__price">100</h3>
                        </span>
                        <p class="role__card__desc">20% @lang('of total')</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="role__card card">
                        <span class="role__card__icon">
                            <h3 class="role__card__title">@lang('Pro Subscriber')</h3>
                        </span>
                        <span>
                            <h3 class="role__card__price">100</h3>
                        </span>
                        <p class="role__card__desc">36% @lang('of total')</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Company')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Tier')</th>
                                <th>@lang('Joined')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->firstname }} {{ $user->lastname }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->company_name ?? 'N/A' }}</td>
                                <td>
                                    @if ($user->is_verified == Status::VERIFIED)
                                    <span class="badge badge--success">@lang('Verified')</span>
                                    @elseif ($user->company_complete == Status::COMPLETE && $user->profile_complete == Status::COMPLETE && $user->id_verification_complete == Status::COMPLETE && $user->is_verified == Status::UNVERIFIED)
                                    <span class="badge badge--warning">@lang('Pending')</span>
                                    @else
                                    <span class="badge badge--info">@lang('Incomplete')</span>
                                    @endif
                                </td>
                                <td>{{ $user->plan_name ?? 'N/A' }}</td>
                                <td>{{ showDateTime($user->created_at) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn view-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View" data-user="{{ json_encode($user) }}">
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

                                        @if($user->company_complete == Status::COMPLETE && $user->profile_complete == Status::COMPLETE && $user->id_verification_complete == Status::COMPLETE && $user->is_verified == Status::UNVERIFIED)
                                        <button type="button" class="action-btn approve-btn confirmationBtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit" data-question="@lang('Are you sure to approve this user?')" data-action="{{ route('admin.users.approve', $user->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                <g>
                                                    <path d="M497.36 69.995c-7.532-7.545-19.753-7.558-27.285-.032L238.582 300.845l-83.522-90.713c-7.217-7.834-19.419-8.342-27.266-1.126-7.841 7.217-8.343 19.425-1.126 27.266l97.126 105.481a19.273 19.273 0 0 0 13.784 6.22c.141.006.277.006.412.006a19.317 19.317 0 0 0 13.623-5.628L497.322 97.286c7.551-7.525 7.564-19.746.038-27.291z" fill="#00a63e" opacity="1" data-original="#000000" class=""></path>
                                                    <path d="M492.703 236.703c-10.658 0-19.296 8.638-19.296 19.297 0 119.883-97.524 217.407-217.407 217.407-119.876 0-217.407-97.524-217.407-217.407 0-119.876 97.531-217.407 217.407-217.407 10.658 0 19.297-8.638 19.297-19.296C275.297 8.638 266.658 0 256 0 114.84 0 0 114.84 0 256c0 141.154 114.84 256 256 256 141.154 0 256-114.846 256-256 0-10.658-8.638-19.297-19.297-19.297z" fill="#00a63e" opacity="1" data-original="#000000" class=""></path>
                                                </g>
                                            </svg>
                                        </button>

                                        <button type="button" class="action-btn reject-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" data-question="@lang('Are you sure to delete the notification?')" data-action="{{ route('admin.users.reject', $user->id) }}"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1993)">
                                                    <path d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10 6L6 10" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 6L10 10" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1993">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        @endif

                                        @if ($user->is_verified)
                                        <button type="button" class="action-btn ban-btn userStatus" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="@lang('Ban User')" data-user="{{ json_encode($user) }}"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <x-admin.ui.table.empty_message />
                            @endforelse
                        </tbody> --}}
                    </table>
                </div>
                {{-- @if ($users->hasPages())
                <div class="mt-3">
                    {{ paginateLinks($users) }}
                </div>
                @endif --}}
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-auto">
            <div class="dashboard-body__heading__wrap">
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('Subscription Management')</h3>
                    <p class="dashboard-body__desc">@lang('Manage payment plans and user subscriptions')</p>
                </div>
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            </div>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn  btn--primary add-btn">
                <i class="las la-plus"></i> @lang('Create New Plan')
            </button>
        </div>
    </div>
@endpush


<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content plan-modal">

            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title modal-title-text">@lang('Add Plan')</h5>
                    <p class="text-muted mb-0 modal-subtitle">
                        @lang('Create a new subscription plan.')
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.plan.store') }}" method="POST" class="plan-form">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form--label">@lang('Plan Name')</label>
                        <input type="text" class="form--control" name="name">
                    </div>

                    <div class="mb-3">
                        <label class="form--label">@lang('Description')</label>
                        <textarea class="form--control" name="description" rows="2"></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form--label">@lang('Price')</label>
                            <input type="number" class="form--control" name="price">
                        </div>
                        <div class="col-md-6">
                            <label class="form--label">@lang('Duration')</label>
                            <input type="text" class="form--control" name="duration">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form--label">@lang('Features')</label>

                        <div class="d-flex gap-2 mb-2">
                            <input type="text" class="form--control feature-input" placeholder="@lang('Add a new feature...')">
                            <button type="button" class="btn btn-outline--primary add-feature-btn">
                                <span class="text--primary">
                                    <i class="las la-plus"></i>
                                </span>
                            </button>
                        </div>

                        <div class="feature-wrapper"></div>
                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn Reject__btn" data-bs-dismiss="modal">
                        @lang('Cancel')
                    </button>
                    <button type="submit" class="btn approve__btn">
                        @lang('Save Changes')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        (function ($) {
            "use strict";

            let firstPlan = $('.plan-item.active');

            if (firstPlan.length) {
                renderPlanFeatures(firstPlan.data('features'));
            }

            $(document).on('click', '.plan-item', function () {
                $('.plan-item').removeClass('active');
                $(this).addClass('active');

                let features = $(this).data('features');
                renderPlanFeatures(features);
            });

            function renderPlanFeatures(features) {
                let html = '';

                if (Array.isArray(features)) {
                    features.forEach(function (feature) {
                        html += `
                                                    <li class="pricing__list">

                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 21 21" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class=""><g><path fill="#00ba00" d="M10.504 1.318a9.189 9.189 0 0 1 0 18.375 9.189 9.189 0 0 1 0-18.375zM8.596 13.49l-2.25-2.252a.986.986 0 0 1 0-1.392.988.988 0 0 1 1.393 0l1.585 1.587 3.945-3.945a.986.986 0 0 1 1.392 0 .987.987 0 0 1 0 1.392l-4.642 4.642a.987.987 0 0 1-1.423-.032z" opacity="1" data-original="#00ba00" class=""></path></g></svg>

                                                        ${feature}
                                                    </li>
                                                `;
                    });
                }

                $('.feature-list').html(html);
            }

            $('.add-btn').on('click', function (e) {
                e.preventDefault();

                $('.modal-title-text').text('@lang("Add Plan")');
                $('.modal-subtitle').text('@lang("Create a new subscription plan.")');

                $('.plan-form').attr('action', "{{ route('admin.plan.store') }}");
                $('.plan-form')[0].reset();
                $('.feature-wrapper').empty();

                $('#addModal').modal('show');
            });

            $(document).on('click', '.edit-plan-btn', function () {

                let plan = $(this).data('plan');

                $('.modal-title-text').text('@lang("Edit Plan")');
                $('.modal-subtitle').text('@lang("Update the details of the selected plan.")');

                $('.plan-form').attr('action', "{{ route('admin.plan.store') }}/" + plan.id);

                $('input[name="name"]').val(plan.name);
                $('textarea[name="description"]').val(plan.description ?? '');
                $('input[name="price"]').val(parseFloat(plan.price).toFixed(2));
                $('input[name="duration"]').val(plan.duration);

                $('.feature-wrapper').empty();

                if (Array.isArray(plan.features)) {
                    plan.features.forEach(function (feature) {
                        $('.feature-wrapper').append(featureRow(feature));
                    });
                }

                $('#addModal').modal('show');
            });

            $(document).on('click', '.add-feature-btn', function () {
                let input = $('.feature-input');
                let value = input.val().trim();

                if (!value) return;

                $('.feature-wrapper').append(featureRow(value));
                input.val('');
            });

            $(document).on('click', '.remove-feature', function () {
                $(this).closest('.feature-item').remove();
            });

            function featureRow(value = '') {
                return `
                                            <div class="feature-item d-flex align-items-center justify-content-between mb-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="las la-check text-success"></i>
                                                    <input type="hidden" name="features[]" value="${value}">
                                                    <span>${value}</span>
                                                </div>
                                                <button type="button" class="btn btn-outline--danger remove-feature">
                                                    <span class="text--danger">x</span>
                                                </button>
                                            </div>
                                        `;
            }

        })(jQuery);
    </script>
@endpush