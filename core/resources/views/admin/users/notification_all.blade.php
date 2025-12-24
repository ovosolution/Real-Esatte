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
                <div class="col-lg-6">
                    <div class="card-body card">
                        <h5 class="card-title mb-4">@lang('Create Notification')</h5>
                        <form class="notify-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">@lang('Title')</label>
                                <input type="text" class="form-control" name="subject" placeholder="@lang('Enter notification title...')"
                                    value="{{ old('subject', @$sessionData['subject']) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">@lang('Message')</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="@lang('Enter your message...')">{{ old('message', @$sessionData['message']) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Target Audience')</label>
                                        <select class="form-control form--control select2 select2-100" name="being_sent_to"
                                            required>
                                            @foreach ($notifyToUser as $key => $toUser)
                                                <option value="{{ $key }}" @selected(old('being_sent_to', @$sessionData['being_sent_to']) == $key)>
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
                                        <select class="form-control form--control select2 select2-100" name="via"
                                            required>
                                            <option value="email" @selected($viaName == 'email')>@lang('Email')</option>
                                            <option value="sms" @selected($viaName == 'sms')>@lang('SMS')</option>
                                            <option value="push" @selected($viaName == 'push')>@lang('In-app Banner (Push)')
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
                                        <input class="form-control form-control-sm" name="start" value="{{ old('start', @$sessionData['start']) }}" type="number" placeholder="@lang('Start form user id. e.g. 1')" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">@lang('Per Batch')</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-sm" name="batch" value="{{ old('batch', @$sessionData['batch']) }}" type="number" placeholder="@lang('How many user')" required>
                                            <span class="input-group-text">@lang('USER')</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">@lang('Cooling Period')</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-sm" name="cooling_time" value="{{ old('cooling_time', @$sessionData['cooling_time']) }}" type="number" placeholder="@lang('Waiting time')" required>
                                            <span class="input-group-text">@lang('SEC')</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4">
                                <button type="submit" class="btn btn--primary flex-grow-1"><i class="las la-paper-plane"></i> @lang('Send Now')</button>
                                <button type="button" class="btn btn-outline--primary flex-grow-1 btn-schedule"><i class="las la-calendar"></i> @lang('Schedule')</button>
                            </div>
                            <div class="form-group mt-3 d-none schedule-input">
                                <label class="form-label">@lang('Schedule For')</label>
                                <input type="datetime-local" class="form-control" name="scheduled_at">
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
                                        <span class="fw-bold small preview-delivery">@lang('Email')</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom: Notification History (Static/Mockup for now as per plan) -->
            <div class="row mt-4">
                <div class="col-lg-12 mb-3">
                    <div class="card table__card__wrap">
                        <div class="table__heading d-flex align-items-center justify-content-between">
                            <p class="table__heading__title mb-0">@lang('Notification History')</p>

                        </div>
                        <table class="table border-0 p-0 mt-4 table--responsive--md">
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
                                            {{ showDateTime($log->created_at) }}
                                        </td>
                                        <td>
                                            {{ $log->recipients }}
                                        </td>

                                        <td>
                                            <div class="action-buttons">

                                                <span class="badge badge--success"><svg class="me-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_728_2932)">
                                                            <path
                                                                d="M10.9003 4.99999C11.1287 6.12064 10.9659 7.28571 10.4392 8.30089C9.91255 9.31608 9.05375 10.12 8.00606 10.5787C6.95837 11.0373 5.78512 11.1229 4.68196 10.8212C3.57879 10.5195 2.6124 9.84869 1.94394 8.92071C1.27549 7.99272 0.945367 6.86361 1.00864 5.72169C1.07191 4.57976 1.52475 3.49404 2.29163 2.64558C3.05852 1.79712 4.0931 1.23721 5.22284 1.05922C6.35258 0.881233 7.5092 1.09592 8.49981 1.66749"
                                                                stroke="#016630" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M4.5 5.5L6 7L11 2" stroke="#016630"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_728_2932">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    @lang('Sent')
                                                </span>
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
                @if ($logs->hasPages())
                    <x-admin.ui.table.footer>
                        {{ paginateLinks($logs) }}
                    </x-admin.ui.table.footer>
                @endif
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

        $('.btn-schedule').on('click', function () {
            $('.schedule-input').toggleClass('d-none');
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $(this).html('<i class="las la-times"></i> @lang("Cancel Schedule")');
            } else {
                $(this).html('<i class="las la-calendar"></i> @lang("Schedule")');
                $('input[name=scheduled_at]').val('');
            }
        });
    })(jQuery);

        @if (!empty(@$sessionData) && @request()->email_sent && @request()->email_sent = 'yes')
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
