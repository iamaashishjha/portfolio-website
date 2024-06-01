@extends('layouts.ar')

@section('title')
{{ isset($member) ? 'Edit Member ' . '"' . $member->title . '". | Nagrik Unmukti PartyDetails' : 'Create New Member |
Nagrik
Unmukti PartyDetails' }}
@endsection

@section('css')
@endsection


@section('breadcum')
{{-- <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.member.index') }}" class="">Members</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($member) ? 'Edit Member ' . '"' . $member->name_en . '" details' : 'Create New Member' }}
    </a>
</div> --}}
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>

@endsection

@section('content')

<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Denzel Washington</div>
                <div class="text-gray-600">DevOps Engineer</div>
            </div>
        </div>
        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> denzelwashington@left4code.com </div>
            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="instagram" class="w-4 h-4 mr-2"></i> Instagram Denzel Washington </div>
            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="twitter" class="w-4 h-4 mr-2"></i> Twitter Denzel Washington </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">201</div>
                <div class="text-gray-600">Orders</div>
            </div>
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">1k</div>
                <div class="text-gray-600">Purchases</div>
            </div>
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">492</div>
                <div class="text-gray-600">Reviews</div>
            </div>
        </div>
    </div>
    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
        <a data-toggle="tab" data-target="#profile" href="javascript:;" class="py-4 sm:mr-8 flex items-center active"> <i class="w-4 h-4 mr-2" data-feather="user"></i> Profile </a>
        <a data-toggle="tab" data-target="#account" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="shield"></i> Account </a>
        <a data-toggle="tab" data-target="#change-password" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="lock"></i> Change Password </a>
        <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="settings"></i> Settings </a>
    </div>
</div>

{{-- <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        FAQ Layout
    </h2>
</div> --}}
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: FAQ Menu -->
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="box mt-5">
            <div class="px-4 pb-3 pt-5">
                <a class="flex rounded-lg items-center px-4 py-2 bg-theme-1 text-white font-medium" href="">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">About Our Products</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Related License</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Single Application License</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Multi Application License</div>
                </a>
            </div>
            <div class="px-4 py-3 border-t border-gray-200 dark:border-dark-5">
                <a class="flex items-center px-4 py-2" href="">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Trem of Use</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Author Fees</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Product Review</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Privacy Policy</div>
                </a>
            </div>
            <div class="px-4 pt-3 pb-5 border-t border-gray-200 dark:border-dark-5">
                <a class="flex items-center px-4 py-2" href="">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">About Our Products</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Related License</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Single Application License</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">Multi Application License</div>
                </a>
            </div>
        </div>
    </div>
    <!-- END: FAQ Menu -->
    <!-- BEGIN: FAQ Content -->
    <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    About Our Products
                </h2>
            </div>
            <div class="accordion p-5">
                <div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">OpenSSL Essentials: Working with SSL Certificates, Private Keys</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Understanding IP Addresses, Subnets, and CIDR Notation</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">How To Troubleshoot Common HTTP Error Codes</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">An Introduction to Securing your Linux VPS</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
            </div>
        </div>
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Single Application License
                </h2>
            </div>
            <div class="accordion p-5">
                <div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">OpenSSL Essentials: Working with SSL Certificates, Private Keys</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Understanding IP Addresses, Subnets, and CIDR Notation</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">How To Troubleshoot Common HTTP Error Codes</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">An Introduction to Securing your Linux VPS</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
            </div>
        </div>
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Multi Application License
                </h2>
            </div>
            <div class="accordion p-5">
                <div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">OpenSSL Essentials: Working with SSL Certificates, Private Keys</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">Understanding IP Addresses, Subnets, and CIDR Notation</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">How To Troubleshoot Common HTTP Error Codes</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
                <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4 mt-3">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block">An Introduction to Securing your Linux VPS</a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: FAQ Content -->
</div>
@endsection

@section('script')
@endsection