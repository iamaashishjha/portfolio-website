@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{$document->title}}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                <p><img src="{{$document->image}}"
                                        alt="" width="739" height="723" /></p>
                                <div class="alert alert-secondary">सम्पूर्ण विवरण हेर्नको लागि यहाँ <a class="text-primary"
                                        href="{{$document->file}}"
                                        target="__blank"> क्लिक </a> गर्नुहोस ।</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="row gy-4">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
