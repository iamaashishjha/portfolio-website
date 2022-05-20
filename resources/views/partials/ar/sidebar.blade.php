<!-- BEGIN: Side Menu -->
<nav class="side-nav" id="sidebar">
    <a href="/admin" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/ar/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Aashish <span class="font-medium">Jha</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/admin" class="side-menu {{ request()->is('admin') ? 'side-menu--active' : '' }} " id="dashboard">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->is('admin/blog/*') ? 'side-menu--active' : '' }} " id="blog_menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Blogs <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.blog.post.create') }}" class="side-menu" id="blog_submenu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Create New Post </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.post.index') }}" class="side-menu" id="blog_submenu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> All Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.post.trashed') }}" class="side-menu" id="blog_submenu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Trashed Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.category.index') }}" class="side-menu" id="blog_submenu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Blog Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.tag.index') }}" class="side-menu" id="blog_submenu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Blog Tags </div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="javascript:;" class="side-menu {{ request()->is('admin/info/*') ? 'side-menu--active' : '' }} " id="information_menu">
                <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
                <div class="side-menu__title"> Information <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.info.education.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Education </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                        <div class="side-menu__title"> Experience </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="side-menu__title"> References </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> Portfolio </div>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="side-nav__devider my-6"></li>

        {{-- User Management --}}
        <li>
            <a href="javascript:;" class="side-menu {{ request()->is('admin/user/*') ? 'side-menu--active' : '' }} " id="information_menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.user.registered') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Registered Users </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.admin') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Admin Users </div>
                    </a>
                </li>
                @php
                    $user = Auth::user();
                @endphp
                <li>
                    <a href="{{ route('admin.user.profile', $user->id) }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">
                            About Me
                        </div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Members Management --}}
        <li>
            <a href="javascript:;" class="side-menu {{ request()->is('admin/member/*') ? 'side-menu--active' : '' }} " id="information_menu">
                <div class="side-menu__icon"> <i data-feather="scissors"></i> </div>
                <div class="side-menu__title"> Members <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.member.membership.create') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Register New Member </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.member.membership.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> All Mmebers </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>

        {{-- App Settings --}}
        <li>
            <a href="javascript:;" class="side-menu {{ request()->is('admin/home/*') ? 'side-menu--active' : '' }} ">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> Appsetting <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.home.headerFooter.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Header/Footer </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home.slider.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Slider </div>
                    </a>
                </li>
                {{-- <li>
                    <a href="side-menu-users-layout-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 3 </div>
                    </a>
                </li> --}}
            </ul>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
