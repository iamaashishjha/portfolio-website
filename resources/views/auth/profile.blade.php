@extends('layouts.ar')

{{-- @section('breadcrumb')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="/admin" class="">Profile</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">Profile Update</a>
</div>
@endsection --}}

@section('title')
    Update Profile || Admin
@endsection

@section('breadcrumb')
@php
    $url = \Request::route()->getName();
    $authUser = \App\Models\User::find(Auth::id());
@endphp

{{-- {{ dd($url) }} --}}


{{-- @if ()

@endif --}}
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="/admin" class="">Admin Dashboard</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">Update Your Profile</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Profile
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="" class="rounded-full"
                            src="{{ isset($authUser->image) ? $authUser->image : Avatar::create($authUser->name)->toBase64() }}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ $authUser->name }}</div>
                        <div class="text-gray-600">{{ $authUser->designation ? $authUser->designation : '' }}</div>
                    </div>
                    {{-- <div class="dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box">
                            <div class="p-4 border-b border-gray-200 font-medium">Export Options</div>
                            <div class="p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 text-gray-700 mr-2"></i> English </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                    <i data-feather="box" class="w-4 h-4 text-gray-700 mr-2"></i> Indonesia
                                    <div class="text-xs text-white px-1 rounded-full bg-theme-6 ml-auto">10</div>
                                </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="layout" class="w-4 h-4 text-gray-700 mr-2"></i> English </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="sidebar" class="w-4 h-4 text-gray-700 mr-2"></i> Indonesia </a>
                            </div>
                            <div class="px-3 py-3 border-t border-gray-200 font-medium flex">
                                <button type="button" class="button button--sm bg-theme-1 text-white">Settings</button>
                                <button type="button" class="button button--sm bg-gray-200 text-gray-600 ml-auto">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </div>
                <div class="p-5 border-t border-gray-200">
                    <a class="flex items-center text-theme-1 font-medium" href="javascript:void(0);" id="personalInformation">
                        <i data-feather="activity" class="w-4 h-4 mr-2"></i>
                        Personal Information
                    </a>
                    <a class="flex items-center mt-5" id="changePassword" href="javascript:void(0);">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                        Change Password
                    </a>

                    {{-- <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a> --}}
                </div>
                {{-- <div class="p-5 border-t border-gray-200">
                <a class="flex items-center" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information </a>
            </div> --}}
                {{-- <div class="p-5 border-t flex">
                <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                <button type="button" class="button button--sm border text-gray-700 ml-auto">New Quick Link</button>
            </div> --}}
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 xxl:col-span-9" id="personalInformationContent">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Display Information
                    </h2>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-12 xl:col-span-4">
                            <div class="border border-gray-200 rounded-md p-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt=""
                                        src="{{ isset($authUser->image) ? $authUser->image : Avatar::create($authUser->name)->toBase64() }}"
                                        id="profile_image_display">
                                </div>
                                <form action="{{ route('admin.user.update', $authUser->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="button w-full bg-theme-1 text-white">Change
                                            Photo</button>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                            name="profile_image" onchange="loadFile(event)">
                                    </div>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-8">

                            <div>
                                <label>Full Name</label>
                                <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                                    placeholder="Enter Full Name" value="{{ $authUser->name }}" disabled>
                            </div>
                            {{-- <div class="mt-3">
                                <label>Email</label>
                                <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                                    placeholder="Enter Email" value="{{ $authUser->email }}" disabled>
                            </div> --}}
                            <div class="mt-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="input w-full border mt-2"
                                    placeholder="Enter Phone Number"
                                    value="{{ $authUser->phone_number ? $authUser->phone_number : '' }}">
                            </div>
                            <div class="mt-3">
                                <label>Designation</label>
                                <input type="text" name="designation" class="input w-full border mt-2"
                                    placeholder="Enter Current Designation"
                                    value="{{ $authUser->designation ? $authUser->designation : '' }}">
                            </div>
                            <div class="mt-3">
                                <label>Address</label>
                                <textarea name="address" class="input w-full border mt-2"
                                    placeholder="Adress">{{ $authUser->address ? $authUser->address : '' }}</textarea>
                            </div>
                            <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Display Information -->
        </div>

        <div class="col-span-12 lg:col-span-8 xxl:col-span-9" id="changePasswordContent">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Change Password
                    </h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('admin.user.changePassword', Auth::user()->id) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div>
                            <label>Email Address</label>
                            <input type="text" class="input w-full border  mt-2" name="email" value="{{ $authUser->email }}"  >
                        </div>
                        <div class="mt-3">
                            <label>New Password</label>
                            <input type="password" class="input w-full border mt-2" placeholder="Input password" name="password">
                        </div>
                        <div class="mt-3">
                            <label>Confirm New Password</label>
                            <input type="password" class="input w-full border mt-2" placeholder="Re Enter Password" name="password_confirmation">
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-4">Change Password</button>
                    </form>
                </div>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
@endsection


@section('script')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('profile_image_display');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        $(document).ready(function() {
            $('#dashboard').removeClass('side-menu--active');
        });
    </script>

@if ($url == 'admin.user.changePassword')
<script>
     $(document).ready(function() {
            $('#personalInformationContent').hide();
            $('#changePasswordContent').show();
            $('#personalInformation').removeClass('text-theme-1');
                $('#changePassword').addClass('text-theme-1');
     });
</script>
@else

<script>
    $(document).ready(function() {
           $('#personalInformationContent').show();
           $('#changePasswordContent').hide();
    });
</script>

@endif

    <script>
        $(document).ready(function() {
            // $('#personalInformationContent').show();
            // $('#changePasswordContent').hide();

            $("#personalInformation").click(function() {
                $('#personalInformation').addClass('text-theme-1');
                $('#changePassword').removeClass('text-theme-1');
                $('#personalInformationContent').show();
                $('#changePasswordContent').hide();
            });

            $("#changePassword").click(function() {
                $('#personalInformation').removeClass('text-theme-1');
                $('#changePassword').addClass('text-theme-1');
                $('#personalInformationContent').hide();
                $('#changePasswordContent').show();
            });
        });
    </script>
@endsection
