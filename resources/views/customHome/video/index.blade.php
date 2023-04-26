@extends('layouts.customHome')

@section('title')
    {{ isset($appSetting->site_title) ? $appSetting->site_title : __('base.title') }}
@endsection


@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="main-title">
                <h2 class="section-title">
                    Videos
                </h2>
            </div>
            <div class="row g-4">
                @foreach ($youtubeVideos as $yv)
                    <div class="col-md-6 col-lg-3">
                        <div class="">
                            {!! $yv->iframe !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                <ul class="pagination justify-content-center">
                    <nav>
                        <ul class="pagination">

                            <li class="page-item disabled" aria-disabled="true"
                                aria-label="&laquo;
                                Previous">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="videos4658.html?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="videos9ba9.html?page=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="videosfdb0.html?page=4">4</a></li>
                            <li class="page-item"><a class="page-link" href="videosaf4d.html?page=5">5</a></li>
                            <li class="page-item"><a class="page-link" href="videosc575.html?page=6">6</a></li>
                            <li class="page-item"><a class="page-link" href="videos235c.html?page=7">7</a></li>
                            <li class="page-item"><a class="page-link" href="videosfdfa.html?page=8">8</a></li>
                            <li class="page-item"><a class="page-link" href="videos0b08.html?page=9">9</a></li>
                            <li class="page-item">
                                <a class="page-link" href="videos4658.html?page=2" rel="next"
                                    aria-label="Next &raquo;">&rsaquo;</a>
                            </li>
                        </ul>
                    </nav>
                </ul>
            </div>
        </div>
    </section>


    {{-- Contact Section  --}}
    @include('customHome.partials.__contact')
@endsection


@section('script')
@endsection
