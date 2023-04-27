@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-9">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                About CPN-UML
                            </h1>
                            {!! $companyDetails->company_description !!}
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
