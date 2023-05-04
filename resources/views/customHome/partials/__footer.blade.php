<div class="footer-social-icons text-center p-3">
    <ul class="list-inline">
        @isset($companyDetails->email_address)
            <li>
                <a href="mailto:{{ $companyDetails->email_address }}" target="_blank" class="icon">
                    <i class="far fa-envelope-open"></i>
                </a>
            </li>
        @endisset

        <li>
            <a href="tel:{{ $companyDetails->phone_number }}" target="_blank" class="icon">
                <i class="fas fa-phone-volume"></i>
            </a>
        </li>
        @isset($companyDetails->facebook_link)
            <li>
                <a href="{{ $companyDetails->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </li>
        @endisset
        @isset($companyDetails->instagram_link)
            <li>
                <a href="{{ $companyDetails->instagram_link }}" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        @endisset
        @isset($companyDetails->twitter_link)
            <li><a href="{{ $companyDetails->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
        @endisset
    </ul>
</div>
<div class="text-center footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>{{ __('base.title') }} केन्द्रीय सूचना प्रविधि प्रमुख द्वारा सञ्चालित । आशिष झा | जिबछ यादव</p>
                <div class="divider"></div>
                <p class="mb-4">{{ __('home.address') }}:{{ $companyDetails->company_address }},
                    {{ __('home.phone') }}: {{ $companyDetails->phone_number }}, {{ $companyDetails->mobile_number }}
                    {{ __('home.email') }}: {{ $companyDetails->email_address }}
                </p>
            </div>
        </div>
    </div>
</div>
