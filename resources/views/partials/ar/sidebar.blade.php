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
                <div class="side-menu__icon"> <i class="fa fa-home" aria-hidden="true"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        {{-- cms  --}}
        @if (
            $authUser->hasAnyPermission([
                'list newspost',
                'list blogpost',
                'list thought',
                'list event',
                'list document',
                'list library',
            ]))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                    <div class="side-menu__title"> CMS
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{--  News  --}}
                    @if ($authUser->hasAnyPermission(['list newspost']))
                        <li class="nav-item">
                            <a href="{{ route('admin.news.post.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> News </div>
                            </a>
                        </li>
                    @endif
                    {{--  Blogs  --}}
                    @if ($authUser->hasAnyPermission(['list blogpost']))
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.post.index') }}" class="side-menu ">
                                <div class="side-menu__icon"> <i class="fa fa-rss" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Blogs
                                </div>
                            </a>
                        </li>
                    @endif
                    {{-- Thoughts --}}
                    @if ($authUser->hasAnyPermission(['list thought']))
                        <li class="nav-item">
                            <a href="{{ route('admin.thought.index') }}" class="side-menu ">
                                <div class="side-menu__icon"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Thoughts
                                </div>
                            </a>
                        </li>
                    @endif
                    {{-- Sayings --}}
                    @if ($authUser->hasAnyPermission(['list saying']))
                        <li class="nav-item">
                            <a href="{{ route('admin.saying.index') }}" class="side-menu ">
                                <div class="side-menu__icon"> <i class="fa fa-quote-left" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Statements
                                </div>
                            </a>
                        </li>
                    @endif
                    {{-- Events --}}
                    @if ($authUser->hasAnyPermission(['list event']))
                        <li class="nav-item">
                            <a href="{{ route('admin.event.index') }}" class="side-menu ">
                                <div class="side-menu__icon"> <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Events
                                </div>
                            </a>
                        </li>
                    @endif
                    {{-- Documents --}}
                    @if ($authUser->hasAnyPermission(['list document']))
                        <li class="nav-item">
                            <a href="{{ route('admin.document.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Documents
                                </div>
                            </a>
                        </li>
                    @endif
                    {{-- Library --}}
                    @if ($authUser->hasAnyPermission(['list library']))
                        <li class="nav-item">
                            <a href="{{ route('admin.library.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-book" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Libraries
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- content pages  --}}
        @if ($authUser->hasAnyPermission(['list history']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="package"></i> </div>
                    <div class="side-menu__title"> Content Pages
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{-- History  --}}
                    @if ($authUser->hasAnyPermission(['list history']))
                        <li class="nav-item">
                            <a href="{{ route('admin.history.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-history" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> History </div>
                            </a>
                        </li>
                    @endif
                    {{-- Parliament  --}}
                    @if ($authUser->hasAnyPermission(['list parliament']))
                        <li class="nav-item">
                            <a href="{{ route('admin.parliament.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Parliament </div>
                            </a>
                        </li>
                    @endif
                    {{-- Goverment  --}}
                    @if ($authUser->hasAnyPermission(['list goverment']))
                        <li class="nav-item">
                            <a href="{{ route('admin.goverment.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-institution" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Goverment </div>
                            </a>
                        </li>
                    @endif

                    {{-- Mass Organization  --}}
                    @if ($authUser->hasAnyPermission(['list massorganization']))
                        <li class="nav-item">
                            <a href="{{ route('admin.mass-organization.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-institution" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Mass Organization </div>
                            </a>
                        </li>
                    @endif


                </ul>
            </li>
        @endif

        {{-- Leadership  --}}
        @if ($authUser->hasAnyPermission(['list leadership', 'list teammember']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="command"></i> </div>
                    <div class="side-menu__title"> Leadership
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{-- Team Member  --}}
                    @if ($authUser->hasAnyPermission(['list teammember']))
                        <li class="nav-item">
                            <a href="{{ route('admin.team-member.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-users" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Team Member </div>
                            </a>
                        </li>
                    @endif
                    {{-- Committee --}}
                    @if ($authUser->hasAnyPermission(['list leadership']))
                        <li class="nav-item">
                            <a href="{{ route('admin.leadership.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-leanpub" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Leadership </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Gallery  --}}
        @if ($authUser->hasAnyPermission(['list youtubevideo']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="image"></i> </div>
                    <div class="side-menu__title"> Gallery
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{-- Youtube Video --}}
                    @if ($authUser->hasAnyPermission(['list youtubevideo']))
                        <li class="nav-item">
                            <a href="{{ route('admin.youtube-video.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Youtube Video </div>
                            </a>
                        </li>
                    @endif

                    {{-- Facebook Video --}}
                    @if ($authUser->hasAnyPermission(['list facebookvideo']))
                        <li class="nav-item">
                            <a href="{{ route('admin.facebook-video.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Facebook Video </div>
                            </a>
                        </li>
                    @endif

                    {{-- Twitter Video --}}
                    @if ($authUser->hasAnyPermission(['list twittervideo']))
                        <li class="nav-item">
                            <a href="{{ route('admin.twitter-video.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-twitter" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Twitter Post </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Members  --}}
        @if ($authUser->hasAnyPermission(['list membership']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="image"></i> </div>
                    <div class="side-menu__title"> Members
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{-- Membership --}}
                    @if ($authUser->hasAnyPermission(['list membership']))
                        <li class="nav-item">
                            <a href="{{ route('admin.member.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-server" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title">Registered Members </div>
                            </a>
                        </li>
                    @endif
                    @if ($authUser->hasAnyPermission(['list membership']))
                        <li class="nav-item">
                            <a href="{{ route('admin.member.getApprovedMembers') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-server" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Approved Members </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Pop Up Notice --}}
        @if ($authUser->hasAnyPermission(['list popupnotice']))
            <li class="nav-item">
                <a href="{{ route('admin.popup-notice.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    </div>
                    <div class="side-menu__title"> Notices Board </div>
                </a>
            </li>
        @endif

        {{-- Bulk Messages --}}
        @if ($authUser->hasAnyPermission(['list bulkmessage']))
            <li class="nav-item">
                <a href="{{ route('admin.bulk-message.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                    <div class="side-menu__title"> SMS System </div>
                </a>
            </li>
        @endif


        @if ($authUser->hasAnyPermission(['list slider', 'list appsettings', 'list companydetails']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="shield"></i> </div>
                    <div class="side-menu__title"> Administration
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>

                    {{-- Donation  --}}
                    @if ($authUser->hasAnyPermission(['list donation']))
                        <li class="nav-item">
                            <a href="{{ route('admin.donation.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-institution" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Donation </div>
                            </a>
                        </li>
                    @endif

                    {{-- Sliders --}}
                    @if ($authUser->hasAnyPermission(['list slider']))
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-sliders" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Slider </div>
                            </a>
                        </li>
                    @endif

                    {{-- Company Details --}}
                    @if ($authUser->hasAnyPermission(['list companydetails']))
                        <li class="nav-item">
                            <a href="{{ route('admin.company-details.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-building" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> Company Details </div>
                            </a>
                        </li>
                    @endif

                    {{-- App setting --}}
                    @if ($authUser->hasAnyPermission(['list appsettings']))
                        <li class="nav-item">
                            <a href="{{ route('admin.app-setting.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                </div>
                                <div class="side-menu__title"> App Setting </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        @if ($authUser->hasAnyPermission(['list user', 'list role', 'list permission']))
            <li class="nav-item">
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                    <div class="side-menu__title"> Authentication
                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                    </div>
                </a>
                <ul>
                    {{-- Users --}}
                    @if ($authUser->hasAnyPermission(['list user']))
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Users </div>
                            </a>
                        </li>
                    @endif

                    {{-- Roles --}}
                    @if ($authUser->hasAnyPermission(['list role']))
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-key" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Roles </div>
                            </a>
                        </li>
                    @endif

                    {{-- Permissions --}}
                    @if ($authUser->hasAnyPermission(['list permission']))
                        <li class="nav-item">
                            <a href="{{ route('admin.permission.index') }}" class="side-menu">
                                <div class="side-menu__icon"> <i class="fa fa-lock" aria-hidden="true"></i> </div>
                                <div class="side-menu__title"> Permissions </div>
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
            $currentPageLink.closest('ul').addClass('side-menu__sub-open');
            $currentPageLink.closest('ul').siblings('a').addClass('side-menu--active');
            $currentPageLink.each(function() {
                $(this).addClass('side-menu--active');
            });
        }
    </script>
@endpush
