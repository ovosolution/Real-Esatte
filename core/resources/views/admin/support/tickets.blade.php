@extends('admin.layouts.app')
@section('panel')


    <div class="dashboard-body">
        <div class="dashboard-body__card">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-body__heading__wrap">
                        <div class="dashboard-body__heading">
                            <h3 class="dashboard-body__title">@lang('Property Management')</h3>
                            <p class="dashboard-body__desc">@lang('Add and manage property listings with accurate coordinates')</p>
                        </div>
                        <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-12">
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
                                    <td>Pro</td>
                                    <td>
                                        @php echo $ticket->priorityBadge; @endphp
                                    </td>
                                    <td>
                                        @php echo $ticket->statusBadge; @endphp
                                    </td>
                                    <td>2024-10-15</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_726_1961)">
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
                                            <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                            <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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