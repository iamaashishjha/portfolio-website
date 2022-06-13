@extends('layouts.hr')

@section('title')
{{ isset($appSetting->site_title) ? $appSetting->site_title : 'Nagrik Unmukti Party'}}
@endsection



@section('css')

@endsection

@section('content')
<div class="banner-wrapper" id="home">
	<div class="banner-one__nav">
		<a href="#" class="banner-one__nav-left"><i class="fa fa-angle-left"></i><!-- /.fa fa-angle-left --></a>
		<a href="#" class="banner-one__nav-right"><i class="fa fa-angle-right"></i><!-- /.fa fa-angle-right --></a>
	</div><!-- /.banner-one__nav -->
	<section class="banner-one banner-carousel__one owl-theme owl-carousel">
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-1" style="background-image: url({{ $slider->slider_image_a }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="banner-one__title banner-one__light-color">
								<span>
									{{ $slider->heading1 }}
								</span>
							</h3>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.member.create') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.membership.create') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->
		
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-2" style="background-image: url({{ $slider->slider_image_b }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="banner-one__title banner-one__light-color">
								<span>
									{{ $slider->heading2 }}
									
								</span>
							</h3>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.contact') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.contact') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-3" style="background-image: url({{ $slider->slider_image_c }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="banner-one__title banner-one__light-color">
								<span>
									
									{{ $slider->heading3 }}
								</span>
							</h3>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.news.index') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.posts.news') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-2" style="background-image: url({{ $slider->slider_image_d }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="banner-one__title banner-one__light-color">
								<span>
									{{$slider->heading4}}

								</span>
							</h3>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.about') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.about.about-us') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-3" style="background-image: url({{ $slider->slider_image_e }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="banner-one__title banner-one__light-color">
							
								<span>
									{{$slider->heading5}}
								</span>	
							</h3>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.events.index') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.posts.events') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->
	</div><!-- /.item -->
	
	</section><!-- /.banner-one -->
</div><!-- /.banner-wrapper -->



<section class="about-four">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-12">
				<div class="about-four__content">
					<div class="block-title text-left">
						<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image"
							class="wow rotateIn" data-wow-duration="1500ms">
						<p class="block-title__tag-line">{{ __('home.vision.sub-heading') }}</p>
						<h2 class="block-title__title">{{ __('home.vision.heading') }}</h2>
						<!-- /.block-title__title -->
					</div><!-- /.block-title -->
					<p class="about-three__text">
						{!! isset($companyDetails->our_vision) ? $companyDetails->our_vision : '' !!}
					</p>
					<!-- /.list-unstyled about-four__list -->
				</div><!-- /.about-four__content -->
			</div><!-- /.col-lg-4 -->
			<div class="col-xl-4 col-lg-12">
					<div class="low-gutters wow fadeInUp" data-wow-duration="1500ms">
						<div class="about-four__image">
							<img src="{{ isset($companyDetails->vision_image) ? $companyDetails->vision_image : '/hr/assets/images/resources/about-1-1.jpg' }}" class="img-fluid"
								alt="Awesome Image"  style="height:432px; width:379px;"/>
							<img src="/hr/assets/images/resources/sign.png" class="about-four__sign"
								alt="Awesome Image" />
						</div><!-- /.about-four__image -->
					</div><!-- /.col-md-6 -->
			</div><!-- /.col-lg-8 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-four -->

<section class="about-three thm-gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-three__image">
					<img src="{{ isset($companyDetails->mission_image) ? $companyDetails->mission_image : '/hr/assets/images/resources/mission-vision.jpg' }}" alt="Awesome Image"  style="height:621px ;width:550px ;"/>
				</div><!-- /.about-three__image -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="about-three__content">
					<div class="block-title text-left">
						<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image"
							class="wow rotateIn" data-wow-duration="1500ms">
						<p class="block-title__tag-line">{{ __('home.mission.sub-heading') }}</p>
						<h2 class="block-title__title">{{ __('home.mission.heading') }}</h2><!-- /.block-title__title -->
					</div><!-- /.block-title -->
					<p class="about-three__text">
						{!! isset($companyDetails->our_mission) ? $companyDetails->our_mission : '' !!}
					</p><!-- /.about-three__text -->
					{{-- <a href="#" class="thm-btn about-three__btn">Learn More</a> --}}
				</div><!-- /.about-three__content -->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-three -->
<section class="fact-one">
	<div class="container text-center">
		<img src="/hr/assets/images/resources/decor-star-1-1.png" class="fact-one__star-1" alt="">
		<h3 class="fact-one__title counter">{{ isset($companyDetails->total_members) ? $companyDetails->total_members : '4,68,980' }}</h3>
		<p class="fact-one__text">{{ __('home.members.title') }}</p>
		<img src="/hr/assets/images/resources/decor-star-1-1.png" class="fact-one__star-2" alt="">
	</div><!-- /.container -->
</section><!-- /.fact-one -->
<section class="cta-two cta-two__home-one">
	<div class="container mb-2">
		<p class="cta-two__tag-line">{{ __('home.volunteer.title') }}</p><!-- /.cta-two__tag-line -->
		<h3 class="cta-two__title">{{ __('home.volunteer.content') }}</h3><!-- /.cta-two__title -->
		<a href="{{ route('home.member.create') }}" class="thm-btn cta-two__btn">{{ __('home.volunteer.button') }}</a>
	</div><!-- /.container -->
	<div class="donation-contribute wow fadeInUp" data-wow-duration="1500ms">
		<div class="container">
			<div class="inner-container thm-base-bg-2">
				<div class="row align-items-center">
					<div class="col-lg-5">
						<h3 class="donation-contribute__title">Contribute to help us win</h3>
						<!-- /.donation-contribute__title -->
					</div><!-- /.col-lg-5 -->
					<div class="col-lg-7">
						<form class="donation-contribute__form">
							<div class="donation-contribute__amount">
								<select class="selectpicker">
									<option>$</option>
									<option>₤</option>
									<option>¥</option>
								</select>
								<input type="text" name="donation-money" value="5.00">
							</div><!-- /.donation-contribute__amount -->
							<button type="submit" class="thm-btn donation-contribute__btn">Donate</button>
						</form>
					</div><!-- /.col-lg-7 -->
				</div><!-- /.row -->
			</div><!-- /.inner-container -->
		</div><!-- /.container -->
	</div><!-- /.donation-contribute -->
</section><!-- /.cta-two -->

<section class="campaing-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.campaign.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.campaign.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-sprout"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.first') }}</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-care"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.second') }}</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-medal"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.third') }}</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-idea"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.fourth') }}</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-mortarboard"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.fifth') }}</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
		</div><!-- /.row -->
		<p class="campaing-one__more-text text-center">{{ __('home.campaign.pre-button') }}<a
				href="donation.html">{{ __('home.campaign.button') }}</a></p><!-- /.campaing-one__more-text -->
	</div><!-- /.container -->
