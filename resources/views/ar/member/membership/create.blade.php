@extends('layouts.ar')

@section('title')
    {{ isset($member) ? 'Edit Member ' . '"' . $member->title . '". | Aashish Jha' : 'Create New Member | Aashish Jha' }}
@endsection

@section('css')
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.member.membership.index') }}" class="">Members</a>
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
            {{-- <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0">
                <i class="w-4 h-4 mr-2" data-feather="eye"></i>
                Preview
            </button> --}}
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">All
                Members</a>
        </div>
    </div>
    {{-- @include('partials.ar.messages') --}}
    @include('partials.ar.modelMessage')


    {{-- <div class="pos intro-y grid grid-cols-12 gap-5 mt-5"> --}}
    <form
        action="{{ isset($member) ? route('admin.member.membership.update', $member->id) : route('admin.member.membership.store') }}"
        method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        @csrf
        @if (isset($member))
            @method('PUT')
        @endif
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600 justify-items-center">
                    <a title="Citizenship Details (नागरिकताको विवरण)" data-toggle="tab" id="citizenship-button"
                        data-target="#citizenship-content" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Citizenship
                    </a>
                    <a title="Personal Details (व्यक्तिगत बिबरण)" data-toggle="tab" id="personal-button"
                        data-target="#personal-content" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center ">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Personal
                    </a>
                    <a title="Income/Property Details (आय/सम्पत्ति बिबरण)" data-toggle="tab" id="property-button"
                        data-target="#property-content" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="align-left" class="w-4 h-4 mr-2"></i>
                        Income / Property
                    </a>
                    <a title="Political Details (राजनैतिक बिबरण)" data-toggle="tab" id="old-membership-button"
                        data-target="#old-membership-content" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="code" class="w-4 h-4 mr-2"></i>
                        Political
                    </a>
                    <a title="Upload Necessary Documents (आबस्यक कागजातहरु Upload गर्नुहोस)" data-toggle="tab"
                        id="documents-button" data-target="#documents-content" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="align-left" class="w-4 h-4 mr-2"></i>
                        Documents
                    </a>
                </div>

                <div class="post__content tab-content">

                    <div class="tab-content__pane p-5 active" id="citizenship-content">
                        <h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">Citizenship
                            Based Details (नागरिकता अनुशारको विवरण |)</h1>
                        <hr class="mt-5 mb-5">

                        {{-- Name --}}
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <div class="font-medium mt-3  @error('name_en') text-theme-6 @enderror flex items-center">
                                    Full Name
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="Write Full Name in English" name="name_en" id="name_en"
                                    value="{{ isset($member->name_en) ? $member->name_en : old('name_en') }}">
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('name_lc') text-theme-6 @enderror  flex items-center">
                                    पुरा नाम
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                    placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="name_lc" id="name_lc"
                                    value="{{ isset($member->name_lc) ? $member->name_lc : old('name_lc') }}">
                            </div>
                        </div>

                        {{-- Gender Birth Date --}}
                        {{-- //::TODO Add Nepali Date Picker --}}
                        <div class="grid grid-cols-3 gap-2">
                            <div class="mt-3">
                                <label class="@error('gender_id') text-theme-6 @enderror">
                                    Gender (लिङ)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="लिङ छान्नुहोस् |" class="select2 w-full" name="gender_id"
                                        id="gender_id">
                                        <option hidden>Gender (लिङ छान्नुहोस् |)</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}"
                                                @if (isset($member)) @if ($member->gender->id == $gender->id) 
                                                        selected @endif
                                                @endif
                                                >
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
                            <div class="mt-3">
                                <label class="@error('birth_date_ad') text-theme-6 @enderror">
                                    Birth Date in AD
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <input class="datepicker input w-full border mt-2" name="birth_date_ad"
                                    placeholder="Select Date of Birth in AD" data-single="1"
                                    value="{{ isset($member->birth_date_ad) ? $member->birth_date_ad : old('birth_date_ad') }}">
                            </div>
                            <div class="mt-3">
                                <label class="@error('birth_date_bs') text-theme-6 @enderror">
                                    Birth Date in BS
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <input type="text" class="nepalidatepicker input w-full border mt-2" name="birth_date_bs"
                                    placeholder="Select Date of Birth in BS"
                                    value="{{ isset($member) ? $member->birth_date_bs : old('birth_date_bs') }}"
                                    data-single="1">
                            </div>
                        </div>

                        {{-- Citizenship Issued Address --}}
                        <div class="grid grid-cols-2 gap-2">
                            {{-- Citizenship Issued Province --}}
                            <div class="mt-3 mr-2">
                                <label class="@error('citizen_province_id') text-theme-6 @enderror">
                                    Citizenship Issued Province (नगरिकता प्राप्त प्रदेश)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                        name="citizen_province_id" id="citizen_province_id"
                                        onchange="getDistrict('citizen')">
                                        <option hidden>--- नगरिकता प्राप्त प्रदेश छान्नुहोस् | ---</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                @if (isset($member)) @if ($member->citizenProvince->id == $province->id)
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

                            {{-- Citizenship Issued District --}}
                            <div class="mt-3 mr-2">
                                <label class="@error('citizen_district_id') text-theme-6 @enderror">
                                    Citizenship Issued District (नगरिकता प्राप्त जिल्ला)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="पहिला नगरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                        class="select2 w-full items-center" name="citizen_district_id"
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

                        {{-- Id Number --}}
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <div
                                    class="font-medium mt-3  @error('citizenship_number') text-theme-6 @enderror  flex items-center">
                                    Citizenship Number (नगरिकता प्र. प्र. नं.)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                    placeholder="नगरिकता प्र. प्र. नं. लेख्नुहोस |" name="citizenship_number"
                                    id="citizenship_number"
                                    value="{{ isset($member->citizenship_number) ? $member->citizenship_number : old('citizenship_number') }}">
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('passport_number') text-theme-6 @enderror  flex items-center">
                                    Passport Number
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-"
                                    placeholder="Passport Number लेख्नुहोस |" name="passport_number" id="passport_number"
                                    value="{{ isset($member->passport_number) ? $member->passport_number : old('passport_number') }}">
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('voter_id_number') text-theme-6 @enderror  flex items-center">
                                    Voter Id Number
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-"
                                    placeholder="Voter Id Number लेख्नुहोस |" name="voter_id_number" id="voter_id_number"
                                    value="{{ isset($member->voter_id_number) ? $member->voter_id_number : old('voter_id_number') }}">
                            </div>
                        </div>

                        {{-- Permnanent Address --}}
                        <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Permanent Address
                            (स्थायी ठेगाना |) </h1>
                        <hr class="mt-5 mb-5">

                        <div>
                            <div class="grid grid-cols-3 gap-2">
                                {{-- Province --}}
                                <div class="mt-3 mr-2">
                                    <label class="@error('perm_province_id') text-theme-6 @enderror">
                                        Province (प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                            name="perm_province_id" id="perm_province_id" onchange="getDistrict('perm')">
                                            <option hidden>प्रदेश छान्नुहोस्</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"
                                                    @if (isset($member)) @if ($member->permProvince->id == $province->id)
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

                                {{-- District --}}
                                <div class="mt-3 mr-2">
                                    <label class="@error('perm_district_id') text-theme-6 @enderror">
                                        District (जिल्ला)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला नगरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                            class="select2 w-full items-center" name="perm_district_id"
                                            id="perm_district_id" onchange="getLocalLevel('perm');">
                                        </select>
                                        @error('perm_district_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- LocalLevel --}}
                                <div class="mt-3">
                                    <label class="@error('perm_local_level_id') text-theme-6 @enderror">
                                        Local Level (स्थानइय तह)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला जिल्ला छान्नुहोस् |"
                                            class="select2 w-full ml-2 mt-3" name="perm_local_level_id"
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

                            <div class="grid grid-cols-3 gap-2">
                                {{-- Local Level Type --}}
                                <div class="mt-3 mr-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('perm_local_level_type_id') text-theme-6 @enderror  flex items-center">
                                        Local Level Type (प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </div>
                                    <div class="mt-3">
                                        <select data-placeholder="पहिला स्थानइय तह छान्नुहोस् |"
                                            class="select2 w-full ml-2 mt-3" name="perm_local_level_type_id"
                                            id="perm_local_level_type_id" onchange="getDistrict()">
                                        </select>
                                        @error('perm_local_level_type_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ward Number --}}
                                <div class="mt-3 ml-2 mr-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('perm_ward_number') text-theme-6 @enderror  flex items-center">
                                        {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                        Ward Number (वार्ड नम्बर)
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                        placeholder="Write Ward Number (वार्ड नम्बर लेख्नुहोस |)" name="perm_ward_number"
                                        id="perm_ward_number"
                                        value="{{ isset($member->perm_ward_number) ? $member->perm_ward_number : old('perm_ward_number') }}">
                                </div>

                                {{-- Tole Name --}}
                                <div class="mt-3 ml-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('perm_tole') text-theme-6 @enderror  flex items-center">
                                        {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                        Tole (टोल)
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                        placeholder="Write Tole Name" name="perm_tole" id="perm_tole"
                                        value="{{ isset($member->perm_tole) ? $member->perm_tole : old('perm_tole') }}">
                                </div>

                            </div>
                        </div>

                        {{-- Temporary Address --}}
                        <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-1 font-medium leading-none mt-2 mb-2 text-center">Temporary Address
                            (अस्थायी ठेगाना |)</h1>
                        <hr class="mt-5 mb-5">

                        <div class="mt-5 mb-5">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                    Is Permanent address Temporary address ?</h5>
                                <input class="show-code input input--switch border" type="checkbox"
                                    id="perm_temp_address_chk" name="perm_temp_address_chk"
                                    {{ isset($category) ? $category->checkStatus() : '' }} onclick="sameAddress()">
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-3 gap-2">
                                {{-- Province --}}
                                <div class="mt-3 mr-2">
                                    <label class="@error('temp_province_id') text-theme-6 @enderror">
                                        Province (प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                            name="temp_province_id" id="temp_province_id" onchange="getDistrict('temp')">
                                            <option hidden>प्रदेश छान्नुहोस्</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"
                                                    @if (isset($member)) @if ($member->tempProvince->id == $province->id)
                                                selected @endif
                                                    @endif
                                                    >{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('temp_province_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- District --}}
                                <div class="mt-3 mr-2">
                                    <label class="@error('temp_district_id') text-theme-6 @enderror">
                                        District (जिल्ला)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला नगरिकता प्राप्त प्रदेश छान्नुहोस् |"
                                            class="select2 w-full items-center" name="temp_district_id"
                                            id="temp_district_id" onchange="getLocalLevel('temp');">
                                        </select>
                                        @error('temp_district_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- LocalLevel --}}
                                <div class="mt-3">
                                    <label class="@error('temp_local_level_id') text-theme-6 @enderror">
                                        Local Level (स्थानइय तह)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select data-placeholder="पहिला जिल्ला छान्नुहोस् |"
                                            class="select2 w-full ml-2 mt-3" name="temp_local_level_id"
                                            id="temp_local_level_id" onchange="getLocalLevelType('temp')">
                                        </select>
                                        @error('temp_local_level_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                {{-- Local Level Type --}}
                                <div class="mt-3 mr-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('temp_local_level_type_id') text-theme-6 @enderror  flex items-center">
                                        Local Level Type (प्रदेश)
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </div>
                                    <div class="mt-3">
                                        <select data-placeholder="पहिला स्थानइय तह छान्नुहोस् |"
                                            class="select2 w-full ml-2 mt-3" name="temp_local_level_type_id"
                                            id="temp_local_level_type_id">
                                        </select>
                                        @error('temp_local_level_type_id')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ward Number --}}
                                <div class="mt-3 ml-2 mr-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('temp_ward_number') text-theme-6 @enderror  flex items-center">
                                        {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                        Ward Number (वार्ड नम्बर)
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                        placeholder="Write Ward Number" name="temp_ward_number" id="temp_ward_number"
                                        value="{{ isset($member->temp_ward_number) ? $member->temp_ward_number : old('temp_ward_number') }}">
                                </div>
                                {{-- {{ dd($member->temp_tole, $member->temp_ward_number) }} --}}
                                {{-- Tole Name --}}
                                <div class="mt-3 ml-2">
                                    <div
                                        class="font-medium mt-3 ml-2  @error('temp_tole') text-theme-6 @enderror  flex items-center">
                                        {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                        Tole (टोल)
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </div>
                                    <input type="text"
                                        class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                        placeholder="Write Tole Name" name="temp_tole" id="temp_tole"
                                        value="{{ isset($member->temp_tole) ? $member->temp_tole : old('temp_tole') }}">
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="tab-content__pane p-5 active" id="personal-content">
                        {{-- personal details --}}
                        <h1 class="text-4xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">General
                            Details (आम विवरण |)</h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-3 gap-2">
                            <div class="mt-3">
                                <div class="font-medium  @error('email') text-theme-6 @enderror  flex items-center">
                                    Email
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('email') border-theme-6 @enderror"
                                        placeholder="Write Email Address (Email लेख्नुहोस |)" name="email" id="email"
                                        value="{{ isset($member) ? $member->email : old('email') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('phone_number') text-theme-6 @enderror  flex items-center">
                                    Phone Number
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('phone_number') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="phone_number"
                                        id="phone_number"
                                        value="{{ isset($member) ? $member->phone_number : old('phone_number') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('mobile_number') text-theme-6 @enderror  flex items-center">
                                    Mobile Number
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('mobile_number') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="mobile_number"
                                        id="mobile_number"
                                        value="{{ isset($member) ? $member->mobile_number : old('mobile_number') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium  @error('cast') text-theme-6 @enderror  flex items-center">
                                    Cast (जाति)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('cast') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="cast" id="cast"
                                        value="{{ isset($member) ? $member->cast : old('cast') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium  @error('category') text-theme-6 @enderror  flex items-center">
                                    वर्ग
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('category') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="category" id="category"
                                        value="{{ isset($member) ? $member->category : old('category') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('category_source') text-theme-6 @enderror  flex items-center">
                                    वर्ग स्रोत
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('category_source') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="category_source"
                                        id="category_source"
                                        value="{{ isset($member) ? $member->category_source : old('category_source') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('education_qualification') text-theme-6 @enderror  flex items-center">
                                    Education Qualification (शैक्षिक् योग्यता)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                        name="education_qualification" id="education_qualification">
                                        <option hidden>Education Qualification (शैक्षिक् योग्यता)</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @error('education_qualification')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium  @error('blood_group') text-theme-6 @enderror  flex items-center">
                                    Blood Group (रक्त समूह )
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                        name="blood_group" id="blood_group">
                                        <option hidden>Blood Group (रक्त समूह)</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @error('blood_group')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('other_identity') text-theme-6 @enderror  flex items-center">
                                    Other Identity (अन्य पहिचान)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                        name="other_identity" id="other_identity">
                                        <option hidden>Other Identity (अन्य पहिचान)</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @error('other_identity')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- family details --}}
                        <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-6 font-medium leading-none mt-7 mb-5 mb-2 text-center">Family
                            Details (पारिबारिक विवरण |)</h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-2 gap-2 mb-1">
                            <div class="mt-3">
                                <div class="font-medium  @error('father_name') text-theme-6 @enderror  flex items-center">
                                    Father's Name (बुवाको नाम)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('father_name') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="father_name"
                                        id="father_name"
                                        value="{{ isset($member) ? $member->father_name : old('father_name') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium  @error('mother_name') text-theme-6 @enderror  flex items-center">
                                    Mother's Name (आमाको नाम)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('mother_name') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="mother_name"
                                        id="mother_name"
                                        value="{{ isset($member) ? $member->mother_name : old('mother_name') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('grand_father_name') text-theme-6 @enderror  flex items-center">
                                    Grand Father's Name (हजुर बुवाको नाम)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('grand_father_name') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="grand_father_name"
                                        id="grand_father_name"
                                        value="{{ isset($member) ? $member->grand_father_name : old('grand_father_name') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('grand_mother_name') text-theme-6 @enderror  flex items-center">
                                    Grand Mother's Name (हजुर आमाको नाम)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('grand_mother_name') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="grand_mother_name"
                                        id="grand_mother_name"
                                        value="{{ isset($member) ? $member->grand_mother_name : old('grand_mother_name') }}">
                                </div>
                            </div>

                        </div>

                        {{-- Maraital Status --}}
                        <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-12 font-medium leading-none mt-7 mb-5 mb-2 text-center">Mariatal
                            Details (वैवाहिक विवरण |)</h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-3 gap-2">
                            <div class="mt-3">
                                <label class="@error('mariatal_status_id') text-theme-6 @enderror">
                                    Mariatal Status (वैवाहिक अवस्था)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full"
                                        name="mariatal_status_id" id="mariatal_status_id">
                                        <option hidden>Mariatal Status (वैवाहिक अवस्था) छान्नुहोस् |</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widow/Widower">Widow/Widower</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('mariatal_status_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium  @error('wife_name') text-theme-6 @enderror flex items-center">
                                    Wife's Name (पतनीको नाम)
                                </div>
                                <div class="">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('wife_name') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="wife_name" id="wife_name"
                                        value="{{ isset($member) ? $member->wife_name : old('wife_name') }}">
                                </div>
                            </div>

                            <div class="mt-3">
                                <div
                                    class="font-medium  @error('total_family_member') text-theme-6 @enderror  flex items-center">
                                    Total Family Member's (परिवार संख्या)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="">
                                    <input type="number"
                                        class="input w-full border mt-2  @error('total_family_member') border-theme-6 @enderror"
                                        placeholder="Write Full Name (पुरा नाम लेख्नुहोस |)" name="total_family_member"
                                        id="total_family_member"
                                        value="{{ isset($member) ? $member->total_family_member : old('total_family_member') }}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-content__pane p-5 active" id="property-content">

                        {{-- Income --}}
                        <h1 class="text-4xl text-theme-9 font-medium leading-none mt-2 mb-2 text-center">Income Details (आय
                            विवरण |)</h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-2 gap-2">
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Profession
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="profession" id="profession"
                                        value="{{ isset($member) ? $member->profession : old('profession') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Source of Income
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="source_income" id="source_income"
                                        value="{{ isset($member) ? $member->source_income : old('source_income') }}">
                                </div>
                            </div>
                        </div>

                        {{-- Property --}}

                        <hr class="mt-5 mb-5">
                        <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Property Details
                            (सम्पति बिबरण |)
                        </h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-2 gap-2">
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Property in Cash (नगद सम्पत्ति)
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="property_cash" id="property_cash"
                                        value="{{ isset($member->property_cash) ? $member->property_cash : old('property_cash') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Fixed Property (अचल सम्पति)
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="property_fixed" id="property_fixed"
                                        value="{{ isset($member->property_fixed) ? $member->property_fixed : old('property_fixed') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Property in Share (सेयर सम्पत्ति)
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="property_share" id="property_share"
                                        value="{{ isset($member->property_share) ? $member->property_share : old('property_share') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Other Property (अन्य सम्पत्ति)
                                </div>
                                <div class="">
                                    <input type="text" class="input w-full border mt-2" placeholder="Write caption"
                                        name="property_other" id="property_other"
                                        value="{{ isset($member->property_other) ? $member->property_other : old('property_other') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content__pane p-5 active" id="old-membership-content">
                        {{-- Political History --}}
                        <h1 class="text-4xl text-theme-9 font-medium leading-none mt-2 mb-2 text-center">Political Details
                            (राजनैतिक विवरण |)
                        </h1>
                        <hr class="mt-5 mb-5">

                        <div class="grid grid-cols-3 gap-2">
                            <div class="mt-3">
                                <div class="font-medium flex items-center @error('party_post') text-theme-6 @enderror">
                                    Haisiyat
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-3">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('party_post') border-theme-6 @enderror"
                                        placeholder="Write caption" name="party_post" id="party_post"
                                        value="{{ isset($member->party_post) ? $member->party_post : old('party_post') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium flex items-center @error('committee_name') text-theme-6 @enderror">
                                    Committee Name
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-3">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('committee_name') border-theme-6 @enderror"
                                        placeholder="Write caption" name="committee_name" id="committee_name"
                                        value="{{ isset($member->committee_name) ? $member->committee_name : old('committee_name') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="font-medium flex items-center @error('party_lebidar') text-theme-6 @enderror">
                                    मासिक लेवी दर
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-3">
                                    <input type="text"
                                        class="input w-full border mt-2  @error('party_lebidar') border-theme-6 @enderror"
                                        placeholder="Write caption" name="party_lebidar" id="party_lebidar"
                                        value="{{ isset($member->party_lebidar) ? $member->party_lebidar : old('party_lebidar') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium flex items-center @error('party_joined_date_ad') text-theme-6 @enderror">
                                    संगठनको सदस्यता प्राप्त मिति(AD)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-3">
                                    <input class="datepicker input w-full border mt-2" name="party_joined_date_ad"
                                        value="{{ isset($member->party_joined_date_ad) ? $member->party_joined_date_ad : old('party_joined_date_ad') }}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <div
                                    class="font-medium flex items-center @error('party_joined_date_bs') text-theme-6 @enderror">
                                    संगठनको सदस्यता प्राप्त मिति(बि.सं.)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <div class="mt-3">
                                    <input class="nepalidatepicker input w-full border mt-2" name="party_joined_date_bs"
                                        value="{{ isset($member->party_joined_date_bs) ? $member->party_joined_date_bs : old('party_joined_date_bs') }}"
                                        data-single="1">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="font-medium flex items-center @error('party_location') text-theme-6 @enderror">
                                Party Location
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-3">
                                <input type="text"
                                    class="input w-full border mt-2  @error('party_location') border-theme-6 @enderror"
                                    placeholder="Write caption" name="party_location" id="party_location"
                                    value="{{ isset($member->location) ? $member->party_location : old('party_location') }}">

                            </div>
                        </div>

                        <div class="mt-3">
                            <div
                                class="font-medium flex items-center @error('political_background') text-theme-6 @enderror mt-3">
                                Political Background (राजनीतिक पृष्ठभूमि)
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="550"
                                    name="political_background">{{ isset($member->political_background) ? $member->political_background : old('political_background') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="tab-content__pane p-5 active" id="documents-content">

                        {{-- Image, Signature and Citizenship --}}
                        <h1 class="text-4xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">Important
                            Documents
                            (जरुरि कागजात)</h1>
                        <hr class="mt-5 mb-5">
                        <div class="grid grid-cols-3 gap-2">
                            {{-- Profile Picture --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Your Own Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('own_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_own_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="own_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="ownImage(event)" name="own_image"
                                                value="{{ old('own_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Signature --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Signature Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('sign_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_sign_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="sign_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="signImage(event)" name="sign_image"
                                                value="{{ old('sign_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Citizenship Front --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Citizenshio's Front Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('citizenship_front') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_citizenship_front : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="citizenship_front">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="citizenshipFront(event)" name="citizenship_front"
                                                value="{{ old('citizenship_front') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Citizenship Back --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Citizenship's Back Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>

                                </div>
                                <div class="mt-5">
                                    <div
                                        class="rounded-md pt-4 items-center @error('citizenship_back') border-theme-6 @enderror">
                                        <div class="items-center content-center px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_citizenship_back : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="citizenship_back">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="citizenshipBack(event)" name="citizenship_back"
                                                value="{{ old('citizenship_back') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Passport Front --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Passport's Front Image
                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('passport_front') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_passport_front : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="passport_front">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="passportFront(event)" name="passport_front"
                                                value="{{ old('passport_front') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Passport Back --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Passport's Back Image
                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('passport_back') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_passport_back : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="passport_back">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="passportBack(event)" name="passport_back"
                                                value="{{ old('passport_back') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- License --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload License Image
                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('license_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_license_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="license_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="licenseImage(event)" name="license_image"
                                                value="{{ old('license_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Pan Card Front --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Pan Card Front Image
                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('pan_front') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_pan_front : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="pan_front">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="panFront(event)" name="pan_front"
                                                value="{{ old('pan_front') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Pan Card Back --}}
                            <div class="mt-3">
                                <div class="font-medium flex items-center">
                                    Upload Pan Card Back Image
                                </div>
                                <div class="mt-5">
                                    <div class="rounded-md pt-4 @error('pan_back') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($member) ? $member->name_en : '' }}"
                                                    src="{{ isset($member) ? $member->doc_pan_back : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="pan_back">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="panBack(event)" name="pan_back" value="{{ old('pan_back') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            <button class="button w-24 justify-center block bg-theme-6 text-white mr-2">Previous</button>
            <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Next</button>
        </div>
    </form>
    {{-- </div> --}}
@endsection
@section('script')
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
@endsection
