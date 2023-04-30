@extends('layouts.ar')
@section('title')
    {{-- Create New Blog Tag | Nagrik Unmukti Party --}}
    {{ isset($tag) ? 'Edit Tag ' . '"' . $tag->title . '". | Nagrik Unmukti Party' : 'Create New Blog Tag | Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.blog.tag.index') }}" class="">Blogs</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">{{ isset($tag) ? 'Edit Tag ' : 'Create New Blog Tag' }}</a>
    </div>
@endsection



@section('content')
    {{-- @include('partials.ar.modelMessage') --}}

    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($tag) ? 'Edit Tag ' . '"' . $tag->title . '".' : 'Create New Blog Tag' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.blog.tag.index') }}">
            <i class="fa fa-list mx-2"></i>    
                All Tags
            </a>
        </div>  
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($tag) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">
                    <h2 class="font-medium text-base mr-auto">
                        Enter Tag Details
                    </h2>
                   
                </div>
                {{-- @include('partials.ar.messages') --}}
                <form action="{{ isset($tag) ? route('admin.blog.tag.update', $tag->id) : route('admin.blog.tag.store') }}"
                    method="post" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
                    @csrf
                    @if (isset($tag))
                        @method('PUT')
                    @endif
                    <div class="col-span-12 md:col-span-4">
                        <div class="p-5 preview">
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Tag Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="title" name="title"
                                class="{{ isset($tag) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} input w-full border mt-2 @error('title') border-theme-6 @enderror"
                                placeholder="Enter Name" value="{{ isset($tag) ? $tag->title : old('title') }}">

                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Tag Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="description" name="description"
                                class="input w-full border mt-2 @error('description') border-theme-6 @enderror"
                                placeholder="Enter Description in 250 Words."
                                value="{{ isset($tag) ? $tag->description : old('description') }}">

                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <div class="p-5 preview">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5
                                    class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none mr-3">
                                    Is Active <span
                                        class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <input
                                    class="show-code input input--switch border @error('status') border-theme-6 @enderror"
                                    type="checkbox" name="status" {{ isset($tag) ? $tag->checkStatus() : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 md:col-span-6">
                                <div class="p-5 preview">
                                    <label>Tag Slug</label>
                                    <input type="text" id="slug" name="slug"
                                        class="input w-full border mt-2 cursor-not-allowed  bg-gray-100"
                                        placeholder="Enter Slug" value="{{ isset($tag) ? $tag->slug : old('slug') }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <div class="p-5 preview">
                                    <label>Tag Meta Description</label>
                                    <input type="text" id="meta_description" name="meta_description"
                                        class="input w-full border mt-2 cursor-not-allowed bg-gray-100"
                                        placeholder="Enter Meta Description"
                                        value="{{ isset($tag) ? $tag->meta_description : old('meta_description') }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <div class="p-5 preview">
                                    <label>Tag Keywords</label>
                                    <input type="text" id="keywords" name="keywords"
                                        class="input w-full border mt-2 cursor-not-allowed bg-gray-100"
                                        placeholder="Enter Keywords"
                                        value="{{ isset($tag) ? $tag->keywords : old('keywords') }}" readonly>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <div class="p-5 preview">
                                    <label>Tag Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title"
                                        class=" cursor-not-allowed input w-full border mt-2 bg-gray-100"
                                        placeholder="Enter Meta Title"
                                        value="{{ isset($tag) ? $tag->meta_title : old('meta_title') }}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="mt-3">
                            <h5
                                class="text-lg ext-theme-9 @error('tag_image') text-theme-6 @enderror font-medium leading-none">
                                Tag Image Upload <span
                                    class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <div
                                class="border-2 border-dashed rounded-md mt-2 pt-4 @error('tag_image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($tag) ? $tag->description : '' }}"
                                            src="{{ isset($tag) ? $tag->image : '/ar/dist/images/preview-6.jpg' }}"
                                            id="tag-image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload
                                        a file</span> or drag and drop
                                    <input type="file" name="tag_image"
                                        class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)"
                                        value="{{ old('tag_image') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 text-center">
                        <div class="p-5 preview">
                            <button type="submit"
                                class="button w-50 mr-1 mb-2 {{ isset($tag) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($tag) ? 'Update Tag' : 'Create New Tag' }}</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- END: Input -->
        </div>
    </div>
@endsection


@section('script')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('tag-image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script src="/ar/dist/js/custom.js"></script>
@endsection
