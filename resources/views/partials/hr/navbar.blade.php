<div class="topbar-one">
    <div class="container">
        <div class="inner-container">
            <div class="topbar-one__left">
                <a href="mailto:{{ isset($headerFooter->email) ? $headerFooter->email : 'needhelp@potisen.com' }}">{{ isset($headerFooter->email) ? $headerFooter->email : 'needhelp@potisen.com' }}</a>
                <a href="tel:{{ isset($headerFooter->telephone) ? $headerFooter->telephone : '666 888 0000' }}">{{ isset($headerFooter->telephone) ? $headerFooter->telephone : '666 888 0000' }}</a>
            </div><!-- /.topbar-one__left -->
            <div class="topbar-one__right">
                <a href="#"><i class="fa fa-money"></i> Donate Now</a>
                <a href="/member/create"><i class="fa fa-user-o"></i>Join Us</a>
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
                    <img src="{{ isset($headerFooter->logo_image) ? $headerFooter->logo_image: '/hr/assets/images/logo-dark.png' }}" class="main-logo"  height="80" alt="{{ isset($headerFooter->name) ? $headerFooter->name : '' }}" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
                <ul class=" navigation-box">
                    <li class="current">
                        <a href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="javascript:;">Membership</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.member.create') }}">Register</a></li>
                            <li><a href="{{ route('admin.member.membership.index') }}">Dashboard</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="javascript:;">Posts</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.events.index') }}">Events</a></li>
                            <li><a href="{{ route('home.news.index') }}">News</a></li>
                            <li><a href="{{ route('home.blogs.index') }}">Blogs</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="javascript:;">About Us</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('home.about') }}">About Us</a></li>
                            <li><a href="javascript:;">History</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li>
                        <a href="{{ route('home.contact') }}">Contact</a>
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