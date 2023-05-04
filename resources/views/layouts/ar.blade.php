@php
    use App\Models\AppSettings;
    $appSetting = AppSettings::first();
    $authUser = Auth::user()->name;
@endphp

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ $appSetting->image }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $appSetting->meta_description }}">
    <meta name="keywords" content="{{ $appSetting->keywords }}">
    <meta name="author" content="{{ $authUser }}">

    <title>
        @yield('title', $appSetting->site_title ? $appSetting->site_title : 'Admin Panel')
    </title>
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/apple-touch-icon.png' }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-16x16.png' }}">
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/ar/dist/css/app.css" />
    <link rel="stylesheet" href="/ar/dist/css/custom.css" />
    <link rel="stylesheet" href="/ar/dist/css/nepali-date-picker.min.css">
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" />

    <link rel="stylesheet" href="/hr/assets/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    @yield('css')
    <style>
        .note-editor {
            z-index: 9999 !important;
        }

        .note-editor.fullscreen {
            z-index: 9999 !important;
        }
    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    @include('partials.message')

    @include('sweetalert::alert')
    @include('partials.ar.mobileMenu')
    <div class="flex">
        @include('partials.ar.sidebar')
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                @yield('breadcum')
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
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img alt="#"
                            src="{{ isset($authUser->image) ? $authUser->image : Avatar::create($authUser->name)->toBase64() }}">
                    </div>
                    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box bg-theme-38 text-white">
                            <div class="p-4 border-b border-theme-40">
                                <div class="font-medium">{{ $authUser->name }}</div>
                                <div class="text-xs text-theme-41">
                                    {{ $authUser->designation ? $authUser->designation : 'Software Engineer' }}
                                </div>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('admin.user.profile', $authUser->id) }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                    Profile
                                </a>
                            </div>
                            {{-- <div>
                                <a href="{{ route('user.profile.changePassword', $authUser->id) }}"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                                    Reset Password
                                </a>
                            </div> --}}
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
    <!-- BEGIN: JS Assets-->
    <script src="/js/jquery-3.6.0.min.js"></script>
    {{-- <script src="/hr/assets/js/jquery.min.js"></script> --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    --}}
    <script src="/ar/dist/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/ar/dist/js/nepali-date-picker.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script src="/ar/dist/js/custom.js"></script>
    <!-- include summernote css/js -->

    @yield('script')
    @stack('script')

    <!-- END: JS Assets-->
</body>

</html>
