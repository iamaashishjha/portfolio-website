@extends('layouts.ar')

@section('title')
    {{-- Create New Slider | Nagrik Unmukti Party --}}
    {{ isset($slider) ? 'Edit Slider ' . '"' . $slider->title . '". | Nagrik Unmukti Party' : 'Create New Slider | Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.home.app-setting.index') }}" class="">Slider</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">{{ isset($slider) ? 'Edit Slider ' : 'Create New Slider' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($slider) ? 'Edit Slider ' . '"' . $slider->title . '".' : 'Create New Slider' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.home.slider.index') }}">All
                Sliders</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($slider) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">
                    <h2 class="font-medium text-base mr-auto">
                        Enter Slider Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($slider) ? route('admin.home.slider.update', $slider->id) : route('admin.home.slider.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($slider))
                        @method('PUT')
                    @endif
                    <div class="p-5" id="input">
                        <div class="preview">
                            <div class="grid grid-cols-12 gap-2">
                                {{-- Slider Title --}}
                                <div class="col-span-12">
                                    <div class="mt-3 mb-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('slider_title') text-theme-6 @enderror font-medium leading-none">
                                            Slider Title
                                            
                                        </h5>
                                        <input type="text" id="slider_title" name="slider_title"
                                            class=" input w-full border mt-2 @error('slider_title') border-theme-6 @enderror"
                                            placeholder="Enter Name"
                                            value="{{ isset($slider) ? $slider->slider_title : old('slider_title') }}">
                                    </div>
                                </div>
                                {{-- Is Active --}}
                                {{-- <div class="col-span-1">
                                    <div class="mt-5 mb-5">
                                        <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                            <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                                Is Active</h5>
                                            <input class="show-code input input--switch border" type="checkbox"
                                                name="is_active" {{ isset($slider) ? $slider->checkStatus() : '' }}>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- Slider Description --}}
                            <div class="mt-3 mb-3">
                                <h5
                                    class="text-lg ext-theme-9 @error('slider_description') text-theme-6 @enderror font-medium leading-none">
                                    Slider Description
                                </h5>
                                <input type="text" id="slider_description" name="slider_description"
                                    class="input w-full border mt-2 @error('slider_description') border-theme-6 @enderror"
                                    placeholder="Enter Description in 250 Words."
                                    value="{{ isset($slider) ? $slider->slider_description : old('slider_description') }}">
                            </div>

                            <hr class="mt-3 mb-3">

                            <div class="grid grid-cols-4 gap-4">
                                {{-- Image Upload for Image 1 --}}
                                <div class="col-span-1 ...">
                                    <div class="mt-3">
                                        <h5 class="text-lg ext-theme-9 @error('slider_image_a') text-theme-6 @enderror font-medium leading-none">
                                            Image 1
                                            
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('slider_image_a') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div
                                                    class="w-24 h-24 items-center image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md items-center"
                                                        alt="{{ isset($slider) ? $slider->description : '' }}"
                                                        src="{{ isset($slider) ? $slider->slider_image_a : '/ar/dist/images/preview-1.jpg' }}"
                                                        id="slider_image_a">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="slider_image_a"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile1(event)" value="{{ old('slider_image_a') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 ...">
                                    {{-- Heading 1 --}}
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('heading1') text-theme-6 @enderror font-medium leading-none">
                                            Heading 1
                                            
                                        </h5>
                                        <input type="text" id="heading1" name="heading1"
                                            class="input w-full border mt-2 @error('heading1') border-theme-6 @enderror"
                                            placeholder="Enter Heading 1"
                                            value="{{ isset($slider) ? $slider->heading1 : old('heading1') }}" required>
                                    </div>
                                    {{-- Sub Heading 1 --}}
                                    <div class="mt-3">
                                        <h5 class="text-lg ext-theme-9 @error('subheading1') text-theme-6 @enderror font-medium leading-none">
                                            Sub Heading 1
                                            
                                        </h5>
                                        <input type="text" id="subheading1" name="subheading1"
                                            class="input w-full border mt-2 @error('subheading1') border-theme-6 @enderror"
                                            placeholder="Enter Sub Heading 1 in 250 Words."
                                            value="{{ isset($slider) ? $slider->subheading1 : old('subheading1') }}"
                                            style="height: 75px;" required>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-3 mb-3">

                            <div class="grid grid-cols-4 gap-4">
                                {{-- Image 2 --}}
                                <div class="col-span-1 ...">
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('slider_image_b') text-theme-6 @enderror font-medium leading-none">
                                            Image 2
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('slider_image_b') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($slider) ? $slider->description : '' }}"
                                                        src="{{ isset($slider) ? $slider->slider_image_b : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="slider_image_b">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="slider_image_b"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile2(event)" value="{{ old('slider_image_b') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 ...">
                                    {{-- Heading 2 --}}
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('heading2') text-theme-6 @enderror font-medium leading-none">
                                            Heading 2
                                        </h5>
                                        <input type="text" id="heading2" name="heading2"
                                            class="input w-full border mt-2 @error('heading2') border-theme-6 @enderror"
                                            placeholder="Enter Heading 2"
                                            value="{{ isset($slider) ? $slider->heading2 : old('heading2') }}"
                                            >
                                    </div>
                                    {{-- Sub Heading 2 --}}
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('subheading2') text-theme-6 @enderror font-medium leading-none">
                                            Sub Heading 2
                                        </h5>
                                        <input type="text" id="subheading2" name="subheading2"
                                            class="input w-full input-height border mt-2 @error('subheading2') border-theme-6 @enderror"
                                            placeholder="Enter Sub Heading in 250 Words."
                                            value="{{ isset($slider) ? $slider->subheading2 : old('subheading2') }}">
                                    </div>

                                </div>
                            </div>

                            <hr class="mt-3 mb-3">

                            <div class="grid grid-cols-4 gap-4">
                                {{-- Image 3 --}}
                                <div class="col-span-1 ...">
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('slider_image_c') text-theme-6 @enderror font-medium leading-none">
                                            Image 3
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('slider_image_c') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($slider) ? $slider->description : '' }}"
                                                        src="{{ isset($slider) ? $slider->slider_image_c : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="slider_image_c">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="slider_image_c"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile3(event)" value="{{ old('slider_image_c') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 ...">
                                    {{-- Heading 3 --}}
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('heading3') text-theme-6 @enderror font-medium leading-none">
                                            Heading 3
                                        </h5>
                                        <input type="text" id="heading3" name="heading3"
                                            class="input w-full border mt-2 @error('heading3') border-theme-6 @enderror"
                                            placeholder="Enter Heading 4"
                                            value="{{ isset($slider) ? $slider->heading3 : old('heading3') }}"
                                            >
                                    </div>

                                    {{-- Sub Heading 3 --}}
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('subheading3') text-theme-6 @enderror font-medium leading-none">
                                            Sub Heading 3
                                        </h5>
                                        <input type="text" id="subheading3" name="subheading3"
                                            class="input w-full border input-height mt-2 @error('subheading3') border-theme-6 @enderror"
                                            placeholder="Enter Sub Heading 3 in 250 Words."
                                            value="{{ isset($slider) ? $slider->subheading3 : old('subheading3') }}">
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-3 mb-3">

                            <div class="grid grid-cols-4 gap-4">
                                
                                {{-- Image 4 --}}
                                <div class="col-span-1 ...">
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('slider_image_c') text-theme-6 @enderror font-medium leading-none">
                                            Image 4
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('slider_image_d') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($slider) ? $slider->description : '' }}"
                                                        src="{{ isset($slider) ? $slider->slider_image_d : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="slider_image_d">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="slider_image_d"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile4(event)" value="{{ old('slider_image_d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Sub Heading 4 --}}
                                <div class="col-span-3 ...">
                                {{-- Heading 4 --}}
                                    <div class="mt-3">
                                        <h5 class="text-lg ext-theme-9 @error('heading4') text-theme-6 @enderror font-medium leading-none">
                                            Heading 4
                                        </h5>
                                        <input type="text" id="heading4" name="heading4"
                                            class="input w-full border mt-2 @error('heading4') border-theme-6 @enderror"
                                            placeholder="Enter Heading 4"
                                            value="{{ isset($slider) ? $slider->heading4 : old('heading4') }}"
                                            >
                                    </div>
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('subheading4') text-theme-6 @enderror font-medium leading-none">
                                            Sub Heading 4
                                        </h5>
                                        <input type="text" id="subheading4" name="subheading4" class="input-height input w-full border mt-2 @error('subheading4') border-theme-6 @enderror" placeholder="Enter Sub Heading 4 in 250 Words." value="{{ isset($slider) ? $slider->subheading4 : old('subheading4') }}">
                                    </div>

                                </div>
                            </div>

                            <hr class="mt-3 mb-3">

                            <div class="grid grid-cols-4 gap-4">
                                {{-- Image 5 --}}
                                <div class="col-span-1 ...">
                                    <div class="mt-3">
                                        <h5
                                            class="text-lg ext-theme-9 @error('slider_image_e') text-theme-6 @enderror font-medium leading-none">
                                            Image 5
                                        </h5>
                                        <div
                                            class="border-2 border-dashed rounded-md mt-2 pt-4 @error('slider_image_e') border-theme-6 @enderror">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md"
                                                        alt="{{ isset($slider) ? $slider->description : '' }}"
                                                        src="{{ isset($slider) ? $slider->slider_image_e : '/ar/dist/images/preview-6.jpg' }}"
                                                        id="slider_image_e">
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="slider_image_e"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="loadFile5(event)" value="{{ old('slider_image_e') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 ...">
                                    {{-- Heading 5 --}}
                                    <div class="mt-3">
                                        <h5 class="text-lg ext-theme-9 @error('heading5') text-theme-6 @enderror font-medium leading-none">
                                            Heading 5
                                        </h5>
                                        <input type="text" id="heading5" name="heading5"
                                        class="input w-full border mt-2 @error('heading5') border-theme-6 @enderror"
                                        placeholder="Enter Heading 5"
                                        value="{{ isset($slider) ? $slider->heading5 : old('heading5') }}"
                                        >
                                    </div>
                                    {{-- Sub Heading 5 --}}
                                    <div class="mt-3">
                                        <h5 class="text-lg ext-theme-9 @error('subheading5') text-theme-6 @enderror font-medium leading-none">
                                            Sub Heading 5
                                        </h5>
                                        <input type="text" id="subheading5" name="subheading5" class="input-height input w-full border mt-2 @error('subheading5') border-theme-6 @enderror" placeholder="Enter Sub Heading 5 in 250 Words." value="{{ isset($slider) ? $slider->subheading5 : old('subheading5') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-center">
                                <button type="submit"
                                    class="button w-50 mr-1 mb-2 {{ isset($slider) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($slider) ? 'Update Slider' : 'Create New Slider' }}</button>
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
        var loadFile1 = function(event) {
            var slider_image_a = document.getElementById('slider_image_a');
            slider_image_a.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile2 = function(event) {
            var slider_image_b = document.getElementById('slider_image_b');
            slider_image_b.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile3 = function(event) {
            var slider_image_c = document.getElementById('slider_image_c');
            slider_image_c.src = URL.createObjectURL(event.target.files[0]);

        };
        var loadFile4 = function(event) {
            var slider_image_d = document.getElementById('slider_image_d');
            slider_image_d.src = URL.createObjectURL(event.target.files[0]);

        };
        var loadFile5 = function(event) {
            var slider_image_e = document.getElementById('slider_image_e');
            slider_image_e.src = URL.createObjectURL(event.target.files[0]);

        };
    </script>

    {{--  --}}
@endsection
