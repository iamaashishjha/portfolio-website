<!doctype html>
<html lang="en">

<head>

    @include('customHome.partials.__metaTags')
    @yield('meta')

    <title>
        @yield('title', isset($appSetting->site_title) ? $appSetting->site_title : __('base.title'))
    </title>
    @isset($appSetting->image)
        <link rel="icon" href="{{ $appSetting->image }}">
        <link href="{{ $appSetting->image }}" rel="shortcut icon">
    @endisset
    @include('customHome.partials.__head')

    @yield('head')
    @stack('script')

</head>

<body>
    {{-- sweelaert calling for swal  --}}
    @include('sweetalert::alert')

    {{-- navbar  --}}
    @include('customHome.partials.__navBar')
    @include('customHome.partials.__sidebar')

    {{-- content from section content from extented blades will apear here --}}
    @yield('content')

    {{-- Footer Section included inside partial --}}
    @include('customHome.partials.__contact')
    @include('customHome.partials.__footer')

    {{-- All the scripts refrencing in this partial  --}}
    @include('customHome.partials.__scripts')

    @yield('script')
    @stack('script')



</body>

</html>
