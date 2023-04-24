<!-- BEGIN: Side Menu -->
<nav class="side-nav" id="sidebar">
    <a href="/" class="intro-x flex items-center pl-5 pt-4">
        <img alt="" class="w-6"
            src="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}">
        <span class="hidden xl:block text-white text-lg ml-3"> Nagrik Unmukti <span class="font-medium">Party</span>
        </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul class="nav-sidebar">
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="side-menu ">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        {{-- News --}}
        @if (
            $authUser->hasAnyPermission([
                'create newspost',
                'list newspost',
                'delete newspost',
                'list newscategory',
                'list newstags',
            ]))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-newspaper-o" aria-hidden="true"></i></div>
                    <div class="side-menu__title"> News <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('create newspost'))
                        <li>
                            <a href="{{ route('admin.news.post.create') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Create New Post </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list newspost'))
                        <li>
                            <a href="{{ route('admin.news.post.index') }}" class="side-menu">

                                <div class="side-menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> All Posts </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('delete newspost'))
                        <li>
                            <a href="{{ route('admin.news.post.trashed') }}" class="side-menu">

                                <div class="side-menu__icon"> <i class="fa fa-list-alt" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Trashed Posts </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list newscategory'))
                        <li>
                            <a href="{{ route('admin.news.category.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-th-list" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> News Categories </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list newstags'))
                        <li>
                            <a href="{{ route('admin.news.tag.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-tags" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> News Tags </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Blogs --}}
        @if (
            $authUser->hasAnyPermission([
                'create blogpost',
                'list blogpost',
                'delete blogpost',
                'list blogcategory',
                'list blogtags',
            ]))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-podcast" aria-hidden="true"></i></div>
                    <div class="side-menu__title"> Blogs <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('create blogpost'))
                        <li>
                            <a href="{{ route('admin.blog.post.create') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Create New Post </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list blogpost'))
                        <li>
                            <a href="{{ route('admin.blog.post.index') }}" class="side-menu">

                                <div class="side-menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> All Posts </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('delete blogpost'))
                        <li>
                            <a href="{{ route('admin.blog.post.trashed') }}" class="side-menu">

                                <div class="side-menu__icon"> <i class="fa fa-list-alt" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Trashed Posts </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list blogcategory'))
                        <li>
                            <a href="{{ route('admin.blog.category.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-th-list" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Blog Categories </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list blogtags'))
                        <li>
                            <a href="{{ route('admin.blog.tag.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-tags" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Blog Tags </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Events --}}
        @if ($authUser->hasAnyPermission(['create event', 'list event']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                    <div class="side-menu__title"> Events <i data-feather="chevron-down"
                            class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('create event'))
                        <li>
                            <a href="{{ route('admin.event.create') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Create New Event </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list event'))
                        <li>
                            <a href="{{ route('admin.event.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-list" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> All Events </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Others  --}}
        @if ($authUser->hasAnyPermission(['list document', 'list library']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-file-text-o" aria-hidden="true"></i> </div>
                    <div class="side-menu__title"> Others <i data-feather="chevron-down"
                            class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('list document'))
                        <li>
                            <a href="{{ route('admin.document.create') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Documents </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list library'))
                        <li>
                            <a href="{{ route('admin.library.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Libraries </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Authentication --}}
        @if ($authUser->hasAnyPermission(['create user', 'list user', 'update user', 'delete user']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    </div>
                    <div class="side-menu__title">
                        Authentication
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                            <div class="side-menu__title"> Users </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i class="fa fa-key" aria-hidden="true"></i> </div>
                            <div class="side-menu__title"> Roles </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.permission.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i class="fa fa-key" aria-hidden="true"></i> </div>
                            <div class="side-menu__title"> Permissions </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif


        {{-- Members Management --}}
        @if ($authUser->hasAnyPermission(['create membership', 'list membership']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-users" aria-hidden="true"></i> </div>
                    <div class="side-menu__title"> Members <i data-feather="chevron-down"
                            class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    {{-- @if ($authUser->can('create membership')) --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.member.create') }}" class="side-menu">
                            <div class="side-menu__icon"> <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                            <div class="side-menu__title"> Register New Member </div>
                        </a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if ($authUser->can('list membership')) --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.member.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i class="fa fa-server" aria-hidden="true"></i>
                            </div>
                            <div class="side-menu__title"> Registered Members </div>
                        </a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if ($authUser->can('list membership')) --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.member.getApprovedMembers') }}" class="side-menu">
                            <div class="side-menu__icon">
                                <i class="fa fa-server" aria-hidden="true"></i>
                            </div>
                            <div class="side-menu__title"> Approved Members </div>
                        </a>
                    </li>
                    {{-- @endif --}}
                </ul>
            </li>
        @endif

        @if ($authUser->hasAnyPermission(['list appsettings', 'list companydetails', 'list slider']))
            {{-- App Settings --}}
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-cog" aria-hidden="true"></i> </div>
                    <div class="side-menu__title"> Settings <i data-feather="chevron-down"
                            class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('list appsettings'))
                        <li class="nav-item">
                            <a href="{{ route('admin.home.app-setting.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> App Settings </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list companydetails'))
                        <li class="nav-item">
                            <a href="{{ route('admin.home.company-details.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-building" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Company Details </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list slider'))
                        <li class="nav-item">
                            <a href="{{ route('admin.home.slider.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-sliders" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Slider </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if ($authUser->hasAnyPermission(['list popupnotice', 'list bulkmessage']))
            {{-- Notices and Messages --}}
            <li class="nav-item">
                <a href="javascript:;" class="side-menu ">
                    <div class="side-menu__icon"> <i class="fa fa-cog" aria-hidden="true"></i> </div>
                    <div class="side-menu__title"> Notice and Messages <i data-feather="chevron-down"
                            class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="collapse">
                    @if ($authUser->can('list popupnotice'))
                        <li class="nav-item">
                            <a href="{{ route('admin.popup-notice.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Pop up Notices </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->can('list bulkmessage'))
                        <li class="nav-item">
                            <a href="{{ route('admin.home.company-details.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-building" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Bulk Messages </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</nav>
<!-- END: Side Menu -->

@push('script')
    <script>
        $(document).ready(function() {
            sidebarAddActive();
        });

        function sidebarAddActive() {
            let full_url = window.location.href;
            let $navLinks = $(".nav-sidebar .nav-item a");
            let $currentPageLink = $navLinks.filter(function() {
                return $(this).attr('href') === full_url;
            });
            if (!$currentPageLink.length > 0) {
                $currentPageLink = $navLinks.filter(function() {
                    if ($(this).attr('href').startsWith(full_url)) {
                        console.log('This Href : ' + $(this).attr('href'), );
                        console.log('Full URL : ' + full_url);
                        return true;
                    }
                    if (full_url.startsWith($(this).attr('href'))) {
                        return true;
                    }
                    return false;
                });
            }
            $currentPageLink.closest('a').addClass('side-menu--active side-menu--open');
            $currentPageLink.each(function() {
                $(this).addClass('side-menu--active');
            });
        }
    </script>
@endpush
