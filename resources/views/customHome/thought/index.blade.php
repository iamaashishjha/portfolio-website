@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="main-title">
                <h2 class="section-title">
                    {{ __('home.menuItems.thoughts') }}
                </h2>
            </div>
            <div class="row g-4">
                @foreach ($thoughts as $post)
                    <div class="col-md-6 col-lg-3">
                        <div class="card-wrap">
                            <a href="{{ route('home.thoughts.show', $post->id) }}">
                                <div class="card-img">
                                    <img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                        alt="{{$post->title}}" class="img-fluid">
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
            {{-- pagination links  --}}
            {{ $thoughts->links('customHome.partials.__pagination') }}
        </div>
    </section>
@endsection
