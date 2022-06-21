@php
$lang = App::getLocale();
$url = request()->route()->uri;
@endphp

<div class="topbar-one">
    <div class="container">
        <div class="inner-container">
            <div class="topbar-one__left">
                <a
                    href="mailto:{{ isset($companyDetails->email_address) ? $companyDetails->email_address : 'needhelp@potisen.com' }}">{{
                    isset($companyDetails->email_address) ? $companyDetails->email_address : 'needhelp@potisen.com'
                    }}</a>
                <a
                    href="tel:{{ isset($companyDetails->phone_number) ? $companyDetails->phone_number : '666 888 0000' }}">{{
                    isset($companyDetails->phone_number) ? $companyDetails->phone_number : '666 888 0000' }}</a>
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
                {{-- <a href="#"><i class="fa fa-money"></i> {{ __('home.header.donate') }}</a> --}}
                <div class="header-social text-center">
                    {!! isset($companyDetails->twitter_link) ? '<a href="'. $companyDetails->twitter_link.' "><i class="fa fa-twitter"></i></a>' : '' !!}
                    {!! isset($companyDetails->facebook_link) ? '<a href="'. $companyDetails->facebook_link.' "><i class="fa fa-facebook-square"></i></a>' : '' !!}
                    {!! isset($companyDetails->instagram_link) ? '<a href="'. $companyDetails->instagram_link.' "><i class="fa fa-instagram"></i></a>' : '' !!}

                </div><!-- /.header-social -->
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
                    <img src="{{ isset($companyDetails->logo) ? $companyDetails->logo: '/hr/assets/images/logo-dark.png' }}"
                        class="main-logo" height="80px" style="max-width: 200px;max-height:70px"
                        alt="{{ isset($companyDetails->company_name_en) ? $companyDetails->company_name_en : '' }}" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
                <ul class=" navigation-box">
                    <li class="{{ ($url === '/') ? 'current' : '' }}">
                        <a href="{{ route('home.index') }}">{{ __('home.menuItems.home') }}</a>
                    </li>
                    <li class="{{ ($url === 'about') ? 'current' : '' }}">
                        <a href="{{ route('home.about') }}">{{ __('home.menuItems.about.about-us') }}</a>
                    </li>
                    <li class="{{ ($url === 'news') ? 'current' : '' }}">
                        <a href="{{ route('home.news.index') }}">{{__('home.menuItems.posts.news')}}</a>
                    </li>
                    
                    <li class="{{ (($url === 'document') || ($url === 'library')) ? 'current' : '' }}">
                        <a href="javascript:;">{{ __('home.menuItems.documents') }}</a>
                        @if (count($documents))
                        <ul class="sub-menu">
                            @foreach ($documents as $doc)
                                <li>
                                    <a href="{{ $doc->url }}" target="_blank">
                                        {{ $doc->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- /.sub-menu -->
                        @endif
                    </li>
                    <li class="{{ (($url === 'blogs') || ($url === 'events') || ($url === 'library')) ? 'current' : '' }}">
                        <a href="javascript:;">{{ __('home.menuItems.pages') }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.events.index') }}">{{__('home.menuItems.posts.events')}}</a>
                            </li>
                            <li><a href="{{ route('home.blogs.index') }}">{{__('home.menuItems.posts.blogs')}}</a></li>
                            <li>
                                <a href="{{ route('home.library.index') }}">{{__('home.menuItems.library')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('home.donation') }}">{{__('home.menuItems.donation')}}</a>
                            </li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li class="{{ ($url === 'contact') ? 'current' : '' }}">
                        <a href="{{ route('home.contact') }}">{{ __('home.menuItems.contact') }}</a>
                    </li>
                    {{-- <li class="{{ ($url === 'contact') ? 'current' : '' }}">
                        <a href="javascript;:">{{ __('home.menuItems.pages') }}</a>
                    </li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="right-side-box">
                <a href="/member/create"><i class="fa fa-user-o"></i> &nbsp;{{ __('home.header.join') }}</a>
            </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
    </nav>
</header><!-- /.site-header -->