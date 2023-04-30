@extends('layouts.customHome')

@push('head')
<style>
	h4{
		margin:2rem 0;
		padding:2rem 0;
	}
</style>
@endpush

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h2 class="news-title mb-2">
                                {{ __('about.donation.heading') }}
                            </h2>
                            <div class="news-content mt-1 pt-3">
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <h4 class="m-2"><span class="font-weight-bold"> Bank Name (खाता रहेको बैंक) : </span>Everest
                                            Bank Limited (एभरेस्ट
                                            बैंक लिमिटेड ।)</h4>
                                        <h4 class="m-2"><span class="font-weight-bold"> Account Holder Name (खाता बालाको नाम) :
                                            </span>Nagrik Unmukti Party
                                            (नागरिक उन्मुक्ति पार्टी )</h4>
                                        <h4 class="m-2"><span class="font-weight-bold"> Account Number (खाता न .) :
                                            </span>00100501228476 (००१००५०१२२८४७६)
                                        </h4>
                                        <h4 class="m-2"><span class="font-weight-bold"> Branch (शाखा) : </span>New Baneshwar, Kathmandu
                                            Nepal (नयाँ
                                            बानेश्वर, काठमाडौं, नेपाल)</h4>
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                                <hr>
                                {{-- <p class="about-one__text text-center m-0">{{ __('about.about-one.content') }}</p>
								<!-- /.about-one__text --> --}}
                                <p class="about-one__text text-center m-0">
                                    <span class="font-weight-bold">नोट : </span>कृप्या रकम जम्मा गरे पछी रकमको भौचर
                                    email Id : <span class="font-weight-bold">komal@nagrikunmuktiparty.org /
                                        nagrikunmuktiparty@gmail.com</span>
                                    अथवा माथी उल्लेखित फोन न.को Viber/Whatsapp / Messnger मा पठाई दिनुहुन अनुरोध छ।
                                </p><!-- /.about-one__text -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="row gy-4">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
