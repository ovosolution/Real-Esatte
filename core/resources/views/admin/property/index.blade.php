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
                            <a class="search-menu__link @if (request()->routeIs('admin.property.index')) active @endif" href="{{ route('admin.property.index') }}">@lang('All')</a>
                            <a class="search-menu__link @if (request()->routeIs('admin.property.active')) active @endif" href="{{ route('admin.property.active') }}">@lang('Active')</a>
                            <a class="search-menu__link @if(request()->routeIs('admin.property.inactive')) active @endif" href="{{ route('admin.property.inactive') }}">@lang('Inactive')</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card table__card__wrap">
                        <div class="table__heading d-flex align-items-center justify-content-between">
                            <p class="table__heading__title mb-0">@lang('Properties') ({{ $propertiesCount }})</p>

                        </div>
                        <table class="table border-0 p-0 mt-4 table--responsive--md">
                            {{--
                            <div class="col-lg-12">
                                <table class="table mt-4 table--responsive--lg"> --}}
                                    <thead>
                                        <tr>
                                            <th>@lang('Title')</th>
                                            <th>@lang('Location')</th>
                                            <th>@lang('Coordinates')</th>
                                            <th>@lang('Price')</th>
                                            <th>@lang('Type')</th>
                                            <th>@lang('Status')</th>
                                            <th>@lang('Actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($properties as $property)
                                            <tr>
                                                <td>{{ __($property->title) }}</td>
                                                <td>{{ __($property->location->name) }}</td>
                                                <td>{{ $property->latitude . ', ' . $property->longitude }}</td>
                                                <td>{{ showAmount($property->price) }}</td>
                                                <td>{{ __($property?->propertyType?->name) }}</td>
                                                <td>
                                                    @php
                                                        echo $property->statusBadge;
                                                    @endphp
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <button type="button" class="action-btn view-btn" data-resource="{{ $property }}">
                                                            @lang('View')
                                                        </button>
                                                        <button type="button" class="action-btn edit-btn" data-resource="{{ $property }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                                <g>
                                                                    <defs>
                                                                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                                                            <path d="M0 512h512V0H0Z" fill="#000000" opacity="1" data-original="#000000"></path>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                                                        <path d="M0 0h-220c-22.092 0-40-17.908-40-40v-320c0-22.092 17.908-40 40-40h320c22.092 0 40 17.908 40 40v220" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(275 415)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                                        <path d="m0 0-226.274-226.273-70.711-14.143 14.142 70.711L-56.569 56.569c7.81 7.81 20.474 7.81 28.284 0L0 28.284C7.81 20.474 7.81 7.811 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(491.143 434.573)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                                        <path d="m0 0 56.568-56.568" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(406.29 462.857)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="action-btn delete-btn confirmationBtn" data-question=" @lang('Are you sure to remove this property?')" data-action="{{ route('admin.property.delete', $property->id) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                                <g>
                                                                    <path d="M424 64h-88V48c0-26.467-21.533-48-48-48h-64c-26.467 0-48 21.533-48 48v16H88c-22.056 0-40 17.944-40 40v56c0 8.836 7.164 16 16 16h8.744l13.823 290.283C87.788 491.919 108.848 512 134.512 512h242.976c25.665 0 46.725-20.081 47.945-45.717L439.256 176H448c8.836 0 16-7.164 16-16v-56c0-22.056-17.944-40-40-40zM208 48c0-8.822 7.178-16 16-16h64c8.822 0 16 7.178 16 16v16h-96zM80 104c0-4.411 3.589-8 8-8h336c4.411 0 8 3.589 8 8v40H80zm313.469 360.761A15.98 15.98 0 0 1 377.488 480H134.512a15.98 15.98 0 0 1-15.981-15.239L104.78 176h302.44z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                                    <path d="M256 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM336 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16zM176 448c8.836 0 16-7.164 16-16V224c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                @if ($properties->hasPages())
                    <div class="mt-3">
                        {{ paginateLinks($properties) }}
                    </div>
                @endif
            </div>

            <x-confirmation-modal />
@endsection


        @push('breadcrumb-plugins')
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-auto">
                    <div class="dashboard-body__heading__wrap">
                        <span class="breadcrumb-icon navigation-bar"><i class="fa-solid fa-bars"></i></span>
                        <div class="dashboard-body__heading">
                            <h3 class="dashboard-body__title">@lang('Property Management')</h3>
                            <p class="dashboard-body__desc">@lang('Add and manage property listings with accurate coordinates')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-auto">
                    <button type="button" class="btn btn--primary add-btn">
                        <i class="las la-plus"></i> @lang('Add New Property')
                    </button>
                </div>
            </div>
        @endpush


        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">@lang('Add Property')</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('admin.property.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body mb-3">

                            <div class="row g-3">

                                <div class="col-12">
                                    <label class="form--label required">@lang('Property Title')</label>
                                    <input type="text" class="form--control form-control" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Property Type')</label>
                                    <select name="property_type_id" class="form-select select2">
                                        <option value="" selected disabled>@lang('Select Property Type')</option>
                                        @foreach ($propertyTypes as $propertyType)
                                            <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Price') ({{ gs('cur_sym') }})</label>
                                    <input type="number" class="form--control form-control" name="price" value="{{ old('price') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Bedrooms')</label>
                                    <input type="number" class="form--control form-control" name="bedrooms" value="{{ old('bedrooms') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Bathrooms')</label>
                                    <input type="number" class="form--control form-control" name="bathrooms" value="{{ old('bathrooms') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Developer / Agency')</label>
                                    <select name="developer_id" class="form-select select2">
                                        <option value="" disabled selected>@lang('Select Developer')</option>
                                        @foreach ($developers as $developer)
                                            <option value="{{ $developer->id }}" {{ old('developer_id')}}>
                                                {{ $developer->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Area / Location')</label>
                                    <select name="location_id" class="form-select select2">
                                        <option value="" disabled selected>@lang('Select Location')</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('location_id') }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form--label required">@lang('Full Address')</label>
                                    <input type="text" class="form--control form-control" name="address" value="{{ old('address') }}">
                                </div>

                                <div class="col-12">
                                    <div class="google__info d-flex align-items-center gap-2"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.3332 6.66671C13.3332 9.99537 9.6405 13.462 8.4005 14.5327C8.28499 14.6196 8.14437 14.6665 7.99984 14.6665C7.85531 14.6665 7.71469 14.6196 7.59917 14.5327C6.35917 13.462 2.6665 9.99537 2.6665 6.66671C2.6665 5.25222 3.22841 3.89567 4.2286 2.89547C5.2288 1.89528 6.58535 1.33337 7.99984 1.33337C9.41433 1.33337 10.7709 1.89528 11.7711 2.89547C12.7713 3.89567 13.3332 5.25222 13.3332 6.66671Z" stroke="#1D4ED8" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 8.66663C9.10457 8.66663 10 7.7712 10 6.66663C10 5.56206 9.10457 4.66663 8 4.66663C6.89543 4.66663 6 5.56206 6 6.66663C6 7.7712 6.89543 8.66663 8 8.66663Z" stroke="#1D4ED8" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>@lang('Google Coordinates') *</div>

                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Latitude')</label>
                                    <input type="text" class="form--control form-control" name="latitude" value="{{ old('latitude') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Longitude')</label>
                                    <input type="text" class="form--control form-control" name="longitude" value="{{ old('longitude') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Construction Status')</label>
                                    <select name="construction_status" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Construction Status')</option>
                                        <option value=1>@lang('Available')</option>
                                        <option value=2>@lang('Under Construction')</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Listing Type')</label>
                                    <select name="listing_type" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Listing Type')</option>
                                        <option value=1>@lang('Sale')</option>
                                        <option value=2>@lang('Rent')</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Pricing Type')</label>
                                    <select name="pricing_type" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Pricing Type')</option>
                                        <option value=1>@lang('Fixed')</option>
                                        <option value=2>@lang('Negotiable')</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <p class="form__tip">💡 @lang('Tip: Right-click on Google Maps and select the coordinates to copy them accurately.')</p>
                                </div>

                                <div class="col-12">
                                    <label class="form--label">@lang('Description')</label>
                                    <textarea name="description" rows="3" class="form--control form-control" value="{{ old('description') }}"></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form--label">@lang('Property Images')</label>
                                    <input type="file" name="images[]" class="form--control form-control" multiple>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn Reject__btn" data-bs-dismiss="modal">
                                @lang('Cancel')
                            </button>

                            <button type="submit" class="btn approve__btn">
                                @lang('Save Property')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">@lang('Edit Property')</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body mb-3">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form--label required">@lang('Property Title')</label>
                                    <input type="text" class="form--control form-control" name="title" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Property Type')</label>
                                    <select name="property_type_id" class="form-select select2">
                                        @foreach ($propertyTypes as $propertyType)
                                            <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Price') ({{ gs('cur_sym') }})</label>
                                    <input type="number" class="form--control form-control" name="price" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label">@lang('Bedrooms')</label>
                                    <input type="number" class="form--control form-control" name="bedrooms">
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label">@lang('Bathrooms')</label>
                                    <input type="number" class="form--control form-control" name="bathrooms">
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label">@lang('Developer / Agency')</label>
                                    <select name="developer_id" class="form-select select2">
                                        <option value="">@lang('Select Developer')</option>
                                        @foreach ($developers as $developer)
                                            <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Area / Location')</label>
                                    <select name="location_id" class="form-select select2">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form--label required">@lang('Full Address')</label>
                                    <input type="text" class="form--control form-control" name="address" required>
                                </div>
                                <div class="col-12">
                                    <div class="google__info d-flex align-items-center gap-2"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.3332 6.66671C13.3332 9.99537 9.6405 13.462 8.4005 14.5327C8.28499 14.6196 8.14437 14.6665 7.99984 14.6665C7.85531 14.6665 7.71469 14.6196 7.59917 14.5327C6.35917 13.462 2.6665 9.99537 2.6665 6.66671C2.6665 5.25222 3.22841 3.89567 4.2286 2.89547C5.2288 1.89528 6.58535 1.33337 7.99984 1.33337C9.41433 1.33337 10.7709 1.89528 11.7711 2.89547C12.7713 3.89567 13.3332 5.25222 13.3332 6.66671Z" stroke="#1D4ED8" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 8.66663C9.10457 8.66663 10 7.7712 10 6.66663C10 5.56206 9.10457 4.66663 8 4.66663C6.89543 4.66663 6 5.56206 6 6.66663C6 7.7712 6.89543 8.66663 8 8.66663Z" stroke="#1D4ED8" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>@lang('Google Coordinates') *</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label">@lang('Latitude')</label>
                                    <input type="text" class="form--control form-control" name="latitude">
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label">@lang('Longitude')</label>
                                    <input type="text" class="form--control form-control" name="longitude">
                                </div>
                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Construction Status')</label>
                                    <select name="construction_status" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Construction Status')</option>
                                        <option value=1>@lang('Available')</option>
                                        <option value=2>@lang('Under Construction')</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Listing Type')</label>
                                    <select name="listing_type" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Listing Type')</option>
                                        <option value=1>@lang('Sale')</option>
                                        <option value=2>@lang('Rent')</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Pricing Type')</label>
                                    <select name="pricing_type" class="form-select select2">
                                        <option value="" disabled selected>@lang('Set Pricing Type')</option>
                                        <option value=1>@lang('Fixed')</option>
                                        <option value=2>@lang('Negotiable')</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <p class="form__tip">💡 @lang('Tip: Right-click on Google Maps and select the coordinates to copy them accurately.')</p>
                                </div>

                                <div class="col-12">
                                    <label class="form--label">@lang('Description')</label>
                                    <textarea name="description" rows="3" class="form--control form-control"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form--label required">@lang('Status')</label>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0">
                                        <input class="form-check-input" type="checkbox" name="status" value="1" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">@lang('Enable or disable property')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn Reject__btn" data-bs-dismiss="modal">@lang('Cancel')</button>
                            <button type="submit" class="btn approve__btn">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewModalLabel">@lang('Property Details')</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3 property-images mb-4">

                        </div>

                        <h3 class="property-title mb-1"></h3>
                        <p class="text-muted"><i class="las la-map-marker"></i> <span class="property-address"></span></p>
                        <h2 class="text--primary mb-4 property-price"></h2>

                        <div class="row g-4 mb-4">
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Property Type')</small>
                                <span class="fw-bold property-type"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Developer')</small>
                                <span class="fw-bold property-developer"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Bedrooms')</small>
                                <span class="fw-bold property-bedrooms"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Bathrooms')</small>
                                <span class="fw-bold property-bathrooms"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Location')</small>
                                <span class="fw-bold property-location"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Added Date')</small>
                                <span class="fw-bold property-date"></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Construction Status')</small>
                                <span class="fw-bold property-construction-status"></span>
                            </div>

                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Listing Type')</small>
                                <span class="fw-bold property-listing-type"></span>
                            </div>

                            <div class="col-6 col-md-4">
                                <small class="text-muted d-block">@lang('Pricing Type')</small>
                                <span class="fw-bold property-pricing-type"></span>
                            </div>

                        </div>

                        <div class="p-3 bg--light rounded mb-4">
                            <h6 class="mb-2"><i class="las la-map"></i> @lang('Google Coordinates')</h6>
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted d-block">@lang('Latitude')</small>
                                    <span class="fw-bold latitude-text"></span>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">@lang('Longitude')</small>
                                    <span class="fw-bold longitude-text"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="mb-2">@lang('Description')</h6>
                            <p class="description-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('script')
            <script>
                (function ($) {
                    "use strict";

                    $(".add-btn").on('click', function (e) {
                        e.preventDefault();
                        $("#addModal").modal('show');
                    });

                    $('.edit-btn').on('click', function () {
                        var modal = $('#editModal');
                        var resource = $(this).data('resource');
                        var checkbox = modal.find('input[type="checkbox"][name="status"]');
                        var action = "{{ route('admin.property.store') }}/" + resource.id;
                        modal.find('form').attr('action', action);
                        modal.find('input[name=title]').val(resource.title);
                        modal.find('select[name=property_type_id]').val(resource.property_type_id).change();
                        modal.find('input[name=price]').val(resource.price);
                        modal.find('input[name=bedrooms]').val(resource.bedrooms);
                        modal.find('input[name=bathrooms]').val(resource.bathrooms);
                        modal.find('select[name=developer_id]').val(resource.developer_id).trigger('change');
                        modal.find('select[name=location_id]').val(resource.location_id).change();
                        modal.find('input[name=address]').val(resource.address);
                        modal.find('input[name=latitude]').val(resource.latitude);
                        modal.find('input[name=longitude]').val(resource.longitude);
                        modal.find('textarea[name=description]').val(resource.description);
                        modal.find('select[name=construction_status]').val(resource.construction_status).change();
                        modal.find('select[name=listing_type]').val(resource.listing_type).change();
                        modal.find('select[name=pricing_type]').val(resource.pricing_type).change();

                        if (resource.status == 1) {
                            checkbox.prop('checked', true);
                        } else {
                            checkbox.prop('checked', false);
                        }

                        modal.modal('show');
                    });

                    $('.view-btn').on('click', function () {
                        var modal = $('#viewModal');
                        var resource = $(this).data('resource');

                        modal.find('.property-title').text(resource.title);
                        modal.find('.property-address').text(resource.address);
                        modal.find('.property-price').text("{{ gs('cur_sym') }}" + parseFloat(resource.price).toFixed(2));

                        modal.find('.property-type').text(resource.property_type ? resource.property_type.name : '-');
                        modal.find('.property-developer').text(resource.developer ? resource.developer.name : '-');
                        modal.find('.property-bedrooms').text(resource.bedrooms);
                        modal.find('.property-bathrooms').text(resource.bathrooms);
                        modal.find('.property-location').text(resource.location ? resource.location.name : '-');
                        modal.find('.property-date').text(resource.created_at.substring(0, 10));

                        modal.find('.latitude-text').text(resource.latitude);
                        modal.find('.longitude-text').text(resource.longitude);
                        modal.find('.description-text').text(resource.description);

                        modal.find('.property-construction-status').text(
                            resource.construction_status == 1 ? '@lang("Available")' : '@lang("Under Construction")'
                        );

                        modal.find('.property-listing-type').text(
                            resource.listing_type == 1 ? '@lang("Sale")' : '@lang("Rent")'
                        );

                        modal.find('.property-pricing-type').text(
                            resource.pricing_type == 1 ? '@lang("Fixed")' : '@lang("Negotiable")'
                        );

                        var imageHtml = '';
                        var path = "{{ asset(getFilePath('property')) }}";

                        if (resource.images && resource.images.length > 0) {
                            resource.images.forEach(function (img) {
                                var fullPath = path + '/' + img.image;
                                imageHtml += `<div class="col-6"><img src="${fullPath}" class="img-fluid rounded w-100" style="height: 200px; object-fit: cover;" alt="Property Image"></div>`;
                            });
                        } else {
                            imageHtml = '<div class="col-12 text-center text-muted">@lang("No images available")</div>';
                        }
                        modal.find('.property-images').html(imageHtml);

                        modal.modal('show');
                    });

                })(jQuery);
            </script>
        @endpush