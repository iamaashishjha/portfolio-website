<section class="section-gap light-bg contact">
    <div class=" container">
        <div class="main-title text-center">
            <h2 class="section-title">
                सम्पर्क
            </h2>
        </div>
        <div class="row">
            <div class="col-md-9 mx-auto mb-4">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">
                                    <span>फोन नं. </span>
                                </h3>
                                <p class="icon-box-description">
                                    {{ $companyDetails->phone_number }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="icon">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">
                                    <span>इमेल </span>
                                </h3>
                                <p class="icon-box-description">
                                    {{ $companyDetails->email_address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="icon">
                                <i class="fas fa-map-pin"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">
                                    <span>केन्द्रीय कार्यालय </span>
                                </h3>
                                <p class="icon-box-description">
                                    {{ $companyDetails->company_address }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $companyDetails->google_map !!}
            </div>
        </div>
    </div>
</section>
