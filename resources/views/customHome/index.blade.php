@extends('layouts.customHome')

@section('title')
    {{ isset($appSetting->site_title) ? $appSetting->site_title : __('base.title') }}
@endsection


@section('content')

    @include('customHome.partials.__slider')

    <section class="news section-gap light-bg">
        <div class="container">
            <div class="main-title">
                <h2 class="section-title">
                    एमाले आज
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 ">
                    <div class="card-wrap">
                        <a href="news/1440.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/tZoEIcDpfTEczXsAofMVSMZqDL0TOHlpZeMFeHS2ccc7.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=cd8291811a77304ba48e64322538ad860c6e9a234317299cddadcddb2aaea830"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    उपनिर्वाचनमा एमाले उम्मेदवारलाई विजयी बनाई विकास अभियानमा साथ दिन अध्यक्ष ओलीको
                                    आग्रह
                                </h1>
                                <p class="card-text">



                                    बारा । नेकपा (एमाले) का अध्यक्ष केपी शर्मा ओलीले देशको विकास एमाले नेतृत्वको
                                    सरकारबाट मात्र सम्भव रहेको बताउनुभएको छ । प्रतिनिधि सभा सदस्यका लाग...


                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card-wrap">
                        <a href="news/1439.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/jveX6Ss39fMgIfyFFEKECzRa0bt7HCMAotym7ZtQbf37.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=2a183b3be0f7f1b67e838e43d340b1e9946db5b7515d6ccec5924c1086104d2b"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    मिसन ग्रासरुट सकिएपछि पनि निरन्तर पार्टी काममा लाग्न कार्यकर्तालाई महासचिवको
                                    निर्देशन
                                </h1>
                                <p class="card-text">

                                    बुटवल । नेकपा (एमाले) का महासचिव शंकर पोखरेलले पार्टीले सञ्चालन गरेको मिसन ग्रासरुट
                                    (पार्टी सुदृढीकरण तथा विस्तार अभियान) ले पार्टीभित्र शक्ति प्राप...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="news/1438.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/95aRbG0fdyBvPeXIS3dBmpuLCSN5MOMJMj3jD47lb4fd.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=f841bd0a7dd35e8e96877238c78c95f66f5f426b629d44bbbca4e65c865b4f42"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    मिसन ग्रासरुट प्रतिवेदनबाट पार्टीको नीति निर्माणमा सहयोग पुग्ने विश्वास
                                </h1>
                                <p class="card-text">


                                    बुटवल । नेपाल कम्युनिष्ट पार्टी (एमाले) लुम्विनी प्रदेश संगठन कमिटीको मिसन
                                    ग्रासरुटको दुई दिने समीक्षा बैठक पुष्पलाल स्मृति भवन बुटवलमा बुधबारदेखि...


                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="news/1436.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/xdasKqfdkc3YpeV366grqdns3vvUfTqDPQYwjXli4367.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=a02b11a939ecd9ec215b85f70cbf46a6f92705dc0a8eb06abf20d292bd7bd4c4"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    महिलाको अधिकार र सम्मानका लागि काम गर्ने एमालेका उम्मेदवारलाई विजयी बनाउन आग्रह
                                </h1>
                                <p class="card-text">



                                    चितवन । नेकपा (एमाले) की सचिव पद्मा अर्यालले महिलालाई माथि उठाउने, सम्मान गर्ने
                                    एकमात्र पार्टी नेकपा (एमाले) भएको बताउँदै महिला दिदीबहिनीहरूलाई...


                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="news/1434.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/0dSpniD65Fg1Djhk8nUaKl3dl8GG1ZULTlw6ZLwY964c.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=e6aba24ea9fac691ed8ca5f803eddb855926f16c6b409d21eac88140f0d107fc"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    कर्णाली प्रदेशको समीक्षा बैठक सम्पन्न
                                </h1>
                                <p class="card-text">


                                    सुर्खेत । नेकपा (एमाले) को मिसन ग्रासरुट (संगठन सुदृढीकरण तथा विस्तार अभियान) को
                                    कर्णाली प्रदेशस्तरीय दुई दिने समीक्षा बैठक आज सुर्खेतमा सम्पन्न भ...


                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card-wrap">
                        <a href="news/1433.html">
                            <div class="card-img h-300">
                                <img src="../fileswarehouse.com/cpn-uml/news/tkcQcrByP6T6ZhYNL045DdW2ZUVyWor1K6OZfBou9527.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=bdd81039b3b09d02242668b5580711124a5511904d44317acb1def4b7e497c57"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="card-content">
                                <h1 class="card-title mb-2">
                                    . नेता जङ्गली एमालेमा
                                </h1>
                                <p class="card-text">
                                    पोखरा । नेकपा एकीकृत समाजवादी परित्याग गर्नुभएका स्थायी कमिटी सदस्य चुडामणि जङ्गली
                                    नेकपा (एमाले) मा फर्किनुभएको छ । नेकपा (एमाले) का स्थायी कमिटी सदस्...
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>





        </div>
    </section>


    <section class="videos section-gap bg-dark">
        <div class="container">
            <div class="main-title border-bottom-white d-flex
                justify-content-between">
                <h2 class="section-title text-white" onclick="location.href='videos.html'"
                    style="cursor:
                    pointer">
                    भिडियो
                </h2>
                <div class="">
                    <a href="videos.html" class="read-more float-end
                        text-white">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-6">
                    {{-- <iframe width="100%" height="360" title="YouTube video
                        player"
                        src="https://www.facebook.com/plugins/video.php?height=476&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcommunistpartynepal%2Fvideos%2F927596615224753%2F&amp;show_text=false&amp;width=476&amp;t=0"
                        frameborder="0"
                        allow="accelerometer; autoplay;
                        clipboard-write;
                        encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe> --}}
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/WWJ5Py8Pt-c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    {{-- <iframe width="100%" height="360" title="YouTube video
                        player"
                        src="https://www.youtube.com/embed/MvAInKuafh8" frameborder="0"
                        allow="accelerometer; autoplay;
                        clipboard-write;
                        encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe> --}}
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/ChdaOos_0eY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="videos section-gap bg-white">
        <div class="container">
            <div class="main-title d-flex justify-content-between">
                <h2 class="section-title" onclick="location.href='suryakhabar.html'" style="cursor: pointer">
                    सुर्य खबर
                </h2>
                <div class="">
                    <a href="suryakhabar.html" class="read-more float-end">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-6">
                    <iframe width="100%" height="700" title="YouTube video
                        player"
                        src="https://www.facebook.com/plugins/video.php?height=476&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcommunistpartynepal%2Fvideos%2F607280451052292%2F&amp;show_text=false&amp;width=380&amp;t=0"
                        frameborder="0"
                        allow="accelerometer; autoplay;
                        clipboard-write;
                        encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="col-md-6">
                    <iframe width="100%" height="700" title="YouTube video
                        player"
                        src="https://www.facebook.com/plugins/video.php?height=476&amp;href=https%3A%2F%2Fwww.facebook.com%2Fcommunistpartynepal%2Fvideos%2F158479110496866%2F&amp;show_text=false&amp;width=380&amp;t=0"
                        frameborder="0"
                        allow="accelerometer; autoplay;
                        clipboard-write;
                        encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
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
                    <a href="news.html" class="read-more float-end">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-5">
                    <a href="news/1429.html">
                        <div class="card-banner">
                            <img src="../fileswarehouse.com/cpn-uml/news/7fCFpU7vD4xdStGQCz6peJ8fkl9UlxwAtQlqEgiPa4ca.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=40cf4798fc428dbb25dbe5fdf52707de3d59b37481aadce41cb59f0cab5b10e7"
                                alt="cpnuml" class="img-fluid">
                            <h1 class="card-title mt-3">
                                मिसन ग्रासरुटः कर्णाली प्रदेशस्तरीय समीक्षा बैठक सुरु
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="row gy-2">
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/gZUeP1ESRpFOrbu2yFQO6V8XnqrdUlr2ZP2sqgLH88d0.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=42f5c63c52005ccbe1c48da083f0c745c536d69fbbd267f7d3e2f3ac8fa54fa1"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1428.html">
                                            प्रमुख दलका शीर्ष नेताहरूको बैठक
                                            सम्पन्न
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/DxavIgh0yB2ODRpydPC6RCAuDisFXzE1UUWTgiqf664c.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=4bbe18218a5e54a9f0e4139eabc4ca068894d9a0b5177c480ecefa4554cd6375"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1427.html">
                                            मोरङको पथरी शनिश्चरेमा १०२
                                            जनालाई सम्मान
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/QzwWbYBuXoruB8tSf5uzo3YBSZZATQffUFzPZ18xb270.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=ef1a0781be0702faa2f82d9f6ffe0f6d79bb4315d916a73c34cd9e0e4822d1ea"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1426.html">
                                            प्युठानको झिमरूकमा भलिबल
                                            प्रतियोगिता
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/VQZucNGnX7WwtKGTa7htvjczn6RsKkhPUXt3kUsj274c.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=6b0ba717acd5af7d9399f166b9974bed6e80b6f7f8f1ea0485080259fa1efa70"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1425.html">
                                            वैचारिक क्षेत्रको कामलाई विशेष
                                            ध्यान दिन आग्रह
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/vtcYqwt3YuEpz42JId5AcRUoBgQO0AsNdPaB09MGeca3.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=1b69d5e96d0acfc32eeb54e48184c34a57f3446e504ad7b4220076b07872425c"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1424.html">
                                            मुलुक जोगाउन एमाले बलियो
                                            हुनुपर्छः बिष्ट
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/hegzmjQs6eQBCBrH3M4znGWrpc9ZwAJealuXZN1ef79b.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=b1e526cce27c8cc3b1589c48e6234835c75d6693632e290337fd58f63b30606f"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1423.html">
                                            सामाजिक सुरक्षा भत्ता नरोक्न
                                            आग्रह
                                        </a>
                                    </h1>
                                </div>
                            </div>
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
                    मिशन ग्रास रूट
                </h2>
                <div class="">
                    <a href="news.html" class="read-more float-end">
                        थप पढ्नुहोस्</a>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-5">
                    <a href="news/1439.html">
                        <div class="card-banner">
                            <img src="../fileswarehouse.com/cpn-uml/news/jveX6Ss39fMgIfyFFEKECzRa0bt7HCMAotym7ZtQbf37.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=2a183b3be0f7f1b67e838e43d340b1e9946db5b7515d6ccec5924c1086104d2b"
                                alt="cpnuml" class="img-fluid">
                            <h1 class="card-title mt-3">
                                मिसन ग्रासरुट सकिएपछि पनि निरन्तर पार्टी काममा लाग्न कार्यकर्तालाई महासचिवको निर्देशन
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="row gy-2">
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/95aRbG0fdyBvPeXIS3dBmpuLCSN5MOMJMj3jD47lb4fd.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=f841bd0a7dd35e8e96877238c78c95f66f5f426b629d44bbbca4e65c865b4f42"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1438.html">
                                            मिसन ग्रासरुट प्रतिवेदनबाट
                                            पार्टीको नीति निर्माणमा सहयोग
                                            पुग्ने विश्वास
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/f1ntEQiLCm2EVh91cpafl70wTd6QmI48b9rSQcUk2870.png?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=cca2c0ceed7af95dbd0fc1f328e72deb6dfb063820d78f79bc75f7777b11dc2f"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1435.html">
                                            नेपोन केन्द्रीय कमिटीको वैठक तथा
                                            प्रशिक्षण कार्यक्रम
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/0dSpniD65Fg1Djhk8nUaKl3dl8GG1ZULTlw6ZLwY964c.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=e6aba24ea9fac691ed8ca5f803eddb855926f16c6b409d21eac88140f0d107fc"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1434.html">
                                            कर्णाली प्रदेशको समीक्षा बैठक
                                            सम्पन्न
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/7fCFpU7vD4xdStGQCz6peJ8fkl9UlxwAtQlqEgiPa4ca.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=40cf4798fc428dbb25dbe5fdf52707de3d59b37481aadce41cb59f0cab5b10e7"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1429.html">
                                            मिसन ग्रासरुटः कर्णाली
                                            प्रदेशस्तरीय समीक्षा बैठक सुरु
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/DxavIgh0yB2ODRpydPC6RCAuDisFXzE1UUWTgiqf664c.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=4bbe18218a5e54a9f0e4139eabc4ca068894d9a0b5177c480ecefa4554cd6375"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1427.html">
                                            मोरङको पथरी शनिश्चरेमा १०२
                                            जनालाई सम्मान
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card-wrap-small">
                                <div class="card-image">
                                    <img src="../fileswarehouse.com/cpn-uml/news/QzwWbYBuXoruB8tSf5uzo3YBSZZATQffUFzPZ18xb270.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=ef1a0781be0702faa2f82d9f6ffe0f6d79bb4315d916a73c34cd9e0e4822d1ea"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h1 class="card-title">
                                        <a href="news/1426.html">
                                            प्युठानको झिमरूकमा भलिबल
                                            प्रतियोगिता
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--MESSAGE FROM-->
    <section class="section-gap light-bg">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12 col-lg-5">
                    <a href="#">
                        <div class="img-section">
                            <img src="../fileswarehouse.com/cpn-uml/website/OaIvrhapznp2dDHE5AEQEffLOd2uvIFnIZ8ozkjdb430.jpg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=SDDK3YIDD6U0DLO3AEYN%2F20230421%2Fus-west-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230421T144030Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=86400&amp;X-Amz-Signature=4ef844173ea0b6f75429fdfb8f333c7bb7c2f84b13af681fb1b49b027c5d49d4"
                                alt="cpnuml">
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

    <section class="section-gap">
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
    </section>

    {{-- Contact Section  --}}
    @include('customHome.partials.__contact')
@endsection


@section('script')
@endsection
