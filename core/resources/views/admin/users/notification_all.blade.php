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
                <div class="col-lg-7">
                    <div class="card-body">
                        <h5 class="card-title mb-4">@lang('Create Notification')</h5>
                        <form class="notify-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">@lang('Title')</label>
                                <input type="text" class="form-control" name="subject" placeholder="@lang('Enter notification title...')" value="{{ old('subject', @$sessionData['subject']) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">@lang('Message')</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="@lang('Enter your message...')">{{ old('message', @$sessionData['message']) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Target Audience')</label>
                                        <select class="form-control form--control select2 select2-100" name="being_sent_to" required>
                                            @foreach ($notifyToUser as $key => $toUser)
                                                <option value="{{ $key }}" @selected(old('being_sent_to', @$sessionData['being_sent_to']) == $key)>
                                                    {{ __($toUser) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-append mt-2"></div>
                                        <small class="text--info d-none userCountText mt-2 d-block">
                                            <i class="las la-info-circle"></i> <strong class="userCount">0</strong> @lang('active users found')
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Delivery Type')</label>
                                        <select class="form-control form--control select2 select2-100" name="via" required>
                                            <option value="email" @selected($viaName == 'email')>@lang('Email')</option>
                                            <option value="sms" @selected($viaName == 'sms')>@lang('SMS')</option>
                                            <option value="push" @selected($viaName == 'push')>@lang('In-app Banner (Push)')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group push-notification-file d-none">
                                <label class="form-label">@lang('Image') <small class="text-muted">(@lang('Optional'))</small></label>
                                <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg">
                            </div>

                            <!-- Advanced Settings (Collapsible or just inline) -->
                            <div class="row border-top pt-3 mt-3">
                                <p class="text-muted mb-3"><small>@lang('Sending Configuration')</small></p>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">@lang('Start From ID')</label>
                                        <input class="form-control form-control-sm" name="start" value="{{ old('start', @$sessionData['start'] ?? 1) }}" type="number" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">@lang('Per Batch')</label>
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-sm" name="batch" value="{{ old('batch', @$sessionData['batch'] ?? 500) }}" type="number" required>
                                            <span class="input-group-text">@lang('USER')</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">@lang('Cooling Period')</label>
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-sm" name="cooling_time" value="{{ old('cooling_time', @$sessionData['cooling_time'] ?? 5) }}" type="number" required>
                                            <span class="input-group-text">@lang('SEC')</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4">
                                <button type="submit" class="btn btn--primary flex-grow-1"><i class="las la-paper-plane"></i> @lang('Send Now')</button>
                                <button type="button" class="btn btn-light flex-grow-1" disabled title="Coming Soon"><i class="las la-calendar"></i> @lang('Schedule')</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Preview -->
                <div class="col-lg-5">
                    <div class="dashboard-body__card h-100 bg-light">
                        <h5 class="card-title mb-4">@lang('Preview')</h5>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h6 class="mb-2 preview-title">@lang('Notification Title')</h6>
                                <p class="text-muted small mb-4 preview-message">@lang('Your notification message will appear here...')</p>

                                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                    <div>
                                        <small class="text-muted d-block">@lang('Audience'):</small>
                                        <span class="fw-bold small preview-audience">@lang('All Users')</span>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">@lang('Delivery'):</small>
                                        <span class="badge badge--primary preview-delivery">@lang('Email')</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                                <x-admin.other.user_info :user="$log->user" />
                                            </td>
                                            <td>
                                                {{ showDateTime($log->created_at) }}
                                                <br>
                                                {{ diffForHumans($log->created_at) }}
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
                                                    <button class="btn  btn-outline--primary notifyDetail" data-type="{{ $log->notification_type }}" data-message="{{ route('admin.report.email.details', $log->id) }}" data-sent_to="{{ $log->sent_to }}">
                                                        <i class="las la-info-circle"></i>
                                                        @lang('Detail')
                                                    </button>
                                                @else
                                                    <button class="btn  btn-outline--primary notifyDetail" data-type="{{ $log->notification_type }}" data-message="{{ $log->message }}" data-image="{{ asset(getFilePath('push') . '/' . $log->image) }}" data-sent_to="{{ $log->sent_to }}">
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
                <div class="dashboard-body__heading">
                    <h3 class="dashboard-body__title">@lang('Notification Control')</h3>
                    <p class="dashboard-body__desc">@lang('Send targeted or global announcements')</p>
                </div>
                <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
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

    (function ($) {
        "use strict"

        // Update Preview
        $('input[name=subject]').on('input', function () {
            let val = $(this).val();
            $('.preview-title').text(val ? val : "@lang('Notification Title')");
        });

        $('textarea[name=message]').on('input', function () {
            let val = $(this).val();
            $('.preview-message').text(val ? val : "@lang('Your notification message will appear here...')");
        });

        // Summernote change handler for preview if used (Currently using textarea for cleaner design matching image, but logic can adapt)
        // If summernote is needed for Email mode, we toggle it.

        $('select[name=via]').on('change', function () {
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

        $('select[name=being_sent_to]').on('change', function () {
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
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page,
                        };
                    },
                    processResults: function (response, params) {
                        params.page = params.page || 1;
                        let data = response.users.data;
                        return {
                            results: $.map(data, function (item) {
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
            $.get(route, function (response) {
                $('.userCount').text(response);
                $('.userCountText').removeClass('d-none');
            });
        }

        $(".notify-form").on("submit", function (e) {
            formSubmit = true;
        });

        // Loop animation logic (Keep as is, just ensure selectors match if needed)
        @empty(!$sessionData)
        $(document).ready(function () {
            const coalingTimeOut = setTimeout(() => {
                let coalingTime = Number("{{ $sessionData['cooling_time'] }}");

                $("#animate-circle").css({
                    "animation": `countdown ${coalingTime}s linear infinite forwards`
                });

                let $coalingCountElement = $('.coaling-time-count');
                let $coalingLoaderElement = $(".coaling-loader");

                $coalingCountElement.text(coalingTime);

                const coalingIntVal = setInterval(function () {
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

    @if (!empty(@$sessionData) && @request()->email_sent && @request()->email_sent = 'yes')
        window.addEventListener('beforeunload', function (event) {
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