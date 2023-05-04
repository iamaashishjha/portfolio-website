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
                @foreach ($twitterVideos as $yv)
                    <div class="col-md-6 col-lg-3">
                        <div class="">
                            {!! $yv->iframe !!}
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $yv->links('customHome.partials.__pagination') }}
        </div>
    </section>
    {{-- Contact Section  --}}
    @include('customHome.partials.__contact')
@endsection


@section('script')
@endsection
