
@php
use App\Models\AppSettings;
        $appSetting = AppSettings::first();
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
        {{-- <meta name="author" content="LEFT4CODE"> --}}
        <title>
            {{ $appSetting->site_title }}
        </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/ar/dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <div class="container">
            <!-- BEGIN: Error Page -->
            <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
                <div class="-intro-x lg:mr-20">
                    <img alt="" class="h-48 lg:h-auto" src="/ar/dist/images/error-illustration.svg">
                </div>
                <div class="text-white mt-10 lg:mt-0">
                    <div class="intro-x text-6xl font-medium">404</div>
                    <div class="intro-x text-xl lg:text-3xl font-medium">Oops. This page has gone missing.</div>
                    <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
                    <button class="intro-x button button--lg border border-white mt-10" onclick="window.location.href='/'">
                        Back to Home
                    </button>
                </div>
            </div>
            <!-- END: Error Page -->
        </div>

        <!-- END: JS Assets-->
    </body>
</html>