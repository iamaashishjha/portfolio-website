@extends('layouts.customHome')

@section('meta')
    <meta property="og:title" content="{{ $goverment->title }}">
    <meta name="title" content="{{ $goverment->title }}">
@endsection

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $goverment->title }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                {!!  $goverment->content  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
