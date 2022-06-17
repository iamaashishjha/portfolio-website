@extends('layouts.ur')

@section('title')
{{ isset($post) ? 'Edit Blog Post ' . '"' . $post->title . '". | Nagrik Unmukti Party' : 'Create New Blog Post | Nagrik Unmukti Party' }}


@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('user.post.index') }}" class="">Blog Post</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($post) ? 'Edit New Blog Post ' . '"' . $post->title . '".' : 'Create New Blog Post' }}
    </a>
</div>
{{-- {{ dd($post) }} --}}
@endsection

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($post) ? 'Edit New Blog Post' : 'Create New Blog Post' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0">
            <i class="w-4 h-4 mr-2" data-feather="eye"></i>
            Preview
        </button>
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('user.post.index') }}">All Blog Posts</a>
        <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('user.post.trashed') }}">Trashed Blog Posts</a>

    </div>
</div>
{{-- @include('partials.ar.messages') --}}
{{-- @include('partials.ar.modelMessage') --}}


{{-- <div class="pos intro-y grid grid-cols-12 gap-5 mt-5"> --}}
<form action="{{ isset($post) ? route('user.post.update', $post->id) : route('user.post.store') }}" method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    @csrf
    @if (isset($post))
        @method('PUT')
    @endif
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-8">
        <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 {{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} " placeholder="Title" name="title" id="title" value="{{ isset($post) ? $post->title : old('title') }}" {{ isset($post) ? 'readonly' : '' }}>
        
        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600" style="align-items: center!important;">
                <a title="Fill in the article content" data-toggle="tab" id="content-button" data-target="#content" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Content </a>
                <a title="Upload Necessary Images and Captions" data-toggle="tab" id="images-button" data-target="#images" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Images </a>
                <a title="Adjust the meta title" data-toggle="tab" id="meta-data-button" data-target="#meta-data" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="code" class="w-4 h-4 mr-2"></i> Meta Data </a>
            </div>
            <div class="post__content tab-content">
                <div class="tab-content__pane p-5 active" id="content">
                    <div class="border border-gray-200 rounded-md p-5">
                        <div class="font-medium  @error('description') text-theme-6 @enderror  flex items-center border-b border-gray-200 pb-5">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Description
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2  @error('description') border-theme-6 @enderror" placeholder="Write caption" name="description" id="description" value="{{ isset($post) ? $post->description : old('description') }}">
                            
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5 @error('content') text-theme-6 @enderror ">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Text Content
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250" name="content">{{ isset($post) ? $post->content : old('content') }}</textarea>
                        </div>
                        
                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="images">
                    <div class="border border-gray-200 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5 @error('alt_text') text-theme-6 @enderror">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            ALT Text
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2  @error('alt_text') border-theme-6 @enderror" placeholder="Write caption" name="alt_text" id="alt_text" value="{{ isset($post) ? $post->description : old('description') }}">
                            
                        </div>

                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Upload Image </div>
                        <div class="mt-5">
                            <div class="mt-3">
                                <label class="@error('post_image') text-theme-6 @enderror">
                                    Upload Image
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="border-2 border-dashed rounded-md mt-3 pt-4 @error('post_image') border-theme-6 @enderror">
                                    <div class="flex flex-wrap px-4">
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="{{ isset($post) ? $post->description : '' }}" src="{{ isset($post) ? $post->image : '/ar/dist/images/preview-6.jpg' }}" id="post-image">
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)" name="post_image" value="{{ old('post_image') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="meta-data">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Slug
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100" placeholder="Write caption" name="slug" id="slug" value="{{ isset($post) ? $post->slug : old('slug') }}" readonly>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Meta - Description
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100" placeholder="Write caption" name="meta_description" id="meta_description" value="{{ isset($post) ? $post->meta_description : old('meta_description') }}" readonly>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Keywords
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100" placeholder="Write caption" name="keywords" id="keywords" value="{{ isset($post) ? $post->keywords : old('keywords') }}" readonly>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Meta - Title
                        </div>
                        <div class="mt-5">
                            <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100" placeholder="Write caption" name="meta_title" id="meta_title" value="{{ isset($post) ? $post->meta_title : old('meta_title') }}" readonly>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END: Post Content -->
    <!-- BEGIN: Post Info -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y box p-5">
            <div class="mt-3">
                <label class="@error('post_date') text-theme-6 @enderror">
                    Post Date
                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                </label>
                <input data-timepicker="true" class="datepicker input w-full border mt-2" name="post_date" value="{{ isset($post) ? $post->post_date : old('post_date') }}">
            </div>
            <div class="mt-3">
                <label class="@error('category_id') text-theme-6 @enderror">
                    Categories
                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                </label>
                <div class="mt-2">
                    <select data-placeholder="Select categories" class="select2 w-full" name="category_id" multiple>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($post)) @if($post->category->id == $category->id)
                            selected
                            @endif
                            @endif
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-theme-6 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <label class="@error('tags[]') text-theme-6 @enderror">Tags</label>
                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                <div class="mt-2">
                    <select data-placeholder="Select your favorite actors" class="select2 w-full" multiple name="tags[]">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <label class=" @error('status') text-theme-6 @enderror ">Published</label>
                <div class="mt-2">
                    <input class="input input--switch border" type="checkbox" name="status" {{ isset($post) ? $post->checkStatus() : old('status') }}>
                </div>
            </div>
            <div class="mt-3">
                <label class=" @error('featured') text-theme-6 @enderror ">Featured Post</label>
                <div class="mt-2">
                    <input class="input input--switch border  @error('featured') border-theme-6 @enderror" type="checkbox" name="featured" {{ isset($post) ? $post->checkFeatured() : old('featured') }}>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="button w-full mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                    {{ isset($post) ? 'Update Post' : 'Save Post'}}
                </button>
            </div>

        </div>
    </div>
    <!-- END: Post Info -->
</form>
{{-- </div> --}}
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $("#meta-data").hide();
        $("#images").hide();
        $("#content").show();

        $("#content-button").click(function() {
            $("#meta-data").hide();
            $("#images").hide();
            $("#content").show();
        });

        $("#images-button").click(function() {
            $("#meta-data").hide();
            $("#images").show();
            $("#content").hide();
        });

        $("#meta-data-button").click(function() {
            $("#meta-data").show();
            $("#images").hide();
            $("#content").hide();
        });

    });
    var loadFile = function(event) {
        var image = document.getElementById('post-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
<script src="/ar/dist/js/custom.js"></script>

@endsection
