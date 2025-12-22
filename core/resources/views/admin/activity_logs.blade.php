@extends('admin.layouts.app')

@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row gy-4">
                <div class="col-lg-12">
                    @include('admin.settings_header')
                    <table class="table mt-4 table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Action')</th>
                                <th>@lang('Target')</th>
                                <th>@lang('Timestamp')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $activity)
                                <tr>
                                    <td>{{ __($activity->admin->name) }}</td>
                                    <td>{{ __($activity->activity) }}</td>
                                    <td>{{ __($activity->target) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            {{ $activity->created_at }}
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
@endsection



@push('breadcrumb-plugins')
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-auto">
            <div class="dashboard-body__heading__wrap">
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('Activity Logs')</h3>
                    <p class="dashboard-body__desc">@lang('See all activities')</p>
                </div>
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            </div>
        </div>
    </div>
@endpush