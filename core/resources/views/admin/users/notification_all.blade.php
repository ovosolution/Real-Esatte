@extends('admin.layouts.app')
@section('panel')
@php
$sessionData = session('SEND_NOTIFICATION') ?? [];
$viaName = $sessionData['via'] ?? 'email';
$viaText = @$sessionData['via'] == 'push' ? 'Push notification ' : ucfirst($viaName);
@endphp

<div class="dashboard-body">
    <div class="dashboard-body__card">
        @empty(!$sessionData)
        <div class="notification-data-and-loader">
            <div class="row  mb-4 justify-content-center">
                <div class="col-sm-7">
                    <div class="row gy-4 justify-content-center">
                        @include('admin.users.notification_widget')
                    </div>
                </div>
            </div>
        </div>
        @endempty

        <div class="row gy-4 @empty(!$sessionData) d-none @endempty">
            <!-- Left Side: Create Notification Form -->
            <div class="col-lg-6">
                <div class="card-body card">
                    <h5 class="card-title mb-4">@lang('Create Notification')</h5>
                    <form class="notify-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">@lang('Title')</label>
                            <input type="text" class="form-control" name="subject"
                                placeholder="@lang('Enter notification title...')"
                                value="{{ old('subject', @$sessionData['subject']) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">@lang('Message')</label>
                            <textarea class="form-control" name="message" rows="4"
                                placeholder="@lang('Enter your message...')">{{ old('message', @$sessionData['message']) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Target Audience')</label>
                                    <select class="form-control form--control select2 select2-100" name="being_sent_to"
                                        required>
                                        @foreach ($notifyToUser as $key => $toUser)
                                        <option value="{{ $key }}" @selected(
                                            old( 'being_sent_to' ,
                                            @$sessionData['being_sent_to']
                                            )==$key
                                            )>
                                            {{ __($toUser) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="input-append mt-2"></div>
                                    <small class="text--info d-none userCountText mt-2 d-block">
                                        <i class="las la-info-circle"></i> <strong class="userCount">0</strong>
                                        @lang('active users found')
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Delivery Type')</label>
                                    <select class="form-control form--control select2 select2-100" name="via" required>
                                        <option value="email" @selected($viaName=='email' )>@lang('Email')</option>
                                        <option value="sms" @selected($viaName=='sms' )>@lang('SMS')</option>
                                        <option value="push" @selected($viaName=='push' )>@lang('In-app Banner (Push)')
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group push-notification-file d-none">
                            <label class="form-label">@lang('Image') <small
                                    class="text-muted">(@lang('Optional'))</small></label>
                            <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg">
                        </div>

                        <!-- Advanced Settings (Collapsible or just inline) -->
                        <div class="row border-top pt-3 mt-3">
                            <p class="text-muted mb-3"><small>@lang('Sending Configuration')</small></p>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label small">@lang('Start From ID')</label>
                                    <input class="form-control form-control-sm" name="start"
                                        value="{{ old('start', @$sessionData['start'] ?? 1) }}" type="number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label small">@lang('Per Batch')</label>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" name="batch"
                                            value="{{ old('batch', @$sessionData['batch'] ?? 500) }}" type="number"
                                            required>
                                        <span class="input-group-text">@lang('USER')</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label small">@lang('Cooling Period')</label>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" name="cooling_time"
                                            value="{{ old('cooling_time', @$sessionData['cooling_time'] ?? 5) }}"
                                            type="number" required>
                                        <span class="input-group-text">@lang('SEC')</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn--primary flex-grow-1"><i
                                    class="las la-paper-plane"></i> @lang('Send Now')</button>
                            <button type="button" class="btn btn-outline--primary flex-grow-1" disabled title="Coming Soon"><i
                                    class="las la-calendar"></i> @lang('Schedule')</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Preview -->
            <div class="col-lg-6">
                <div class="card dashboard-body__card h-100 bg-light">
                    <h5 class="card-title mb-4">@lang('Preview')</h5>
                    <div class="border-0">
                        <div class="card-body p-0">
                            <div class="notification__title">

                                <h6 class="mb-2 preview-title">@lang('Notification Title')</h6>
                                <p class="text-muted small mb-4 preview-message">@lang('Your notification message will
                                    appear here...')</p>
                            </div>

                            <div class=" pt-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="text-muted d-block">@lang('Audience'):</small>
                                    <span class="fw-bold small preview-audience">@lang('All Users')</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted d-block">@lang('Delivery'):</small>
                                    <span class="fw-bold small preview-audience">@lang('Email')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="row gy-4">
                <div class="col-lg-12">
                    <table class="table mt-4
                         table--responsive--md">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th>Tier</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sarah Johnson</td>
                                <td>sarah.j@realty.com</td>
                                <td>Prime Properties</td>
                                <td><span class="badge badge--success"> Verified</span></td>
                                <td>Pro</td>
                                <td>2024-10-15</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>

                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1993)">
                                                    <path
                                                        d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 6L6 10" stroke="#E7000B" stroke-width="1.33333"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 6L10 10" stroke="#E7000B" stroke-width="1.33333"
                                                        stroke-linecap="round" stroke-linejoin="round" />
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

                            <tr>
                                <td>Michael Okafor</td>
                                <td>michael.o@homes.ng</td>
                                <td>Okafor Homes</td>
                                <td><span class="badge badge--success">Pending</span></td>
                                <td>Free Trial</td>
                                <td>2024-11-08</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Amara Eze</td>
                                <td>amara@luxuryestates.ng</td>
                                <td>Luxury Estates Ltd</td>
                                <td><span class="badge badge--success"> Verified</span></td>
                                <td>Pro</td>
                                <td>2024-09-22</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>David Williams</td>
                                <td>d.williams@urbanspaces.com</td>
                                <td>Urban Spaces</td>
                                <td><span class="badge badge--success"> Verified</span></td>
                                <td>Basic</td>
                                <td>2024-08-11</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Sarah Johnson</td>
                                <td>sarah.j@realty.com</td>
                                <td>Prime Properties</td>
                                <td><span class="badge badge--success"> Verified</span></td>
                                <td>Pro</td>
                                <td>2024-10-15</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>

                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>

                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1993)">
                                                    <path
                                                        d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 6L6 10" stroke="#E7000B" stroke-width="1.33333"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 6L10 10" stroke="#E7000B" stroke-width="1.33333"
                                                        stroke-linecap="round" stroke-linejoin="round" />
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

                            <tr>
                                <td>Chioma Nwankwo</td>
                                <td>chioma@topview.ng</td>
                                <td>Top View Realty</td>
                                <td><span class="badge badge--success"> Verified</span></td>
                                <td>Free Trial</td>
                                <td>2024-11-10</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Edit"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1961)">
                                                    <path
                                                        d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                        stroke="#0A0A0A" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1961">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Delete"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_726_1965)">
                                                    <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                        stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_726_1965">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> --}}


        <!-- Bottom: Notification History (Static/Mockup for now as per plan) -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-body__card">
                    <h5 class="card-title mb-4">@lang('Notification History')</h5>
                    <div class="table-responsive">
                        <table class="table table--responsive--md">
                            <thead>
                                <tr>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Audience')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Sent Date')</th>
                                    <th>@lang('Recipients')</th>
                                    <th>@lang('Status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                <tr>
                                    <td>
                                        {{-- <x-admin.other.user_info :user="$log->user" /> --}}
                                        @if ($log->subject)
                                        {{ __($log->subject) }}
                                        @else
                                        @lang('N/A')
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <br>
                                                {{ diffForHumans($log->created_at) }} --}}
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ keyToTitle($log->notification_type) }}</span> <br>
                                        @lang('via') {{ __($log->sender) }}
                                    </td>
                                    <td>
                                        @if ($log->subject)
                                        {{ __($log->subject) }}
                                        @else
                                        @lang('N/A')
                                        @endif
                                    </td>
                                    <td>
                                        @if ($log->notification_type == 'email')
                                        <button class="btn  btn-outline--primary notifyDetail"
                                            data-type="{{ $log->notification_type }}"
                                            data-message="{{ route('admin.report.email.details', $log->id) }}"
                                            data-sent_to="{{ $log->sent_to }}">
                                            <i class="las la-info-circle"></i>
                                            @lang('Detail')
                                        </button>
                                        @else
                                        <button class="btn  btn-outline--primary notifyDetail"
                                            data-type="{{ $log->notification_type }}" data-message="{{ $log->message }}"
                                            data-image="{{ asset(getFilePath('push') . '/' . $log->image) }}"
                                            data-sent_to="{{ $log->sent_to }}">
                                            <i class="las la-info-circle"></i>
                                            @lang('Detail')
                                        </button>
                                        @endif
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
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<div class="row d-flex align-items-center justify-content-between">
    <div class="col-lg-auto">
        <div class="dashboard-body__heading__wrap">
            <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
            <div class="dashboard-body__heading">
                <h3 class="dashboard-body__title">@lang('Notification Control')</h3>
                <p class="dashboard-body__desc">@lang('Send targeted or global announcements')</p>
            </div>
        </div>
    </div>
