@extends('layouts.hr')

@section('meta')
    <meta property="og:title" content="{{ $event->title }}">
    <meta property="og:image" content="{{ asset($event->image) }}">
    <meta name="title" content="{{ $event->title }}">
    <meta name="author" content="{{ $event->createdByEntity->name }}">
@endsection

@section('content')
    
        <section class="inner-banner">
            <div class="container">
                <h2 class="inner-banner__title">Event Details</h2><!-- /.inner-banner__title -->
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('home.events.index') }}">Events</a></li>
                    <li>{{ $event->title }}</li>
                </ul><!-- /.list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.inner-banner -->
        <section class="event-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="event-details__content">
                            <h3 class="event-details__title">{{ $event->title }}</h3>
                            <p class="event-details__text">{{ $event->description }}</p>
                            
                        </div><!-- /.event-details__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="event-details__image wow fadeInRight">
                            <img src="{{ $event->image }}" alt="" class="img-fluid">
                        </div><!-- /.event-details__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.event-details -->
        <section class="event-details-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 wow fadeInLeft">
                        <div class="event-details-box__single thm-base-bg">
                            <h3 class="event-details-box__title">Venue</h3>
                            <p class="event-details-box__text">{{ $event->venue }}</p>
                            <ul class="list-unstyled event-details-box__list">
                                <li>{{ $event->created_at->format('d M, Y') }}</li>
                                <li>{{$event->created_at->format('h:i A') }}</li>
                                <li>{{ $event->venue }}</li>
                            </ul><!-- /.list-unstyled event-details-box__list -->
                        </div><!-- /.event-details-box__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 wow fadeInUp" id="googlemap">
                        {!! $event->location_map !!}
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="google-map__contact" allowfullscreen></iframe> --}}
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 wow fadeInRight">
                        <div class="event-details-box__single thm-base-bg-2">
                            <h3 class="event-details-box__title">Organizer</h3>
                            <p class="event-details-box__text">{{ $companyDetails->company_name_en }}</p>
                            <ul class="list-unstyled event-details-box__list">
                                <li><a href="tel:{{ $companyDetails->phone_number }}">{{ $companyDetails->phone_number }}</a></li>
                                <li><a href="mailto:{{ $companyDetails->email_address }}">{{ $companyDetails->email_address }}</a></li>
                                <li>{{ $companyDetails->company_address }}</li>
                            </ul><!-- /.list-unstyled event-details-box__list -->
                        </div><!-- /.event-details-box__single -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.event-details-box -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $( "#googlemap" ).find( "iframe" ).addClass("google-map__contact");
            $( "#googlemap" ).find( "iframe" ).attr("allowfullscreen");
        });
    </script>
@endsection
        