</section><!-- /.campaing-one -->

<section class="event-one thm-gray-bg event-one__home-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.event.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.event.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			@foreach ($events as $event)
			<div class="col-xl-4">
				<div class="event-one__single">
					<div class="event-one__image">
						<div class="event-one__image-inner">
							<img src="{{ isset($event->image) ? $event->image : '/hr/assets/images/event/event-1-1.jpg' }}" alt="" style="height:178px;width:144px">
						</div><!-- /.event-one__image-inner -->
					</div><!-- /.event-one__image -->
					<div class="event-one__content">
						<p class="event-one__date">{{ $event->created_at->diffForHumans() }}</p>
						<h3 class="event-one__title"><a href="{{ route('home.events.show', $event->id) }}">{{$event->title}}</a></h3><!-- /.event-one__title -->
					</div><!-- /.event-one__content -->
				</div><!-- /.event-one__single -->
			</div><!-- /.col-lg-6 -->
			@endforeach
			
			
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.event-one -->

{{-- <section class="countdown-one thm-gray-bg countdown-one__home-one">
	<div class="container">
		<div class="inner-container">
			<div class="row align-items-xl-center align-items-lg-center">
				<div class="col-xl-6">
					<h3 class="countdown-one__title">Our new campaign starts in:</h3><!-- /.countdown-one__title -->
				</div><!-- /.col-lg-6 -->
				<div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-center justify-content-sm-center">
					<div class="countdown-one__right">
						<ul class="countdown-one__list list-unstyled">
							<!-- content loading via js -->
						</ul><!-- /.coundown-one__list -->
					</div><!-- /.countdown-one__right -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</div><!-- /.inner-container -->
	</div><!-- /.container -->
</section><!-- /.countdown-one --> --}}


