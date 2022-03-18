@extends('layouts.ar')

@section('title')
Create New Blog Category | Aashish Jha
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="" class="">Application</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">Dashboard</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Create New Category
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                    Enter Category Details
                </h2>
            </div>
            @include('partials.ar.messages')
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-5" id="input">
                    <div class="preview">
                        <div>
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">Category Title <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <input type="text" id="title" name="title" class="input w-full border mt-2 @error('title') border-theme-6 @enderror" placeholder="Enter Name" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">Category Description <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <input type="text" id="description" name="description" class="input w-full border mt-2 @error('description') border-theme-6 @enderror" placeholder="Enter Description in 250 Words." value="{{ old('description') }}">
                            @error('description')
                            <span class="text-theme-6 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label>Category Image Upload</label>
                            <div class="border-2 border-dashed rounded-md mt-2 pt-4">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="/ar/dist/images/preview-6.jpg" id="category-image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                    <input type="file" name="category_image" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Category Slug</label>
                            <input type="text" id="slug" name="slug" class="input w-full border mt-2 cursor-not-allowed  bg-gray-100" placeholder="Enter Slug" readonly>
                        </div>
                        <div class="mt-3">
                            <label>Category Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description" class="input w-full border mt-2 cursor-not-allowed bg-gray-100" placeholder="Enter Meta Description" readonly>
                        </div>
                        <div class="mt-3">
                            <label>Category Keywords</label>
                            <input type="text" id="keywords" name="keywords" class="input w-full border mt-2 cursor-not-allowed bg-gray-100" placeholder="Enter Keywords" readonly>

                        </div>
                        <div class="mt-3">
                            <label>Category Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class=" cursor-not-allowed input w-full border mt-2 bg-gray-100" placeholder="Enter Meta Title" readonly>
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit" class="button w-50 mr-1 mb-2 bg-theme-9 text-white">Create New Category</button>
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

<script>
    var loadFile = function(event) {
        var image = document.getElementById('category-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
<script src="/ar/dist/js/custom.js"></script>
@endsection
