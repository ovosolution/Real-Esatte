@extends('admin.layouts.app')
@section('panel')

<div class="dashboard-body">
    <div class="dashboard-body__card">

        <p class="pricing__title">@lang('Available Plans')</p>

        <div class="row gy-4 justify-content-center plans-wrapper">

            @foreach ($plans as $key => $plan)
            <div class="col-xxl-4 col-md-4 col-sm-6">
                <div
                    class="pricing__card plan-item {{ $key == 0 ? 'active' : '' }}"
                    data-name="{{ ucfirst($plan->name) }}"
                    data-features='@json($plan->features)'>
                    {{-- Top section --}}
                    <div class="pricing__card__content d-flex align-items-center gap-3 justify-content-between">
                        <div class="form-check d-flex align-items-center">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="plan_{{ $plan->id }}"
                                {{ $key == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="plan_{{ $plan->id }}">
                                <p class="pricing__card__title ms-2 m-0">
                                    {{ ucfirst($plan->name) }}
                                </p>
                            </label>
                        </div>

                        <div>
                            <button
                                type="button"
                                class="pricing__btn edit-plan-btn"
                                data-plan='@json($plan)'>
                                {{-- Edit icon --}}
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8"
                                        stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933"
                                        stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class="pricing__desc">
                                {{ $plan->description }}
                            </p>
                        </div>

                        <div class="pricing__card__price">
                            <h2 class="mb-0">
                                {{ gs('cur_sym') }}{{ getAmount($plan->price) }}
                            </h2>
                            <p class="pricing__date">
                                /{{ planDuration($plan->duration) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card plan-item ">
                    <div class="pricing__card__content d-flex align-items-center gap-3 justify-content-between">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="weeklyPlan">
                            <label class="form-check-label" for="weeklyPlan">
                                <p class="pricing__card__title ms-2 m-0">Weekly</p>
                            </label>

                        </div>
                        <div>
                            <button type="button" class=" pricing__btn edit-plan-btn">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 2H3.33333C2.97971 2 2.64057 2.14048 2.39052 2.39052C2.14048 2.64057 2 2.97971 2 3.33333V12.6667C2 13.0203 2.14048 13.3594 2.39052 13.6095C2.64057 13.8595 2.97971 14 3.33333 14H12.6667C13.0203 14 13.3594 13.8595 13.6095 13.6095C13.8595 13.3594 14 13.0203 14 12.6667V8" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.2499 1.75C12.5151 1.48478 12.8748 1.33578 13.2499 1.33578C13.625 1.33578 13.9847 1.48478 14.2499 1.75C14.5151 2.01521 14.6641 2.37493 14.6641 2.75C14.6641 3.12507 14.5151 3.48478 14.2499 3.75L8.24123 9.75933C8.08293 9.9175 7.88737 10.0333 7.67257 10.096L5.75723 10.656C5.69987 10.6727 5.63906 10.6737 5.58117 10.6589C5.52329 10.6441 5.47045 10.614 5.4282 10.5717C5.38594 10.5294 5.35583 10.4766 5.341 10.4187C5.32617 10.3608 5.32717 10.3 5.3439 10.2427L5.9039 8.32733C5.96692 8.1127 6.08292 7.91737 6.24123 7.75933L12.2499 1.75Z" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between ">
                        <div>
                            <p class="pricing__desc">
                                Pay weekly,<br> cancel anytime
                            </p>
                        </div>
                        <div class="pricing__card__price">
                            <h2 class="mb-0">10</h2>
                            <p class="pricing__date">/7 days</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12">
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
                            <th>@lang('User')</th>
                            <th>@lang('Plan')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Start Date')</th>
                            <th>@lang('End Date')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sarah Johnson</td>
                            <td>Yearly</td>
                            <td><span class="badge badge--success">Active</span></td>
                            <td>
                                2024-09-15
                            </td>
                            <td>2025-09-15</td>
                            <td>₦150,000</td>
                            <td>
                                <div class="subscription__button">
                                    <button class="subscription__button__fill">Upgrade</button>
                                    <button class="subscription__button__text">Cancel</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                <h3 class="dashboard-body__title">@lang('Subscription Management')</h3>
                <p class="dashboard-body__desc">@lang('Manage payment plans and user subscriptions')</p>
            </div>
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
                        <input type="text" class="form-control form--control" name="name">
                    </div>

                    <div class="mb-3">
                        <label class="form--label">@lang('Description')</label>
                        <textarea class="form-control form--control" name="description" rows="2"></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form--label">@lang('Price')</label>
                            <input type="number" class="form-control form--control" name="price">
                        </div>
                        <div class="col-md-6">
                            <label class="form--label">@lang('Duration')</label>
                            <input type="text" class="form-control form--control" name="duration">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form--label">@lang('Features')</label>

                        <div class="d-flex gap-2 mb-2">
                            <input type="text" class="form-control form--control feature-input" placeholder="@lang('Add a new feature...')">
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
    (function($) {
        "use strict";

        let firstPlan = $('.plan-item.active');

        if (firstPlan.length) {
            renderPlanFeatures(firstPlan.data('features'));
        }

        $(document).on('click', '.plan-item', function() {
            $('.plan-item').removeClass('active');
            $(this).addClass('active');

            let features = $(this).data('features');
            renderPlanFeatures(features);
        });

        function renderPlanFeatures(features) {
            let html = '';

            if (Array.isArray(features)) {
                features.forEach(function(feature) {
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

        $('.add-btn').on('click', function(e) {
            e.preventDefault();

            $('.modal-title-text').text('@lang("Add Plan")');
            $('.modal-subtitle').text('@lang("Create a new subscription plan.")');

            $('.plan-form').attr('action', "{{ route('admin.plan.store') }}");
            $('.plan-form')[0].reset();
            $('.feature-wrapper').empty();

            $('#addModal').modal('show');
        });

        $(document).on('click', '.edit-plan-btn', function() {

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
                plan.features.forEach(function(feature) {
                    $('.feature-wrapper').append(featureRow(feature));
                });
            }

            $('#addModal').modal('show');
        });

        $(document).on('click', '.add-feature-btn', function() {
            let input = $('.feature-input');
            let value = input.val().trim();

            if (!value) return;

            $('.feature-wrapper').append(featureRow(value));
            input.val('');
        });

        $(document).on('click', '.remove-feature', function() {
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