<section class="about-two">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.about.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.about.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="col-lg-6">
				<div class="about-two__content">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_1) ? $companyDetails->about_image_1 : '/hr/assets/images/resources/history-1-1.jpg' }}" alt="" class="img-fluid"  style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_2) ? $companyDetails->about_image_2 : '/hr/assets/images/resources/history-1-2.jpg' }}" alt="" class="img-fluid" style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_3) ? $companyDetails->about_image_3 : '/hr/assets/images/resources/history-1-3.jpg' }}" alt="" class="img-fluid"  style="height:165px;width:170px"/>
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					<p class="about-two__text">{{ isset($companyDetails->home_about_content) ? $companyDetails->home_about_content : '' }}</p>
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
									
									{{ isset($companyDetails->home_about_accordion_content_1) ? $companyDetails->home_about_accordion_content_1 : '' }}
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
									{{ isset($companyDetails->home_about_accordion_content_2) ? $companyDetails->home_about_accordion_content_2 : '' }}It has survived not only five centuries but also the leap into electronic type

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
									{{ isset($companyDetails->home_about_accordion_content_3) ? $companyDetails->home_about_accordion_content_3 : '' }}It has survived not only five centuries but also the leap into electronic type

								</p>
							</div><!-- /.inner -->
						</div>
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-two -->


{{-- <section class="testimonials-two">
	<div class="testimonials-two__carousel">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="testimonials-two__single"
					style="background-image: url(/hr/assets/images/testimonials/testimonials-1-bg.jpg);">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-7">
								<i class="potisen-icon-quote testimonials-two__icon"></i>
								<h3 class="testimonials-two__text">This is due to their excellent service, competitive
									pricing and customer support. It’s throughly refresing to get such a personal touch.
								</h3>
								<p class="testimonials-two__name">Gary Hilk</p><!-- /.testimonials-two__name -->
							</div><!-- /.col-lg-7 -->
							<div class="col-lg-5 d-flex justify-content-xl-end justify-content-sm-start">
								<div class="testimonials-two__btn-wrap">
									<a href="#" class="testimonials-two__btn">
										<i class="fa fa-play"></i>
									</a>
									<span class="testimonials-two__btn-tag-line">Watch Campaigns <img
											src="/hr/assets/images/resources/video-arrow.png"
											alt="Awesome Image" /></span>
								</div><!-- /.testimonials-two__btn-wrap -->
							</div><!-- /.col-lg-5 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.testimonials-two__single -->
			</div><!-- /.swiper-slide -->
			<div class="swiper-slide">
				<div class="testimonials-two__single"
					style="background-image: url(/hr/assets/images/testimonials/testimonials-2-bg.jpg);">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-7">
								<i class="potisen-icon-quote testimonials-two__icon"></i>
								<h3 class="testimonials-two__text">This is due to their excellent service, competitive
									pricing and customer support. It’s throughly refresing to get such a personal touch.
								</h3>
								<p class="testimonials-two__name">Naida Bowline</p><!-- /.testimonials-two__name -->
							</div><!-- /.col-lg-7 -->
							<div class="col-lg-5 d-flex justify-content-xl-end justify-content-sm-start">
								<div class="testimonials-two__btn-wrap">
									<a href="#" class="testimonials-two__btn">
										<i class="fa fa-play"></i>
									</a>
									<span class="testimonials-two__btn-tag-line">Watch Campaigns <img
											src="/hr/assets/images/resources/video-arrow.png"
											alt="Awesome Image" /></span>
								</div><!-- /.testimonials-two__btn-wrap -->
							</div><!-- /.col-lg-5 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.testimonials-two__single -->
			</div><!-- /.swiper-slide -->
			<div class="swiper-slide">
				<div class="testimonials-two__single"
					style="background-image: url(/hr/assets/images/testimonials/testimonials-3-bg.jpg);">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-7">
								<i class="potisen-icon-quote testimonials-two__icon"></i>
								<h3 class="testimonials-two__text">This is due to their excellent service, competitive
									pricing and customer support. It’s throughly refresing to get such a personal touch.
								</h3>
								<p class="testimonials-two__name">Caroline Ocheltree</p>
								<!-- /.testimonials-two__name -->
							</div><!-- /.col-lg-7 -->
							<div class="col-lg-5 d-flex justify-content-xl-end justify-content-sm-start">
								<div class="testimonials-two__btn-wrap">
									<a href="#" class="testimonials-two__btn">
										<i class="fa fa-play"></i>
									</a>
									<span class="testimonials-two__btn-tag-line">Watch Campaigns <img
											src="/hr/assets/images/resources/video-arrow.png"
											alt="Awesome Image" /></span>
								</div><!-- /.testimonials-two__btn-wrap -->
							</div><!-- /.col-lg-5 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.testimonials-two__single -->
			</div><!-- /.swiper-slide -->
			<div class="swiper-slide">
				<div class="testimonials-two__single"
					style="background-image: url(/hr/assets/images/testimonials/testimonials-4-bg.jpg);">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-7">
								<i class="potisen-icon-quote testimonials-two__icon"></i>
								<h3 class="testimonials-two__text">This is due to their excellent service, competitive
									pricing and customer support. It’s throughly refresing to get such a personal touch.
								</h3>
								<p class="testimonials-two__name">Corey Gessner</p><!-- /.testimonials-two__name -->
							</div><!-- /.col-lg-7 -->
							<div class="col-lg-5 d-flex justify-content-xl-end justify-content-sm-start">
								<div class="testimonials-two__btn-wrap">
									<a href="#" class="testimonials-two__btn">
										<i class="fa fa-play"></i>
									</a>
									<span class="testimonials-two__btn-tag-line">Watch Campaigns <img
											src="/hr/assets/images/resources/video-arrow.png"
											alt="Awesome Image" /></span>
								</div><!-- /.testimonials-two__btn-wrap -->
							</div><!-- /.col-lg-5 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.testimonials-two__single -->
			</div><!-- /.swiper-slide -->
		</div><!-- /.swiper-wrapper -->
	</div><!-- /.testimonials-two__carousel -->
	<div class="testimonials-two__bottom thm-gray-bg">
		<div class="container">
			<div class="testimonials-two__thumb-carousel">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="/hr/assets/images/testimonials/testimonials-1-thumb.jpg" alt="">
					</div><!-- /.swiper-slide -->
					<div class="swiper-slide">
						<img src="/hr/assets/images/testimonials/testimonials-2-thumb.jpg" alt="">
					</div><!-- /.swiper-slide -->
					<div class="swiper-slide">
						<img src="/hr/assets/images/testimonials/testimonials-3-thumb.jpg" alt="">
					</div><!-- /.swiper-slide -->
					<div class="swiper-slide">
						<img src="/hr/assets/images/testimonials/testimonials-4-thumb.jpg" alt="">
					</div><!-- /.swiper-slide -->
				</div><!-- /.swiper-wrapper -->
			</div><!-- /.testimonials-one__thumb-carousel -->
		</div><!-- /.container -->
	</div><!-- /.testimonials-two__bottom -->
</section><!-- /.testimonials-two --> --}}

