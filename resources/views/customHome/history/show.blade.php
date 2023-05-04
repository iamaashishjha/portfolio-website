@extends('layouts.customHome')


@section('meta')
    <meta property="og:title" content="{{ $history->title }}">
    <meta name="title" content="{{ $history->title }}">
    <meta name="author" content="{{ $history->createdByEntity->name }}">
@endsection

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $history->title }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                {!! $history->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
