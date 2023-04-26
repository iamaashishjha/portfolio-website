@extends('layouts.customHome')

@section('title')
    {{ isset($appSetting->site_title) ? $appSetting->site_title : __('base.title') }}
@endsection


@section('content')
    @include('customHome.partials.__slider')


    <!--MESSAGE FROM-->
    <section class="section-gap light-bg">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12 col-lg-5">
                    <a href="#">
                        <div class="img-section">
                            <img src="" alt="cpnuml">
                            <div class="text-center">
                                <h1 class="text-title mt-3">केपी शर्मा ओली
                                </h1>
                                <span class="text-title-small">अध्यक्ष</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="content-section">
                        <h3 class="mb-5">
                            मिसन ग्रासरूटमा सक्रियतासाथ जुटौं
                        </h3>
                        <p>
                        <p>अहिले हाम्रो पार्टीले विशेष अभियान&ndash; मिसन ग्रासरुट (पार्टी सुदृढीकरण तथा विस्तार अभियान)
                            सञ्चालन गरिरहेको छ । गत फागुन ५ गतेबाट औपचारिक रूपमा सुरु भएको यो अभियान, पार्टी सुदृढीकरण
                            तथा विस्तार अभियान हो । यो अभियान ७५३
                            वटै पालिकामा केन्द्रित छ र वडा तहसम्म नै विभिन्न क्रियाकलापहरू सञ्चालन भइरहेका छन् ।&nbsp;
                            <br />यो अभियानमा स्थायी कमिटीका सदस्यहरूलाई अनुगमनको जिम्मेवारी दिइएको छ । भूगोल, विभाग र
                            फाँटहरूको जिम्मेवारीमा रहेका पोलिटव्यूरो तथा केन्द्रीय कमिटीका सदस्यहरू अभियानमा केन्द्रीय
                            प...
                        </p>
                        <div class="mt-3">
                            <a href="president-message.html" class="btn
                                    theme-btn">
                                <span>
                                    थप पढ्नुहोस्
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-gap">
        <div class="container">
            <div class="main-title d-flex justify-content-between">
                <h2 class="section-title">
                    समाचार
                </h2>
                <div class="">
                    <a href="{{ route('home.news.index') }}" class="read-more float-end">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-5">
                    <a href="{{ route('home.news.show', $latestNewsPost->id) }}">
                        <div class="card-banner">
                            <img src="{{ $latestNewsPost->image }}" alt="{{ $latestNewsPost->title }}" class="img-fluid">
                            <h1 class="card-title mt-3">
                                {{ $latestNewsPost->title }}
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="row gy-2">
                        @foreach ($exceptLatestNews as $news)
                            <div class="col-md-6 col-6">
                                <div class="card-wrap-small">
                                    <div class="card-image">
                                        <img src="{{ $news->image }}" alt="{{ $news->title }}" class="img-fluid">
                                    </div>
                                    <div class="ms-2 my-auto">
                                        <h1 class="card-title">
                                            <a href="{{ route('home.news.show', $news->id) }}">
                                                {{ $news->title }}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="videos section-gap bg-dark">
        <div class="container">
            <div class="main-title border-bottom-white d-flex
                justify-content-between">
                <h2 class="section-title text-white" onclick="location.href='{{ route('home.video.index') }}'"
                    style="cursor:
                    pointer">
                    भिडियो
                </h2>
                <div class="">
                    <a href="{{ route('home.video.index') }}" class="read-more float-end text-white">
                        थप पढ्नुहोस्
                    </a>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($youtubeVideos as $video)
                    <div class="col-md-6">
                        {!! $video->iframe !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="news bichar section-gap">
        <div class="container">
            <div class="main-title d-flex justify-content-between">
                <h2 class="section-title text-left">
                    विचार
                </h2>
                <div class="">
                    <a href="bichars.html" class="read-more float-end">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="bichars/19.html">
                            <div class="card-img">
                                <img src="../fileswarehouse.com/cpn-uml/bichars/epaGOpxbbZeoSidhBEAM9SMEi5vhQVL2vMMFOIBJe353.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=4e50f6787dc56386afc0160145a6b42a01013ae234f0daaf04db23cdcdf60a4d"
                                    alt="cpnuml" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    ‘दश वर्षभित्रै हामी देशलाई विकसित बनाउँछौं’
                                </h1>
                                <p class="card-text">
                                    सम्माननीय सभामुख महोदय,१. सार्वभौम मताधिकार प्रयोग गरी आफ्ना प्रतिनिधिको निर्वाचन
                                    गर्न पाउने जनाधिका...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="bichars/18.html">
                            <div class="card-img">
                                <img src="../fileswarehouse.com/cpn-uml/bichars/eCfvVXlH0X8RHJR4HgajrHkSGGgFpvvhCPUjGec8f812.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=6bfb32c8aab184e84d4dbb2c43c656b68bc7f9c27a33445e8acfda2c9afc44e3"
                                    alt="cpnuml" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    ‘अर्थतन्त्र जोगाउन पनि अहिलेको जनादेश जोगाउनु उपयु...
                                </h1>
                                <p class="card-text">
                                    नेकपा (एमाले) का उपमहासचिव विष्णु रिमालसँग लोकान्तरका लागि सुशील पन्त र रमेश
                                    सापकोटाले गर्नुभएको कुर...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="bichars/17.html">
                            <div class="card-img">
                                <img src="../fileswarehouse.com/cpn-uml/bichars/whUKCyAiFjYxYWcDFgsaO1c8aXCl0qlYXXsezpJva352.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=91da435a03153f8cc686b9396d133a3bf17db44508ec2bf540f7abecde235b24"
                                    alt="cpnuml" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    सरकारको न्यूनतम साझा कार्यक्रम
                                </h1>
                                <p class="card-text">
                                    प्रस्तावना प्रतिनिधि सभा तथा प्रदेश सभाको निर्वाचन, २०७९ मा अभिव्यक्त सार्वभौमसत्ता
                                    सम्पन्न नेपाली ज...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="bichars/16.html">
                            <div class="card-img">
                                <img src="../fileswarehouse.com/cpn-uml/bichars/xLLSsvFXjn9kENphGMA1MEVO7rsAzztoiiT0LlH96046.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=b67c78d1700e19ddbd9dcd3c9a19182ed68f1d0b5468fe03dc62553beaa6b9bc"
                                    alt="cpnuml" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    देशका लागि सँगै काम गरौं ! केपी शर्मा ओली, अध्यक्ष
                                </h1>
                                <p class="card-text">
                                    माननीयसभाध्यक्षज्यू,संविधान जारी भएपछि दोस्रो आमनिर्वाचनबाट निर्वाचित प्रतिनिधि
                                    सभाको पहिलो बैठकमा ह...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <iframe
                                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcommunistpartynepal&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                                width="350" height="400" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowfullscreen="true"
                                allow="autoplay;
                                    clipboard-write; encrypted-media;
                                    picture-in-picture; web-share"></iframe>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a class="twitter-timeline" data-height="400"
                                href="https://twitter.com/umlcpn?ref_src=twsrc%5Etfw">Tweets
                                by umlcpn</a>
                            <script async src="../platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="main-title text-center">
                        <h2 class="section-title-publication
                                text-center">
                            पार्टी प्रकाशनहरु (पुस – चैत २०७८)
                        </h2>
                    </div>
                    <div class="card-banner">
                        <a
                            href="https://system.cpnuml.org/parse-image/954?hash=$2y$10$lSbv1k1IQ2/spE8lHTIPiO71yDjDK1tj8ABbgPErpVYoIVFAyeCfm">
                            <img src="../fileswarehouse.com/cpn-uml/website/s7w0aqJ96BKmCCu7wKJ2PXO1qgXwYeNLFbSX7IEj0c07.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=6576e2af4d71837bd00248151b64eefb5e7b59e0450391107359f0f678648193"
                                alt="" class="img-fluid">
                        </a>
                        <div class="row mt-3">
                            <div class="col-md-8 my-auto col-12">
                                <h1 class="card-title">
                                    &quot;नेपाल कम्युनिष्ट पार्टी (एमाले) को केन्द्रिय कमिटिको राजनीतिक पत्रिका&quot;
                                </h1>
                            </div>
                            <div class="col-md-4 col-12">
                                <a href="publications.html"
                                    class="btn
                                        theme-btn"><span>थप
                                        हेर्नुहोस्</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Contact Section  --}}
    @include('customHome.partials.__contact')
@endsection


@section('script')
@endsection
