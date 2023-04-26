@extends('layouts.ar')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="/admin" class="">Dashboard</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">Team Members</a>
    </div>
@endsection

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp
    <!-- END: Top Bar -->
    {{-- <h2 class="intro-y text-lg font-medium mt-10">
        @if (isset($member))
            Edit "{{ $member->name }}" details
        @else
            Create Team Member
        @endif
    </h2> --}}
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            @if (isset($member))
                Edit "{{ $member->name }}" details
            @else
                Create Team Member
            @endif
        </h2>
        @if ($authUser->hasPermissionTo('list teammember'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.team-member.index') }}">
                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                    All Team Members
                </a>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12">
            <form
                action="{{ isset($member) ? route('admin.team-member.update', $member->id) : route('admin.team-member.store') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @isset($member)
                    @method('PUT')
                @endisset
                <div class="intro-x box">
                    <h2 class="text-4xl font-medium leading-none m-3 p-4 text-theme-6">
                        {{ isset($member) ? 'Edit ' . $member->name : 'Create Team Member' }}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-2 mt-5 box intro-y">
                    <div class="intro-y col-span-12 lg:col-span-8 p-5">
                        <div class="grid cols-12 gap-2">
                            <div class="col-span-12 lg:col-span-12">
                                <div class="preview mt-2">
                                    <label class="font-extrabold">Name</label>
                                    <input type="text" class="input w-full border mt-2" placeholder="Enter Name"
                                        name="name" value="{{ isset($member->name) ? $member->name : old('name') }}"
                                        required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-12">
                                <div class="preview mt-2">
                                    <label class="font-extrabold">Email</label>
                                    <input type="email" class="input w-full border mt-2" placeholder="Enter Member Email"
                                        name="email" required autocomplete="email"
                                        value="{{ isset($member->email) ? $member->email : old('email') }}">
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <div class="preview mt-2">
                                    <label class="font-extrabold">Phone Number</label>
                                    <input type="text" class="input w-full border mt-2"
                                        placeholder="Enter Member Phone Number" name="phone_number" required
                                        autocomplete="phone_number"
                                        value="{{ isset($member->phone_number) ? $member->phone_number : old('phone_number') }}">
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <div class="preview mt-2">
                                    <label class="font-extrabold">Select Post</label>
                                    <div class="mt-2">
                                        <select data-search="true" class="select2 w-full" name="post_id">
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}"
                                                    {{ old('post_id') == $post->id ? 'selected' : '' }}>{{ $post->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Image  --}}
                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Display Information -->
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="{{ isset($member->name) ? $member->name : '' }}"
                                    src="{{ isset($member->image) ? $member->image : '/ar/dist/images/profile-6.jpg' }}"
                                    id="imagetoChange">
                                {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div> --}}
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Upload Photo</button>
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image"
                                    id="inputBtn" onchange="loadFile(event)">
                            </div>
                        </div>
                        <!-- END: Display Information -->
                    </div>


                    {{-- Tenure  --}}
                    <div class="intro-x col-span-12 lg:col-span-12 p-5">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 lg:col-span-3">
                                <!-- BEGIN: Input -->
                                <div class="preview">
                                    <div>
                                        <label class="font-extrabold">Tenure Start Date</label>
                                        <input class="datepicker input w-full border mt-2" placeholder="Select in AD"
                                            data-single="1"name="tenure_start_date_en"
                                            value="{{ isset($member->tenure_start_date_en) ? $member->tenure_start_date_en : old('tenure_start_date_en') }}"
                                            required autocomplete="tenure_start_date_en" autofocus>
                                    </div>
                                </div>
                                <!-- END: Input -->
                            </div>
                            <div class="col-span-12 lg:col-span-3">
                                <!-- BEGIN: Input -->
                                <div class="preview">
                                    <div>
                                        <label class="font-extrabold">Tenure Start Date (NP)</label>
                                        <input class="nepalidatepicker input w-full border mt-2" placeholder="Select in BS"
                                            data-single="1" name="tenure_start_date_np"
                                            value="{{ isset($member->tenure_end_date_en) ? $member->tenure_end_date_en : old('tenure_end_date_en') }}"
                                            required autocomplete="tenure_end_date_en" autofocus>
                                    </div>
                                </div>
                                <!-- END: Input -->
                            </div>
                            <div class="col-span-12 lg:col-span-3">
                                <!-- BEGIN: Input -->
                                <div class="preview">
                                    <div>
                                        <label class="font-extrabold">Tenure End Date
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </label>
                                        <input class="datepicker input w-full border mt-2" placeholder="Select Date in AD"
                                            data-single="1"name="tenure_end_date_en"
                                            value="{{ isset($member->tenure_end_date_en) ? $member->tenure_end_date_en : old('tenure_end_date_en') }}"
                                            required autocomplete="tenure_end_date_en">
                                    </div>
                                </div>
                                <!-- END: Input -->
                            </div>

                            <div class="col-span-12 lg:col-span-3">
                                <!-- BEGIN: Input -->
                                <div class="preview">
                                    <div>
                                        <label class="font-extrabold">Tenure End Date (NP)</label>
                                        <input type="text" class="nepalidatepicker input w-full border mt-2"
                                            placeholder="Enter Date in BS" data-single="1" name="tenure_end_date_np"
                                            value="{{ isset($member->tenure_end_date_np) ? $member->tenure_end_date_np : old('tenure_end_date_np') }}"
                                            required autocomplete="tenure_end_date_np" autofocus>
                                    </div>
                                </div>
                                <!-- END: Input -->
                            </div>
                        </div>
                    </div>
                    {{-- Social Media  --}}
                    <div class="intro-x col-span-12 lg:col-span-12 p-5">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 lg:col-span-4">
                                <div class="preview">
                                    <label class="font-extrabold">Facebook Link</label>
                                    <input type="url" class="input w-full border mt-2"
                                        placeholder="Enter Facebook Link" name="facebook_link"
                                        value="{{ isset($member->facebook_link) ? $member->facebook_link : old('facebook_link') }}"
                                        required autocomplete="facebook_link" autofocus>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="preview">
                                    <label class="font-extrabold">Twitter Link</label>
                                    <input type="url" class="input w-full border mt-2"
                                        placeholder="Enter Twitter Email" name="twitter_link" required
                                        autocomplete="twitter_link"
                                        value="{{ isset($member->twitter_link) ? $member->twitter_link : old('twitter_link') }}">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="preview">
                                    <label class="font-extrabold">Instagram Link</label>
                                    <input type="url" class="input w-full border mt-2"
                                        placeholder="Enter Instagram Link" name="instagram_link"
                                        value="{{ isset($member->instagram_link) ? $member->instagram_link : old('instagram_link') }}"
                                        required autocomplete="instagram_link" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <button type="submit"
                            class="button w-100 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                            @if (isset($member))
                                Edit {{ $member->name }}
                            @else
                                Create Team Member
                            @endif
                        </button>
                    </div>
                </div>
            </form>
            {{-- <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                        class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="button" class="button w-24 bg-theme-9 text-white">Create</button>
                </div> --}}
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/ar/dist/js/nepali-date-picker.min.js"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('imagetoChange');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
