@extends('layouts.ar')

@section('title')
{{ isset($member) ? 'Edit Member ' . '"' . $member->title . '". | Nagrik Unmukti PartyDetails' : 'Create New Member |
Nagrik
Unmukti PartyDetails' }}
@endsection

@section('css')
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.member.index') }}" class="">Members</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($member) ? 'Edit Member ' . '"' . $member->name_en . '" details' : 'Create New Member' }}
    </a>
</div>
@endsection

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($member) ? 'Edit New Blog Post' : 'नयाँ सदस्य बनानुहोस' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">
            <i class="fa fa-list mx-2" aria-hidden="true"></i> All Registered Members</a>

        <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">
            <i class="fa fa-list mx-2" aria-hidden="true"></i> All Approved Members</a>

    </div>
</div>

{{-- @include('partials.ar.modelMessage') --}}

<form action="{{ isset($member) ? route('admin.member.update', $member->id) : route('admin.member.store') }}"
    method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5" id="admin-member-form">
    @csrf
    @if (isset($member))
    @method('PUT')
    @endif
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12">
        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__content tab-content">

                <div class="tab-content__pane p-5 active" id="citizenship-content">


                    <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Personal Details
                        (व्यक्तिगत बिबरण|) </h1>
                    <hr class="mt-5 mb-5">
                    {{-- Name --}}
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="font-medium mt-3  @error('name_en') text-theme-6 @enderror flex items-center">
                                Full Name
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
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
                        <div class="col-span-12 lg:col-span-6">
                            <div class="font-medium mt-3   @error('name_lc') text-theme-6 @enderror  flex items-center">
                                पुरा नाम
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13  mt-3"
                                placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="membership[name_lc]" id="name_lc"
                                value="{{ isset($member->name_lc) ? $member->name_lc : old('name_lc') }}">
                            @error('name_lc')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-2">
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
                                        <option value="{{ $gender->id }}" @if (isset($member)) @if ($member->gender->id
                                            == $gender->id)
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
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 lg:col-span-4">
                            <div class="mt-3">
                                <div class="font-medium  @error('email') text-theme-6 @enderror  flex items-center">
                                    Email
                                    <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="email"
                                        class="input w-full border mt-2  @error('email') border-theme-6 @enderror"
                                        placeholder="Write Email Address (Email लेख्नुहोस |)" name="membership[email]"
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
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)"
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
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)"
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

                    {{-- Permnanent Address --}}
                    <hr class="mt-5 mb-5">
                    <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Permanent
                        Address
                        (स्थायी ठेगाना |) </h1>
                    <hr class="mt-5 mb-5">

                    <div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 lg:col-span-4">
                                {{-- Province --}}
                                <div class="mt-3 mr-2">
                                    <label class="font-medium mt-3 @error('perm_province_id') text-theme-6 @enderror">
                                        Province (प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                            name="address[perm_province_id]" id="perm_province_id"
                                            onchange="getDistrict('perm_province_id', 'perm_district_id')">
                                            <option hidden>प्रदेश छान्नुहोस्</option>
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" @if (isset($member)) @if ($member->
                                                permProvince->id ==
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
                                <div class="mt-3 mr-2">
                                    <label class="font-medium mt-3 @error('perm_district_id') text-theme-6 @enderror">
                                        District (जिल्ला)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
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
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला जिल्ला छान्नुहोस् |"
                                            class="select2 w-full  mt-3" name="address[perm_local_level_id]"
                                            id="perm_local_level_id" onchange="getLocalLevelType('perm')">
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
                                <div class="mt-3  mr-2">
                                    <div
                                        class="font-medium mt-3   @error('perm_ward_number') text-theme-6 @enderror  flex items-center">
                                        Ward Number (वडा नम्बर)
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13  mt-3"
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
                                <div class="mt-3 ">
                                    <div
                                        class="font-medium mt-3   @error('perm_tole') text-theme-6 @enderror  flex items-center">
                                        Tole (टोल)
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13  mt-3"
                                        placeholder="Write Tole Name" name="address[perm_tole]" id="perm_tole"
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

                    <hr class="mt-5 mb-5">
                    <h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                        Citizenship
                        Based Details (नागरिकता आधारित विवरण|)</h1>
                    <hr class="mt-5 mb-5">

                    {{-- Citizenship Issued Address --}}
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 lg:col-span-4">
                            <div
                                class="font-medium mt-3  @error('citizenship_number') text-theme-6 @enderror  flex items-center">
                                Citizenship Number (नागरिकता प्र. प्र. नं.)
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
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
                        <div class="col-span-12 lg:col-span-4">
                            {{-- Citizenship Issued Province --}}
                            <div class="mt-3 mr-2">
                                <label class="font-medium mt-3  @error('citizen_province_id') text-theme-6 @enderror">
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
                                            citizenProvince->id ==
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
                        <div class="col-span-12 lg:col-span-4">
                            {{-- Citizenship Issued District --}}
                            <div class="mt-3 mr-2">
                                <label class="font-medium mt-3 @error('citizen_district_id') text-theme-6 @enderror">
                                    Citizenship Issued District (नागरिकता प्राप्त जिल्ला)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="पहिला नागरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                        class="select2 w-full items-center" name="identity[identity_issued_district_id]"
                                        id="citizen_district_id">
                                    </select>
                                    @error('citizen_district_id')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <div
                                class="font-medium mt-3   @error('passport_number') text-theme-6 @enderror  flex items-center">
                                Citizenship Issued Date AD
                            </div>
                            <input class="datepicker input w-full border mt-2" data-single="1"
                                placeholder="Passport Number लेख्नुहोस |" name="identity[identity_issued_date_ad]"
                                id="passport_number"
                                value="{{ isset($member->passport_number) ? $member->passport_number : old('passport_number') }}">
                            @error('passport_number')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <div
                                class="font-medium mt-3   @error('voter_id_number') text-theme-6 @enderror  flex items-center">
                                Citizenship Issued Date BS
                            </div>
                            <input type="text" class="nepalidatepicker input w-full border mt-2"
                                placeholder="Voter Id Number लेख्नुहोस |" name="identity[identity_issued_date_bs]"
                                id="voter_id_number"
                                value="{{ isset($member->voter_id_number) ? $member->voter_id_number : old('voter_id_number') }}"
                                data-single="1">
                        </div>
                    </div>
                    <hr class="mt-5 mb-5">
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="admin-member-form-submit-btn">Submit</button>
    </div>
</form>


<div class="modal" id="header-footer-modal-preview">
    <div class="modal__content modal__content--lg p-10 ">
        {{-- <form action="{{ route('home.member.store') }}" method="POST" enctype="multipart/form-data"
            id="admin-membership_payment_form"> --}}
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
                                <input type="radio" class="input border mr-2" id="payment_gateway_{{ $item->id }}"
                                    name="payment_gateway_id" value="{{ $item->id }}">
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
                <button type="submit" class="button w-20 bg-theme-1 text-white" id="admin-submit-payment">Send</button>
            </div>
    </div>
    {{-- </form> --}}
</div>

@endsection


@section('script')
<script>
    $('.input-amount').click(function(e) {
        const value = $(this).val();
        $('#payment_amount').val(value);
    });

    // $('#admin-member-form-submit-btn').click(function (e) { 
    //     e.preventDefault();
    //     debugger;
    // });

    $('#admin-member-form').submit(function(e) {
        e.preventDefault();
        const formSubmitUrl = $(this).attr('action');
        const formSubmitMethod = $(this).attr('method');
        const formDataString = $(this).serialize();
        // console.log(new Date().getTime(), formSubmitUrl, formSubmitMethod);
        // debugger;
        $.ajax({
            type: formSubmitMethod,
            url: formSubmitUrl,
            data: formDataString,
            success: function(response) {
                debugger;
                const memberId = response.data.id;
                $('#hidden-member-id').val(memberId);
                $('#header-footer-modal-preview').modal('show');
                debugger;
            }, error: function(xhr, status, error) {
                if (xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors
                    $.map(errors, function(value, index) {
                        new Noty({
                            type: 'error'
                            , text: value[0]
                        }).show();
                    });
                } else if (xhr.responseJSON.error) {
                    new Noty({
                        type: 'error'
                        , text: xhr.responseJSON.error
                    }).show();
                }
                // Handle error response
            }
        });
    });

    $('#admin-submit-payment').click(function(e) {
        e.preventDefault();
        processPaymentForm();
    });

    // $('#admin-membership_payment_form').submit(function (e) {
    //     e.preventDefault();
    //     processPaymentForm();
    // });

    function processPaymentForm() {
        const paymentGatewayId = parseInt($("input[name='payment_gateway_id']:checked").val());
        const amount = parseInt($('#payment_amount').val());
        fetchAndProcessPaymentConfig(paymentGatewayId, amount);
    }

    function createAndSubmitForm(formSubmitUrl, params) {
        const form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", formSubmitUrl);
        // debugger;
        for (const key in params) {
            const hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);
            form.appendChild(hiddenField);
        }
        document.body.appendChild(form);
        form.submit();
        // const ajaxOptions = {
        //     url: formSubmitUrl,
        //     type: 'POST',
        //     data: params,
        //     success: function(response) {
        //         console.log('Form submitted successfully:', response);
        //     },
        //     error: function(xhr, status, error) {
        //         console.error('Error submitting form:', status, error);
        //     }
        // };

        // if (headers) {
        //     ajaxOptions.headers = headers;
        // }

        // $.ajax(ajaxOptions);
    }

    function fetchAndProcessPaymentConfig(id, amount) {
        const memberId = $('#hidden-member-id').val();
        const url = `/payment-gateway/get-payment-gateway-config/${id}/${memberId}?amount=${amount}`;
        let response = null;
        debugger;
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data, status) {
                data = data.data;
                console.log("Khalti Success Response => ", data);
                console.log("Khalti Success Response METHOD => ", 'payment-method' in data);
                console.log("Khalti Success Response URL => ", 'url' in data);
                console.log("ESEWA Success Response PARAMS => ", 'params' in data);
                console.log("Khalti Success Response BOTH => ", 'payment-method' in data && 'url' in data);
                if ('payment-method' in data) {
                    const $a = $('<a>', {
                        href: data.url
                    });
                    // Programmatically click the anchor tag
                    $a[0].click();
                    // Redirect to a new URL
                } else if('params' in data) {
                    const params = data.params;
                    const formSubmitUrl = data.url;
                    createAndSubmitForm(formSubmitUrl, params);
                }
                console.log("Payment Config Success Response => ", data);
                debugger;
            }, error: function(xhr, status, error) {
                if (xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors
                    $.map(errors, function(value, index) {
                        new Noty({
                            type: 'error'
                            , text: value[0]
                        }).show();
                    });
                } else if(xhr.responseJSON.error){
                    new Noty({
                            type: 'error'
                            , text: error
                        }).show();
                }
                console.error('Error fetching payment config:', error);
            }
        });
        console.log("Resposne after get => " + response);
        // return response;
    }

    // var ownImage = function(event) {
    //     var image = document.getElementById('own_image');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var signImage = function(event) {
    //     var image = document.getElementById('sign_image');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var citizenshipFront = function(event) {
    //     var image = document.getElementById('citizenship_front');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var citizenshipBack = function(event) {
    //     var image = document.getElementById('citizenship_back');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var passportFront = function(event) {
    //     var image = document.getElementById('passport_front');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var passportBack = function(event) {
    //     var image = document.getElementById('passport_back');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var licenseImage = function(event) {
    //     var image = document.getElementById('license_image');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var panFront = function(event) {
    //     var image = document.getElementById('pan_front');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var panBack = function(event) {
    //     var image = document.getElementById('pan_back');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

</script>
@endsection