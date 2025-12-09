@extends('admin.layouts.master')
@section('content')
@dd(@dd(get_defined_vars()))
    <main class="dashboard">
        @include('admin.partials.sidenav')
        <section class="dashboard__area">
            <div class="container-fluid">
                @include('admin.partials.topnav')
                <div class="dashboard__area-header flex-wrap gap-2">
                    <h3 class="page-title">{{ __($pageTitle) }}</h3>
                    <div class="breadcrumb-plugins">
                        @stack('breadcrumb-plugins')
                    </div>
                </div>
                <div class="dashboard__area-inner p-0">
                    {{-- @yield('panel') --}}
                    {{ $slot }}
                </div>
            </div>
        </section>
    </main>
@endsection
