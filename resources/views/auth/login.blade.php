@extends('layouts.auth')
@section('content')
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="" class="w-6" src="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}">
                <span class="text-white text-lg ml-3"> Nagrik Unmukti<span class="font-medium">Party</span> </span>
            </a>
            <div class="my-auto">
                <img alt="" class="-intro-x w-1/2 -mt-16" src="/ar/dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to
                    <br>
                    sign in to your account.
                </div>
                {{-- <div class="-intro-x mt-5 text-lg text-white">Manage all your e-commerce accounts in one place</div> --}}
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account.</div>
                    <div class="intro-x mt-8">
                        <input type="text" class=" @error('email') is-invalid @enderror intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input type="checkbox" class="input border mr-2" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="cursor-pointer select-none" for="remember">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3" type="submit">Login</button>
                        {{-- <form action="/register1" method="get">
                            <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0" type="submit">Sign Up</button>
                        </form> --}}
                        {{-- <a href="/register1" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign Up</a> --}}
                    </div>

                </form>
                {{-- <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                    By signin up, you agree to our
                    <br>
                    <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a>
                </div> --}}
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
@endsection
