<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ isset($appSetting->image) ? $appSetting->image : '/hr/assets/images/favicons/favicon-32x32.png' }}"
        rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ isset($appSetting->meta_description) ? $appSetting->meta_description : '' }}">
    <meta name="keywords" content="{{ isset($appSetting->keywords) ? $appSetting->keywords : '' }}">
    {{--
    <meta name="author" content="LEFT4CODE"> --}}

    <title>
        Register New Member
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" type="text/css" href="/ar/dist/css/app.css" />
    <link rel="stylesheet" type="text/css" href="/ar/dist/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="/ar/dist/css/nepali-date-picker.min.css">
    <link rel="stylesheet" type="text/css" href="/hr/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app" style="background-color:#d41e44;">
    <div class="flex">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="flex items-center my-4">
                <h2 class="intro-y text-lg font-medium mx-auto">
                    नयाँ सदस्यता को लागि Online फारम भर्नुहोस् |
                </h2>
            </div>
            <form action="{{ route('home.member.store') }}" method="POST" enctype="multipart/form-data"
                id="member-form">
                @csrf
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box pb-10 sm:py-20">
                    <div class="flex items-center mb-6 px-4">
                        <h2 class="intro-y text-lg font-medium mr-auto text-center pt-4">
                            यस नागरिक उन्मुक्ति पार्टीको विधान बमोजिम पार्टीको साधारण सदस्यताको निमित आवश्यक बिवरण सहित
                            यो फारम अनलाईन भर्दैछु। यस पार्टीको विधानअनुसार संगठानिक हित र लक्ष्य प्राप्तिका निमित्त
                            सदैब विधानअनुसार पार्टीको हित्तको लागि काम गर्नेछु। विधान विपरित कार्य गरेमा मैले प्राप्त
                            गरेको सदस्यता स्वत: खारेज हुनेमा मेरो पूर्ण मन्जुरी छ।
                        </h2>
                    </div>

                    <div class="px-5 sm:px-20 border-t border-gray-200 tab-content__pane" id="citizenship-content">
                        <hr class="mb-5">
                        <h1 class="text-2xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Personal
                            Details
                            (व्यक्तिगत विवरण) </h1>
                        <hr class="mt-5 mb-5">


                        {{-- Name --}}
                        <div class="grid grid-cols-12 gap-5 ">
                            <div class=" col-span-12 lg:col-span-6">
                                <div
                                    class="font-medium mt-3  @error('name_en') text-theme-6 @enderror flex items-center">
                                    Full Name
                                    <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="Write Full Name in English" name="membership[name_en]" id="name_en"
                                    value="{{ isset($member->name_en) ? $member->name_en : old('name_en') }}">
                                @error('name_en')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" col-span-12 lg:col-span-6">
                                <div
                                    class="font-medium mt-3 ml-2  @error('name_lc') text-theme-6 @enderror  flex items-center">
                                    पुरा नाम
                                    <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                    placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="membership[name_lc]" id="name_lc"
                                    value="{{ isset($member->name_lc) ? $member->name_lc : old('name_lc') }}">
                                @error('name_lc')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Gender --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3  @error('gender_id') text-theme-6 @enderror">
                                        Gender (लिङ्ग)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="लिङ्ग छान्नुहोस् |" class="select2 w-full"
                                            name="membership[gender_id]" id="gender_id">
                                            <option hidden>Gender (लिङ्ग छान्नुहोस् |)</option>
                                            @foreach ($genders as $gender)
                                            {{-- {{ dd($gender->id) }} --}}
                                            <option value="{{ $gender->id }}" @if (isset($member)) @if ($member->
                                                gender->id == $gender->id)
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
                            {{-- Birth Date --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3 @error('birth_date_ad') text-theme-6 @enderror">
                                        Birth Date in AD
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <input class="datepicker input w-full border mt-2" name="membership[birth_date_ad]"
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
                                    <input type="text" class="nepalidatepicker input w-full border mt-2"
                                        name="membership[birth_date_bs]" placeholder="Select Date of Birth in BS"
                                        value="{{ isset($member) ? $member->birth_date_bs : old('birth_date_bs') }}"
                                        data-single="1">
                                    @error('birth_date_bs')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <div class="font-medium  @error('email') text-theme-6 @enderror  flex items-center">
                                        Email
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text"
                                            class="input w-full border mt-2  @error('email') border-theme-6 @enderror"
                                            placeholder="Write Email Address (Email लेख्नुहोस |)" name="user[email]"
                                            id="email" value="{{ isset($member) ? $member->email : old('email') }}">
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
                                    <div
                                        class="font-medium  @error('phone_number') text-theme-6 @enderror  flex items-center">
                                        Phone Number
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text"
                                            class="input w-full border mt-2  @error('phone_number') border-theme-6 @enderror"
                                            placeholder="Write Phone Number (फोन न. लेखनुहोस् | )"
                                            name="membership[phone_number]" id="phone_number"
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
                                    <div
                                        class="font-medium  @error('mobile_number') text-theme-6 @enderror  flex items-center">
                                        Mobile Number
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <div class="">
                                        <input type="text"
                                            class="input w-full border mt-2  @error('mobile_number') border-theme-6 @enderror"
                                            placeholder="Write Mobile Number (मोबाइल न. लेख्नुहोस |)"
                                            name="membership[mobile_number]" id="mobile_number"
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

                        {{-- Start: Permnanent Address --}}
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
                                        <label
                                            class="font-medium mt-3 @error('perm_province_id') text-theme-6 @enderror">
                                            Province (प्रदेश)
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                                name="address[perm_province_id]" id="perm_province_id"
                                                onchange="getDistrict('perm_province_id', 'perm_district_id')">
                                                <option hidden>प्रदेश छान्नुहोस्</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}" @if (isset($member)) @if ($member->
                                                    permProvince->id == $province->id)
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
                                        <label
                                            class="font-medium mt-3 @error('perm_district_id') text-theme-6 @enderror">
                                            District (जिल्ला)
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                                class="select2 w-full items-center" name="address[perm_district_id]"
                                                id="perm_district_id"
                                                onchange="getLocalLevel('perm_district_id', 'perm_local_level_id');">
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
                                        <label
                                            class="font-medium mt-3 @error('perm_local_level_id') text-theme-6 @enderror">
                                            Local Level (स्थानीय तह)
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <div class="mt-2">
                                            <select data-placeholder="पहिला जिल्ला छान्नुहोस् |"
                                                class="select2 w-full ml-2 mt-3" name="address[perm_local_level_id]"
                                                id="perm_local_level_id">
                                            </select>
                                            @error('perm_local_level_id')
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
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="Write Ward Number (वडा नम्बर लेख्नुहोस |)"
                                            name="address[perm_ward_number]" id="perm_ward_number"
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
                                        <div
                                            class="font-medium mt-3 ml-2  @error('address.perm_tole') text-theme-6 @enderror  flex items-center">
                                            Tole (टोल)
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="Write Tole Name" name="address[perm_tole]" id="perm_tole"
                                            value="{{ isset($member->perm_tole) ? $member->perm_tole : old('address.perm_tole') }}">
                                        @error('address.perm_tole')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- End: Permnanent Address --}}

                        {{-- START: Citizenship DETAILS --}}

                        <hr class="mt-5 mb-5">
                        <h1 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                            Citizenship Based Details (नागरिकता आधारित विवरण)
                        </h1>
                        <hr class="mt-5 mb-5">


                        <div class="grid grid-cols-12 gap-2 ">

                            {{-- Citizenship number --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div
                                    class="font-medium mt-3  @error('citizenship_number') text-theme-6 @enderror  flex items-center">
                                    Citizenship Number (नागरिकता प्र. प्र. नं.)
                                    <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="नागरिकता प्र. प्र. नं. लेख्नुहोस |" name="identity[identity_number]"
                                    id="citizenship_number"
                                    value="{{ isset($member->citizenship_number) ? $member->citizenship_number : old('citizenship_number') }}">
                                @error('citizenship_number')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Citizenship Issued Province --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3 mr-2">
                                    <label
                                        class="font-medium mt-3  @error('citizen_province_id') text-theme-6 @enderror">
                                        Citizenship Issued Province (नागरिकता प्राप्त प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                            name="identity[identity_issued_province_id]" id="citizen_province_id"
                                            onchange="getDistrict('citizen_province_id', 'citizen_district_id')">
                                            <option hidden>--- नागरिकता प्राप्त प्रदेश छान्नुहोस् | ---</option>
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" @if (isset($member)) @if ($member->
                                                citizenProvince->id == $province->id)
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

                            {{-- Citizenship Issued District --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3 mr-2">
                                    <label
                                        class="font-medium mt-3 @error('citizen_district_id') text-theme-6 @enderror">
                                        Citizenship Issued District (नागरिकता प्राप्त जिल्ला)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                            class="select2 w-full items-center"
                                            name="identity[identity_issued_district_id]" id="citizen_district_id">
                                        </select>
                                        @error('citizen_district_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Citizenship Issued Date AD --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3 @error('birth_date_ad') text-theme-6 @enderror">
                                        Citizenship Issued Date AD <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <input class="datepicker input w-full border mt-2"
                                        name="identity[identity_issued_date_ad]" placeholder="Select Issued date in AD"
                                        data-single="1"
                                        value="{{ isset($member->birth_date_ad) ? $member->birth_date_ad : old('birth_date_ad') }}">
                                </div>
                            </div>

                            {{-- Citizenship Issued Date BS --}}
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-3">
                                    <label class="font-medium mt-3 @error('birth_date_bs') text-theme-6 @enderror">
                                        Citizenship Issued Date BS
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <input type="text" class="nepalidatepicker input w-full border mt-2"
                                        name="identity[identity_issued_date_bs]" placeholder="Select Issued date in BS"
                                        value="{{ isset($member) ? $member->birth_date_bs : old('birth_date_bs') }}"
                                        data-single="1">
                                    @error('birth_date_bs')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- END: Citizenship DETAILS --}}
                    </div>
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button type="submit"
                        class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                </div>
                <!-- END: Wizard Layout -->
            </form>

            <div class="modal" id="member-payment-modal">
                <div class="modal__content modal__content--lg p-10 ">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Membership Fee Payment (सदस्यता शुल्क भुक्तानी गर्नुहोस्)
                        </h2>
                    </div>

                    <div class="p-5 grid grid-cols-1 gap-4 row-gap-3">
                        @csrf
                        <div class="col-span-12 sm:col-span-12">
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                                    <input type="radio" class="input-amount input border mr-2" id="input-amt-500"
                                        name="input-amount" value="500">
                                    <label class="cursor-pointer select-none" for="input-amt-500">500</label>
                                </div>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" class="input-amount input border mr-2" id="input-amt-1000"
                                        name="input-amount" value="1000">
                                    <label class="cursor-pointer select-none" for="input-amt-1000">1000</label>
                                </div>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" class="input-amount input border mr-2" id="input-amt-2500"
                                        name="input-amount" value="2500">
                                    <label class="cursor-pointer select-none" for="input-amt-2500">2500</label>
                                </div>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" class="input-amount input border mr-2" id="input-amt-5000"
                                        name="input-amount" value="5000">
                                    <label class="cursor-pointer select-none" for="input-amt-5000">5000</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <div class="mt-3">
                                <h3
                                    class="mb-5 text-lg font-medium text-gray-900 dark:text-white  @error('email') text-theme-6 @enderror">
                                    Enter Amount <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </h3>

                                <div class="mb-6">
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13  mt-3"
                                        name="number" id="payment_amount"
                                        value="{{ isset($member) ? $member->payment_amount : old('payment_amount') }}">
                                    @error('payment_amount')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 grid grid-cols-2 gap-4">
                            @foreach ($payment_gateways as $item)
                            <div class="mt-3">
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                                        <input type="radio" class="input border mr-2"
                                            id="payment_gateway_{{ $item->id }}" name="payment_gateway_id"
                                            value="{{ $item->id }}">
                                        <label for="payment_gateway_{{ $item->id }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                                            <div
                                                class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200 dark:border-dark-5">
                                                <div class="sm:mr-5">
                                                    <div class="w-20 h-20 image-fit">
                                                        <img alt="{{ $item->name }}" class="rounded-full"
                                                            src="{{ $item->image }}">
                                                    </div>
                                                </div>
                                                <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                    <div class="text-gray-600 mt-1 sm:mt-0">{{ $item->name }}</div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                        <input type="hidden" name="hidden-member-id" id="hidden-member-id">
                        <button type="button" data-dismiss="modal"
                            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white"
                            id="submit-payment">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="/ar/dist/js/app.js"></script>
    <script src="/ar/dist/js/nepali-date-picker.min.js"></script>
    <script src="/ar/dist/js/custom.js"></script>
    <script src="/js/payment_scripts.js"></script>

    <script>
    
        $('#member-form').submit(function(e) {
            e.preventDefault();
            const formSubmitUrl = $(this).attr('action');
            const formSubmitMethod = $(this).attr('method');
            const formDataString = $(this).serialize();
            $.ajax({
                type: formSubmitMethod,
                url: formSubmitUrl,
                data: formDataString,
                success: function(response) {
                    const memberId = response.data.id;
                    $('#hidden-member-id').val(memberId);
                    $('#member-payment-modal').modal('show');
                }, 
                error: function(xhr, status, error) {
                    console.log(new Date() + "@RESPONSE-TEXT=>" + xhr.responseText);
                    if (xhr.responseJSON.errors) {
                        const errors = xhr.responseJSON.errors
                        $.map(errors, function(value, index) {
                            new Noty({type: 'error', text: value[0]}).show();
                        });
                    } else if (xhr.responseJSON.error) {
                        new Noty({type: 'error', text: xhr.responseJSON.error}).show();
                    }
                }
            });
        });
    
        fillInputAmount('input-amount', 'payment_amount');
        initiatePaymentTransaction('submit-payment');
    </script>
    <!-- END: JS Assets-->
    @include('partials.message')
</body>

</html>