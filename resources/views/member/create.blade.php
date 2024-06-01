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
    @yield('css')

    {{-- <link rel="stylesheet" href="/css/app.css" /> --}}

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app" style="background-color:#d41e44;" >
    @include('partials.message')
    <div class="flex">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="flex items-center my-4">
                <h2 class="intro-y text-lg font-medium mx-auto">
                    नयाँ सदस्यता को लागि Online फारम भर्नुहोस् |
                </h2>
            </div>
            <form action="{{ route('home.member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box pb-10 sm:py-20">
                    <div class="flex items-center mb-6 px-4">
                        <h2 class="intro-y text-lg font-medium mr-auto text-center pt-4">
                            यस नागरिक उन्मुक्ति पार्टीको विधान बमोजिम पार्टीको साधारण सदस्यताको निमित आवश्यक बिवरण सहित यो फारम अनलाईन भर्दैछु।  यस पार्टीको विधानअनुसार संगठानिक हित र लक्ष्य प्राप्तिका निमित्त  सदैब विधानअनुसार पार्टीको हित्तको लागि काम गर्नेछु।  विधान विपरित कार्य गरेमा मैले प्राप्त गरेको सदस्यता स्वत: खारेज हुनेमा मेरो पूर्ण मन्जुरी छ।
                        </h2>
                    </div>
                    {{-- @include('member.partials.tabs') --}}

                    {{-- Citizenship --}}
                    @include('member.partials.citizenship')

                    {{-- Personal --}}
                    {{-- @include('member.partials.personal') --}}


                    {{-- Income / Property --}}
                    {{-- @include('member.partials.property') --}}

                    {{-- Political --}}
                    {{-- @include('member.partials.political') --}}

                    {{-- Documents --}}
                    {{-- @include('member.partials.document') --}}

                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5" id="btnDiv"
                    hidden>
                    <button type="submit"
                        class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                </div>
                <!-- END: Wizard Layout -->
            </form>

        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="/js/jquery-3.6.0.min.js">
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
        integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> --}}
    <script src="/ar/dist/js/app.js"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/ar/dist/js/nepali-date-picker.min.js"></script>
    <script src="/ar/dist/js/custom.js"></script>
    <script>
        var ownImage = function(event) {
            var image = document.getElementById('own_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var signImage = function(event) {
            var image = document.getElementById('sign_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipFront = function(event) {
            var image = document.getElementById('citizenship_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipBack = function(event) {
            var image = document.getElementById('citizenship_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportFront = function(event) {
            var image = document.getElementById('passport_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportBack = function(event) {
            var image = document.getElementById('passport_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var licenseImage = function(event) {
            var image = document.getElementById('license_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panFront = function(event) {
            var image = document.getElementById('pan_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panBack = function(event) {
            var image = document.getElementById('pan_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        $(document).ready(function() {
            $("#citizenship-button").addClass('bg-theme-9 text-white');
            $("#citizenship-button").removeClass('bg-gray-200 text-gray-600');

            $("#personal-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#citizenship-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#property-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#old-membership-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#documents-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
            });
        });
    </script>
    <!-- END: JS Assets-->
</body>

</html>
