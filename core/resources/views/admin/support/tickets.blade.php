@extends('admin.layouts.app')
@section('panel')
<div class="dashboard-body">
    <div class="dashboard-body__card">
        <div class="row gy-4">
            <div class="col-lg-12">

                <div class="search-box__wrap mt-4">
                    <div class="search-box w-100">
                        <form>
                            <input type="search" class="form-control form--control w-100 h-36" name="search" value="{{ request()->search }}" placeholder="@lang('Search...')">
                        </form>
                    </div>
                    <div class="search-menu">
                        <a class="search-menu__link @if(request()->routeIs('admin.ticket.index')) active @endif" href="{{ route('admin.ticket.index') }}">@lang('All')</a>
                        <a class="search-menu__link @if(request()->routeIs('admin.ticket.answered')) active @endif" href="{{ route('admin.ticket.answered') }}">@lang('Open')</a>
                        <a class="search-menu__link @if (request()->routeIs('admin.ticket.pending')) @endif" href="{{ route('admin.ticket.pending') }}">@lang('In Review')</a>
                        <a class="search-menu__link @if (request()->routeIs('admin.ticket.closed')) @endif" href="{{ route('admin.ticket.closed') }}">@lang('Resolved')</a>
                    </div>
                </div>

                <table class="table mt-4 table--responsive--md">
                    <thead>
                        <tr>
                            <th>@lang('Ticket ID')</th>
                            <th>@lang('User')</th>
                            <th>@lang('Subject')</th>
                            <th>@lang('Category')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Created')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->ticket }}</td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ __($ticket->subject) }}</td>
                            <td>{{ __($ticket->department) }}</td>
                            <td>
                                @php echo $ticket->priorityBadge; @endphp
                            </td>
                            <td>
                                @php echo $ticket->statusBadge; @endphp
                            </td>
                            <td>{{ showDateTime($ticket->created_at) }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.ticket.view', $ticket->id) }}" class="action-btn btn btn-outline--primary">
                                        <i class="las la-comment-alt"></i> @lang('View')
                                    </a>
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




{{-- <div class="row">
        <div class="col-12">
            <x-admin.ui.card class="table-has-filter">
                <x-admin.ui.card.body :paddingZero="true">
                    <x-admin.ui.table.layout searchPlaceholder="Search here..." filterBoxLocation="support.filter_form">
                        <x-admin.ui.table>
                            <x-admin.ui.table.header>
                                <tr>
                                    <th>@lang('Submitted By')</th>
                                    <th>@lang('Subject')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Priority')</th>
                                    <th>@lang('Last Reply')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </x-admin.ui.table.header>
                            <x-admin.ui.table.body>
                                @forelse($tickets as $ticket)
                                <tr>
                                    <td>
                                        @if ($ticket->user_id)
                                        <x-admin.other.user_info :user="$ticket->user" />
                                        @else
                                        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end justify-content-md-start">
                                            <span class="table-thumb">
                                                <img src="{{ siteFavicon() }}" alt="user">
</span>
<span>{{ $ticket->name }}</span>
</div>
@endif
</td>
<td>
    <a href="{{ route('admin.ticket.view', $ticket->id) }}" class="fw-smibold">
        [@lang('Ticket')#{{ $ticket->ticket }}]
        {{ strLimit($ticket->subject, 30) }}
    </a>
</td>
<td>
    @php echo $ticket->statusBadge; @endphp
</td>
<td>
    @php echo $ticket->priorityBadge; @endphp
</td>
<td>
    <div>
        <span class="d-block">
            {{ diffForHumans($ticket->last_reply) }}
        </span>
        <small>{{ showDateTime($ticket->last_reply) }}</small>
    </div>
</td>
<td>
    <a href="{{ route('admin.ticket.view', $ticket->id) }}" class="btn  btn-outline--primary">
        <i class="las la-info-circle"></i> @lang('Details')
    </a>
</td>
</tr>
@empty
<x-admin.ui.table.empty_message />
@endforelse
</x-admin.ui.table.body>
</x-admin.ui.table>
@if ($tickets->hasPages())
<x-admin.ui.table.footer>
    {{ paginateLinks($tickets) }}
</x-admin.ui.table.footer>
@endif
</x-admin.ui.table.layout>
</x-admin.ui.card.body>
</x-admin.ui.card>
</div>
</div> --}}
@endsection

@push('breadcrumb-plugins')
<div class="row d-flex align-items-center justify-content-between">
    <div class="col-lg-auto">
        <div class="dashboard-body__heading__wrap">
            <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            <div class="dashboard-body__heading">
                <h3 class="dashboard-body__title">@lang('Support & Tickets')</h3>
                <p class="dashboard-body__desc">@lang('Manage and resolve user issues')</p>
            </div>
        </div>
    </div>
</div>
@endpush