@extends('admin.layouts.app')
@section('panel')

<div class="dashboard-body">
    <div class="dashboard-body__card">

        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-body__heading__wrap">
                    <div class="dashboard-body__heading">
                        <h3 class="dashboard-body__title">Dashboard Overview</h3>
                        <p class="dashboard-body__desc">Quick snapshot of system health and performance</p>
                    </div>
                    <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>

        <div class="row gy-4  ">
            <div class="col-lg-3 col-sm-6">
                <div class="dashboard__card">
                    <div>
                        <p class="dashboard__card__title">Total Verified</p>
                        <p class="dashboard__card__desc">Realtors</p>
                        <h3 class="dashboard__card__point">1,284</h3>
                    </div>
                    <div class="dashboard__card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.801 10C22.2577 12.2413 21.9322 14.5714 20.8789 16.6018C19.8255 18.6322 18.1079 20.2401 16.0125 21.1573C13.9171 22.0746 11.5706 22.2458 9.36431 21.6424C7.15798 21.039 5.2252 19.6974 3.88828 17.8414C2.55137 15.9854 1.89113 13.7272 2.01767 11.4434C2.14421 9.15954 3.04989 6.9881 4.58366 5.29118C6.11743 3.59426 8.18659 2.47444 10.4461 2.11846C12.7056 1.76248 15.0188 2.19186 17 3.335"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 11L12 14L22 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="dashboard__card">
                    <div>
                        <p class="dashboard__card__title">Total Verified</p>
                        <p class="dashboard__card__desc">Realtors</p>
                        <h3 class="dashboard__card__point">1,284</h3>
                    </div>
                    <div class="dashboard__card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="dashboard__card">
                    <div>
                        <p class="dashboard__card__title">Total Verified</p>
                        <p class="dashboard__card__desc">Realtors</p>
                        <h3 class="dashboard__card__point">1,284</h3>
                    </div>
                    <div class="dashboard__card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 22V4C6 3.46957 6.21071 2.96086 6.58579 2.58579C6.96086 2.21071 7.46957 2 8 2H16C16.5304 2 17.0391 2.21071 17.4142 2.58579C17.7893 2.96086 18 3.46957 18 4V22H6Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M6 12H4C3.46957 12 2.96086 12.2107 2.58579 12.5858C2.21071 12.9609 2 13.4696 2 14V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H6"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 6H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 10H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 14H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 18H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="dashboard__card">
                    <div>
                        <p class="dashboard__card__title">Total Verified</p>
                        <p class="dashboard__card__desc">Realtors</p>
                        <h3 class="dashboard__card__point">1,284</h3>
                    </div>
                    <div class="dashboard__card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5 7.5L17.8 9.8C17.9869 9.98323 18.2382 10.0859 18.5 10.0859C18.7618 10.0859 19.0131 9.98323 19.2 9.8L21.3 7.7C21.4832 7.51307 21.5859 7.26175 21.5859 7C21.5859 6.73825 21.4832 6.48693 21.3 6.3L19 4"
                                stroke="#1D4ED8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21 2L11.4 11.6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7.5 21C10.5376 21 13 18.5376 13 15.5C13 12.4624 10.5376 10 7.5 10C4.46243 10 2 12.4624 2 15.5C2 18.5376 4.46243 21 7.5 21Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4 mb-4">
            <div class="col-lg-12">
                <div class="quick__actions">
                    <p class="quick__actions__title">Quick Actions</p>
                    <div class="quick__actions__wrap">
                        <a class="quick__actions__tag active" href="#">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_705_1544)">
                                    <path
                                        d="M14.534 6.66666C14.8385 8.16086 14.6215 9.71427 13.9192 11.0679C13.217 12.4214 12.0719 13.4934 10.675 14.1049C9.2781 14.7164 7.71376 14.8305 6.24287 14.4282C4.77199 14.026 3.48347 13.1316 2.59219 11.8943C1.70091 10.657 1.26075 9.15148 1.34511 7.62892C1.42948 6.10635 2.03326 4.65872 3.05577 3.52744C4.07829 2.39616 5.45773 1.64961 6.96405 1.4123C8.47037 1.17498 10.0125 1.46123 11.3333 2.22333"
                                        stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6 7.33332L8 9.33332L14.6667 2.66666" stroke="currentColor"
                                        stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_705_1544">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Approve New Realtor
                        </a>
                        <a class="quick__actions__tag" href="#">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_705_1549)">
                                    <path
                                        d="M4 14.6667V2.66668C4 2.31305 4.14048 1.97392 4.39052 1.72387C4.64057 1.47382 4.97971 1.33334 5.33333 1.33334H10.6667C11.0203 1.33334 11.3594 1.47382 11.6095 1.72387C11.8595 1.97392 12 2.31305 12 2.66668V14.6667H4Z"
                                        stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M3.99998 8H2.66665C2.31302 8 1.97389 8.14048 1.72384 8.39052C1.47379 8.64057 1.33331 8.97971 1.33331 9.33333V13.3333C1.33331 13.687 1.47379 14.0261 1.72384 14.2761C1.97389 14.5262 2.31302 14.6667 2.66665 14.6667H3.99998"
                                        stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 6H13.3333C13.687 6 14.0261 6.14048 14.2761 6.39052C14.5262 6.64057 14.6667 6.97971 14.6667 7.33333V13.3333C14.6667 13.687 14.5262 14.0261 14.2761 14.2761C14.0261 14.5262 13.687 14.6667 13.3333 14.6667H12"
                                        stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.66669 4H9.33335" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66669 6.66666H9.33335" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66669 9.33334H9.33335" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66669 12H9.33335" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_705_1549">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Review Property
                        </a>
                        <a class="quick__actions__tag" href="#">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_705_1559)">
                                    <path
                                        d="M7.99998 14.6667C11.6819 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6819 1.33334 7.99998 1.33334C4.31808 1.33334 1.33331 4.31811 1.33331 8.00001C1.33331 11.6819 4.31808 14.6667 7.99998 14.6667Z"
                                        stroke="currentColor" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M8 5.33334V8.00001" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 10.6667H8.00667" stroke="currentColor" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_705_1559">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Send Notification
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4 mb-4">

            <div class="col-lg-6 col-sm-6">
                <div class="dashboard__Chart">

                    <p class="dashboard__chart__title">Weekly Activity</p>

                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="dashboard__Chart">

                    <p class="dashboard__chart__title">Weekly Activity</p>

                </div>
            </div>

        </div>

        <div class="row gy-4 ">
            <div class="col-lg-6 col-sm-6">
                <div class="pending__reviews">
                    <p class="pending__reviews__title">Pending Reviews</p>
                    <div class="pending__reviews__items">
                        <div>
                            <p class="pending__reviews__items__title">Sarah Johnson</p>
                            <p class="pending__reviews__items__desc">Realtor Verification</p>
                        </div>
                        <div>
                            <p class="pending__reviews__date">5 mins ago</p>
                        </div>

                    </div>
                    <div class="pending__reviews__items">
                        <div>
                            <p class="pending__reviews__items__title">Sarah Johnson</p>
                            <p class="pending__reviews__items__desc">Realtor Verification</p>
                        </div>
                        <div>
                            <p class="pending__reviews__date">5 mins ago</p>
                        </div>

                    </div>
                    <div class="pending__reviews__items">
                        <div>
                            <p class="pending__reviews__items__title">Sarah Johnson</p>
                            <p class="pending__reviews__items__desc">Realtor Verification</p>
                        </div>
                        <div>
                            <p class="pending__reviews__date">5 mins ago</p>
                        </div>

                    </div>
                    <div class="pending__reviews__items">
                        <div>
                            <p class="pending__reviews__items__title">Sarah Johnson</p>
                            <p class="pending__reviews__items__desc">Realtor Verification</p>
                        </div>
                        <div>
                            <p class="pending__reviews__date">5 mins ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="pending__reviews h-100">
                    <p class="pending__reviews__title">Location Distribution</p>
                    <div class="listing-item">
                        <div class="item-header">
                            <span class="location-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M13.3334 6.66665C13.3334 9.99531 9.64069 13.462 8.40069 14.5326C8.28517 14.6195 8.14455 14.6665 8.00002 14.6665C7.85549 14.6665 7.71487 14.6195 7.59935 14.5326C6.35935 13.462 2.66669 9.99531 2.66669 6.66665C2.66669 5.25216 3.22859 3.8956 4.22878 2.89541C5.22898 1.89522 6.58553 1.33331 8.00002 1.33331C9.41451 1.33331 10.7711 1.89522 11.7713 2.89541C12.7715 3.8956 13.3334 5.25216 13.3334 6.66665Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 8.66669C9.10457 8.66669 10 7.77126 10 6.66669C10 5.56212 9.10457 4.66669 8 4.66669C6.89543 4.66669 6 5.56212 6 6.66669C6 7.77126 6.89543 8.66669 8 8.66669Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="location-name">Lekki</span>
                            <span class="listing-count">1245 listings</span>
                        </div>
                        <div class="bar-container">
                            <div class="bar" style="width: 75%;"></div>
                        </div>
                    </div>
                    <div class="listing-item">
                        <div class="item-header">
                            <span class="location-icon"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M13.3334 6.66665C13.3334 9.99531 9.64069 13.462 8.40069 14.5326C8.28517 14.6195 8.14455 14.6665 8.00002 14.6665C7.85549 14.6665 7.71487 14.6195 7.59935 14.5326C6.35935 13.462 2.66669 9.99531 2.66669 6.66665C2.66669 5.25216 3.22859 3.8956 4.22878 2.89541C5.22898 1.89522 6.58553 1.33331 8.00002 1.33331C9.41451 1.33331 10.7711 1.89522 11.7713 2.89541C12.7715 3.8956 13.3334 5.25216 13.3334 6.66665Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 8.66669C9.10457 8.66669 10 7.77126 10 6.66669C10 5.56212 9.10457 4.66669 8 4.66669C6.89543 4.66669 6 5.56212 6 6.66669C6 7.77126 6.89543 8.66669 8 8.66669Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            <span class="location-name">Victoria Island</span>
                            <span class="listing-count">987 listings</span>
                        </div>
                        <div class="bar-container">
                            <div class="bar" style="width: 60%;"></div>
                        </div>
                    </div>
                    <div class="listing-item">
                        <div class="item-header">
                            <span class="location-icon"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M13.3334 6.66665C13.3334 9.99531 9.64069 13.462 8.40069 14.5326C8.28517 14.6195 8.14455 14.6665 8.00002 14.6665C7.85549 14.6665 7.71487 14.6195 7.59935 14.5326C6.35935 13.462 2.66669 9.99531 2.66669 6.66665C2.66669 5.25216 3.22859 3.8956 4.22878 2.89541C5.22898 1.89522 6.58553 1.33331 8.00002 1.33331C9.41451 1.33331 10.7711 1.89522 11.7713 2.89541C12.7715 3.8956 13.3334 5.25216 13.3334 6.66665Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 8.66669C9.10457 8.66669 10 7.77126 10 6.66669C10 5.56212 9.10457 4.66669 8 4.66669C6.89543 4.66669 6 5.56212 6 6.66669C6 7.77126 6.89543 8.66669 8 8.66669Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            <span class="location-name">Ajah</span>
                            <span class="listing-count">654 listings</span>
                        </div>
                        <div class="bar-container">
                            <div class="bar" style="width: 40%;"></div>
                        </div>
                    </div>



                    <div class="listing-item">
                        <div class="item-header">
                            <span class="location-icon"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M13.3334 6.66665C13.3334 9.99531 9.64069 13.462 8.40069 14.5326C8.28517 14.6195 8.14455 14.6665 8.00002 14.6665C7.85549 14.6665 7.71487 14.6195 7.59935 14.5326C6.35935 13.462 2.66669 9.99531 2.66669 6.66665C2.66669 5.25216 3.22859 3.8956 4.22878 2.89541C5.22898 1.89522 6.58553 1.33331 8.00002 1.33331C9.41451 1.33331 10.7711 1.89522 11.7713 2.89541C12.7715 3.8956 13.3334 5.25216 13.3334 6.66665Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 8.66669C9.10457 8.66669 10 7.77126 10 6.66669C10 5.56212 9.10457 4.66669 8 4.66669C6.89543 4.66669 6 5.56212 6 6.66669C6 7.77126 6.89543 8.66669 8 8.66669Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg> </span>
                            <span class="location-name">Ikoyi</span>
                            <span class="listing-count">431 listings</span>
                        </div>
                        <div class="bar-container">
                            <div class="bar" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="listing-item">
                        <div class="item-header">
                            <span class="location-icon"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M13.3334 6.66665C13.3334 9.99531 9.64069 13.462 8.40069 14.5326C8.28517 14.6195 8.14455 14.6665 8.00002 14.6665C7.85549 14.6665 7.71487 14.6195 7.59935 14.5326C6.35935 13.462 2.66669 9.99531 2.66669 6.66665C2.66669 5.25216 3.22859 3.8956 4.22878 2.89541C5.22898 1.89522 6.58553 1.33331 8.00002 1.33331C9.41451 1.33331 10.7711 1.89522 11.7713 2.89541C12.7715 3.8956 13.3334 5.25216 13.3334 6.66665Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 8.66669C9.10457 8.66669 10 7.77126 10 6.66669C10 5.56212 9.10457 4.66669 8 4.66669C6.89543 4.66669 6 5.56212 6 6.66669C6 7.77126 6.89543 8.66669 8 8.66669Z"
                                        stroke="#1D4ED8" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            <span class="location-name">Others</span>
                            <span class="listing-count">230 listings</span>
                        </div>
                        <div class="bar-container">
                            <div class="bar" style="width: 14%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->
        <div class="row gy-4">
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

        </div>

        <!-- pricing card -->
        <div class="row gy-4 justify-content-center">
            <p class="pricing__title">cvailable Plans</p>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3  col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="pricing__card">
                    <div class=" pricing__card__content d-flex align-items-center justify-content-between">
                        <p class="pricing__card__title m-0">Free Trial</p>
                        <p clsass="pricing__card__tag">Free Trial</p>
                    </div>

                    <div class="pricing__card__price">
                        <h2 class="mb-0">₦15,000</h2>
                        <p class="pricing__date">/per <br>month</p>
                    </div>
                    <ul class="pricing__list__wrap">
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Up to 3 listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Basic analytics</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Email support</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Unlimited listings</li>
                        <li class="pricing__list"><i class="fa-solid fa-check"></i>Standard visibility</li>
                    </ul>
                    <div class="pricing__card__btn mt-4">
                        <a href="#" class="btn w-100 btn--primary pricing__btn">Edit Plan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Realtor Profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body__user">
                                    <span class="user__name">MO</span>
                                    <div class="modal__user__content">
                                        <p class="modal__user__title">Michael Okafor</p>
                                        <p class="modal__user__desc">michael.o@homes.ng</p>
                                        <span class="modal__user__tag">Pending</span>
                                    </div>

                                </div>

                                <div class="modal__company__info">

                                    <div class=" text-left">
                                        <p class="modal__company__title">Company</p>
                                        <p class="modal__company__desc ">Okafor Homes</p>
                                    </div>
                                    <div>
                                        <p class="modal__company__title">Company</p>
                                        <p class="modal__company__desc">Okafor Homes</p>
                                    </div>

                                </div>
                                <div class="modal__company__info">

                                    <div class="text-left">
                                        <p class="modal__company__title">Company</p>
                                        <p class="modal__company__desc ">Okafor Homes</p>
                                    </div>
                                    <div>
                                        <p class="modal__company__title">Company</p>
                                        <p class="modal__company__desc">Okafor Homes</p>
                                    </div>

                                </div>



                                <div class="Verification">
                                    <div class="verification__wrap mb-2">
                                        <input type="text" class="form--control Verification__form" name="username"
                                            value="" placeholder="Business License" required="" id="username">
                                        <a class="btn btn--base view__btn " href="#">view</a>
                                    </div>
                                    <div class="verification__wrap">
                                        <input type="text" class="form--control Verification__form" name="username"
                                            value="" placeholder="ID Verification" required="" id="username">
                                        <a class="btn btn--base view__btn " href="#">view</a>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn approve__btn"><svg width="16" height="16" viewBox="0 0 16 16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_726_2700)">
                                            <path
                                                d="M14.5341 6.66666C14.8385 8.16086 14.6215 9.71427 13.9193 11.0679C13.2171 12.4214 12.072 13.4934 10.6751 14.1049C9.27816 14.7164 7.71382 14.8305 6.24293 14.4282C4.77205 14.026 3.48353 13.1316 2.59225 11.8943C1.70097 10.657 1.26081 9.15148 1.34518 7.62892C1.42954 6.10635 2.03332 4.65872 3.05583 3.52744C4.07835 2.39616 5.45779 1.64961 6.96411 1.4123C8.47043 1.17498 10.0126 1.46123 11.3334 2.22333"
                                                stroke="white" stroke-width="1.33333" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6 7.33341L8 9.33341L14.6667 2.66675" stroke="white"
                                                stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_726_2700">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Approve</button>
                                <button class="btn Reject__btn">Reject</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-lg-3">
                <div class="role__card card">
                    <span class="role__card__icon">
                        <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1663 10.0004C14.1663 14.167 11.2497 16.2504 7.78301 17.4587C7.60148 17.5202 7.40429 17.5173 7.22467 17.4504C3.74967 16.2504 0.833008 14.167 0.833008 10.0004V4.16702C0.833008 3.94601 0.920805 3.73405 1.07709 3.57777C1.23337 3.42149 1.44533 3.33369 1.66634 3.33369C3.33301 3.33369 5.41634 2.33369 6.86634 1.06702C7.04289 0.916187 7.26747 0.833313 7.49967 0.833313C7.73188 0.833313 7.95646 0.916187 8.13301 1.06702C9.59134 2.34202 11.6663 3.33369 13.333 3.33369C13.554 3.33369 13.766 3.42149 13.9223 3.57777C14.0785 3.73405 14.1663 3.94601 14.1663 4.16702V10.0004Z"
                                stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h3 class="role__card__title">Super Admin</h3>
                    </span>
                    <p class="role__card__desc">Full system access including user management, property approvals,
                        analytics, and settings.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="role__card card">
                    <span class="role__card__icon">
                        <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1663 10.0004C14.1663 14.167 11.2497 16.2504 7.78301 17.4587C7.60148 17.5202 7.40429 17.5173 7.22467 17.4504C3.74967 16.2504 0.833008 14.167 0.833008 10.0004V4.16702C0.833008 3.94601 0.920805 3.73405 1.07709 3.57777C1.23337 3.42149 1.44533 3.33369 1.66634 3.33369C3.33301 3.33369 5.41634 2.33369 6.86634 1.06702C7.04289 0.916187 7.26747 0.833313 7.49967 0.833313C7.73188 0.833313 7.95646 0.916187 8.13301 1.06702C9.59134 2.34202 11.6663 3.33369 13.333 3.33369C13.554 3.33369 13.766 3.42149 13.9223 3.57777C14.0785 3.73405 14.1663 3.94601 14.1663 4.16702V10.0004Z"
                                stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h3 class="role__card__title">Moderator</h3>
                    </span>
                    <p class="role__card__desc">Can approve/reject realtors and properties, manage notifications, view
                        analytics.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="role__card card">
                    <span class="role__card__icon">
                        <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1663 10.0004C14.1663 14.167 11.2497 16.2504 7.78301 17.4587C7.60148 17.5202 7.40429 17.5173 7.22467 17.4504C3.74967 16.2504 0.833008 14.167 0.833008 10.0004V4.16702C0.833008 3.94601 0.920805 3.73405 1.07709 3.57777C1.23337 3.42149 1.44533 3.33369 1.66634 3.33369C3.33301 3.33369 5.41634 2.33369 6.86634 1.06702C7.04289 0.916187 7.26747 0.833313 7.49967 0.833313C7.73188 0.833313 7.95646 0.916187 8.13301 1.06702C9.59134 2.34202 11.6663 3.33369 13.333 3.33369C13.554 3.33369 13.766 3.42149 13.9223 3.57777C14.0785 3.73405 14.1663 3.94601 14.1663 4.16702V10.0004Z"
                                stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h3 class="role__card__title">Support Agent</h3>
                    </span>
                    <p class="role__card__desc">Can manage support tickets, view user details, and send notifications.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <ul class="custom__nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                            aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                        tabindex="0">...</div>
                </div>
            </div>

        </div>
    </div>

    @endsection