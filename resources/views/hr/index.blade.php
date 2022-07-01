@extends('layouts.hr')

@section('title')
{{ isset($appSetting->site_title) ? $appSetting->site_title : 'Nagrik Unmukti Party'}}
@endsection



@section('css')

@endsection

@section('content')

@if (isset($slider))
@include('hr.partials.slider')
@endif
{{-- Slider --}}


<section class="about-four">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-12">
				<div class="about-four__content">
					<div class="block-title text-left">
						<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn"
							data-wow-duration="1500ms">
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
						<img src="{{ isset($companyDetails->vision_image) ? $companyDetails->vision_image : '/hr/assets/images/resources/about-1-1.jpg' }}"
							class="img-fluid" alt="Awesome Image" style="height:432px; width:379px;" />
						{{-- <img src="/hr/assets/images/resources/sign.png" class="about-four__sign"
							alt="Awesome Image" /> --}}
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
					<img src="{{ isset($companyDetails->mission_image) ? $companyDetails->mission_image : '/hr/assets/images/resources/mission-vision.jpg' }}"
						alt="Awesome Image" style="height:621px ;width:550px ;" />
				</div><!-- /.about-three__image -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="about-three__content">
					<div class="block-title text-left">
						<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn"
							data-wow-duration="1500ms">
						<p class="block-title__tag-line">{{ __('home.mission.sub-heading') }}</p>
						<h2 class="block-title__title">{{ __('home.mission.heading') }}</h2>
						<!-- /.block-title__title -->
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
		<img src="/hr/assets/images/01.png" class="fact-one__star-1" alt="">
		<h3 class="fact-one__title counter">{{ isset($companyDetails->total_members) ? $companyDetails->total_members :
			'4,68,980' }}</h3>
		<p class="fact-one__text">{{ __('home.members.title') }}</p>
		<img src="/hr/assets/images/01.png" class="fact-one__star-2" alt="">
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
				<div class="row d-flex justify-content-center">
					<a href="{{ route('home.donation') }}" class="thm-btn donation-contribute__btn">आर्थिक सहयोग  गर्नुहोस </a>
				</div><!-- /.row -->
			</div><!-- /.inner-container -->
		</div><!-- /.container -->
	</div><!-- /.donation-contribute -->
</section><!-- /.cta-two -->

<section class="campaing-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn" data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.campaign.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.campaign.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-sprout"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.first') }}</a></h3>
					<!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-care"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.second') }}</a></h3>
					<!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-medal"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.third') }}</a></h3>
					<!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-idea"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.fourth') }}</a></h3>
					<!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
			<div class="column-5">
				<div class="campaing-one__single">
					<i class="potisen-icon-mortarboard"></i>
					<h3 class="campaing-one__title"><a href="#">{{ __('home.campaign.fifth') }}</a></h3>
					<!-- /.campaing-one__title -->
				</div><!-- /.campaing-one__single -->
			</div><!-- /.column-5 -->
		</div><!-- /.row -->
		<p class="campaing-one__more-text text-center">{{ __('home.campaign.pre-button') }}<a href="{{ route('home.member.create') }}" class="ml-2">{{
				__('home.campaign.button') }}</a></p><!-- /.campaing-one__more-text -->
	</div><!-- /.container -->
</section><!-- /.campaing-one -->

{{--!! News --}}
<section class="event-one thm-gray-bg event-one__home-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn" data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.news.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.news.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			@foreach ($newsPosts as $post)
			<div class="col-xl-4">
				<div class="event-one__single">
					<div class="event-one__image">
						<div class="event-one__image-inner">
							<img src="{{ isset($post->image) ? $post->image : '/hr/assets/images/event/event-1-1.jpg' }}"
								alt="" style="height:178px;width:144px">
						</div><!-- /.event-one__image-inner -->
					</div><!-- /.event-one__image -->
					<div class="event-one__content">
						<p class="event-one__date">{{ $post->created_at->diffForHumans() }}</p>
						<h3 class="event-one__title"><a
								href="{{ route('home.news.show', $post->id) }}">{{$post->title}}</a></h3>
						<!-- /.event-one__title -->
					</div><!-- /.event-one__content -->
				</div><!-- /.event-one__single -->
			</div><!-- /.col-lg-6 -->
			@endforeach
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.event-one -->

