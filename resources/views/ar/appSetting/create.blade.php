@extends('layouts.ar')

@section('title')
    {{-- Create New App Setting | Nagrik Unmukti Party --}}
    {{ isset($appSetting) ? 'Edit App Setting ' . '"' . $appSetting->title . '". | Nagrik Unmukti Party' : 'Create New App Setting | Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.home.app-setting.index') }}" class="">App Setting</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href=""
            class="breadcrumb--active">{{ isset($appSetting) ? 'Edit App Setting ' : 'Create New App Setting' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($appSetting) ? 'Edit App Setting ' . '"' . $appSetting->title . '".' : 'Create New App Setting' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.home.app-setting.index') }}">All
                App Setting</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($appSetting) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter App Setting Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('{{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($appSetting) ? route('admin.home.app-setting.update', $appSetting->id) : route('admin.home.app-setting.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($appSetting))
                        @method('PUT')
                    @endif
                    <div class="p-5" id="input">
                        <div class="preview">
                            <div>
                                <h5 class="text-lg ext-theme-9 @error('name') text-theme-6 @enderror font-medium leading-none">
                                    Site Title
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>

                                <input type="text" id="site_title" name="site_title"
                                    class=" input w-full border mt-2 @error('site_title') border-theme-6 @enderror"
                                    placeholder="Enter Site Title"
                                    value="{{ isset($appSetting) ? $appSetting->site_title : old('site_title') }}">

                            </div>
                            
                            <div class="grid grid-cols-4 gap-2">
                                <div class="col-span-4">
                                    <div class="mt-5">
                                        <h5 class="text-lg ext-theme-9 @error('site_title_image') text-theme-6 @enderror font-medium leading-none">
                                            Site Title Image
                                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('site_title_image') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($appSetting) ? $appSetting->description : '' }}"
                                                        src="{{ isset($appSetting) ? $appSetting->image : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="site_title_image">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="site_title_image"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile(event)" value="{{ old('site_title_image') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-5">
                            <h5 class="text-lg ext-theme-9 @error('meta_title') text-theme-6 @enderror font-medium leading-none">
                                Meta Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_title" class="input w-full border mt-2"
                                placeholder="Enter Meta Title"
                                value="{{ isset($appSetting) ? $appSetting->meta_title : old('meta_title') }}">
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg ext-theme-9 @error('meta_description') text-theme-6 @enderror font-medium leading-none">
                                Meta Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_description" class="input w-full border mt-2"
                                placeholder="Enter Meta Description"
                                value="{{ isset($appSetting) ? $appSetting->meta_description : old('meta_description') }}">
                        </div>
                        <div class="mt-5">
                            <h5 class="text-lg ext-theme-9 @error('keywords') text-theme-6 @enderror font-medium leading-none">
                                Keywords
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="keywords" class="input w-full border mt-2" placeholder="Enter Keywords"
                                value="{{ isset($appSetting) ? $appSetting->keywords : old('keywords') }}">
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="button w-50 mr-1 mb-2 {{ isset($appSetting) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($appSetting) ? 'Update App Setting' : 'Create New App Setting' }}</button>
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
            var image = document.getElementById('site_title_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endsection
