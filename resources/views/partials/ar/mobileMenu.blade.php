<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/ar/dist/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="/admin" class="menu {{ request()->is('admin') ? 'menu--active' : 'menu--active' }} " id="dashboard">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>

        {{-- Events  --}}
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                <div class="menu__title"> Events <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.event.create') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Create New Event </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.event.index') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                        <div class="menu__title"> All Events </div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- News  --}}
        <li>
            <a href="javascript:;" class="menu {{ request()->is('admin/news/*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa fa-newspaper-o" aria-hidden="true"></i></div>
                <div class="menu__title"> News <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.news.post.create') }}" class="menu">
                        <div class="menu__icon">  <i class="fa fa-plus-circle" aria-hidden="true"></i>  </div>
                        <div class="menu__title"> Create New Post </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.post.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                        <div class="menu__title"> All Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.post.trashed') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-list-alt" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Trashed Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.category.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-th-list" aria-hidden="true"></i> </div>
                        <div class="menu__title"> News Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.tag.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-tags" aria-hidden="true"></i> </div>
                        <div class="menu__title"> News Tags </div>
                    </a>
                </li>


            </ul>
        </li>

        {{-- Blogs  --}}


        <li>
            <a href="javascript:;" class="menu {{ request()->is('admin/blog/*') ? 'menu--active' : '' }} " id="blog_menu">
                <div class="menu__icon"> <i class="fa fa-podcast" aria-hidden="true"></i> </div>
                <div class="menu__title"> Blogs <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.blog.post.create') }}" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Create New Post </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.post.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                        <div class="menu__title"> All Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.post.trashed') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-list-alt text-theme-6" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Trashed Posts </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.category.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-th-list" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Blog Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.tag.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-tags" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Blog Tags </div>
                    </a>
                </li>


            </ul>
        </li>
        <li class="menu__devider my-6"></li>

        {{-- User Management  --}}
        <li>
            <a href="javascript:;" class="menu {{ request()->is('admin/user/*') ? 'menu--active' : '' }} ">
                <div class="menu__icon"> <i class="fa fa-user-o" aria-hidden="true"></i> </div>
                <div class="menu__title"> User <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.user.registered') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-male" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Registered Users </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.admin') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-user-secret" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Admin Users </div>
                    </a>
                </li>
                @php
                $user = Auth::user();
                @endphp
                <li>
                    <a href="{{ route('admin.user.profile', $user->id) }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </div>
                        <div class="menu__title"> About Me </div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Members Management  --}}
        <li>
            <a href="javascript:;" class="menu {{ request()->is('admin/member/*') ? 'side-menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa fa-users" aria-hidden="true"></i> </div>
                <div class="menu__title"> Members <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.member.create') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-user-plus" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Register New Member </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.member.index') }}" class="menu">

                        <div class="menu__icon"> <i class="fa fa-server" aria-hidden="true"></i> </div>
                        <div class="menu__title"> All Members </div>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="menu__devider my-6"></li>

        {{-- App Settings  --}}
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i class="fa fa-cog" aria-hidden="true"></i> </div>
                <div class="menu__title"> Settings <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="collapse">
                <li>
                    <a href="{{ route('admin.home.app-setting.index') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-wrench" aria-hidden="true"></i> </div>
                        <div class="menu__title"> App Setting </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home.company-details.index') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-building" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Company Details </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home.slider.index') }}" class="menu">
                        <div class="menu__icon"> <i class="fa fa-sliders" aria-hidden="true"></i> </div>
                        <div class="menu__title"> Slider </div>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="menu__devider my-6"></li>
        
    </ul>
</div>
<!-- END: Mobile Menu -->
