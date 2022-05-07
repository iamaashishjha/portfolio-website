<!-- BEGIN: Side Menu -->
<nav class="side-nav" id="sidebar">
    <a href="/dashboard" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/ar/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Aashish <span class="font-medium">Jha</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/dashboard" class="side-menu {{ request()->is('dashboard') ? 'side-menu--active' : '' }} " id="dashboard">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->is('dashboard/blog/*') ? 'side-menu--active' : '' }} " id="blog_menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Blogs <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('user.post.create') }}" class="side-menu" id="blog_submenu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Create New Post </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.post.index') }}" class="side-menu" id="blog_submenu">

                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> All Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.post.trashed') }}" class="side-menu" id="blog_submenu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Trashed Posts </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            @php
            $user = Auth::user();
            @endphp
            <a href="{{ route('user.profile.view', $user->id) }}" class="side-menu {{ request()->is('dashboard/profile/*') ? 'side-menu--active' : '' }} " id="information_menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Users
                    {{-- <i data-feather="chevron-down" class="side-menu__sub-icon"></i> --}}
                </div>
            </a>
            {{-- <ul class="collapse">
                @php
                    $user = Auth::user();
                @endphp
                <li>
                    <a href="{{ route('user.profile.view', $user->id) }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
            <div class="side-menu__title">
                About Me
            </div>
            </a>
        </li>
    </ul> --}}
    </li>

    {{-- <li class="side-nav__devider my-6"></li> --}}


    {{-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Menu Layout <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li> --}}
    {{-- <li>
            <a href="side-menu-file-manager.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li> --}}



    {{-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-users-layout-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Layout 3 </div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</nav>
<!-- END: Side Menu -->
