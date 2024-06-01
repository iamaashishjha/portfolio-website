<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="{{ isset($appSetting->meta_description) ? $appSetting->meta_description : ''  }}">
    <meta name="keywords"
        content="{{ isset($appSetting->keywords) ? $appSetting->keywords : '' }}">
    {{-- <meta name="author" content="LEFT4CODE"> --}}

    <title>
        @yield('title', 'Register Member')
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/ar/dist/css/app.css" />
    <link rel="stylesheet" href="/ar/dist/css/custom.css" />
    <link rel="stylesheet" href="/ar/dist/css/nepali-date-picker.min.css">
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    @yield('css')

    {{-- <link rel="stylesheet" href="/css/app.css" /> --}}

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app" style="background-color:#d41e44;" >
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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

</body>
