@php
    
    $lang = App::getLocale();
    // dd($lang);
    if ($lang == 'en') {
        $lanImage = '/customHome/assets/img/america.svg';
        $langVal = true;
    } elseif ($lang == 'np') {
        $lanImage = '/customHome/assets/img/nepal.svg';
        $langVal = false;
    }
    
    // dd($lang, $lanImage,($lang == 'en'));
@endphp


<div class="header">
    <section class="nav-section">
        <div class="container">
            <div class="col-sm-5 ">
                <h1 class="text-title">
                    <a href="/">
                        @isset($appSetting->image)
                            <img src="{{ $appSetting->image }}"
                                alt="{{ isset($appSetting->site_title) ? $appSetting->site_title : __('base.title') }}"
                                class="img-fluid">
                        @endisset
                        <span class="ms-2">
                            {{ isset($appSetting->site_title) ? $appSetting->site_title : __('base.title') }}
                        </span>
                    </a>
                </h1>
            </div>
            <div class="col-sm-7 col-12">
                <div class="float-end float-none-sm border-top-sm">
                    <ul
                        class="list-unstyled nav-icons mb-0 pt-2 pt-0-sm
                            social-icon-header">
                        @isset($companyDetails->email_address)
                            <li>
                                <a href="mailto:{{ $companyDetails->email_address }}" target="_blank" class="icon">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        @endisset
                        <li>
                            <a href="tel:{{ $companyDetails->phone_number }}" target="_blank" class="icon">
                                <i class="fas fa-phone"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/locale') }}" onclick="event.preventDefault();document.getElementById('language-form').submit();" class="icon" id="languageBtn">
                                <img src="{{ $lanImage }}" alt="" class="flag">
                            </a>
                            <form action="{{ url('/locale') }}" method="post" id="language-form" class="d-none">
                                @csrf
                                <input type="hidden" name="locale" value="{{$langVal}}">
                            </form>
                        </li>
                        <li class="span">
                            <a href="{{ route('home.member.create') }}" target="_blank">
                                <span>नयाँ सदस्यता</span>
                            </a>
                        </li>
                        <li>
                            <button type="button" onclick="openNav()" class="navbar-toggle collapsed" id="menu-bar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            const flag = $('#languageBtn img').attr('src');
            const NepaliLang = '/customHome/assets/img/nepal.svg';
            console.log(flag, NepaliLang);

        });
        // $('#languageBtn').click(function(e) {
        //     e.preventDefault();
        //     const flag = $('#languageBtn img').attr('src');
        //     const NepaliLang = '/customHome/assets/img/nepal.svg';
        //     $.ajax({
        //         type: "POST",
        //         url: "locale",
        //         success: function(response) {
        //             if (response.success === true) {
        //                 debugger;
        //                 // window.location.reload();
        //             }
        //             debugger;
        //         }
        //     });
        //     console.log(flag, NepaliLang);
        //     debugger;
        // });
    </script>
@endpush
