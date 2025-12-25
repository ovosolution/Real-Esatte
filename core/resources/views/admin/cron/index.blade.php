@extends('admin.layouts.app')
@section('panel')
    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    @include('admin.property.system')

                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Schedule')</th>
                                <th>@lang('Next Run')</th>
                                <th>@lang('Last Run')</th>
                                <th>@lang('Is Running')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($crons as $cron)
                                @php
    $dateTime = now()->parse($cron->next_run);
    $formattedDateTime = showDateTime($dateTime, 'Y-m-d\TH:i');
                                @endphp
                                <tr>
                                    <td>
                                        {{ __($cron->name) }}
                                        @if ($cron->logs->where('error', '!=', null)->count())
                                            <i class="fas fa-exclamation-triangle text--danger"></i>
                                        @endif
                                        <br>
                                        <code>{{ __($cron->alias) }}</code>
                                    </td>
                                    <td>{{ __($cron->schedule->name) }}</td>
                                    <td>
                                        @if ($cron->next_run)
                                            {{ __($cron->next_run) }}
                                            @if ($cron->next_run > now())
                                                <br> {{ diffForHumans($cron->next_run) }}
                                            @endif
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cron->last_run)
                                            {{ __($cron->last_run) }}
                                            <br> {{ diffForHumans($cron->last_run) }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cron->is_running)
                                            <span class="badge badge--success">@lang('Running')</span>
                                        @else
                                            <span class="badge badge--dark">@lang('Pause')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cron->is_default)
                                            <span class="badge badge--success">@lang('Default')</span>
                                        @else
                                            <span class="badge badge--primary">@lang('Customizable')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons dropdown">
                                            <button class="action-btn btn btn-outline--primary" data-bs-toggle="dropdown" aria-expanded="false">
                                                @lang('Action') <i class="las la-ellipsis-v ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-list d-block" href="{{ route('cron') }}?alias={{ $cron->alias }}">
                                                    <i class="fas fa-check-circle text--success me-2"></i> @lang('Run Now')
                                                </a>
                                                @if ($cron->is_running)
                                                    <a href="{{ route('admin.cron.schedule.pause', $cron->id) }}" class="dropdown-list d-block">
                                                        <i class="fas fa-pause text--info me-2"></i> @lang('Pause')
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.cron.schedule.pause', $cron->id) }}" class="dropdown-list d-block">
                                                        <i class="fas fa-play text--info me-2"></i> @lang('Play')
                                                    </a>
                                                @endif
                                                <a type="button" data-cron='@json($cron)' class="dropdown-list d-block editBtn" data-next-run="{{ $formattedDateTime }}">
                                                    <i class="fas fa-pen text--primary me-2"></i> @lang('Edit')
                                                </a>
                                                <a href="{{ route('admin.cron.schedule.logs', $cron->id) }}" class="dropdown-list d-block">
                                                    <i class="fas fa-history text--info me-2"></i> @lang('Logs')
                                                </a>
                                                @if (!$cron->is_default)
                                                    <a type="button" class="dropdown-list d-block confirmationBtn" href="javascript:void(0)" data-action="{{ route('admin.cron.delete', $cron->id) }}" data-question="@lang('Are you sure to delete this cron?')">
                                                        <i class="fas fa-trash text--danger me-2"></i> @lang('Delete')
                                                    </a>
                                                @endif
                                            </div>
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


    <x-confirmation-modal />

    <div class="modal fade" id="cronModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content plan-modal">

                <div class="modal-header border-0">
                    <div>
                        <h5 class="modal-title modal-title-text">@lang('Add Cron Job')</h5>
                        <p class="text-muted mb-0 modal-subtitle">
                            @lang('Schedule a new cron job for automated tasks.')
                        </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('admin.cron.store') }}" class="plan-form">
                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form--label">@lang('Name')</label>
                            <input type="text" class="form-control form--control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form--label">@lang('Next Run')</label>
                            <input type="datetime-local" class="form-control form--control" name="next_run" required>
                        </div>

                        <div class="mb-3">
                            <label class="form--label">@lang('Schedule')</label>
                            <select name="cron_schedule_id" class="form-control form--control select2" data-minimum-results-for-search="-1" required>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form--label">@lang('URL')</label>
                            <input type="url" class="form-control form--control" name="url" required>
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
                    <h3 class="dashboard-body__title">@lang('Cron Setup')</h3>
                    <p class="dashboard-body__desc">@lang('Add and manage cron settings')</p>
                </div>
            </div>
        </div>

        <div class="col-lg-auto">
            <button type="button" class="btn  btn--primary flex-fill addCron">
                <i class="las la-plus"></i> @lang('Add')
            </button>
            <a href="{{ route('admin.cron.schedule') }}" class="btn btn--info flex-fill">
                <i class="las la-clock"></i>
                @lang('Cron Schedule')
            </a>
        </div>
    </div>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";

            $('.addCron').on('click', function () {
                const $modal = $('#cronModal');
                const action = "{{ route('admin.cron.store') }}";
                $modal.find(".modal-title").text("@lang('Add Cron Job')");
                $modal.find("form").attr('action', action).trigger('reset');
                $modal.find('input[name=url]').attr('required', true).parent().show();
                $modal.modal('show');
            });

            $('.editBtn').on('click', function (e) {
                const $modal = $('#cronModal');
                const cron = $(this).data('cron');
                const nextRun = $(this).data('nextRun');
                const action = "{{ route('admin.cron.update', ':id') }}";

                $modal.find(".modal-title").text("@lang('Edit Cron Job')");
                $modal.find('input[name=name]').val(cron.name);
                $modal.find('input[name=next_run]').val(nextRun);
                $modal.find('select[name=cron_schedule_id]').val(cron.cron_schedule_id).change();
                if (cron.is_default) {
                    $modal.find('input[name=url]').attr('required', false).parent().hide();
                } else {
                    $modal.find('input[name=url]').val(cron.url).attr('required', true).parent().show();
                }
                $modal.find("form").attr('action', action.replace(':id', cron.id));
                $modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush