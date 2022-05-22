@extends('layouts.ar')

@section('title')
    {{-- Create New Header/Footer | Aashish Jha --}}
    {{ isset($headerFooter) ? 'Edit Header/Footer ' . '"' . $headerFooter->title . '". | Aashish Jha' : 'Create New Header/Footer | Aashish Jha' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.home.headerFooter.index') }}" class="">Header/Footer</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href=""
            class="breadcrumb--active">{{ isset($headerFooter) ? 'Edit Header/Footer ' : 'Create New Header/Footer' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($headerFooter) ? 'Edit Header/Footer ' . '"' . $headerFooter->title . '".' : 'Create New Header/Footer' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.home.headerFooter.index') }}">All
                Header/Footer</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($headerFooter) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Header/Footer Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                @include('partials.ar.modelMessage')
                <form
                    action="{{ isset($headerFooter) ? route('admin.home.headerFooter.update', $headerFooter->id) : route('admin.home.headerFooter.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($headerFooter))
                        @method('PUT')
                    @endif
                    <div class="p-5" id="input">
                        <div class="preview">
                            <div>
                                <h5 class="text-lg ext-theme-9 @error('name') text-theme-6 @enderror font-medium leading-none">
                                    Name
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <input type="text" id="name" name="name"
                                    class=" input w-full border mt-2 @error('name') border-theme-6 @enderror"
                                    placeholder="Enter Name"
                                    value="{{ isset($headerFooter) ? $headerFooter->name : old('name') }}">
                            </div>


                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-1">
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('logo_image') text-theme-6 @enderror font-medium leading-none">
                                            Logo Upload <span
                                                class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('logo_image') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($headerFooter) ? $headerFooter->description : '' }}"
                                                        src="{{ isset($headerFooter) ? $headerFooter->logo_image : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="logo_image">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="logo_image"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile(event)" value="{{ old('logo_image') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="col-sapn-1">
                                            <div class="mt-3">
                                                <h5
                                                    class="text-lg ext-theme-9 @error('telephone') text-theme-6 @enderror font-medium leading-none">
                                                    Telephone
                                                    <span
                                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                                </h5>
                                                <input type="text" name="telephone" class="input w-full border mt-2"
                                                    placeholder="Enter Telephone"
                                                    value="{{ isset($headerFooter) ? $headerFooter->telephone : old('telephone') }}">
                                            </div>
                                            <div class="mt-3">
                                                <h5
                                                    class="text-lg ext-theme-9 @error('phone1') text-theme-6 @enderror font-medium leading-none">
                                                    Phone 1
                                                </h5>
                                                <input type="text" name="phone1" class="input w-full border mt-2"
                                                    placeholder="Enter Phone Number 1"
                                                    value="{{ isset($headerFooter) ? $headerFooter->phone1 : old('phone1') }}">
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="text-lg ext-theme-9 @error('phone2') text-theme-6 @enderror font-medium leading-none">
                                                    Phone 2
                                                </h5>
                                                <input type="text" name="phone2" class="input w-full border mt-2"
                                                    placeholder="Enter Phone Number 2"
                                                    value="{{ isset($headerFooter) ? $headerFooter->phone2 : old('phone2') }}">
                                            </div>
                                            
                                        </div>
                                        <div class="col-sapn-1">
                                            <div class="mt-3">
                                                <h5 class="text-lg ext-theme-9 @error('email') text-theme-6 @enderror font-medium leading-none">
                                                    Email
                                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                                </h5>
                                                <input type="text" name="email" class="input w-full border mt-2"
                                                    placeholder="Enter Email Address"
                                                    value="{{ isset($headerFooter) ? $headerFooter->email : old('email') }}">
                                            </div>
                                            <div class="mt-3">
                                                <h5
                                                    class="text-lg ext-theme-9 @error('address') text-theme-6 @enderror font-medium leading-none">
                                                    Address
                                                    <span
                                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                                </h5>
                                                <input type="text" name="address" class="input w-full border mt-2"
                                                    placeholder="Enter Address"
                                                    value="{{ isset($headerFooter) ? $headerFooter->address : old('address') }}">
                                            </div>
                                            <div class="mt-3">
                                                <h5
                                                    class="text-lg ext-theme-9 @error('start_date') text-theme-6 @enderror font-medium leading-none">
                                                    Select Start Date
                                                    <span
                                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                                </h5>
                                                <div class="relative w-56 mx-aut mt-3">
                                                    <div
                                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                                    </div>
                                                    <input type="text" class="datepicker input pl-12 border"
                                                        name="start_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('meta_title') text-theme-6 @enderror font-medium leading-none">
                                Meta Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_title" class="input w-full border mt-2"
                                placeholder="Enter Meta Title"
                                value="{{ isset($headerFooter) ? $headerFooter->meta_title : old('meta_title') }}">
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('meta_description') text-theme-6 @enderror font-medium leading-none">
                                Meta Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_description" class="input w-full border mt-2"
                                placeholder="Enter Meta Description"
                                value="{{ isset($headerFooter) ? $headerFooter->meta_description : old('meta_description') }}">
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('keywords') text-theme-6 @enderror font-medium leading-none">
                                Keywords
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="keywords" class="input w-full border mt-2" placeholder="Enter Keywords"
                                value="{{ isset($headerFooter) ? $headerFooter->keywords : old('keywords') }}">
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="button w-50 mr-1 mb-2 {{ isset($headerFooter) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($headerFooter) ? 'Update Header/Footer' : 'Create New Header/Footer' }}</button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
        <!-- END: Input -->
    </div>
    </div>
@endsection

@section('script')
    {{-- <script src="/ar/dist/js/custom.js"></script> --}}
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('logo_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    {{-- @include('partials.ar.messageScript') --}}
@endsection
