<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ isset($appSetting->meta_description) ? $appSetting->meta_description : '' }}">
    <meta name="keywords" content="{{ isset($appSetting->keywords) ? $appSetting->keywords : '' }}">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', isset($appSetting->site_title) ? $appSetting->site_title : 'Nagrik Unmukti Party' )
    </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/apple-touch-icon.png' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-16x16.png' }}">
    <link rel="manifest" href="/hr/assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->

    <link href="https://fonts.googleapis.com/css?family=Barlow:300,400,500,600,700,800,900%7CLibre+Baskerville:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/hr/assets/css/animate.min.css">
    <link rel="stylesheet" href="/hr/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hr/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/hr/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/hr/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/hr/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/hr/assets/css/swiper.min.css">
    <link rel="stylesheet" href="/hr/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/hr/assets/plugins/potisen-icons/style.css">
    <link rel="stylesheet" href="/hr/assets/css/vegas.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="/hr/assets/css/style.css">
    <link rel="stylesheet" href="/hr/assets/css/responsive.css">
    @yield('css')
</head>

<body>
    <div class="preloader">
        <img src="/hr/assets/images/loader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    @include('sweetalert::alert')

    <div class="page-wrapper">
        @include('partials.hr.navbar')

        @yield('content')


       @include('partials.hr.footer')
        <!-- /.site-footer -->
    </div><!-- /.page-wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="/hr/assets/js/jquery.min.js"></script>
    <script src="/hr/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/hr/assets/js/owl.carousel.min.js"></script>
    <script src="/hr/assets/js/waypoints.min.js"></script>
    <script src="/hr/assets/js/jquery.counterup.min.js"></script>
    <script src="/hr/assets/js/TweenMax.min.js"></script>
    <script src="/hr/assets/js/wow.js"></script>
    <script src="/hr/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/hr/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/hr/assets/js/swiper.min.js"></script>
    <script src="/hr/assets/js/typed-2.0.11.js"></script>
    <script src="/hr/assets/js/vegas.min.js"></script>
    <script src="/hr/assets/js/jquery.validate.min.js"></script>
    <script src="/hr/assets/js/bootstrap-select.min.js"></script>
    <script src="/hr/assets/js/countdown.min.js"></script>

    <!-- template scripts -->
    <script src="/hr/assets/js/theme.js"></script>

    @yield('script')
</body>

</html>