<section class="mailchimp-one">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<h3 class="mailchimp-one__title">{{ __('home.subscribe-mail.pre-button') }}</h3><!-- /.mailchimp-one__title -->
			</div><!-- /.col-lg-5 -->
			<div class="col-lg-7">
				<form class="mailchimp-one__form mc-form" method="POST" action="{{route('home.SubscribeUsForm')}}">
					<input placeholder="Email Address" type="email" required="required" class="formInput" name="subscribe_us_email">
					<button type="submit" class="thm-btn mailchimp-one__form-btn">{{ __('home.subscribe-mail.button') }}</button>
				</form>
				<div class="mc-form__response"></div><!-- /.mc-form__response -->
			</div><!-- /.col-lg-7 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.mailchimp-one -->


<section class="blog-one blog-one__home-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.blog.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.blog.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			@foreach ($blogPosts as $post)
			<div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
				<div class="blog-one__single">
					<div class="blog-one__image">
						<img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
							alt="" style="height:290px ;width:370px ;">
						<a class="blog-one__more-link" href=""><i class="fa fa-link"></i>
							<!-- /.fa fa-link --></a>
					</div><!-- /.blog-one__image -->
					<div class="blog-one__content">
						<ul class="list-unstyled blog-one__meta">
							<li><a href="#">22 Oct, 2019</a></li>
						</ul><!-- /.list-unstyled -->
						<h3 class="blog-one__title">
							<a href="blog-details.html">{{ Str::limit($post->title, 15, '...') }} </a>
						</h3><!-- /.blog-one__title -->
						<a href="blog-details.html" class="blog-one__link">Read More</a><!-- /.blog-one__link -->
					</div><!-- /.blog-one__content -->
				</div><!-- /.blog-one__single -->
			</div><!-- /.col-lg-4 -->
			@endforeach
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.blog-one -->

