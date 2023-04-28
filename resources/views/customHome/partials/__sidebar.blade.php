<div id="mySidebar" class="sidebar">
    <div class="padding-sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('home.about') }}" class="nav-link-menu">
            {{ isset($appSetting->site_title) ? $appSetting->site_title : (__('base.title')) }}
        </a>
        <div class="dropdown nav-link-menu">
            <a href="{{ route('home.about') }}" class="dropdown-btn">{{ __('home.menuItems.about.about-us') }}
            </a>
        </div>
        <div class="dropdown nav-link-menu">
            <a href="{{ route('home.news.index') }}" class="dropdown-btn">{{ __('home.menuItems.posts.news') }}
            </a>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">{{ __('home.menuItems.pages') }}
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('home.events.index') }}">
                    {{ __('home.menuItems.posts.events') }}
                </a>
                <a href="{{ route('home.blogs.index') }}">
                    {{ __('home.menuItems.posts.blogs') }}
                </a>
                <a href="{{ route('home.library.index') }}">
                    {{ __('home.menuItems.library') }}
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <a href="{{ route('home.contact') }}" class="dropdown-btn">{{ __('home.menuItems.contact') }}
            </a>
        </div>
        <div class="dropdown nav-link-menu">
                <button class="dropdown-btn">{{ __('home.menuItems.membership') }}
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="{{ route('home.member.create') }}">
                        {{ __('home.menuItems.membership.create') }}
                    </a>
                    <a href="{{ route('home.member.approved') }}">
                        {{ __('home.menuItems.membership.approved-members') }}
                    </a>
                </div>
            </a>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">  {{ __('home.menuItems.leadership') }}
                @if (count($committees))
                    <i class="fas fa-chevron-down"></i>
                @endif
            </button>
            @if (count($committees))
                <div class="dropdown-container">
                    @foreach ($committees as $committee)
                        <a href="{{ route('home.committee.show', $committee->id) }}">
                            {{ $committee->title }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">{{ __('home.menuItems.history') }}
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
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">{{ __('home.menuItems.documents') }}
                @if (count($documents))
                    <i class="fas fa-chevron-down"></i>
                @endif
            </button>
            @if (count($documents))
                <div class="dropdown-container">
                    @foreach ($documents as $doc)
                        <a href="{{ $doc->url }}" target="_blank">
                            {{ $doc->title }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        
        <a href="javascript:;" class="nav-link-menu">जनसंगठन</a>

        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">{{ __('home.menuItems.thoughts') }}
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

        <a href="javascript:;" class="nav-link-menu">चुनाव विजेताहरू</a>
        <a href="javascript:;" class="nav-link-menu">विदेश नीति</a>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">मिसन ग्रासरुट
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    मिसन सम्बन्धि सामग्रिहरु
                </a>
                <div>
                    <a href="javascript:;" class="ms-3">
                        अबधारणा
                    </a>
                    <a href="javascript:;" class="ms-3">
                        जिल्ला र जिम्मेवारी
                    </a>
                    <a href="javascript:;" class="ms-3">
                        प्रशिक्षणका लागि सन्दर्भ सामग्रि
                    </a>
                    <a href="javascript:;" class="ms-3">
                        सन्दर्भ प्रकाशन
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
