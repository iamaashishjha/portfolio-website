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
                            <img src="{{ isset($companyDetails->president_pic) ? $companyDetails->president_pic : '/ar/dist/images/profile-11.jpg' }}"
                                alt="{{ $companyDetails->president_name }}">
                            <div class="text-center">
                                <h1 class="text-title mt-3">{{ $companyDetails->president_name }}
                                </h1>
                                <span class="text-title-small">{{ __('home.president') }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="content-section">
                        {!! $companyDetails->message_from_president !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if (isset($latestNewsPost) && count($exceptLatestNews))
        <section class="section-gap">
            <div class="container">
                <div class="main-title d-flex justify-content-between">
                    <h2 class="section-title">
                        {{ __('home.menuItems.posts.news') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.news.index') }}" class="read-more float-end">
                            {{ __('home.menuItems.read_more') }}
                        </a>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-md-5">
                        <a href="{{ route('home.news.show', $latestNewsPost->id) }}">
                            <div class="card-banner">
                                <img src="{{ $latestNewsPost->image }}" alt="{{ $latestNewsPost->title }}"
                                    class="img-fluid">
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
    @endif

    @if (count($thoughts))
        <section class="news bichar section-gap">
            <div class="container">
                <div class="main-title d-flex justify-content-between">
                    <h2 class="section-title text-left">
                        {{ __('home.menuItems.thoughts') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.thoughts.index') }}" class="read-more float-end">
                            {{ __('home.menuItems.read_more') }}
                        </a>
                    </div>
                </div>
                <div class="row gy-4">
                    @foreach ($thoughts as $post)
                        <div class="col-md-6 col-lg-3">
                            <div class="card-wrap">
                                <a href="{{ route('home.thoughts.show', $post->id) }}">
                                    <div class="card-img">
                                        <img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                            alt="{{ $post->title }}" class="img-fluid">
                                    </div>
                                    <div class="card-content">
                                        <h1 class="card-title mb-2">
                                            {{ $post->title }}
                                        </h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- Contact Section  --}}


    {{-- Youtube videos  --}}
    @if (count($youtubeVideos))
        <section class="videos section-gap bg-dark">
            <div class="container">
                <div class="main-title border-bottom-white d-flex
                justify-content-between">
                    <h2 class="section-title text-white" onclick="location.href='{{ route('home.video.youtube') }}'"
                        style="cursor:
                    pointer">
                        {{ __('home.menuItems.video') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.video.youtube') }}" class="read-more float-end text-white">
                            {{ __('home.menuItems.read_more') }}
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
    @endif

    {{-- facebook news  --}}
    @if (count($facebookVideos))
        <section class="videos section-gap bg-white">
            <div class="container">
                <div class="main-title d-flex justify-content-between">
                    <h2 class="section-title" onclick="location.href='{{ route('home.video.facebook') }}'"
                        style="cursor: pointer">
                        {{ __('home.menuItems.facebook-video') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.video.facebook') }}" class="read-more float-end">
                            {{ __('home.menuItems.read_more') }}
                        </a>
                    </div>
                </div>
                <div class="row gy-4">
                    @foreach ($facebookVideos as $video)
                        <div class="col-md-6">
                            {!! $video->iframe !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Twitter videos  --}}
    @if (count($twitterVideos))
        <section class="section-gap">
            <div class="container">
                <div class="main-title d-flex justify-content-between">
                    <h2 class="section-title" onclick="location.href='{{ route('home.video.twitter') }}'"
                        style="cursor: pointer">
                        {{ __('home.menuItems.twitter-video') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.video.twitter') }}" class="read-more float-end">
                            {{ __('home.menuItems.read_more') }}
                        </a>
                    </div>
                </div>
                <div class="row gy-4">
                    @foreach ($twitterVideos as $video)
                        <div class="col-md-6">
                            {!! $video->iframe !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    {{-- sayings  --}}
    @if (count($sayings))
        <section class="news bichar section-gap">
            <div class="container">
                <div class="main-title d-flex justify-content-between">
                    <h2 class="section-title text-left">
                        {{ __('home.menuItems.saying') }}
                    </h2>
                    <div class="">
                        <a href="{{ route('home.saying.index') }}" class="read-more float-end">
                            {{ __('home.menuItems.read_more') }}
                        </a>
                    </div>
                </div>
                <div class="row gy-4">
                    @foreach ($sayings as $post)
                        <div class="col-md-6 col-lg-3">
                            <div class="card-wrap">
                                <a href="{{ route('home.saying.show', $post->id) }}">
                                    <div class="card-img">
                                        <img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                            alt="{{ $post->title }}" class="img-fluid">
                                    </div>
                                    <div class="card-content">
                                        <h1 class="card-title mb-2">
                                            {{ $post->title }}
                                        </h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- Contact Section  --}}


    {{-- @include('customHome.partials.__notice') --}}
@endsection


@section('script')
@endsection