{{-- <div class="brand-one thm-gray-bg">
	<div class="container">
		<div class="brand-one__carousel owl-carousel owl-theme">
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
			<div class="item">
				<img src="/hr/assets/images/resources/brand-1-1.png" alt="" />
			</div><!-- /.item -->
		</div><!-- /.brand-one__carousel owl-carousel owl-theme -->
	</div><!-- /.container -->
</div><!-- /.brand-one thm-gray-bg --> --}}


{{-- <section class="social-shares">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="social-shares__facebook thm-base-bg text-center">
					<i class="fa fa-facebook-square"></i>
					<p class="social-shares__facebook-name">Facebook</p><!-- /.social-shares__facebook-name -->
					<h3 class="social-shares__facebook-count">280,366</h3><!-- /.social-shares__facebook-count -->
					<a href="#" class="social-shares__facebook-link">#potisenfacebook</a>
				</div><!-- /.social-shares__facebook -->
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-8">
				<div class="social-shares__twitter thm-base-bg-2">
					<h3 class="social-shares__twitter-title">Latest Tweets</h3><!-- /.social-shares__twitter-title -->
					<div class="social-shares__twitter-carousel owl-carousel owl-theme">
						<div class="item">
							<div class="social-shares__twitter-single">
								<p class="social-shares__twitter-text">A Bill of Rights is what the people are entitled
									to against <a href="#"><strong>#politics</strong></a> every government, and what no
									just government should refuse, or rest on inference. <a
										href="#">https://t.co/LpyuHZaOMK</a> <a href="#">#ASMSG</a></p>
								<!-- /.social-shares__twitter-text -->
								<div class="social-shares__twitter-info">
									<p class="social-shares__twitter-info-text">
										<a href="#">@potisentwitterfollow</a>
										<span>5 minutes ago</span>
									</p><!-- /.social-shares__twitter-info-text -->
									<i class="fa fa-twitter"></i>
								</div><!-- /.social-shares__twitter-info -->
							</div><!-- /.social-shares__twitter-single -->
						</div><!-- /.item -->
						<div class="item">
							<div class="social-shares__twitter-single">
								<p class="social-shares__twitter-text">A Bill of Rights is what the people are entitled
									to against <a href="#"><strong>#politics</strong></a> every government, and what no
									just government should refuse, or rest on inference. <a
										href="#">https://t.co/LpyuHZaOMK</a> <a href="#">#ASMSG</a></p>
								<!-- /.social-shares__twitter-text -->
								<div class="social-shares__twitter-info">
									<p class="social-shares__twitter-info-text">
										<a href="#">@potisentwitterfollow</a>
										<span>5 minutes ago</span>
									</p><!-- /.social-shares__twitter-info-text -->
									<i class="fa fa-twitter"></i>
								</div><!-- /.social-shares__twitter-info -->
							</div><!-- /.social-shares__twitter-single -->
						</div><!-- /.item -->
						<div class="item">
							<div class="social-shares__twitter-single">
								<p class="social-shares__twitter-text">A Bill of Rights is what the people are entitled
									to against <a href="#"><strong>#politics</strong></a> every government, and what no
									just government should refuse, or rest on inference. <a
										href="#">https://t.co/LpyuHZaOMK</a> <a href="#">#ASMSG</a></p>
								<!-- /.social-shares__twitter-text -->
								<div class="social-shares__twitter-info">
									<p class="social-shares__twitter-info-text">
										<a href="#">@potisentwitterfollow</a>
										<span>5 minutes ago</span>
									</p><!-- /.social-shares__twitter-info-text -->
									<i class="fa fa-twitter"></i>
								</div><!-- /.social-shares__twitter-info -->
							</div><!-- /.social-shares__twitter-single -->
						</div><!-- /.item -->
					</div><!-- /.social-shares__twitter-carousel -->
				</div><!-- /.social-shares__twitter -->
			</div><!-- /.col-lg-8 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.social-shares --> --}}
@endsection

@section('script')

@endsection