@extends('layouts.hr')

@section('title')
{{ isset($headerFooter->site_title) ? $headerFooter->site_title : 'Nagrik Unmukti Party'}}
@endsection



@section('css')

@endsection

@section('content')
<section class="static-banner-one">
	<div class="static-banner-one__bg">
		<div class="static-banner-one__bg-inner"></div><!-- /.static-banner-one__bg-inner -->
	</div><!-- /.static-banner-one__bg -->
	<div class="container">
		<h2 class="static-banner-one__title">
			Let's Move <br />
			America <span class="typed-effect" id="type-1" data-strings="Forward, Powerful"></span>
		</h2>
		<p class="static-banner-one__text">Become a part of our campaign, sign up for updates.</p>
		<form class="static-banner-one__form" action="{{ route('home.sliderForm') }}" method="POST">
			@csrf
			<div class="row">
				<div class="col-lg-6">
					<div class="static-banner-one__form-fields ">
						<input placeholder="Email Address" type="email" name="email" value="{{ old('email') }}"
							required="required" class="formInput">
						<input type="text" name="zip" placeholder="Zip Code" value="{{ old('zip') }}">
					</div><!-- /.static-banner-one__form-fields -->
					<button type="submit" class="thm-btn static-banner-one__form-btn">Sign Up</button>
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</form>
		<div class="mc-form__response"></div><!-- /.mc-form__response -->
	</div><!-- /.container -->
</section><!-- /.static-banner-one -->
<section class="about-four">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-lg-12">
				<div class="about-four__content">
					<div class="block-title text-left">
						<p class="block-title__tag-line">Potisen Politics</p>
						<h2 class="block-title__title">We can build <br> better future <br> together</h2>
						<!-- /.block-title__title -->
					</div><!-- /.block-title -->
					<ul class="list-unstyled about-four__list">
						<li>
							<img src="/hr/assets/images/resources/menu-active-star.png" alt="Awesome Image" />
							Lorem ipsum is simply available.
						</li>
						<li>
							<img src="/hr/assets/images/resources/menu-active-star.png" alt="Awesome Image" />
							The majority have suffered alteration.
						</li>
						<li>
							<img src="/hr/assets/images/resources/menu-active-star.png" alt="Awesome Image" />
							Don't look even slightly.
						</li>
						<li>
							<img src="/hr/assets/images/resources/menu-active-star.png" alt="Awesome Image" />
							If you are going to use a passage.
						</li>
						<li>
							<img src="/hr/assets/images/resources/menu-active-star.png" alt="Awesome Image" />
							You need to sure there embarrassing.
						</li>
					</ul><!-- /.list-unstyled about-four__list -->
				</div><!-- /.about-four__content -->
			</div><!-- /.col-lg-4 -->
			<div class="col-xl-8 col-lg-12">
				<div class="row low-gutters">
					<div class="col-md-6 wow fadeInUp" data-wow-duration="1500ms">
						<div class="about-four__image">
							<img src="/hr/assets/images/resources/about-1-1.jpg" class="img-fluid"
								alt="Awesome Image" />
							<img src="/hr/assets/images/resources/sign.png" class="about-four__sign"
								alt="Awesome Image" />
						</div><!-- /.about-four__image -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="about-four__box thm-base-bg-2 wow fadeInUp" data-wow-duration="1500ms">
							<div class="about-four__box-top">
								<i class="potisen-icon-poll"></i>
								<h4 class="about-four__box-title">Vote Status</h4><!-- /.about-four__box-title -->
							</div><!-- /.about-four__box-top -->
							<p class="about-four__box-text">There are many variations of passages of Lorem Ipsum
								available, but the majority have suffered alteration in some form, by injected humour or
								randomised.</p><!-- /.about-four__box-text -->
							<a href="#" class="thm-btn about-four__btn">Learn More</a>
						</div><!-- /.about-four__box -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row low-gutters -->
			</div><!-- /.col-lg-8 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-four -->
<section class="fact-one">
	<div class="container text-center">
		<img src="/hr/assets/images/resources/decor-star-1-1.png" class="fact-one__star-1" alt="">
		<h3 class="fact-one__title counter">468,980</h3>
		<p class="fact-one__text">People have joined the campaigns</p>
		<img src="/hr/assets/images/resources/decor-star-1-1.png" class="fact-one__star-2" alt="">
	</div><!-- /.container -->
