<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="{{ isset($appSetting->meta_description) ? $appSetting->meta_description : ''  }}">
    <meta name="keywords"
        content="{{ isset($appSetting->keywords) ? $appSetting->keywords : '' }}">
    {{-- <meta name="author" content="LEFT4CODE"> --}}

    <title>
        @yield('title', 'Register Member')
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/ar/dist/css/app.css" />
    <link rel="stylesheet" href="/ar/dist/css/custom.css" />
    <link rel="stylesheet" href="/ar/dist/css/nepali-date-picker.min.css">
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')

    {{-- <link rel="stylesheet" href="/css/app.css" /> --}}

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app" style="background-color:#d41e44;" >
    @include('partials.message')
    <div class="flex">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="flex items-center my-4">
                <h2 class="intro-y text-lg font-medium mx-auto">
                    नयाँ सदस्यता को लागि Online फारम भर्नुहोस् |
                </h2>
            </div>
            <form action="{{ route('home.member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box pb-10 sm:py-20">
                    <div class="flex items-center mb-6 px-4">
                        <h2 class="intro-y text-lg font-medium mr-auto text-center pt-4">
                            यस नागरिक उन्मुक्ति पार्टीको विधान बमोजिम पार्टीको साधारण सदस्यताको निमित आवश्यक बिवरण सहित यो फारम अनलाईन भर्दैछु।  यस पार्टीको विधानअनुसार संगठानिक हित र लक्ष्य प्राप्तिका निमित्त  सदैब विधानअनुसार पार्टीको हित्तको लागि काम गर्नेछु।  विधान विपरित कार्य गरेमा मैले प्राप्त गरेको सदस्यता स्वत: खारेज हुनेमा मेरो पूर्ण मन्जुरी छ।
                        </h2>
                    </div>
                    <div class="px-5 sm:px-20 pt-10 border-t border-gray-200 tab-content__pane" id="citizenship-content">


                        <hr class="mt-5 mb-5">
                        <h1 class="text-2xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Personal Details
                            (व्यक्तिगत विवरण) </h1>
                        <hr class="mt-5 mb-5">
                    
                        {{-- Name --}}
                        <div class="grid grid-cols-12 gap-5 ">
                            <div class=" col-span-12 lg:col-span-6">
                                <div class="font-medium mt-3  @error('name_en') text-theme-6 @enderror flex items-center">
                                    Full Name
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="Write Full Name in English" name="name_en" id="name_en"
                                    value="{{ isset($member->name_en) ? $member->name_en : old('name_en') }}">
                                @error('name_en')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" col-span-12 lg:col-span-6">
                                <div class="font-medium mt-3 ml-2  @error('name_lc') text-theme-6 @enderror  flex items-center">
                                    पुरा नाम
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                    placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="name_lc" id="name_lc"
                                    value="{{ isset($member->name_lc) ? $member->name_lc : old('name_lc') }}">
                                @error('name_lc')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                         {{-- Gender Birth Date --}}
                         <div class="grid grid-cols-12 gap-2 ">
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3  @error('gender_id') text-theme-6 @enderror">
                                        Gender (लिङ्ग)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="लिङ्ग छान्नुहोस् |" class="select2 w-full" name="gender_id"
                                            id="gender_id">
                                            <option hidden>Gender (लिङ्ग छान्नुहोस् |)</option>
                                            @foreach ($genders as $gender)
                                            {{-- {{ dd($gender->id) }} --}}
                                            <option value="{{ $gender->id }}" @if (isset($member)) @if ($member->gender->id == $gender->id)
                                                selected @endif
                                                @endif>
                                                {{ $gender->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3 @error('birth_date_ad') text-theme-6 @enderror">
                                        Birth Date in AD
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <input class="datepicker input w-full border mt-2" name="birth_date_ad"
                                        placeholder="Select Date of Birth in AD" data-single="1"
                                        value="{{ isset($member->birth_date_ad) ? $member->birth_date_ad : old('birth_date_ad') }}">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3 @error('birth_date_bs') text-theme-6 @enderror">
                                        Birth Date in BS
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <input type="text" class="nepalidatepicker input w-full border mt-2" name="birth_date_bs"
                                        placeholder="Select Date of Birth in BS"
                                        value="{{ isset($member) ? $member->birth_date_bs : old('birth_date_bs') }}" data-single="1">
                                    @error('birth_date_bs')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <div class="font-medium  @error('email') text-theme-6 @enderror  flex items-center">
                                        Email
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text" class="input w-full border mt-2  @error('email') border-theme-6 @enderror"
                                            placeholder="Write Email Address (Email लेख्नुहोस |)" name="email" id="email"
                                            value="{{ isset($member) ? $member->email : old('email') }}">
                                        @error('email')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <div class="font-medium  @error('phone_number') text-theme-6 @enderror  flex items-center">
                                        Phone Number
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text" class="input w-full border mt-2  @error('phone_number') border-theme-6 @enderror"
                                            placeholder="Write Phone Number (फोन न. लेखनुहोस् | )" name="phone_number" id="phone_number"
                                            value="{{ isset($member) ? $member->phone_number : old('phone_number') }}">
                                        @error('phone_number')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <div class="font-medium  @error('mobile_number') text-theme-6 @enderror  flex items-center">
                                        Mobile Number
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text"
                                            class="input w-full border mt-2  @error('mobile_number') border-theme-6 @enderror"
                                            placeholder="Write Mobile Number (मोबाइल न. लेख्नुहोस |)" name="mobile_number" id="mobile_number"
                                            value="{{ isset($member) ? $member->mobile_number : old('mobile_number') }}">
                                        @error('mobile_number')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h1 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                            Citizenship Based Details (नागरिकता आधारित विवरण)
                        </h1>
                        <hr class="mt-5 mb-5">
                    
                        
                    
                       
                    
                        {{-- Citizenship Issued Address --}}
                        <div class="grid grid-cols-12 gap-2 ">
                            <div class="col-span-12 lg:col-span-6">
                                {{-- Citizenship Issued Province --}}
                                <div class="mt-3 mr-2">
                                    <label class="font-medium mt-3  @error('citizen_province_id') text-theme-6 @enderror">
                                        Citizenship Issued Province (नागरिकता प्राप्त प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="citizen_province_id"
                                            id="citizen_province_id" onchange="getDistrict('citizen')">
                                            <option hidden>--- नागरिकता प्राप्त प्रदेश छान्नुहोस् | ---</option>
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" @if (isset($member)) @if ($member->citizenProvince->id ==
                                                $province->id)
                                                selected @endif
                                                @endif
                                                >{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('citizen_province_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                {{-- Citizenship Issued District --}}
                                <div class="mt-3 mr-2">
                                    <label class="font-medium mt-3 @error('citizen_district_id') text-theme-6 @enderror">
                                        Citizenship Issued District (नागरिकता प्राप्त जिल्ला)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                            class="select2 w-full items-center" name="citizen_district_id" id="citizen_district_id">
                                        </select>
                                        @error('citizen_district_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        {{-- Id Number --}}
                        <div class="grid grid-cols-12 gap-2 ">
                            <div class="col-span-12 lg:col-span-4">
                                <div class="font-medium mt-3  @error('citizenship_number') text-theme-6 @enderror  flex items-center">
                                    Citizenship Number (नागरिकता प्र. प्र. नं.)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="नागरिकता प्र. प्र. नं. लेख्नुहोस |" name="citizenship_number" id="citizenship_number"
                                    value="{{ isset($member->citizenship_number) ? $member->citizenship_number : old('citizenship_number') }}">
                                @error('citizenship_number')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" col-span-12 lg:col-span-4">
                                <div class="font-medium mt-3 ml-2  @error('passport_number') text-theme-6 @enderror  flex items-center">
                                    Passport Number
                                </div>
                                <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-2"
                                    placeholder="Passport Number लेख्नुहोस |" name="passport_number" id="passport_number"
                                    value="{{ isset($member->passport_number) ? $member->passport_number : old('passport_number') }}">
                                @error('passport_number')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" col-span-12 lg:col-span-4">
                                <div class="font-medium mt-3 ml-2  @error('voter_id_number') text-theme-6 @enderror  flex items-center">
                                    Voter Id Number
                                </div>
                                <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-2"
                                    placeholder="Voter Id Number लेख्नुहोस |" name="voter_id_number" id="voter_id_number"
                                    value="{{ isset($member->voter_id_number) ? $member->voter_id_number : old('voter_id_number') }}">
                            </div>
                        </div>
                    
                        {{-- Permnanent Address --}}
                        <hr class="mt-5 mb-5">
                        <h1 class="text-2xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Permanent
                            Address
                            (स्थायी ठेगाना) </h1>
                        <hr class="mt-5 mb-5">
                    
                        <div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- Province --}}
                                    <div class="mt-3">
                                        <label class="font-medium mt-3 @error('perm_province_id') text-theme-6 @enderror">
                                            Province (प्रदेश)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="perm_province_id"
                                                id="perm_province_id" onchange="getDistrict('perm')">
                                                <option hidden>प्रदेश छान्नुहोस्</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}" @if (isset($member)) @if ($member->permProvince->id ==
                                                    $province->id)
                                                    selected @endif
                                                    @endif
                                                    >{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('perm_province_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- District --}}
                                    <div class="mt-3">
                                        <label class="font-medium mt-3 @error('perm_district_id') text-theme-6 @enderror">
                                            District (जिल्ला)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                                class="select2 w-full items-center" name="perm_district_id" id="perm_district_id"
                                                onchange="getLocalLevel('perm');">
                                            </select>
                                            @error('perm_district_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- LocalLevel --}}
                                    <div class="mt-3">
                                        <label class="font-medium mt-3 @error('perm_local_level_id') text-theme-6 @enderror">
                                            Local Level (स्थानीय तह)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="पहिला जिल्ला छान्नुहोस् |" class="select2 w-full ml-2 mt-3"
                                                name="perm_local_level_id" id="perm_local_level_id" onchange="getLocalLevelType('perm')">
                                            </select>
                                            @error('perm_local_level_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- Local Level Type --}}
                                    <div class="mt-3">
                                        <div
                                            class="font-medium mt-3 ml-2  @error('perm_local_level_type_id') text-theme-6 @enderror  flex items-center">
                                            Local Level Type (प्रदेश)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </div>
                                        <div class="mt-3">
                                            <select data-placeholder="पहिला स्थानीय तह छान्नुहोस् |" class="select2 w-full ml-2 mt-3"
                                                name="perm_local_level_type_id" id="perm_local_level_type_id" onchange="getDistrict()">
                                            </select>
                                            @error('perm_local_level_type_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- Ward Number --}}
                                    <div class="mt-3">
                                        <div
                                            class="font-medium mt-3 ml-2  @error('perm_ward_number') text-theme-6 @enderror  flex items-center">
                                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                            Ward Number (वडा नम्बर)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="Write Ward Number (वडा नम्बर लेख्नुहोस |)" name="perm_ward_number"
                                            id="perm_ward_number"
                                            value="{{ isset($member->perm_ward_number) ? $member->perm_ward_number : old('perm_ward_number') }}">
                                        @error('perm_ward_number')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    {{-- Tole Name --}}
                                    <div class="mt-3">
                                        <div class="font-medium mt-3 ml-2  @error('perm_tole') text-theme-6 @enderror  flex items-center">
                                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                            Tole (टोल)
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="Write Tole Name" name="perm_tole" id="perm_tole"
                                            value="{{ isset($member->perm_tole) ? $member->perm_tole : old('perm_tole') }}">
                                        @error('perm_tole')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                    
                        
                    </div>

                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5" id="btnDiv"
                    hidden>
                    <button type="submit"
                        class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                </div>
                <!-- END: Wizard Layout -->
            </form>

        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="/js/jquery-3.6.0.min.js">
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
        integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> --}}
    <script src="/ar/dist/js/app.js"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/ar/dist/js/nepali-date-picker.min.js"></script>
    <script src="/ar/dist/js/custom.js"></script>
    <script>
        var ownImage = function(event) {
            var image = document.getElementById('own_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var signImage = function(event) {
            var image = document.getElementById('sign_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipFront = function(event) {
            var image = document.getElementById('citizenship_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipBack = function(event) {
            var image = document.getElementById('citizenship_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportFront = function(event) {
            var image = document.getElementById('passport_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportBack = function(event) {
            var image = document.getElementById('passport_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var licenseImage = function(event) {
            var image = document.getElementById('license_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panFront = function(event) {
            var image = document.getElementById('pan_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panBack = function(event) {
            var image = document.getElementById('pan_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        $(document).ready(function() {
            $("#citizenship-button").addClass('bg-theme-9 text-white');
            $("#citizenship-button").removeClass('bg-gray-200 text-gray-600');

            $("#personal-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#citizenship-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#property-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#old-membership-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#documents-button").addClass('bg-gray-200 text-gray-600 ');
                $("#documents-button").removeClass('bg-theme-9 text-white');
            });

            $("#documents-button").click(function() {
                $(this).addClass('bg-theme-9 text-white');
                $(this).removeClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").addClass('bg-gray-200 text-gray-600 ');
                $("#citizenship-button").removeClass('bg-theme-9 text-white');
                $("#personal-button").addClass('bg-gray-200 text-gray-600 ');
                $("#personal-button").removeClass('bg-theme-9 text-white');
                $("#property-button").addClass('bg-gray-200 text-gray-600 ');
                $("#property-button").removeClass('bg-theme-9 text-white');
                $("#old-membership-button").addClass('bg-gray-200 text-gray-600 ');
                $("#old-membership-button").removeClass('bg-theme-9 text-white');
            });
        });
    </script>
    <!-- END: JS Assets-->
</body>

</html>
