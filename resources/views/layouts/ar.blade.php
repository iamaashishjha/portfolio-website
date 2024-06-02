@php
    use App\Models\AppSettings;
    $appSetting = AppSettings::first();
    // auth()->user() = Auth::user()->name;
@endphp

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
@include('layouts.partials.ar.__meta')
<head>
    
    <title>
        @yield('title', $appSetting->site_title ? $appSetting->site_title : 'Admin Panel')
    </title>
    
    @include('layouts.partials.ar.__links')
    <style>
        .note-editor {
            z-index: 9999 !important;
        }

        .note-editor.fullscreen {
            z-index: 9999 !important;
        }
    </style>
    @yield('css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    @include('sweetalert::alert')
    
    @include('partials.ar.mobileMenu')

    <div class="flex">
        @include('partials.ar.sidebar')
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                @yield('breadcrumb')
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                        <i data-feather="search" class="search__icon"></i>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8 relative">
                    <div class="dropdown-toggle w-8 h-8 rounded-full over
                    -hidden shadow-lg image-fit zoom-in">
                        <img alt="#"
                            src="{{ isset(auth()->user()->image) ? auth()->user()->image : Avatar::create(auth()->user()->name)->toBase64() }}">
                    </div>
                    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box bg-theme-38 text-white">
                            <div class="p-4 border-b border-theme-40">
                                <div class="font-medium">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-theme-41">
                                    {{ auth()->user()->designation ? auth()->user()->designation : 'Administrator' }}
                                </div>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('admin.user.profile', auth()->user()->id) }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                    Profile
                                </a>
                            </div>
                            
                            <div class="p-2 border-t border-theme-40">
                                <a class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i>
                                    Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>

    @include('layouts.partials.ar.__scripts')

    @yield('script')
    @stack('script')

    @include('partials.message')
    <!-- END: JS Assets-->
</body>

</html>
