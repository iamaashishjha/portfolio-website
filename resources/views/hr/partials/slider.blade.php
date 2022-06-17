<div class="banner-wrapper" id="home">
	<div class="banner-one__nav">
		<a href="#" class="banner-one__nav-left"><i class="fa fa-angle-left"></i><!-- /.fa fa-angle-left --></a>
		<a href="#" class="banner-one__nav-right"><i class="fa fa-angle-right"></i><!-- /.fa fa-angle-right --></a>
	</div><!-- /.banner-one__nav -->
	<section class="banner-one banner-carousel__one owl-theme owl-carousel">
		
		@if ((isset($slider->slider_image_a)) && (isset($slider->heading1)))
			
		<div class="item">
			<div class="banner-one__slide  banner-one__slide-1" style="background-image: url({{ $slider->slider_image_a }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5 class="banner-one__title banner-one__light-color">
								<span>
									{{ $slider->heading1 }}
								</span>
							</h5>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.member.create') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.membership.create') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->

		@endif

		@if ((isset($slider->slider_image_b)) && (isset($slider->heading2)))

		<div class="item">
			<div class="banner-one__slide  banner-one__slide-2" style="background-image: url({{ $slider->slider_image_b }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5 class="banner-one__title banner-one__light-color">
								<span>
									{{ $slider->heading2 }}
									
								</span>
							</h5>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.contact') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.contact') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->

		@endif

		@if ((isset($slider->slider_image_c)) && (isset($slider->heading3)))

		<div class="item">
			<div class="banner-one__slide  banner-one__slide-3" style="background-image: url({{ $slider->slider_image_c }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5 class="banner-one__title banner-one__light-color">
								<span>
									
									{{ $slider->heading3 }}
								</span>
							</h5>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.news.index') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.posts.news') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->

		@endif

		@if ((isset($slider->slider_image_d)) && (isset($slider->heading4)))

		<div class="item">
			<div class="banner-one__slide  banner-one__slide-2" style="background-image: url({{ $slider->slider_image_d }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5 class="banner-one__title banner-one__light-color">
								<span>
									{{$slider->heading4}}

								</span>
							</h5>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.about') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.about.about-us') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->

		@endif

		@if ((isset($slider->slider_image_e)) && (isset($slider->heading5)))

		<div class="item">
			<div class="banner-one__slide  banner-one__slide-3" style="background-image: url({{ $slider->slider_image_e }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5 class="banner-one__title banner-one__light-color">
							
								<span>
									{{$slider->heading5}}
								</span>	
							</h5>
							<div class="banner-one__btn-block">
								<a href="{{ route('home.events.index') }}" class="thm-btn banner-one__btn">{{ __('home.menuItems.posts.events') }}</a>
							</div><!-- /.btn-block -->
						</div><!-- /.col-lg-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.banner-one__slide -->
		</div><!-- /.item -->

		@endif

	</section><!-- /.banner-one -->
</div><!-- /.banner-wrapper -->