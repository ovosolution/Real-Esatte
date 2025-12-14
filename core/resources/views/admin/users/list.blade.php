@extends('admin.layouts.app')
@section('panel')

<div class="dashboard-body">
    <div class="dashboard-body__card">
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

        <div class="row gy-4">

            <!-- <div class="col-lg-12">
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
            </div> -->

            <ul class="custom__nav nav user-management  nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Realtors</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Developers</button>
                </li>
            </ul>
            <div class="search-box__wrap">
                <div class="search-box w-100">
                    <input type="text" class="form--control w-100 h-36" name="username" value=""
                        placeholder="admin@keys.com" required="" id="username">
                </div>
                <div class="search-menu">
                    <a class="search-menu__link" href="#">All</a>
                    <a class="search-menu__link" href="#">Verified</a>
                    <a class="search-menu__link" href="#">Pending</a>
                </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
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
                                    <tr>
                                        <td>Sarah Johnson</td>
                                        <td>sarah.j@realty.com</td>
                                        <td>Prime Properties</td>
                                        <td><span class="badge badge--success"> Verified</span></td>
                                        <td>Pro</td>
                                        <td>2024-10-15</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1965">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>

                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1993)">
                                                            <path
                                                                d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>

                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1965">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>

                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1993)">
                                                            <path
                                                                d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
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
                                    <tr>
                                        <td>Sarah Johnson</td>
                                        <td>sarah.j@realty.com</td>
                                        <td>Prime Properties</td>
                                        <td><span class="badge badge--success"> Verified</span></td>
                                        <td>Pro</td>
                                        <td>2024-10-15</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button type="button" class="action-btn edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit"><svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1961)">
                                                            <path
                                                                d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                stroke="#0A0A0A" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1961">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1965)">
                                                            <path d="M3.28589 3.28598L12.7132 12.714" stroke="#E7000B"
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8.00001C14.6666 4.31811 11.6818 1.33334 7.99992 1.33334C4.31802 1.33334 1.33325 4.31811 1.33325 8.00001C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_726_1965">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>

                                                <button type="button" class="action-btn delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Delete"><svg width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_726_1993)">
                                                            <path
                                                                d="M7.99992 14.6666C11.6818 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6818 1.33331 7.99992 1.33331C4.31802 1.33331 1.33325 4.31808 1.33325 7.99998C1.33325 11.6819 4.31802 14.6666 7.99992 14.6666Z"
                                                                stroke="#E7000B" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



{{-- @include('admin.users.widget') --}}
{{-- <x-admin.ui.card class="table-has-filter">
        <x-admin.ui.card.body :paddingZero="true">
            <x-admin.ui.table.layout searchPlaceholder="Search users" filterBoxLocation="users.filter">
                <x-admin.ui.table>
                    <x-admin.ui.table.header>
                        <tr>
                            <th>@lang('User')</th>
                            <th>@lang('Email-Mobile')</th>
                            <th>@lang('Country')</th>
                            <th>@lang('Joined At')</th>
                            <th>@lang('Balance')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </x-admin.ui.table.header>
                    <x-admin.ui.table.body>
                        @forelse($users as $user)
                        <tr>
                            <td>
                                <x-admin.other.user_info :user="$user" />
                            </td>
                            <td>
                                <div>
                                    <strong class="d-block">
                                        {{ $user->email }}
</strong>
<small>{{ $user->mobileNumber }}</small>
</div>
</td>
<td>
    <div>
        <span class="fw-bold" title="{{ @$user->country_name }}">
            {{ $user->country_code }}
        </span>
    </div>
</td>
<td>
    <div>
        <strong class="d-block ">{{ showDateTime($user->created_at) }}</strong>
        <small class="d-block"> {{ diffForHumans($user->created_at) }}</small>
    </div>
</td>
<td>{{ showAmount($user->balance) }}</td>
<td>
    <div class="d-flex flex-wrap gap-2 justify-content-end">
        <a href="{{ route('admin.users.detail', $user->id) }}" class=" btn btn-outline--primary">
            <i class="las la-info-circle"></i>
            @lang('Details')
        </a>
        @if (request()->routeIs('admin.users.kyc.pending'))
        <a href="{{ route('admin.users.kyc.details', $user->id) }}" target="_blank"
            class="btn btn-sm btn-outline--dark">
            <i class="las la-user-check"></i> @lang('KYC Data')
        </a>
        @endif

    </div>
</td>
</tr>
@empty
<x-admin.ui.table.empty_message />
@endforelse
</x-admin.ui.table.body>
</x-admin.ui.table>
@if ($users->hasPages())
<x-admin.ui.table.footer>
    {{ paginateLinks($users) }}
</x-admin.ui.table.footer>
@endif
</x-admin.ui.table.layout>
</x-admin.ui.card.body>
</x-admin.ui.card> --}}
@endsection