@extends('layouts.customHome')

@section('meta')
    <meta property="og:title" content="{{ $parliament->title }}">
    @isset($parliament->image)
        <meta property="og:image" content="{{ asset($parliament->image) }}">
    @endisset
    <meta name="title" content="{{ $parliament->title }}">
    <meta name="author" content="{{ $parliament->createdByEntity->name }}">

@endsection

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $parliament->title }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                {!!  $parliament->content  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