</div>
@endpush

@push('script-lib')
<script src="{{ asset('assets/global/js/summernote-lite.min.js') }}"></script>
@endpush
@push('style-lib')
<link href="{{ asset('assets/global/css/summernote-lite.min.css') }}" rel="stylesheet">
@endpush

@push('script')
<script>
    let formSubmit = false;

    (function($) {
        "use strict"

        // Update Preview
        $('input[name=subject]').on('input', function() {
            let val = $(this).val();
            $('.preview-title').text(val ? val : "@lang('Notification Title')");
        });

        $('textarea[name=message]').on('input', function() {
            let val = $(this).val();
            $('.preview-message').text(val ? val : "@lang('Your notification message will appear here...')");
        });

        // Summernote change handler for preview if used (Currently using textarea for cleaner design matching image, but logic can adapt)
        // If summernote is needed for Email mode, we toggle it.

        $('select[name=via]').on('change', function() {
            let val = $(this).find('option:selected').text();
            $('.preview-delivery').text(val);

            let type = $(this).val();
            if (type == 'email') {
                // Initialize Summernote if needed or keep simple textarea based on design preference.
                // Design image shows simple textarea. Keeping simple for now, but keeping legacy logic for file toggling.
                // $('.editor').summernote(...);
            }
            if (type == 'push') {
                $('.push-notification-file').removeClass('d-none');
            } else {
                $('.push-notification-file').addClass('d-none');
            }
        }).trigger('change');

        $('select[name=being_sent_to]').on('change', function() {
            let val = $(this).find('option:selected').text();
            $('.preview-audience').text(val);

            // Legacy Logic for User Count & Inputs
            let methodName = $(this).val();
            if (!methodName) return;
            getUserCount(methodName);
            methodName = methodName.toUpperCase();

            if (methodName == 'SELECTEDUSERS') {
                $('.input-append').html(`
                    <div class="form-group position-relative" id="user_list_wrapper">
                        <label class="required form-label">@lang('Select User')</label>
                        <select name="user[]"  class="form-control select2-100" id="user_list" required multiple >
                            <option disabled>@lang('Select One')</option>
                        </select>
                    </div>
                `);
                fetchUserList();
                return;
            }
            if (methodName == 'TOPDEPOSITEDUSERS') {
                $('.input-append').html(`
                    <div class="form-group">
                        <label class="required form-label">@lang('Number Of Top Deposited User')</label>
                        <input class="form-control" type="number" name="number_of_top_deposited_user" >
                    </div>
                `);
                return;
            }
            if (methodName == 'NOTLOGINUSERS') {
                $('.input-append').html(`
                    <div class="form-group">
                        <label class="required form-label">@lang('Number Of Days')</label>
                        <div class="input-group input--group">
                            <input class="form-control" value="{{ old('number_of_days', @$sessionData['number_of_days']) }}" type="number" name="number_of_days" >
                            <span class="input-group-text">@lang('Days')</span>
                        </div>
                    </div>
                `);
                return;
            }
            $('.input-append').empty();

        }).trigger('change');


        // ... (Keep existing fetchUserList and getUserCount functions) ...
        function fetchUserList() {
            $('.row #user_list').select2({
                ajax: {
                    url: "{{ route('admin.users.list') }}",
                    type: "get",
                    dataType: 'json',
                    delay: 1000,
                    data: function(params) {
                        return {
                            search: params.term,
                            page: params.page,
                        };
                    },
                    processResults: function(response, params) {
                        params.page = params.page || 1;
                        let data = response.users.data;
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.email,
                                    id: item.id
                                }
                            }),
                            pagination: {
                                more: response.more
                            }
                        };
                    },
                    cache: false,
                },
                dropdownParent: $('#user_list_wrapper')
            });
        }

        function getUserCount(methodName) {
            var methodNameUpper = methodName.toUpperCase();
            if (methodNameUpper == 'SELECTEDUSERS' || methodNameUpper == 'ALLUSERS' || methodNameUpper ==
                'TOPDEPOSITEDUSERS' ||
                methodNameUpper == 'NOTLOGINUSERS') {
                $('.userCount').text(0);
                $('.userCountText').addClass('d-none');
                return;
            }
            var route = "{{ route('admin.users.segment.count', ':methodName') }}"
            route = route.replace(':methodName', methodName)
            $.get(route, function(response) {
                $('.userCount').text(response);
                $('.userCountText').removeClass('d-none');
            });
        }

        $(".notify-form").on("submit", function(e) {
            formSubmit = true;
        });

        // Loop animation logic (Keep as is, just ensure selectors match if needed)
        @empty(!$sessionData)
        $(document).ready(function() {
            const coalingTimeOut = setTimeout(() => {
                let coalingTime = Number("{{ $sessionData['cooling_time'] }}");

                $("#animate-circle").css({
                    "animation": `countdown ${coalingTime}s linear infinite forwards`
                });

                let $coalingCountElement = $('.coaling-time-count');
                let $coalingLoaderElement = $(".coaling-loader");

                $coalingCountElement.text(coalingTime);

                const coalingIntVal = setInterval(function() {
                    coalingTime--;
                    $coalingCountElement.text(coalingTime);
                    if (coalingTime <= 0) {
                        formSubmit = true;
                        $("#animate-circle").css({
                            "animation": `unset`
                        });
                        clearInterval(coalingIntVal);
                        clearTimeout(coalingTimeOut);
                        $(".notify-form").submit();
                    }
                }, 1000);

            }, 1000);
        });
        @endif

    })(jQuery);

    @if(!empty(@$sessionData) && @request() -> email_sent && @request() -> email_sent = 'yes')
    window.addEventListener('beforeunload', function(event) {
        if (!formSubmit) {
            event.preventDefault();
            event.returnValue = '';
            var confirmationMessage = 'Are you sure you want to leave this page?';
            (event || window.event).returnValue = confirmationMessage;
            return confirmationMessage;
        }
    });
    @endif
