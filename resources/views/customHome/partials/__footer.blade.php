<div class="footer-social-icons text-center p-3">
    <ul class="list-inline">
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
                <p>{{__('base.title')}} केन्द्रीय प्रचार तथा प्रकाशन विभागद्वारा सञ्चालित । आशिष झा | जिबछ यादव</p>
                <div class="divider"></div>
                <p class="mb-4">{{__('home.address')}}:{{$companyDetails->company_address}}, {{__("home.phone")}}: {{$companyDetails->phone_number}}, {{$companyDetails->mobile_number}}
                    {{__('home.email')}}: {{$companyDetails->email}}
                </p>
            </div>
        </div>
    </div>
</div>

