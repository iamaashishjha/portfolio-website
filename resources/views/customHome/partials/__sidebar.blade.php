<div id="mySidebar" class="sidebar">
    <div class="padding-sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('home.about') }}" class="nav-link-menu">
            {{ isset($appSetting->site_title) ? $appSetting->site_title : 'Nagrik Unmukti Party' }}
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
            <a href="{{ route('home.member.create') }}" class="dropdown-btn">{{ __('home.header.join') }}
            </a>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">नेतृत्व
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    केन्द्रीय सचिवालय
                </a>
                <a href="javascript:;">
                    केन्द्रीय कार्यालय
                </a>
                <a href="javascript:;">
                    स्थायी कमिटी
                </a>
                <a href="javascript:;">
                    पोलिटव्युरो
                </a>
                <a href="javascript:;">
                    केन्द्रीय कमिटी
                </a>
                <a href="javascript:;">
                    केन्द्रीय अनुशासन आयोग
                </a>
                <a href="javascript:;">
                    केन्द्रीय लेखा आयोग
                </a>
                <a href="javascript:;">
                    केन्द्रीय निर्वाचन आयोग
                </a>
                <a href="javascript:;">
                    केन्द्रीय सल्लाहकार परिषद्
                </a>
                <a href="javascript:;">
                    केन्द्रीय विभागहरु
                </a>
                <a href="javascript:;">
                    प्रदेश कमिटी नेतृत्व
                </a>
                <a href="javascript:;">
                    जिल्ला कमिटी नेतृत्व
                </a>
                <a href="javascript:;">
                    महाधिवशन प्रतिनिधि परिषद्
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">इतिहास
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    नागरिक उन्मुक्ति पार्टीको स्थापना
                </a>
                <a href="javascript:;">
                    पहिलो महाधिवेशन
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">संसद
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    प्रतिनिधि सभा
                </a>
                <div>
                    <a href="javascript:;" class="ms-3">
                        २०१५
                    </a>

                </div>
                <a href="javascript:;">
                    राष्ट्रिय सभा
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">सरकार
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    नागरिक उन्मुक्ति पार्टी सम्मिलित सरकारहरु
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">प्रदेश सरकार/सभा
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#">
                    प्रदेश सरकारहरु
                </a>
                <div>
                    <a href="javascript:;" class="ms-3">
                        प्रदेश १
                    </a>
                    <a href="javascript:;" class="ms-3">
                        बागमती प्रदेश
                    </a>
                    <a href="javascript:;" class="ms-3">
                        गण्डकी प्रदेश
                    </a>
                    <a href="javascript:;" class="ms-3">
                        लुम्बिनी प्रदेश
                    </a>
                    <a href="javascript:;" class="ms-3">
                        कर्णाली प्रदेश
                    </a>
                    <a href="javascript:;" class="ms-3">
                        सुदूरपश्चिम प्रदेश
                    </a>
                    <a href="javascript:;" class="ms-3">
                        मधेश प्रदेश
                    </a>
                </div>
                <a href="javascript:;">
                    प्रदेशसभा
                </a>
            </div>
        </div>
        <div class="dropdown nav-link-menu">
            <button class="dropdown-btn">स्थानीय तह
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;" class="ms-3">
                    २०७४
                </a>
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
            <button class="dropdown-btn">वक्तव्य
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="javascript:;">
                    प्रथम विधान महाधिवेशनबाट पारित समसामयिक प्रस्तावहरु
                </a>
                <a href="javascript:;">
                    दशौँ राष्ट्रिय महाधिवेशनबाट पारित समसामयिक प्रस्ताव
                </a>
                <a href="javascript:;">
                    नयाँ वर्ष सन् २०२२ को शुभकामना
                </a>
                <a href="javascript:;">
                    परराष्ट्र मामिला विभागको वत्तव्य
                </a>
                <a href="javascript:;">
                    जानकारी तथा अनुरोध
                </a>
                <a href="javascript:;">
                    नेकपा (एमाले) को दृष्टिकोण
                </a>
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
