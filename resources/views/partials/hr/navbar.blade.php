@php
$lang = App::getLocale();
@endphp

<div class="topbar-one">
    <div class="container">
        <div class="inner-container">
            <div class="topbar-one__left">
                <a href="mailto:{{ isset($appSetting->email) ? $appSetting->email : 'needhelp@potisen.com' }}">{{
                    isset($appSetting->email) ? $appSetting->email : 'needhelp@potisen.com' }}</a>
                <a href="tel:{{ isset($appSetting->telephone) ? $appSetting->telephone : '666 888 0000' }}">{{
                    isset($appSetting->telephone) ? $appSetting->telephone : '666 888 0000' }}</a>
            </div><!-- /.topbar-one__left -->


            <div>
                @if ($lang == 'en')
                <p>{{ \Carbon\Carbon::now()->format('j F Y, l') }} </p>
                @elseif($lang == 'np')
                <p> {{ toFormattedNepaliDate(\Carbon\Carbon::now()); }} </p>
                @endif
            </div>

            @include('partials.hr.languageSwitch')
            
            <div class="topbar-one__right">
                <a href="#"><i class="fa fa-money"></i> {{ __('home.header.donate') }}</a>
                <a href="/member/create"><i class="fa fa-user-o"></i>{{ __('home.header.join') }}</a>
            </div><!-- /.topbar-one__right -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</div><!-- /.topbar-one -->


<header class="site-header site-header__header-one ">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="logo-box clearfix">
                <a class="navbar-brand" href="/">
                    <img src="{{ isset($appSetting->logo_image) ? $appSetting->logo_image: '/hr/assets/images/logo-dark.png' }}"
                        class="main-logo" height="80"
                        alt="{{ isset($appSetting->name) ? $appSetting->name : '' }}" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
                <ul class=" navigation-box">
                    <li class="current">
                        <a href="{{ route('home.index') }}">{{ __('home.menuItems.home') }}</a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('home.menuItems.membership') }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.member.create') }}">{{ __('home.menuItems.membership.create')
                                    }}</a></li>
                            <li><a href="{{ route('admin.member.membership.index') }}">{{
                                    __('home.menuItems.membership.dashboard') }}</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('home.menuItems.posts') }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.events.index') }}">{{__('home.menuItems.posts.events')}}</a>
                            </li>
                            <li><a href="{{ route('home.news.index') }}">{{__('home.menuItems.posts.news')}}</a></li>
                            <li><a href="{{ route('home.blogs.index') }}">{{__('home.menuItems.posts.blogs')}}</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('home.menuItems.about') }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.about') }}">{{ __('home.menuItems.about.about-us') }}</a></li>
                            <li><a href="javascript:;">{{ __('home.menuItems.about.our-history') }}</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="{{ route('home.contact') }}">{{ __('home.menuItems.contact') }}</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="right-side-box">
                <div class="header-social">
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-facebook-square"></a>
                    <a href="#" class="fa fa-pinterest-p"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div><!-- /.header-social -->
            </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
    </nav>
</header><!-- /.site-header -->