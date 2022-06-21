@extends('layouts.hr')

@section('content')
<section class="inner-banner">
	<div class="container">
		<h2 class="inner-banner__title">{{ __('about.title') }}</h2><!-- /.inner-banner__title -->
		<ul class="list-unstyled thm-breadcrumb">
			<li><a href="/">{{ __('home.menuItems.home') }}</a></li>
			<li>{{ __('home.menuItems.about.donation') }}</li>
		</ul><!-- /.list-unstyled -->
	</div><!-- /.container -->
</section><!-- /.inner-banner -->
<section class="thm-gray-bg about-one" style="padding-top: 20px;">
	<div class="container">
		<div class="block-title text-center">
			<img src="/hr/assets/images/01.png" alt="Awesome Image" class="wow rotateIn"
				data-wow-duration="1500ms">
			<p class="block-title__tag-line">{{ __('about.donation.heading') }}</p>
			<h2 class="block-title__title">{{ __('about.donation.heading') }}</h2><!-- /.block-title__title -->
		</div><!-- /.block-title -->
		<hr>
		<div class="row mt-5">
			<div class="col-lg-12">
				<h4><span class="font-weight-bold"> Bank Name (खाता रहेको बैंक) : </span>Everest Bank Limited (एभरेस्ट
					बैंक लिमिटेड ।)</h4>
				<h4><span class="font-weight-bold"> Account Holder Name (खाता बालाको नाम) : </span>Nagrik Unmukti Party
					(नागरिक उन्मुक्ति पार्टी )</h4>
				<h4><span class="font-weight-bold"> Account Number (खाता न .) : </span>00100501228473 (००१००५०१२२८४७६)
				</h4>
				<h4><span class="font-weight-bold"> Branch (शाखा) : </span>New Baneshwar, Kathmandu Nepal (नयाँ
					बानेश्वर, काठमाडौं, नेपाल)</h4>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		<hr>
		{{-- <p class="about-one__text text-center m-0">{{ __('about.about-one.content') }}</p>
		<!-- /.about-one__text --> --}}
		<p class="about-one__text text-center m-0">
			<span class="font-weight-bold">नोट : </span>कृप्या रकम जम्मा गरे पछी रकमको भौचर
			email Id : <span class="font-weight-bold">komal@nagrikunmuktiparty.org / nagrikunmuktiparty@gmail.com</span>
			अथवा माथी उल्लेखित फोन न.को Viber/Whatsapp / Messnger मा पठाई दिनुहुन अनुरोध छ।
		</p><!-- /.about-one__text -->
	</div><!-- /.container -->
</section><!-- /.thm-gray-bg about-one -->



<section class="cta-two">
	<div class="container">
		<p class="cta-two__tag-line">{{ __('about.cta-two.title') }}</p><!-- /.cta-two__tag-line -->
		<h3 class="cta-two__title">{{ __('about.cta-two.content') }}</h3><!-- /.cta-two__title -->
		<a href="{{ route('home.member.create') }}" class="thm-btn cta-two__btn">{{ __('about.cta-two.button') }}</a>
	</div><!-- /.container -->
</section><!-- /.cta-two -->

@endsection