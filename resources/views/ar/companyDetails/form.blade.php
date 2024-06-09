@extends('layouts.ar')

@section('title')
{{ isset($companyDetail) ? 'Edit Company Detail ' . '"' . $companyDetail->title . '". | Nagrik Unmukti PartyDetails' : 'Create
New
Blog Post | Nagrik
Unmukti PartyDetails' }}

@endsection

@section('breadcrumb')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.company-details.index') }}" class="">Company Details</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($companyDetail) ? 'Edit New Blog Post ' . '"' . $companyDetail->title . '".' : 'Create New Blog Post'
        }}
    </a>
</div>
{{-- {{ dd($companyDetail) }} --}}
@endsection

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($companyDetail) ? 'Edit New Blog Post' : 'Create New Blog Post' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0">
            <i class="w-4 h-4 mr-2" data-feather="eye"></i>
            Preview
        </button> --}}
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.company-details.index') }}">
            All Company Details
        </a>

    </div>
</div>
{{-- @include('partials.ar.messages') --}}
{{-- @include('partials.ar.modelMessage') --}}
<form
    action="{{ isset($companyDetail) ? route('admin.company-details.update', $companyDetail->id) : route('admin.company-details.store') }}"
    method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    @csrf
    @if (isset($companyDetail))
    @method('PUT')
    @endif
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600"
                style="align-items: center!important;">
                <a title="Fill in the About Us" data-toggle="tab" id="general-button" data-target="#general"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                    General Details
                </a>
                <a title="Fill in Our Vision" data-toggle="tab" id="company-button" data-target="#company"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                    <i data-feather="code" class="w-4 h-4 mr-2"></i>
                    Company Details
                </a>
                <a title="Fill in Our Vision" data-toggle="tab" id="about-button" data-target="#about"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                    <i data-feather="code" class="w-4 h-4 mr-2"></i>
                    About Section
                </a>
            </div>
            <div class="post__content tab-content">
                <div class="tab-content__pane p-5 active" id="general">
                    <div class="grid grid-cols-12 gap-5 ">
                        <div class=" col-span-12 lg:col-span-6">
                            <div
                                class="font-medium mt-3  @error('company_name_en') text-theme-6 @enderror flex items-center">
                                Company Name in English
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                placeholder="Write Full Name in English" name="company_name_en" id="company_name_en"
                                value="{{ isset($companyDetail->company_name_en) ? $companyDetail->company_name_en : old('company_name_en') }}">
                            @error('company_name_en')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 lg:col-span-6">
                            <div
                                class="font-medium mt-3 ml-2  @error('company_name_lc') text-theme-6 @enderror  flex items-center">
                                कम्पनीको नाम नेपालीमा
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="company_name_lc" id="company_name_lc"
                                value="{{ isset($companyDetail->company_name_lc) ? $companyDetail->company_name_lc : old('company_name_lc') }}">
                            @error('company_name_lc')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2">
                        <div
                            class="font-medium mt-3  @error('company_description') text-theme-6 @enderror flex items-center">
                            Company Description
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-3">
                            <textarea data-feature="all" class="summernote"
                                name="company_description">{{ isset($companyDetail->company_description) ? $companyDetail->company_description : old('company_description') }}</textarea>
                        </div>
                        @error('company_description')
                        <span class="text-theme-6 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-12 gap-5 ">
                        <div class="col-span-12 lg:col-span-3">
                            <div class="mt-5">
                                <div
                                    class="text-lg ext-theme-9 @error('logo_image') text-theme-6 @enderror font-medium leading-none">
                                    Logo Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </div>
                                <div
                                    class="border-2 border-dashed rounded-md mt-2 pt-4 @error('logo_image') border-theme-6 @enderror">
                                    <div class="flex flex-wrap px-4">
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md"
                                                alt="{{ isset($companyDetail) ? $companyDetail->company_description : '' }}"
                                                src="{{ isset($companyDetail) ? $companyDetail->logo : '/ar/dist/images/preview-6.jpg' }}"
                                                id="logo_image">
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                        <input type="file" name="logo_image"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="loadFile1(event)" value="{{ old('logo_image') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-9">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 lg:col-span-6">
                                    <div>
                                        <div
                                            class="font-medium mt-5  @error('phone_number') text-theme-6 @enderror flex items-center">
                                            Phone Number
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                            placeholder="Write Full Name in English" name="phone_number"
                                            id="phone_number"
                                            value="{{ isset($companyDetail->phone_number) ? $companyDetail->phone_number : old('phone_number') }}">
                                        @error('phone_number')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-span-12 lg:col-span-6">

                                    <div>
                                        <div
                                            class="font-medium mt-5 ml-2  @error('mobile_number') text-theme-6 @enderror  flex items-center">
                                            Mobile Number
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="mobile_number"
                                            id="mobile_number"
                                            value="{{ isset($companyDetail->mobile_number) ? $companyDetail->mobile_number : old('mobile_number') }}">
                                        @error('mobile_number')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div>
                                        <div
                                            class="font-medium mt-5 ml-2  @error('email_address') text-theme-6 @enderror  flex items-center">
                                            Email Address
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-3"
                                            placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="email_address"
                                            id="email_address"
                                            value="{{ isset($companyDetail->email_address) ? $companyDetail->email_address : old('email_address') }}">
                                        @error('email_address')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div>
                                        <div
                                            class="font-medium mt-5 ml-2  @error('total_members') text-theme-6 @enderror flex items-center">
                                            Total Active Members
                                            <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                        </div>
                                        <input type="text"
                                            class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                            placeholder="Write Full Name in English" name="total_members"
                                            id="total_members"
                                            value="{{ isset($companyDetail->total_members) ? $companyDetail->total_members : old('total_members') }}">
                                        @error('total_members')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-1">
                        <div>
                            <div
                                class="font-medium mt-3 ml-2  @error('company_address') text-theme-6 @enderror  flex items-center">
                                Company Address
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="company_address" id="company_address"
                                value="{{ isset($companyDetail->company_address) ? $companyDetail->company_address : old('company_address') }}">
                            @error('company_address')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <div
                                class="font-medium mt-3  @error('google_map') text-theme-6 @enderror flex items-center">
                                Google Map Embedded link
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                placeholder="Write Full Name in English" name="google_map" id="google_map"
                                value="{{ isset($companyDetail->google_map) ? $companyDetail->google_map : old('google_map') }}">
                            @error('google_map')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <div
                                class="font-medium mt-3 ml-2  @error('facebook_link') text-theme-6 @enderror  flex items-center">
                                Facebook Link
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="facebook_link" id="facebook_link"
                                value="{{ isset($companyDetail->facebook_link) ? $companyDetail->facebook_link : old('facebook_link') }}">

                        </div>
                        <div>
                            <div
                                class="font-medium mt-3  @error('twitter_link') text-theme-6 @enderror flex items-center">
                                Twitter Link
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                placeholder="Write Full Name in English" name="twitter_link" id="twitter_link"
                                value="{{ isset($companyDetail->twitter_link) ? $companyDetail->twitter_link : old('twitter_link') }}">


                        </div>
                        <div>
                            <div
                                class="font-medium mt-3 ml-2  @error('instagram_link') text-theme-6 @enderror  flex items-center">
                                Instagram
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3"
                                placeholder="नेपाली मा पुरा नाम लेख्नुहोस |" name="instagram_link" id="instagram_link"
                                value="{{ isset($companyDetail->instagram_link) ? $companyDetail->instagram_link : old('instagram_link') }}">

                        </div>
                        <div>
                            <div
                                class="font-medium mt-3  @error('google_map') text-theme-6 @enderror flex items-center">
                                Google Map Embedded link
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                placeholder="Write Full Name in English" name="google_map" id="google_map"
                                value="{{ isset($companyDetail->google_map) ? $companyDetail->google_map : old('google_map') }}">

                        </div>
                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="company">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <div
                                    class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_mission') text-theme-6 @enderror ">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    Our Mission
                                    <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                            </div>

                            <div class="col-span-12 lg:col-span-8">

                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250"
                                        name="our_mission">{{ isset($companyDetail) ? $companyDetail->our_mission : old('our_mission') }}</textarea>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-5">

                                    <div
                                        class="border-2 border-dashed rounded-md mt-2 pt-4 @error('our_mission_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($companyDetail) ? $companyDetail->company_description : '' }}"
                                                    src="{{ isset($companyDetail) ? $companyDetail->mission_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="our_mission_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload
                                                a file</span> or drag and drop
                                            <input type="file" name="our_mission_image"
                                                class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="loadFile5(event)" value="{{ old('our_mission_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <div
                                class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_vision') text-theme-6 @enderror ">
                                {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                Our Vision
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-8">

                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250"
                                        name="our_vision">{{ isset($companyDetail) ? $companyDetail->our_vision : old('our_vision') }}</textarea>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="mt-5">

                                    <div
                                        class="border-2 border-dashed rounded-md mt-2 pt-4 @error('our_vision_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($companyDetail) ? $companyDetail->company_description : '' }}"
                                                    src="{{ isset($companyDetail) ? $companyDetail->vision_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="our_vision_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload
                                                a file</span> or drag and drop
                                            <input type="file" name="our_vision_image"
                                                class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="loadFile6(event)" value="{{ old('our_vision_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_history') text-theme-6 @enderror ">
                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                            Our History
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="our_history">{{ isset($companyDetail) ? $companyDetail->our_history : old('our_history') }}</textarea>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('about_us') text-theme-6 @enderror ">
                            About Us
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="about_us">{{ isset($companyDetail) ? $companyDetail->about_us : old('about_us') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="about">
                    <div class="grid grid-cols-12 gap-5">
                        <div class=" col-span-12 lg:col-span-12">
                            <div
                                class="font-medium mt-3  @error('president_name') text-theme-6 @enderror flex items-center">
                                President's Name
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <input type="text"
                                class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2"
                                placeholder="Write President's Name" name="president_name" id="president_name"
                                value="{{ isset($companyDetail->president_name) ? $companyDetail->president_name : old('president_name') }}">
                            @error('president_name')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <div class="border border-gray-200 rounded-md p-5 mt-5">
                                <div class="mt-5">
                                    <div
                                        class="ext-theme-9 @error('president_image') text-theme-6 @enderror font-medium leading-none">
                                        President's image
                                        <span class="ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </div>
                                    <div
                                        class="border-2 border-dashed rounded-md mt-2 pt-4 @error('president_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($companyDetail) ? $companyDetail->company_description : '' }}"
                                                    src="{{ isset($companyDetail) ? $companyDetail->president_image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="president_image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload
                                                a file</span> or drag and drop
                                            <input type="file" name="president_image"
                                                class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="loadFile7(event)" value="{{ old('president_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-8">
                            <div
                                class="font-medium mt-3  @error('message_from_president') text-theme-6 @enderror flex items-center">
                                President's Message
                                <span class="ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-3">
                                <textarea data-feature="all" class="summernote" name="message_from_president">
                                    {{ isset($companyDetail->message_from_president) ? $companyDetail->message_from_president : old('message_from_president')  }}

                                </textarea>
                            </div>
                            @error('message_from_president')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-1">
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div
                                class="font-medium mt-3  @error('home_about_content') text-theme-6 @enderror flex items-center">
                                About Us Content for Home
                                <span class="ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-3">
                                <textarea data-feature="all" class="summernote" name="home_about_content">
                                    {{ isset($companyDetail->home_about_content) ? $companyDetail->home_about_content : old('home_about_content')  }}
                                </textarea>
                            </div>
                            @error('home_about_content')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button type="submit"
                            class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Post Content -->
</form>
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $("#general").show();
        $("#company").hide();
        $("#about").hide();

        $("#general-button").click(function() {
            $("#general").show();
            $("#company").hide();
            $("#about").hide();
        });


        $("#company-button").click(function() {
            $("#general").hide();
            $("#company").show();
            $("#about").hide();
        });

        $("#about-button").click(function() {
            $("#general").hide();
            $("#company").hide();
            $("#about").show();
        });

    });

        var loadFile1 = function(event) {
        var image = document.getElementById('logo_image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile2 = function(event) {
        var image = document.getElementById('home_about_image_1');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile3 = function(event) {
        var image = document.getElementById('home_about_image_2');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile4 = function(event) {
        var image = document.getElementById('home_about_image_3');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile5 = function(event) {
        var image = document.getElementById('our_mission_image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile6 = function(event) {
        var image = document.getElementById('our_vision_image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile7 = function(event) {
        var image = document.getElementById('president_image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };


</script>
<script src="/ar/dist/js/custom.js"></script>

@endsection
