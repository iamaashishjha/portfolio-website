@extends('layouts.ar')

@section('title')
{{-- Create New Blog Category | Nagrik Unmukti PartyDetails --}}
{{ isset($category)? 'Edit Category ' . '"' . $category->title . '". | Nagrik Unmukti PartyDetails': 'Create New Blog Category | Nagrik Unmukti PartyDetails' }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.blog.category.index') }}" class="">Blog Category</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">{{ isset($category) ? 'Edit Category ' : 'Create New Blog Category' }}</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8 ">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($category) ? 'Edit Category ' . '"' . $category->title . '".' : 'Create New Blog Category' }}
    </h2>

    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.category.index') }}">All Blog Categories</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($category) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                <h2 class="font-medium text-base mr-auto">
                    Enter Category Details
                </h2>

            </div>
            {{-- @include('partials.ar.messages') --}}
            {{-- @include('partials.ar.modelMessage') --}}
            <form action="{{ isset($category) ? route('admin.blog.category.update', $category->id) : route('admin.blog.category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($category))
                @method('PUT')
                @endif
                <div class="p-5" id="input">
                    <div class="preview">
                        <div>
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Category Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="title" name="title" class=" input w-full border mt-2 @error('title') border-theme-6 @enderror" placeholder="Enter Name" value="{{ isset($category) ? $category->title : old('title') }}" >
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Category Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="description" name="description" class="input w-full border mt-2 @error('description') border-theme-6 @enderror" placeholder="Enter Description in 250 Words." value="{{ isset($category) ? $category->description : old('description') }}">

                        </div>
                        <div class="mt-5 mb-5">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                    Is Active</h5>
                                <input class="show-code input input--switch border" type="checkbox" name="status" {{ isset($category) ? $category->checkStatus() : '' }}>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('category_image') text-theme-6 @enderror font-medium leading-none">
                                Category Image Upload <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <div class="border-2 border-dashed rounded-md mt-2 pt-4 @error('category_image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($category) ? $category->description : '' }}" src="{{ isset($category) ? $category->image : '/ar/dist/images/preview-6.jpg' }}" id="category-image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                    <input type="file" name="category_image" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)" value="{{ old('category_image') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Category Slug</label>
                            <input type="text" id="slug" name="slug" class="input w-full border mt-2" placeholder="Enter Slug" value="{{ isset($category) ? $category->slug : old('slug') }}">
                        </div>
                        <div class="mt-3">
                            <label>Category Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description" class="input w-full border mt-2  " placeholder="Enter Meta Description" value="{{ isset($category) ? $category->meta_description : old('meta_description') }}">
                        </div>
                        <div class="mt-3">
                            <label>Category Keywords</label>
                            <input type="text" id="keywords" name="keywords" class="input w-full border mt-2" placeholder="Enter Keywords" value="{{ isset($category) ? $category->keywords : old('keywords') }}">
                        </div>
                        <div class="mt-3">
                            <label>Category Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class="  input w-full border mt-2 " placeholder="Enter Meta Title" value="{{ isset($category) ? $category->meta_title : old('meta_title') }}">
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit" class="button w-50 mr-1 mb-2 {{ isset($category) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($category) ? 'Update Category' : 'Create New Category' }}</button>
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
<script src="/ar/dist/js/custom.js"></script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('category-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>


@endsection
