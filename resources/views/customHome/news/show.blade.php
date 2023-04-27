@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-9">
                    <div class="card-wrap-section">
                        <div class="card-img mt-80-sm">
                            <img src="{{ isset($news->image) ? $news->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                alt="detail-img" class="img-fluid">
                        </div>
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $news->title }}
                            </h1>
                            <div class="social-btn-sp">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                            </div>
                            <div class="news-content mt-1 pt-3">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="row gy-4">
                        @foreach ($latestNews as $news)
                            <div class="col-md-12 col-lg-12">
                                <div class="card-wrap">
                                    <a href="{{route('home.news.show', $news->id)}}">
                                        <div class="card-img">
                                            <img src="{{ isset($news->image) ? $news->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                                alt="{{$news->title}}" class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h1 class="card-title mb-2">
                                                {{ $news->title }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
