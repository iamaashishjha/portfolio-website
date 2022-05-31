@extends('layouts.hr')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">{{ __('events.title') }}</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="/">{{ __('home.menuItems.home') }}</a></li>
                <li>{{ __('home.menuItems.posts.events') }}</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <section class="event-one">
        <div class="container">
            <div class="row">
                @foreach ($events as $event)
                    
                <div class="col-lg-6">
                    <div class="event-one__single">
                        <div class="event-one__image">
                            <div class="event-one__image-inner">
                                <img src="{{ $event->image }}" alt="" style="height: 218px; width:184px;">
                            </div><!-- /.event-one__image-inner -->
                        </div><!-- /.event-one__image -->
                        <div class="event-one__content">
                            <p class="event-one__date">{{ $event->created_at->format('d M, Y') }}</p>
                            <h3 class="event-one__title"><a href="{{ route('home.events.show', $event->id) }}">
                                {{ $event->title }}
                            </a></h3><!-- /.event-one__title -->
                        </div><!-- /.event-one__content -->
                    </div><!-- /.event-one__single -->
                </div><!-- /.col-lg-6 -->
                @endforeach
                
            </div><!-- /.row -->
            {{ $events->links('partials.hr.pagination.events') }}
        </div><!-- /.container -->
    </section><!-- /.event-one -->
    <section class="countdown-one thm-base-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="countdown-one__title">Our new campaign <br> starts in:</h3><!-- /.countdown-one__title -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="countdown-one__right">
                        <ul class="countdown-one__list list-unstyled">
                            <!-- content loading via js -->
                        </ul><!-- /.coundown-one__list -->
                    </div><!-- /.countdown-one__right -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.countdown-one -->
@endsection