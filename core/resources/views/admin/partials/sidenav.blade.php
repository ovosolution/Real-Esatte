<aside class="dashboard__sidebar  sidebar-menu">
    <div class="dashboard__sidebar-area">
        <div class="dashboard__sidebar-header">
            <div class="dashboard__sidebar__logo__wrap">
                <a href="{{ route('admin.dashboard') }}" class="dashboard__sidebar-logo">
                    <img class="img-fluid light-show" src="{{ siteLogo() }}">
                    <img class="img-fluid dark-show" src="{{ siteLogo('dark') }}">
                </a>
                <div class="logo__content">
                    <h3 class="logo__content__title">Keys Admin</h3>
                    <p class="logo__content__desc">@lang('Admin Dashboard')</p>
                </div>
            </div>

            <span class="sidebar-menu__close header-dropdown__icon">
                <i class="fa-solid fa-xmark"></i>

            </span>
        </div>

        <div class="dashboard__sidebar-inner">
            <ul class="dashboard-nav mt-3 ps-0">
                <li class="@if (request()->routeIs('admin.dashboard')) active @endif">
                    <a href="{{ route('admin.dashboard') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 2.5H3.33333C2.8731 2.5 2.5 2.8731 2.5 3.33333V9.16667C2.5 9.6269 2.8731 10 3.33333 10H7.5C7.96024 10 8.33333 9.6269 8.33333 9.16667V3.33333C8.33333 2.8731 7.96024 2.5 7.5 2.5Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.6667 2.5H12.5C12.0398 2.5 11.6667 2.8731 11.6667 3.33333V5.83333C11.6667 6.29357 12.0398 6.66667 12.5 6.66667H16.6667C17.1269 6.66667 17.5 6.29357 17.5 5.83333V3.33333C17.5 2.8731 17.1269 2.5 16.6667 2.5Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.6667 10H12.5C12.0398 10 11.6667 10.3731 11.6667 10.8333V16.6667C11.6667 17.1269 12.0398 17.5 12.5 17.5H16.6667C17.1269 17.5 17.5 17.1269 17.5 16.6667V10.8333C17.5 10.3731 17.1269 10 16.6667 10Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.5 13.3333H3.33333C2.8731 13.3333 2.5 13.7064 2.5 14.1667V16.6667C2.5 17.1269 2.8731 17.5 3.33333 17.5H7.5C7.96024 17.5 8.33333 17.1269 8.33333 16.6667V14.1667C8.33333 13.7064 7.96024 13.3333 7.5 13.3333Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>@lang('Dashboard')
                    </a>
                </li>
                <li class="@if (request()->routeIs('admin.users.all')) active @endif">
                    <a href="{{ route('admin.users.all') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.3333 17.5V15.8333C13.3333 14.9493 12.9821 14.1014 12.357 13.4763C11.7319 12.8512 10.8841 12.5 10 12.5H5C4.11595 12.5 3.2681 12.8512 2.64298 13.4763C2.01786 14.1014 1.66667 14.9493 1.66667 15.8333V17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.3333 2.60667C14.0481 2.79198 14.6812 3.20939 15.1331 3.79339C15.585 4.37739 15.8302 5.09492 15.8302 5.83334C15.8302 6.57177 15.585 7.28929 15.1331 7.87329C14.6812 8.45729 14.0481 8.8747 13.3333 9.06001" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.3333 17.5V15.8333C18.3328 15.0948 18.087 14.3773 17.6345 13.7936C17.182 13.2099 16.5484 12.793 15.8333 12.6083" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.5 9.16667C9.34095 9.16667 10.8333 7.67428 10.8333 5.83333C10.8333 3.99238 9.34095 2.5 7.5 2.5C5.65905 2.5 4.16667 3.99238 4.16667 5.83333C4.16667 7.67428 5.65905 9.16667 7.5 9.16667Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Users')
                    </a>
                </li>
                <li class="@if (request()->routeIs('admin.property.index')) active @endif">
                    <a href="{{ route('admin.property.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_705_1440)">
                                <path d="M5 18.3333V3.33334C5 2.89131 5.17559 2.46739 5.48816 2.15483C5.80072 1.84227 6.22464 1.66667 6.66667 1.66667H13.3333C13.7754 1.66667 14.1993 1.84227 14.5118 2.15483C14.8244 2.46739 15 2.89131 15 3.33334V18.3333H5Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 10H3.33333C2.89131 10 2.46738 10.1756 2.15482 10.4882C1.84226 10.8007 1.66667 11.2246 1.66667 11.6667V16.6667C1.66667 17.1087 1.84226 17.5326 2.15482 17.8452C2.46738 18.1577 2.89131 18.3333 3.33333 18.3333H5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15 7.5H16.6667C17.1087 7.5 17.5326 7.6756 17.8452 7.98816C18.1577 8.30072 18.3333 8.72464 18.3333 9.16667V16.6667C18.3333 17.1087 18.1577 17.5326 17.8452 17.8452C17.5326 18.1577 17.1087 18.3333 16.6667 18.3333H15" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.33333 5H11.6667" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.33333 8.33333H11.6667" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.33333 11.6667H11.6667" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.33333 15H11.6667" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_705_1440">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        @lang('Properties')
                    </a>
                </li>

                </li>
                <li>
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 2.5V15.8333C2.5 16.2754 2.67559 16.6993 2.98816 17.0118C3.30072 17.3244 3.72464 17.5 4.16667 17.5H17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 14.1667V7.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.8333 14.1667V4.16666" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.66667 14.1667V11.6667" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Analytics')
                    </a>
                </li>
                <li class="@if (request()->routeIs('admin.plan.index')) active @endif">
                    <a href="{{ route('admin.plan.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6667 4.16666H3.33333C2.41286 4.16666 1.66667 4.91285 1.66667 5.83332V14.1667C1.66667 15.0871 2.41286 15.8333 3.33333 15.8333H16.6667C17.5871 15.8333 18.3333 15.0871 18.3333 14.1667V5.83332C18.3333 4.91285 17.5871 4.16666 16.6667 4.16666Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.66667 8.33334H18.3333" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Subscriptions')
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.55666 17.5C8.70295 17.7533 8.91334 17.9637 9.1667 18.11C9.42006 18.2563 9.70745 18.3333 10 18.3333C10.2925 18.3333 10.5799 18.2563 10.8333 18.11C11.0867 17.9637 11.297 17.7533 11.4433 17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.71833 12.7717C2.60947 12.891 2.53763 13.0394 2.51155 13.1988C2.48547 13.3582 2.50627 13.5217 2.57142 13.6695C2.63658 13.8173 2.74328 13.943 2.87855 14.0312C3.01381 14.1195 3.17182 14.1665 3.33333 14.1667H16.6667C16.8282 14.1667 16.9862 14.1198 17.1216 14.0317C17.2569 13.9436 17.3637 13.8181 17.4291 13.6704C17.4944 13.5227 17.5154 13.3592 17.4895 13.1998C17.4637 13.0404 17.392 12.8919 17.2833 12.7725C16.175 11.63 15 10.4158 15 6.66666C15 5.34057 14.4732 4.0688 13.5355 3.13112C12.5979 2.19344 11.3261 1.66666 10 1.66666C8.67392 1.66666 7.40215 2.19344 6.46447 3.13112C5.52679 4.0688 5 5.34057 5 6.66666C5 10.4158 3.82417 11.63 2.71833 12.7717Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Notifications')
                    </a>
                </li>
                <li class="@if (request()->routeIs('admin.ticket.index')) active @endif">
                    <a href="{{ route('admin.ticket.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 11.6667H5C5.44203 11.6667 5.86595 11.8423 6.17851 12.1548C6.49107 12.4674 6.66667 12.8913 6.66667 13.3333V15.8333C6.66667 16.2754 6.49107 16.6993 6.17851 17.0118C5.86595 17.3244 5.44203 17.5 5 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V10C2.5 8.01088 3.29018 6.10322 4.6967 4.6967C6.10322 3.29018 8.01088 2.5 10 2.5C11.9891 2.5 13.8968 3.29018 15.3033 4.6967C16.7098 6.10322 17.5 8.01088 17.5 10V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H15C14.558 17.5 14.134 17.3244 13.8215 17.0118C13.5089 16.6993 13.3333 16.2754 13.3333 15.8333V13.3333C13.3333 12.8913 13.5089 12.4674 13.8215 12.1548C14.134 11.8423 14.558 11.6667 15 11.6667H17.5" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Support')
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.05916 3.44666C8.10508 2.96361 8.32944 2.51503 8.68842 2.18856C9.04739 1.86209 9.51519 1.68118 10.0004 1.68118C10.4856 1.68118 10.9534 1.86209 11.3124 2.18856C11.6714 2.51503 11.8957 2.96361 11.9417 3.44666C11.9693 3.75871 12.0716 4.05951 12.2401 4.32361C12.4086 4.58771 12.6382 4.80733 12.9096 4.96389C13.1809 5.12045 13.486 5.20933 13.7989 5.22301C14.1119 5.23669 14.4235 5.17477 14.7075 5.04249C15.1484 4.84231 15.6481 4.81334 16.1092 4.96123C16.5703 5.10912 16.9599 5.42329 17.2021 5.84258C17.4443 6.26188 17.5219 6.7563 17.4197 7.22964C17.3175 7.70297 17.0428 8.12134 16.6492 8.40333C16.3928 8.5832 16.1836 8.82217 16.0391 9.10001C15.8946 9.37786 15.8192 9.68642 15.8192 9.99958C15.8192 10.3127 15.8946 10.6213 16.0391 10.8991C16.1836 11.177 16.3928 11.416 16.6492 11.5958C17.0428 11.8778 17.3175 12.2962 17.4197 12.7695C17.5219 13.2429 17.4443 13.7373 17.2021 14.1566C16.9599 14.5759 16.5703 14.89 16.1092 15.0379C15.6481 15.1858 15.1484 15.1568 14.7075 14.9567C14.4235 14.8244 14.1119 14.7625 13.7989 14.7761C13.486 14.7898 13.1809 14.8787 12.9096 15.0353C12.6382 15.1918 12.4086 15.4114 12.2401 15.6755C12.0716 15.9396 11.9693 16.2404 11.9417 16.5525C11.8957 17.0355 11.6714 17.4841 11.3124 17.8106C10.9534 18.1371 10.4856 18.318 10.0004 18.318C9.51519 18.318 9.04739 18.1371 8.68842 17.8106C8.32944 17.4841 8.10508 17.0355 8.05916 16.5525C8.03162 16.2403 7.92925 15.9394 7.76072 15.6752C7.59219 15.411 7.36248 15.1913 7.09103 15.0348C6.81958 14.8782 6.51439 14.7893 6.20131 14.7757C5.88824 14.7621 5.5765 14.8242 5.2925 14.9567C4.85157 15.1568 4.35194 15.1858 3.89083 15.0379C3.42973 14.89 3.04014 14.5759 2.7979 14.1566C2.55566 13.7373 2.47809 13.2429 2.5803 12.7695C2.6825 12.2962 2.95717 11.8778 3.35083 11.5958C3.60718 11.416 3.81644 11.177 3.96091 10.8991C4.10537 10.6213 4.18079 10.3127 4.18079 9.99958C4.18079 9.68642 4.10537 9.37786 3.96091 9.10001C3.81644 8.82217 3.60718 8.5832 3.35083 8.40333C2.95772 8.1212 2.68354 7.70299 2.58158 7.22998C2.47963 6.75697 2.55717 6.26294 2.79915 5.84392C3.04113 5.4249 3.43026 5.11081 3.89091 4.96269C4.35155 4.81458 4.85082 4.84302 5.29166 5.04249C5.57563 5.17477 5.88728 5.23669 6.20025 5.22301C6.51321 5.20933 6.81827 5.12045 7.08961 4.96389C7.36095 4.80733 7.59058 4.58771 7.75905 4.32361C7.92753 4.05951 8.0299 3.75871 8.0575 3.44666" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        @lang('Settings')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>