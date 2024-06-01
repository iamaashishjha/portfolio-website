<footer class="site-footer">
    <div class="site-footer__logo text-center">
        <a href=""><img
                src="{{ isset($companyDetails->logo) ? $companyDetails->logo : '/hr/assets/images/logo-light.png' }}"
                alt="" width="174"></a>
    </div><!-- /.site-footer__logo -->
    <div class="site-footer__upper">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title">{{ __('home.footer.about') }}</h3>
                        <!-- /.footer-widget__title -->
                        <p class="footer-widget__text">{!! isset($companyDetails->company_description) ?
                            $companyDetails->company_description : 'Nagrik Unmukti PartyDetails' !!}</p>
                        <!-- /.footer-widget__text -->
                        <div class="footer-widget__social">
                            {!! isset($companyDetails->twitter_link) ? '<a href="'. $companyDetails->twitter_link.' "><i class="fa fa-twitter"></i></a>' : '' !!}
                            {!! isset($companyDetails->facebook_link) ? '<a href="'. $companyDetails->facebook_link.' "><i class="fa fa-facebook-square"></i></a>' : '' !!}
                            {!! isset($companyDetails->instagram_link) ? '<a href="'. $companyDetails->instagram_link.' "><i class="fa fa-instagram"></i></a>' : '' !!}
                            {{-- <a href="#" class="fa fa-twitter"></a><!-- /.fa fa-twitter -->
                            <a href="#" class="fa fa-facebook-square"></a><!-- /.fa fa-facebook-square -->
                            <a href="#" class="fa fa-pinterest-p"></a><!-- /.fa fa-pinterest-p -->
                            <a href="#" class="fa fa-instagram"></a><!-- /.fa fa-instagram --> --}}
                        </div><!-- /.footer-widget__social -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__links">
                        <h3 class="footer-widget__title">{{ __('home.footer.explore') }}</h3>
                        <!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links-list">
                            <li><a href="{{ route('home.about') }}">{{ __('home.menuItems.about.about-us') }}</a></li>
                            {{-- <li><a href="#">History</a></li>
                            <li><a href="#">Contribute</a></li> --}}
                            <li><a href="{{ route('home.member.create') }}">{{ __('home.menuItems.membership.create')
                                    }}</a></li>
                            <li><a href="{{ route('home.news.index') }}">{{ __('home.menuItems.posts.news') }}</a></li>
                        </ul><!-- /.list-unstyled footer-widget__links-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__posts">
                        <h3 class="footer-widget__title">{{ __('home.footer.events') }}</h3>
                        <!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__posts-list">
                            @foreach ($footerNews as $footerNew)
                            <li>
                                <div class="footer-widget__posts-image">
                                    <img src="{{ isset($footerNew->image) ? $footerNew->image : '/hr/assets/images/resources/footer-post-1-1.png' }}"
                                        alt="" style="height: 40px;width:40px;">
                                </div><!-- /.footer-widget__posts-image -->
                                <div class="footer-widget__posts-content">
                                    <h4 class="footer-widget__posts-title">
                                        <a href="{{ route('home.events.show', $footerNew->id) }}">{{ $footerNew->title
                                            }}</a>
                                    </h4><!-- /.footer-widget__posts-title -->
                                    <p class="footer-widget__posts-date">{{ $footerNew->created_at->format('d M, Y') }}
                                    </p>
                                    <!-- /.footer-widget__posts-date -->
                                </div><!-- /.footer-widget__posts-content -->
                            </li>
                            @endforeach



                        </ul><!-- /.list-unstyled footer-widget__posts-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__contact">
                        <h3 class="footer-widget__title">{{ __('home.footer.contact') }}</h3>
                        <!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <i class="potisen-icon-phone"></i><!-- /. -->
                                <a
                                    href="tel:{{ isset($companyDetails->phone_number) ? $companyDetails->phone_number : '666-888-000' }}">{{
                                    isset($companyDetails->phone_number) ? $companyDetails->phone_number : '666-888-000'
                                    }}</a>

                            </li>
                            <li>
                                <i class="potisen-icon-mail"></i><!-- /. -->
                                <a
                                    href="mailto:{{ isset($companyDetails->email_address) ? $companyDetails->email_address : 'needhelp@example.com' }}">{{
                                    isset($companyDetails->email_address) ? $companyDetails->email_address :
                                    'needhelp@example.com' }}</a>
                            </li>
                            <li>
                                <i class="potisen-icon-pin"></i><!-- /. -->
                                {{ isset($companyDetails->company_address) ? $companyDetails->company_address : '22
                                Broklyn Street 30 Road.
                                New York United States'}}
                            </li>
                        </ul><!-- /.list-unstyled footer-widget__post-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__upper -->
    <div class="site-footer__bottom">
        <div class="container">
            <div class="inner-container text-center">
                <p class="site-footer__copy">&copy; Copyright 2022 by <a href="/">{{ __('home.footer.copyright') }}</a>
                </p>
                <!-- /.site-footer__copy -->
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
</footer>
