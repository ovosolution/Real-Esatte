@extends('admin.layouts.app')
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Interval')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>{{ __($schedule->name) }}</td>
                                    <td>{{ __($schedule->interval) }} @lang('Seconds')</td>
                                    <td>@php echo $schedule->statusBadge; @endphp</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="action-btn btn btn-outline--primary editBtn" data-schedule='@json($schedule)'>
                                                <i class="las la-edit me-1"></i> @lang('Edit')
                                            </button>

                                            @if (!$schedule->status)
                                                <button type="button" class="action-btn btn btn-outline--success confirmationBtn" data-action="{{ route('admin.cron.schedule.status', $schedule->id) }}" data-question="@lang('Are you sure to enable this schedule?')">
                                                    <i class="la la-eye me-1"></i> @lang('Enable')
                                                </button>
                                            @else
                                                <button type="button" class="action-btn btn btn-outline--danger confirmationBtn" data-action="{{ route('admin.cron.schedule.status', $schedule->id) }}" data-question="@lang('Are you sure to disable this schedule?')">
                                                    <i class="la la-eye-slash me-1"></i> @lang('Disable')
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <x-admin.ui.table.empty_message />
                            @endforelse
                        </tbody>
                    </table>

                    @if ($schedules->hasPages())
                        <div class="mt-3">
                            {{ paginateLinks($schedules) }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />

    <div class="modal fade" id="scheduleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content plan-modal">

                <div class="modal-header border-0">
                    <div>
                        <h5 class="modal-title modal-title-text">@lang('Add Cron Schedule')</h5>
                        <p class="text-muted mb-0 modal-subtitle">
                            @lang('Create a new cron schedule for your tasks.')
                        </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('admin.cron.schedule.store') }}" class="plan-form">
                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form--label">@lang('Name')</label>
                            <input type="text" class="form-control form--control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form--label">@lang('Interval')</label>
                            <div class="input-group">
                                <input type="number" class="form-control form--control" name="interval" required>
                                <span class="input-group-text">@lang('Seconds')</span>
                            </div>
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

@endsection

@push('breadcrumb-plugins')
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-auto">
            <div class="dashboard-body__heading__wrap">
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('Cron Schedule')</h3>
                    <p class="dashboard-body__desc">@lang('Add and manage cron schedule settings')</p>
                </div>
            </div>
        </div>

        <div class="col-lg-auto">
            <button class="btn  btn-outline--primary addBtn"><i class="las la-plus"></i> @lang('Add New')</button>
        </div>
    </div>
@endpush


@push('script')
    <script>
        (function ($) {
            "use strict";

            $('.addBtn').on('click', function () {
                const $modal = $('#scheduleModal');
                const action = "{{ route('admin.cron.schedule.store') }}";

                $modal.find(".modal-title").text("@lang('Add Cron Schedule')");
                $modal.find("form").attr('action', action).trigger('reset');
                $modal.modal('show');
            });

            $('.editBtn').on('click', function (e) {
                const $modal = $('#scheduleModal');
                const schedule = $(this).data('schedule');
                const action = "{{ route('admin.cron.schedule.store', ':id') }}";

                $modal.find(".modal-title").text("@lang('Edit Cron Schedule')");
                $modal.find('input[name=name]').val(schedule.name);
                $modal.find('input[name=interval]').val(schedule.interval);
                $modal.find("form").attr('action', action.replace(':id', schedule.id));
                $modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush