@extends('layouts.ar')

@section('title')
{{ isset($post) ? 'Edit Blog Post ' . '"' . $post->title . '". | Nagrik Unmukti Party' : 'Create New Blog Post | Nagrik Unmukti Party' }}

@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.blog.post.index') }}" class="">Blog Post</a>
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
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">All Blog Posts</a>
        <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.blog.post.trashed') }}">Trashed Blog Posts</a>

    </div>
</div>
{{-- @include('partials.ar.messages') --}}
@include('partials.ar.modelMessage')


{{-- <div class="pos intro-y grid grid-cols-12 gap-5 mt-5"> --}}
<form action="{{ isset($post) ? route('admin.blog.post.update', $post->id) : route('admin.blog.post.store') }}" method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    @csrf
    @if (isset($post))
        @method('PUT')
    @endif
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-12">
        <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 {{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} " placeholder="Title" name="title" id="title" value="{{ isset($post) ? $post->title : old('title') }}" {{ isset($post) ? 'readonly' : '' }}>
        
        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600" style="align-items: center!important;">
                <a title="Fill in the article content" data-toggle="tab" id="about-button" data-target="#about" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Content </a>
                <a title="Upload Necessary Images and Captions" data-toggle="tab" id="history-button" data-target="#history" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Images </a>
                {{-- <a title="Adjust the meta title" data-toggle="tab" id="meta-data-button" data-target="#meta-data" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="code" class="w-4 h-4 mr-2"></i> Meta Data </a> --}}
            </div>
            <div class="post__content tab-content">
                <div class="tab-content__pane p-5 active" id="about">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5 @error('about_us') text-theme-6 @enderror ">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            About Us
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250" name="about_us">{{ isset($post) ? $post->about_us : old('about_us') }}</textarea>
                        </div>
                        
                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="history">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_history') text-theme-6 @enderror ">
                            <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                            Our History
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250" name="our_history">{{ isset($post) ? $post->our_history : old('our_history') }}</textarea>
                        </div>
                        
                    </div>
                </div>

                {{-- <div class="tab-content__pane p-5 active" id="meta-data">
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

                </div> --}}
            </div>
        </div>
    </div>
    <!-- END: Post Content -->
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
    // var loadFile = function(event) {
    //     var image = document.getElementById('post-image');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

</script>
<script src="/ar/dist/js/custom.js"></script>

@endsection
