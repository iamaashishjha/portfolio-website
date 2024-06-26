@extends('layouts.customHome')

@section('meta')
    <meta property="og:title" content="{{ $thought->title }}">
    @isset($thought->image)
        <meta property="og:image" content="{{ asset($thought->image) }}">
    @endisset
    <meta name="title" content="{{ $thought->title }}">
    <meta name="author" content="{{ $thought->createdByEntity->name }}">
@endsection

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card-wrap-section">
                        <div class="card-img mt-80-sm">
                            <img src="{{ isset($thought->image) ? $thought->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                alt="detail-img" class="img-fluid">
                        </div>
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $thought->title }}
                            </h1>
                            <div class="social-btn-sp">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                            </div>
                            <div class="news-content mt-1 pt-3">
                                {!! $thought->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
