@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card-wrap-section">
                        <div class="card-img mt-80-sm">
                            <img src="{{ isset($library->image) ? $library->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                                alt="detail-img" class="img-fluid">
                        </div>
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ $library->title }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                {!! $library->content !!}
                            </div>
                            @if (isset($library->file))
                                <div class="alert alert-secondary">सम्पूर्ण विवरण हेर्नको लागि यहाँ <a class="text-primary"
                                        href="{{ $library->file }}" target="__blank"> क्लिक </a> गर्नुहोस ।</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
