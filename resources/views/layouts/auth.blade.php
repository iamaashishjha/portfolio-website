<!DOCTYPE html>
-->
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ isset($appSetting->meta_description) ? $appSetting->meta_description : 'Nagrik Unmukti Party' }}">
    <meta name="keywords" content="{{ isset($appSetting->keywords) ? $appSetting->keywords : 'Nagrik Unmukti Party' }}">
    <meta name="author" content="{{ isset($appSetting->title) ? $appSetting->title : 'Nagrik Unmukti Party' }}">
    <title>@yield('title', 'Login')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/ar/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
    @yield('content')
    <!-- BEGIN: JS Assets-->
    <script src="/ar/dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>
</html>