<section class="about-two">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn" data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('home.about.sub-heading') }}</p>
			<h2 class="block-title__title">{{ __('home.about.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<div class="row">
			<div class="col-lg-6">
				<div class="about-two__content">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_1) ? $companyDetails->about_image_1 : '/hr/assets/images/resources/history-1-1.jpg' }}"
								alt="" class="img-fluid" style="height:165px;width:170px" />
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_2) ? $companyDetails->about_image_2 : '/hr/assets/images/resources/history-1-2.jpg' }}"
								alt="" class="img-fluid" style="height:165px;width:170px" />
						</div><!-- /.col-sm-4 -->
						<div class="col-sm-4">
							<img src="{{ isset($companyDetails->about_image_3) ? $companyDetails->about_image_3 : '/hr/assets/images/resources/history-1-3.jpg' }}"
								alt="" class="img-fluid" style="height:165px;width:170px" />
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					<p class="about-two__text">{!! isset($companyDetails->home_about_content) ?
						$companyDetails->home_about_content : '' !!}</p>
					<!-- /.about-two__text -->
				</div><!-- /.about-two__content -->
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="accrodion-grp" data-grp-name="faq-accrodion">
					<div class="accrodion active">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_1) ?
								$companyDetails->home_about_accordion_title_1 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>

									{!! isset($companyDetails->home_about_accordion_content_1) ?
									$companyDetails->home_about_accordion_content_1 : '' !!}
								</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion ">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_2) ?
								$companyDetails->home_about_accordion_title_2 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>
									{!! isset($companyDetails->home_about_accordion_content_2) ?
									$companyDetails->home_about_accordion_content_2 : '' !!}
								</p>
							</div><!-- /.inner -->
						</div>
					</div>
					<div class="accrodion">
						<div class="accrodion-title">
							<h4>{{ isset($companyDetails->home_about_accordion_title_3) ?
								$companyDetails->home_about_accordion_title_3 : '' }}</h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p>
									{!! isset($companyDetails->home_about_accordion_content_3) ?
									$companyDetails->home_about_accordion_content_3 : '' !!}It has survived not only
									five centuries but also the leap into electronic type
								</p>
							</div><!-- /.inner -->
						</div>
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.about-two -->

<section class="mailchimp-one">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<h3 class="mailchimp-one__title">{{ __('home.subscribe-mail.pre-button') }}</h3>
				<!-- /.mailchimp-one__title -->
			</div><!-- /.col-lg-5 -->
			<div class="col-lg-7">
				<form class="mailchimp-one__form mc-form" method="POST" action="{{route('home.SubscribeUsForm')}}">
					<input placeholder="Email Address" type="email" required="required" class="formInput"
						name="subscribe_us_email">
					<button type="submit" class="thm-btn mailchimp-one__form-btn">{{ __('home.subscribe-mail.button')
						}}</button>
				</form>
				<div class="mc-form__response"></div><!-- /.mc-form__response -->
			</div><!-- /.col-lg-7 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.mailchimp-one -->


<section class="blog-one blog-one__home-one">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn" data-wow-duration="1500ms">
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
						<a class="blog-one__more-link" href="{{ route('home.blogs.show', $post->id) }}"><i
								class="fa fa-link"></i>
							<!-- /.fa fa-link --></a>
					</div><!-- /.blog-one__image -->
					<div class="blog-one__content">
						<ul class="list-unstyled blog-one__meta">
							<li><a href="#">{{ $post->created_at->format('j M, Y') }}</a></li>
						</ul><!-- /.list-unstyled -->
						<h3 class="blog-one__title">
							<a href="{{ route('home.blogs.show', $post->id) }}">{{ Str::limit($post->title, 15, '...')
								}} </a>
						</h3><!-- /.blog-one__title -->
						<a href="{{ route('home.blogs.show', $post->id) }}" class="blog-one__link">Read More</a>
						<!-- /.blog-one__link -->
					</div><!-- /.blog-one__content -->
				</div><!-- /.blog-one__single -->
			</div><!-- /.col-lg-4 -->
			@endforeach
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.blog-one -->

@endsection

@section('script')

@endsection