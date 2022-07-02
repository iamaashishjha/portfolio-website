@extends('layouts.hr')

@section('content')
<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">{{ __('about.title') }}</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="/">{{ __('home.menuItems.home') }}</a></li>
            <li>{{ __('home.menuItems.about.about-us') }}</li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.inner-banner -->
{{-- <section class="thm-gray-bg about-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                <img src="/hr/assets/images/resources/gallery-1-1.png" alt="">
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                <img src="/hr/assets/images/resources/gallery-1-2.png" alt="Awesome Image" />
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="block-title text-center">
            <img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn" data-wow-duration="1500ms">
            <p class="block-title__tag-line">{{ __('about.about-one.title') }}</p>
            <h2 class="block-title__title">{{ __('about.about-one.heading') }}</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <p class="about-one__text text-center m-0">{{ __('about.about-one.content') }}</p><!-- /.about-one__text -->
    </div><!-- /.container -->
</section><!-- /.thm-gray-bg about-one --> --}}



<section class="cta-two">
    <div class="container">
        <p class="cta-two__tag-line">{{ __('about.cta-two.title') }}</p><!-- /.cta-two__tag-line -->
        <h3 class="cta-two__title">{{ __('about.cta-two.content') }}</h3><!-- /.cta-two__title -->
        <a href="{{ route('home.member.create') }}" class="thm-btn cta-two__btn">{{ __('about.cta-two.button') }}</a>
    </div><!-- /.container -->
</section><!-- /.cta-two -->

<section class="about-two">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.about.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.about.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="col-lg-6">
				<div class="about-two__content">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_1) ? $companyDetails->about_image_1 : '/hr/assets/images/resources/history-1-1.jpg' }}" alt="" class="img-fluid" id="about-image-1"  style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_2) ? $companyDetails->about_image_2 : '/hr/assets/images/resources/history-1-2.jpg' }}" alt="" class="img-fluid" id="about-image-2"  style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_3) ? $companyDetails->about_image_3 : '/hr/assets/images/resources/history-1-3.jpg' }}" alt="" class="img-fluid"  id="about-image-3"  style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					<p class="about-two__text">{!! isset($companyDetails->home_about_content) ? $companyDetails->home_about_content : '' !!}</p>
					<!-- /.about-two__text -->
				</div><!-- /.about-two__content -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="accrodion-grp" data-grp-name="faq-accrodion">
					<div class="accrodion active">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_1) ? $companyDetails->home_about_accordion_title_1 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>
									
									{!! isset($companyDetails->home_about_accordion_content_1) ? $companyDetails->home_about_accordion_content_1 : '' !!}
									</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion ">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_2) ? $companyDetails->home_about_accordion_title_2 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>
									{!! isset($companyDetails->home_about_accordion_content_2) ? $companyDetails->home_about_accordion_content_2 : '' !!}
								</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_3) ? $companyDetails->home_about_accordion_title_3 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>
									{!! isset($companyDetails->home_about_accordion_content_3) ? $companyDetails->home_about_accordion_content_3 : '' !!}
								</p>
							</div><!-- /.inner -->
						</div>
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-two -->
{{-- <section class="cta-one">
    <div class="container">
        <h3 class="cta-one__title">Let’s make a difference! Donate our campaign.</h3>
        <div class="cta-one__button-block">
            <a href="#" class="thm-btn cta-one__btn">Discover More</a>
        </div><!-- /.cta-one__button-block -->
    </div><!-- /.container -->
</section><!-- /.cta-one --> --}}
@endsection