@extends('layouts.hr')

@section('content')

<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">{{ __('home.menuItems.library') }}</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="/">{{ __('home.menuItems.home') }}</a></li>
            <li>{{ __('home.menuItems.library') }}</li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.inner-banner -->

<section class="blog-one">
    <div class="container">
        <div class="row">
            @foreach ($libraries as $library)
            @php
            if(!isset($library->file)){
                $url = $library->url;
            }elseif(isset($library->file)){
                $url = $library->file;
            }
            @endphp
            <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="{{ isset($library->image) ? $library->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
                            alt="" style="height: 219px;width:317px;">
                        <a class="blog-one__more-link" href="{{ $url }}" target="_blank"><i class="fa fa-link"></i>
                            <!-- /.fa fa-link --></a>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><a href="{{ $url }}" target="_blank">{{ $library->created_at->format('d M, Y') }}</a>
                            </li>
                        </ul><!-- /.list-unstyled -->
                        <h3 class="blog-one__title">
                            <a href="{{ $url }}" target="_blank">{{ $library->title }} </a>
                        </h3><!-- /.blog-one__title -->
                        {{-- <a href="{{ $url }}" target="_blank" class="blog-one__link">Read More</a>
                        <!-- /.blog-one__link --> --}}
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->
            </div><!-- /.col-lg-4 -->
            @endforeach
        </div><!-- /.row -->
        {{ $libraries->links('partials.hr.pagination.news') }}
    </div><!-- /.container -->
</section><!-- /.blog-one -->
@endsection