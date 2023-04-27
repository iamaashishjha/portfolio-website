@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="main-title">
                <h2 class="section-title">
                    {{ __('home.menuItems.posts.events') }}
                </h2>
            </div>
            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-md-6 col-lg-3">
                        <div class="card-wrap">
                            <a href="{{ route('home.events.show', $event->id) }}">
                                <div class="card-img">
                                    <img src="{{ isset($event->image) ? $event->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                        alt="cpnuml" class="img-fluid">
                                </div>
                                <div class="card-content">
                                    <h1 class="card-title mb-2">
                                        {{ $event->title }} 
                                    </h1>
                                    {{-- <p class="card-text">
                                        दाङ । नेकपा (एमाले) का महासचिव एवं दाङ निर्वाचन क्षेत्र नं. २ का प्रतिनिधिसभा सदस्य
                                        उम्मेदवार शंकर प...
                                    </p> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- pagination links  --}}
            {{ $events->links('customHome.partials.__pagination') }}
        </div>
    </section>
@endsection