</script>
@endpush

@push('style')
<style>
    /* Keep existing styles for cooling loader if needed */
    .countdown {
        position: relative;
        height: 100px;
        width: 100px;
        text-align: center;
        margin: 0 auto;
    }

    /* ... (rest of styles) ... */
    .coaling-time {
        color: yellow;
        position: absolute;
        z-index: 999999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 30px;
    }

    .coaling-loader svg {
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        transform: rotateY(-180deg) rotateZ(-90deg);
        position: relative;
        z-index: 1;
    }

    .coaling-loader svg circle {
        stroke-dasharray: 314px;
        stroke-dashoffset: 0px;
        stroke-linecap: round;
        stroke-width: 6px;
        stroke: #4634ff;
        fill: transparent;
    }

    .coaling-loader .svg-count {
        width: 100px;
        height: 100px;
        position: relative;
        z-index: 1;
    }

    .coaling-loader .svg-count::before {
        content: '';
        position: absolute;
        outline: 5px solid #f3f3f9;
        z-index: -1;
        width: calc(100% - 16px);
        height: calc(100% - 16px);
        left: 8px;
        top: 8px;
        z-index: -1;
        border-radius: 100%
    }

    .coaling-time-count {
        color: #4634ff;
    }

    @keyframes countdown {
        from {
            stroke-dashoffset: 0px;
        }

        to {
            stroke-dashoffset: 314px;
        }
    }
</style>
@endpush