
{{-- META TAGS  --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="_token" content="{{ csrf_token() }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta property="og:type" content="website" />



<link rel="canonical" href="/" />
<meta property="og:url" content="/" />



<meta name="title" content="@yield('title', isset($appSetting->site_title) ? $appSetting->site_title : __('base.title'))">
<meta property="og:title" content="@yield('title', isset($appSetting->site_title) ? $appSetting->site_title : __('base.title'))" />
<meta property="og:site_name" content="@yield('title', isset($appSetting->site_title) ? $appSetting->site_title : __('base.title'))" />



@isset($appSetting->meta_description)
    <meta name="description" content="{{ $appSetting->meta_description }}">
    <meta property="og:description" content="{{ $appSetting->meta_description }}" />
@endisset



@isset($appSetting->keywords)
    <meta name="keywords" content="{{ $appSetting->keywords }}">
@endisset



@isset($authUser)
    <meta name="author" content="{{ $authUser }}">
@endisset



@isset($appSetting->image)
    <meta property="og:image" content="{{ $appSetting->image }}" />
@endisset