</section><!-- /.fact-one -->
<section class="about-three thm-gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-three__image">
					<img src="/hr/assets/images/resources/mission-vision.jpg" alt="Awesome Image" />
				</div><!-- /.about-three__image -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="about-three__content">
					<div class="block-title text-left">
						<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image"
							class="wow rotateIn" data-wow-duration="1500ms">
						<p class="block-title__tag-line">About Potisen</p>
						<h2 class="block-title__title">Mission and Vision</h2><!-- /.block-title__title -->
					</div><!-- /.block-title -->
					<div class="about-three__box-wrap">
						<div class="about-three__box">
							<i class="potisen-icon-bid"></i>
							<h4 class="about-three__box-title">Civil Rights <br> Attorney</h4>
							<!-- /.about-three__box-title -->
						</div><!-- /.about-three__box -->
						<div class="about-three__box">
							<i class="potisen-icon-work"></i>
							<h4 class="about-three__box-title">Majored in <br> Political</h4>
							<!-- /.about-three__box-title -->
						</div><!-- /.about-three__box -->
						<div class="about-three__box">
							<i class="potisen-icon-politics"></i>
							<h4 class="about-three__box-title">Political <br> Solutions</h4>
							<!-- /.about-three__box-title -->
						</div><!-- /.about-three__box -->
					</div><!-- /.about-three__box-wrap -->
					<p class="about-three__text">There are many variations of passages of Lorem Ipsum available, but the
						majority have suffered alteration in some form, by injected humour, or randomised words which
						don't look even slightly believable.</p><!-- /.about-three__text -->
					<a href="#" class="thm-btn about-three__btn">Learn More</a>
				</div><!-- /.about-three__content -->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-three -->
<section class="cta-two cta-two__home-one">
	<div class="container">
		<p class="cta-two__tag-line">Join the Fight for Freedom</p><!-- /.cta-two__tag-line -->
		<h3 class="cta-two__title">Help us Bring <br> the Change we Need</h3><!-- /.cta-two__title -->
		<a href="#" class="thm-btn cta-two__btn">Become a Volunteer</a>
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
			<p class="block-title__tag-line">Policy Positions</p>
			<h2 class="block-title__title">Campaign Principles</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-sprout"></i>
					<h3 class="campaing-one__title"><a href="#">Environment</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-care"></i>
					<h3 class="campaing-one__title"><a href="#">Healthcare</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-medal"></i>
					<h3 class="campaing-one__title"><a href="#">Tax Returns</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-idea"></i>
					<h3 class="campaing-one__title"><a href="#">Economy</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-mortarboard"></i>
					<h3 class="campaing-one__title"><a href="#">Education</a></h3><!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
		</div><!-- /.row -->
		<p class="campaing-one__more-text text-center">How we can build a better country together!. <a
				href="donation.html">Donate or Volunteer.</a></p><!-- /.campaing-one__more-text -->
	</div><!-- /.container -->
</section><!-- /.campaing-one -->

<section class="event-one thm-gray-bg event-one__home-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/resources/sec-title-star.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">Join Campaigns</p>
			<h2 class="block-title__title">Upcoming Events</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			@foreach ($events as $event)
			<div class="col-xl-4">
				<div class="event-one__single">
					<div class="event-one__image">
						<div class="event-one__image-inner">
							<img src="{{ isset($event->image) ? $event->image : '/hr/assets/images/event/event-1-1.jpg' }}" alt="" style="height:150px;width:150px">
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
			<p class="block-title__tag-line">Join Campaigns</p>
			<h2 class="block-title__title">We Will Make <br> History Together</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="col-lg-6">
				<div class="about-two__content">
					<div class="row">
						<div class="col-sm-4">
							<img src="/hr/assets/images/resources/history-1-1.jpg" alt="" class="img-fluid" />
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="/hr/assets/images/resources/history-1-2.jpg" alt="" class="img-fluid" />
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="/hr/assets/images/resources/history-1-3.jpg" alt="" class="img-fluid" />
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					<p class="about-two__text">Lorem Ipsum is simply dummy text of the printing and type setting
						industry has been the industry's standard dummy text ever since the 1500s, when an unknown
						printer took a galley of type and scrambled to make a type specimen book. It has survived not
						only five centuries but also the leap into electronic type setting.</p>
					<!-- /.about-two__text -->
				</div><!-- /.about-two__content -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="accrodion-grp" data-grp-name="faq-accrodion">
					<div class="accrodion active">
						<div class="accrodion-title">
							<h4>Political organization that typically seeks</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>It has survived not only five centuries but also the leap into electronic type
									setting. when an unknown printer took a galley of type and scrambled to make a type
									specimen book.</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion ">
						<div class="accrodion-title">
							<h4>Strong politics plan require experience</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>It has survived not only five centuries but also the leap into electronic type
									setting. when an unknown printer took a galley of type and scrambled to make a type
									specimen book.</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion">
						<div class="accrodion-title">
							<h4>Attract and retain quality high paying customers</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>It has survived not only five centuries but also the leap into electronic type
									setting. when an unknown printer took a galley of type and scrambled to make a type
									specimen book.</p>
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
				<h3 class="mailchimp-one__title">Don't miss our monthly updates</h3><!-- /.mailchimp-one__title -->
			</div><!-- /.col-lg-5 -->
			<div class="col-lg-7">
				<form class="mailchimp-one__form mc-form" method="POST" action="{{route('home.SubscribeUsForm')}}">
					<input placeholder="Email Address" type="email" required="required" class="formInput" name="subscribe_us_email">
					<button type="submit" class="thm-btn mailchimp-one__form-btn">Subscribe</button>
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
			<p class="block-title__tag-line">Potisen Updates</p>
			<h2 class="block-title__title">From Campaign</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			@foreach ($blogPosts as $post)
			<div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
				<div class="blog-one__single">
					<div class="blog-one__image">
						<img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/blog/blog-1-1.jpg' }}"
							alt="">
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