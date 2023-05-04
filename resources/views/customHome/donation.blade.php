@extends('layouts.customHome')

@push('head')
<style>
	h4{
		margin:2rem 0;
		padding:2rem 0;
	}
</style>
@endpush

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h2 class="news-title mb-2">
                                {{ __('about.donation.heading') }}
                            </h2>
                            <div class="news-content mt-1 pt-3">
                                {!! $donation->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
