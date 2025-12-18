@extends('admin.layouts.app')
@section('panel')

    <div class="dashboard-body">
        <div class="dashboard-body__card">

            <div class="row gy-4">
                <div class="col-lg-12">
                    <ul class="custom__nav nav user-management  nav-pills mb-3">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if(request()->routeIs('admin.users.all')) active @endif" href="{{ route('admin.users.list') }}">@lang('Realtors')</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if(request()->routeIs('admin.developer.index')) active @endif" href="{{ route('admin.developer.index') }}">@lang('Developers')</a>
                        </li>
                    </ul>
                    <div class="search-box__wrap mt-4">
                        <div class="search-box w-100">
                            <form>
                                <input type="search" class="form-control form--control w-100 h-36" name="search" value="{{ request()->search }}" placeholder="@lang('Search...')">
                            </form>
                        </div>
                        <div class="search-menu">
                            <a class="search-menu__link @if(request()->routeIs('admin.users.all')) active @endif" href="{{ route('admin.users.all') }}">@lang('All')</a>
                            <a class="search-menu__link @if(request()->routeIs('admin.users.active')) active @endif" href="{{ route('admin.users.active') }}">@lang('Verified')</a>
                            <a class="search-menu__link @if (request()->routeIs('admin.users.pending')) @endif" href="{{ route('admin.users.pending') }}">@lang('Pending')</a>
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
                                <tbody>
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
                                </tbody>
                            </table>
                        </div>
                        @if ($users->hasPages())
                            <div class="mt-3">
                                {{ paginateLinks($users) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="userStatusModal" tabindex="-1" role="dialog" aria-labelledby="userStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userStatusModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="ban-content">
                            <small>@lang('If this user is banned, they will no longer have access to their dashboard.')</small>
                            <div class="form-group">
                                <label>@lang('Reason')</label>
                                <textarea class="form-control" name="reason" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="unban-content d-none">
                            <small>
                                <span class="text--info">@lang('Ban reason was'):</span>
                                <span class="ban-reason-text"></span>
                            </small>
                            <h4 class="mt-3 text-center text--warning">@lang('Are you sure to unban this user?')</h4>
                        </div>
                        <div class="form-group mt-3 d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn--secondary" data-bs-dismiss="modal">@lang('No')</button>
                            <button type="submit" class="btn btn--primary">@lang('Yes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userInfoModalLabel">@lang('Realtor Profile')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="user-avatar-modal">
                            <span class="user-initials"></span>
                        </div>
                        <div>
                            <h5 class="user-name mb-1"></h5>
                            <p class="user-email text-muted mb-2"></p>
                            <span class="user-status badge"></span>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <label class="text-muted d-block mb-1">@lang('Company')</label>
                            <div class="fw-bold user-company"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted d-block mb-1">@lang('Subscription Tier')</label>
                            <div class="fw-bold user-plan"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted d-block mb-1">@lang('Date Joined')</label>
                            <div class="fw-bold user-joined"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted d-block mb-1">@lang('Total Listings')</label>
                            <div class="fw-bold user-listings"></div>
                        </div>
                    </div>

                    <div class="pending-user-actions d-none">
                        <div class="d-flex gap-3 justify-content-center">
                            <form action="" method="POST" class="approve-form w-100">
                                @csrf
                                <button type="submit" class="btn btn--success w-100"><i class="las la-check-circle"></i> @lang('Approve')</button>
                            </form>
                            <form action="" method="POST" class="reject-form w-100">
                                @csrf
                                <button type="submit" class="btn btn--danger w-100"><i class="las la-times-circle"></i> @lang('Reject')</button>
                            </form>
                        </div>
                    </div>

                    <div class="verified-user-actions d-none">
                        <div class="d-flex gap-3 justify-content-center">
                            <button type="button" class="btn btn--danger w-100 suspend-user-btn"><i class="las la-ban"></i> <span class="suspend-btn-text">@lang('Suspend')</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />

@endsection

@push('breadcrumb-plugins')
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-body__heading__wrap">
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('User Management')</h3>
                    <p class="dashboard-body__desc">@lang('Manage all registered realtors and developers')</p>
                </div>
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.view-btn').on('click', function () {
                var user = $(this).data('user');
                var modal = $('#userInfoModal');

                modal.find('.user-name').text(user.firstname + ' ' + user.lastname);
                modal.find('.user-email').text(user.email);
                modal.find('.user-company').text(user.company_name || 'N/A');
                modal.find('.user-plan').text(user.plan_name || 'N/A');

                var date = new Date(user.created_at);
                modal.find('.user-joined').text(date.toISOString().split('T')[0]);

                var statusBadge = modal.find('.user-status');
                var isPending = user.company_complete == 1 && user.profile_complete == 1 && user.id_verification_complete == 1 && user.is_verified == 0;
                var isVerified = user.is_verified == 1;
                var isIncomplete = !isPending && !isVerified;

                if (isVerified) {
                    statusBadge.text('Verified').removeClass('badge--warning badge--danger').addClass('badge--success');
                    modal.find('.pending-user-actions').addClass('d-none');
                    modal.find('.verified-user-actions').removeClass('d-none');
                } else if (isPending) {
                    statusBadge.text('Pending').removeClass('badge--success badge--danger').addClass('badge--warning');
                    modal.find('.pending-user-actions').removeClass('d-none');
                    modal.find('.verified-user-actions').addClass('d-none');
                } else if (isIncomplete) {
                    statusBadge.text('Incomplete').removeClass('badge--success badge--warning').addClass('badge--info');
                    modal.find('.pending-user-actions').addClass('d-none');
                    modal.find('.verified-user-actions').addClass('d-none');
                }

                if (user.status == 1) {
                    modal.find('.suspend-user-btn').removeClass('btn--warning').addClass('btn--danger').find('.suspend-btn-text').text("@lang('Ban User')");
                    modal.find('.suspend-user-btn i').removeClass('la-undo').addClass('la-ban');
                } else {
                    modal.find('.suspend-user-btn').removeClass('btn--danger').addClass('btn--warning').find('.suspend-btn-text').text("@lang('Unban User')");
                    modal.find('.suspend-user-btn i').removeClass('la-ban').addClass('la-undo');
                }

                modal.find('.user-listings').text((user.properties_count || 0) + ' properties');

                var approveRoute = "{{ route('admin.users.approve', '') }}/" + user.id;
                var rejectRoute = "{{ route('admin.users.reject', '') }}/" + user.id;
                var suspendRoute = "{{ route('admin.users.status', '') }}/" + user.id;

                modal.find('.approve-form').attr('action', approveRoute);
                modal.find('.reject-form').attr('action', rejectRoute);
                modal.data('user', user);

                modal.modal('show');
            });

            $('.userStatus').on('click', function () {
                var user = $(this).data('user');
                openStatusModal(user);
            });

            $('.suspend-user-btn').on('click', function () {
                var modal = $('#userInfoModal');
                var user = modal.data('user');
                modal.modal('hide');
                openStatusModal(user);
            });

            function openStatusModal(user) {
                var modal = $('#userStatusModal');
                var form = modal.find('form');
                form.attr('action', "{{ route('admin.users.status', '') }}/" + user.id);

                if (user.status == 1) {
                    modal.find('.modal-title').text("@lang('Ban User')");
                    modal.find('.ban-content').removeClass('d-none');
                    modal.find('.unban-content').addClass('d-none');
                    modal.find('textarea[name=reason]').attr('required', true);
                } else {
                    modal.find('.modal-title').text("@lang('Unban User')");
                    modal.find('.ban-content').addClass('d-none');
                    modal.find('.unban-content').removeClass('d-none');
                    modal.find('.ban-reason-text').text(user.ban_reason);
                    modal.find('textarea[name=reason]').attr('required', false);
                }
                modal.modal('show');
            }
        })(jQuery);
    </script>
@endpush