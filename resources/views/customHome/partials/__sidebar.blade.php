<div id="mySidebar" class="sidebar">
    <div class="padding-sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        {{-- about  --}}
        <div class="dropdown nav-link-menu">
            <a href="{{ route('home.about') }}" class="dropdown-btn">{{ __('base.title_short') }}
            </a>
        </div>

        @if (count($histories))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn"> {{ __('home.menuItems.history') }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                    <div class="dropdown-container">
                        @foreach ($histories as $history)
                        <a href="{{ route('home.history.show', $history->id) }}">
                            {{ $history->title }}
                        </a>
                        @endforeach
                    </div>
            </div>
        @endif

        {{-- Ledaerships  --}}
        @if (count($leaderships))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn"> {{ __('home.menuItems.leadership') }}
                    @if (count($leaderships))
                        <i class="fas fa-chevron-down"></i>
                    @endif
                </button>
                @if (count($leaderships))
                    <div class="dropdown-container">
                        @foreach ($leaderships as $leadership)
                            <a href="{{ route('home.leadership.show', $leadership->id) }}">
                                {{ $leadership->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        {{-- Mass organization --}}
        @if (isset($massOrganization))
            <a href="{{ route('home.mass-organization.index') }}" class="nav-link-menu">{{ __('home.menuItems.mass-organization') }}</a>
        @endif

        {{-- Membership  --}}
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">{{ __('home.menuItems.membership') }}
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('home.member.create') }}">
                    {{ __('home.menuItems.membership.create') }}
                </a>
                @if (count($approvedMembers))
                    <a href="{{ route('home.member.approved') }}">
                        {{ __('home.menuItems.membership.approved-members') }}
                    </a>
                @endif
            </div>
            </a>
        </div>

        {{-- Parliament  --}}
        @if (count($parliaments))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn">{{ __('home.menuItems.parliament') }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-container">
                    @foreach ($parliaments as $parliament)
                        <a href="{{ route('home.parliament.show', $parliament->id) }}">
                            {{ $parliament->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Goverment  --}}
        @if (count($goverments))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn">{{ __('home.menuItems.goverment') }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-container">
                    @foreach ($goverments as $goverment)
                        <a href="{{ route('home.goverment.show', $goverment->id) }}">
                            {{ $goverment->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Documents  --}}
        @if (count($documents))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn">{{ __('home.menuItems.documents') }}
                    @if (count($documents))
                        <i class="fas fa-chevron-down"></i>
                    @endif
                </button>
                @if (count($documents))
                    <div class="dropdown-container">
                        @foreach ($documents as $doc)
                            @if (isset($doc->file))
                                <a href="{{ route('home.document.show', $doc->id) }}" target="_blank">
                                    {{ $doc->title }}
                                </a>
                            @else
                                <a href="{{ $doc->url }}" target="_blank">
                                    {{ $doc->title }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        {{-- Saying  / Statements --}}
        @if (count($sayings))
            <a href="{{ route('home.saying.index') }}" class="nav-link-menu">{{ __('home.menuItems.saying') }}</a>
        @endif

        {{-- Library --}}
        @if (count($libraries))
            <a href="{{ route('home.library.index') }}" class="nav-link-menu">{{ __('home.menuItems.library') }}</a>
        @endif


        {{-- donation  --}}
        @if (isset($donation))
            
        <a href="{{ route('home.donation') }}" class="nav-link-menu">{{ __('home.menuItems.donation') }}</a>
        @endif

        {{-- Pages  --}}
        @if (count($newsPosts) || count($blogPosts) || count($thoughts) || count($events))
            <div class="dropdown nav-link-menu">
                <button class="dropdown-btn">{{ __('home.menuItems.pages') }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-container">
                    @if (count($newsPosts))
                        <a href="{{ route('home.news.index') }}">
                            {{ __('home.menuItems.posts.news') }}
                        </a>
                    @endif

                    @if (count($blogPosts))
                        <a href="{{ route('home.blogs.index') }}">
                            {{ __('home.menuItems.posts.blogs') }}
                        </a>
                    @endif

                    @if (count($thoughts))
                        <a href="{{ route('home.thoughts.index') }}">
                            {{ __('home.menuItems.thoughts') }}
                        </a>
                    @endif

                    @if (count($events))
                        <a href="{{ route('home.events.index') }}">
                            {{ __('home.menuItems.posts.events') }}
                        </a>
                    @endif
                </div>
            </div>
        @endif

        {{-- Contact  --}}
        {{-- <a href="{{ route('home.contact') }}" class="nav-link-menu">{{ __('home.menuItems.contact') }}</a> --}}
    </div>
</div>
