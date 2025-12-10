@extends('admin.layouts.master')
@section('content')
    <main class="account">
        <span class="account__overlay bg-img dark-bg"
            data-background-image="{{ asset('assets/admin/images/login-dark.png') }}"></span>   
        <div class="account__card">
            <div class="account__logo">
                <img src="{{ siteLogo() }}" class="light-show" alt="brand-thumb">
                <img src="{{ siteLogo('dark') }}" class="dark-show" alt="brand-thumb">
            </div>
            <h2 class="account__title">@lang('Keys Admin Dashboard')</h2>
            <p class="account__desc">@lang('Enter your credentials to access the admin panel')</p>
            <form action="{{ route('admin.login') }}" method="POST" class="account__form verify-gcaptcha">
                @csrf
                <div class="form-group">
                    <label class="form--label">@lang('Email')</label>
                    
                    <input type="text" class="form--control h-36"name="username"value="{{ old('username') }}" placeholder="admin@keys.com"required>
                </div>
                <div class="form-group">
                    <label for="password" class="form--label">@lang('Password')</label>
                    <div class="position-relative">
                        <input id="password" name="password" required type="password" placeholder="••••••••" class="form--control h-36">
                        <span class="password-show-hide fas toggle-password fa-eye-slash" id="#password"></span>
                    </div>
                </div>
                <x-captcha :isAdmin=true />
                   <a  href="{{ route('admin.password.reset') }}" class="forgot-password">
                        @lang('Forgot your password')?
                    </a>
                <div class="form-group">
                  
                    <button type="submit" class="btn btn--primary w-100  h-36 fs-16"> @lang('Login')
                    </button>
                   
                </div>
                <div class="form-group">
                  
                    <p class="account-warning"> @lang('<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.99998 14.6666C11.6819 14.6666 14.6666 11.6819 14.6666 7.99998C14.6666 4.31808 11.6819 1.33331 7.99998 1.33331C4.31808 1.33331 1.33331 4.31808 1.33331 7.99998C1.33331 11.6819 4.31808 14.6666 7.99998 14.6666Z" stroke="#E17100" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M8 5.33331V7.99998" stroke="#E17100" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M8 10.6667H8.00667" stroke="#E17100" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                          Access restricted to authorized Keys team members.')
                    </p>
                   
                </div>
            </form>
        </div>
    </main>
@endsection
