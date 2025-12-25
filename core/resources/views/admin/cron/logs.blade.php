@extends('admin.layouts.app')
@section('panel')
    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">

                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('Start At')</th>
                                <th>@lang('End At')</th>
                                <th>@lang('Execution Time')</th>
                                <th>@lang('Error')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $log)
                                <tr>
                                    <td>{{ showDateTime($log->start_at) }}</td>
                                    <td>{{ showDateTime($log->end_at) }}</td>
                                    <td>{{ $log->duration }} @lang('Seconds')</td>
                                    <td>{{ $log->error }}</td>
                                    <td>
                                        @if ($log->error != null)
                                            <button type="button" class="action-btn btn btn-outline--success confirmationBtn" data-action="{{ route('admin.cron.schedule.log.resolved', $log->id) }}" data-question="@lang('Are you sure to resolved this log?')">
                                                <i class="la la-check me-1"></i> @lang('Resolved')
                                            </button>
                                        @else
                                            --
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <x-admin.ui.table.empty_message />
                            @endforelse
                        </tbody>
                    </table>

                    @if ($logs->hasPages())
                        <div class="mt-3">
                            {{ paginateLinks($logs) }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-auto">
            <div class="dashboard-body__heading__wrap">
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('Cron Logs')</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-auto">
            <button type="button" class="btn  btn-outline--danger confirmationBtn" data-action="{{ route('admin.cron.log.flush', $cronJob->id) }}" data-question="@lang('Are you sure to flush all logs?')">
                <i class="la la-history"></i> @lang('Flush Logs')
            </button>
        </div>
    </div>
@endpush
