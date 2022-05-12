@extends('layouts.ar')

@section('title')
    {{ isset($post) ? 'Edit Member ' . '"' . $post->title . '". | Aashish Jha' : 'Create New Member | Aashish Jha' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.member.membership.index') }}" class="">Members</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">
            {{ isset($post) ? 'Edit Member ' . '"' . $post->name_en . '".' : 'Create New Member' }}
        </a>
    </div>
    {{-- {{ dd($post) }} --}}
@endsection

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($post) ? 'Edit New Blog Post' : 'नयाँ सदस्य बनानुहोस' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0">
                <i class="w-4 h-4 mr-2" data-feather="eye"></i>
                Preview
            </button>
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">All Blog
                Posts</a>
            <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.blog.post.trashed') }}">Trashed
                Blog Posts</a>

        </div>
    </div>
    {{-- @include('partials.ar.messages') --}}
    @include('partials.ar.modelMessage')


    {{-- <div class="pos intro-y grid grid-cols-12 gap-5 mt-5"> --}}
    <form action="{{ isset($post) ? route('admin.blog.post.update', $post->id) : route('admin.blog.post.store') }}"
        method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600"
                    style="align-items: center!important;">
                    <a title="Fill in the Personal Information" data-toggle="tab" id="content-button"
                        data-target="#content-02" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Personal
                    </a>
                    <a title="Upload Necessary Images and Captions" data-toggle="tab" id="images-button"
                        data-target="#images" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="align-left" class="w-4 h-4 mr-2"></i>
                        Images
                    </a>
                    <a title="Adjust the meta title" data-toggle="tab" id="meta-data-button" data-target="#meta-data"
                        href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="code" class="w-4 h-4 mr-2"></i>
                        Meta Data
                    </a>
                    <a title="Fill in the article content" data-toggle="tab" id="content-button-02" data-target="#content"
                        href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Citizenship
                    </a>
                    <a title="Upload Necessary Images and Captions" data-toggle="tab" id="images-button"
                        data-target="#images-02" href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="align-left" class="w-4 h-4 mr-2"></i>
                        Images
                    </a>
                    <a title="Adjust the meta title" data-toggle="tab" id="meta-data-button" data-target="#meta-data-02"
                        href="javascript:;"
                        class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                        <i data-feather="code" class="w-4 h-4 mr-2"></i>
                        Meta Data
                    </a>
                </div>
                <div class="post__content tab-content">
                    <div class="tab-content__pane p-5 active" id="content">
                        {{-- <div class="border border-gray-200 rounded-md p-5"> --}}
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <div
                                    class="font-medium mt-3  @error('description') text-theme-6 @enderror  flex items-center">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    Name
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2 {{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} "
                                    placeholder="Write Name in English" name="name_en" id="name_en"
                                    value="{{ isset($post->name_en) ? $post->name_en : old('name_en') }}"
                                    {{ isset($post) ? 'readonly' : '' }}>
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('description') text-theme-6 @enderror  flex items-center">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    नाम
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3{{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} "
                                    placeholder="नेपाली मा नाम लेख्नुहोस |" name="name_lc" id="name_lc"
                                    value="{{ isset($post->name_lc) ? $post->name_lc : old('name_lc') }}"
                                    {{ isset($post) ? 'readonly' : '' }}>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="mt-3 mr-2">
                                <label class="@error('province_id') text-theme-6 @enderror">
                                    Province (प्रदेश)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="प्रदेश छान्नुहोस् |" class="select2 w-full" name="province_id"
                                        id="province_id" onchange="getDistrict()">
                                        <option hidden>---  प्रदेश छान्नुहोस् |  ---</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                @if (isset($post)) @if ($post->province->id == $province->id)
                                            selected @endif
                                                @endif
                                                >{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3 mr-2">
                                <label class="@error('district_id') text-theme-6 @enderror">
                                    District (जिल्ला)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="पहिला प्रदेश छान्नुहोस् |" class="select2 w-full items-center"
                                        name="district_id" id="district_id" onchange="getLocalLevel()">
                                    </select>
                                    @error('district_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="@error('local_level_id') text-theme-6 @enderror">
                                    Local Level (स्थानइय तह)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </label>
                                <div class="mt-2">
                                    <select data-placeholder="पहिला जिल्ला छान्नुहोस् |" class="select2 w-full"
                                        name="local_level_id" id="local_level_id">
                                    </select>
                                    @error('local_level_id')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <div
                                    class="font-medium mt-3  @error('description') text-theme-6 @enderror  flex items-center">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    Citizenship Number (नगरिकता प्र. प्र. नं.)
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 mr-2 mt-2 {{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} "
                                    placeholder="नगरिकता प्र. प्र. नं. लेख्नुहोस |" name="citizenship_number"
                                    id="citizenship_number"
                                    value="{{ isset($post->citizenship_number) ? $post->citizenship_number : old('citizenship_number') }}">
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('description') text-theme-6 @enderror  flex items-center">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    Passport Number
                                    {{-- <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span> --}}
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3{{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} "
                                    placeholder="Passport Number लेख्नुहोस |" name="passport_number" id="passport_number"
                                    value="{{ isset($post->passport_number) ? $post->passport_number : old('passport_number') }}">
                            </div>
                            <div>
                                <div
                                    class="font-medium mt-3 ml-2  @error('description') text-theme-6 @enderror  flex items-center">
                                    {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                                    Voter Id Number
                                    {{-- <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span> --}}
                                </div>
                                <input type="text"
                                    class="intro-y input input--lg w-full box pr-10 placeholder-theme-13 ml-2 mt-3{{ isset($post) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} "
                                    placeholder="Voter Id Number लेख्नुहोस |" name="voter_id_number" id="voter_id_number"
                                    value="{{ isset($post->voter_id_number) ? $post->voter_id_number : old('voter_id_number') }}">
                            </div>
                        </div>
                        <div class="font-medium mt-3  @error('description') text-theme-6 @enderror  flex items-center">
                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                            Description
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="">
                            <input type="text"
                                class="input w-full border mt-2  @error('description') border-theme-6 @enderror"
                                placeholder="Write caption" name="description" id="description"
                                value="{{ isset($post) ? $post->description : old('description') }}">

                        </div>
                        {{-- </div> --}}
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div
                                class="font-medium flex items-center border-b border-gray-200 pb-5 @error('content') text-theme-6 @enderror ">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Text Content
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250"
                                    name="content">{{ isset($post) ? $post->content : old('content') }}</textarea>
                            </div>

                        </div>
                    </div>

                    <div class="tab-content__pane p-5 active" id="images">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div
                                class="font-medium flex items-center border-b border-gray-200 pb-5 @error('alt_text') text-theme-6 @enderror">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                ALT Text
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <input type="text"
                                    class="input w-full border mt-2  @error('alt_text') border-theme-6 @enderror"
                                    placeholder="Write caption" name="alt_text" id="alt_text"
                                    value="{{ isset($post) ? $post->description : old('description') }}">

                            </div>

                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5"> <i
                                    data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Upload Image </div>
                            <div class="mt-5">
                                <div class="mt-3">
                                    <label class="@error('post_image') text-theme-6 @enderror">
                                        Upload Image
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div
                                        class="border-2 border-dashed rounded-md mt-3 pt-4 @error('post_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($post) ? $post->description : '' }}"
                                                    src="{{ isset($post) ? $post->image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="post-image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="loadFile(event)" name="post_image"
                                                value="{{ old('post_image') }}">
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
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="slug" id="slug"
                                    value="{{ isset($post) ? $post->slug : old('slug') }}" readonly>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Meta - Description
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="meta_description" id="meta_description"
                                    value="{{ isset($post) ? $post->meta_description : old('meta_description') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Keywords
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="keywords" id="keywords"
                                    value="{{ isset($post) ? $post->keywords : old('keywords') }}" readonly>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Meta - Title
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="meta_title" id="meta_title"
                                    value="{{ isset($post) ? $post->meta_title : old('meta_title') }}" readonly>

                            </div>
                        </div>

                    </div>

                    <div class="tab-content__pane p-5 active" id="content-02">
                            <div
                                class="font-medium  @error('description') text-theme-6 @enderror  flex items-center">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <input type="text"
                                    class="input w-full border mt-2  @error('description') border-theme-6 @enderror"
                                    placeholder="Write caption" name="description" id="description"
                                    value="{{ isset($post) ? $post->description : old('description') }}">
                        </div>
                            <div
                                class="font-medium flex items-center @error('content') text-theme-6 @enderror mt-3">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Text Content
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250"
                                    name="content">{{ isset($post) ? $post->content : old('content') }}</textarea>
                            </div>

                        </div>

                    <div class="tab-content__pane p-5 active" id="images-02">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div
                                class="font-medium flex items-center border-b border-gray-200 pb-5 @error('alt_text') text-theme-6 @enderror">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                ALT Text
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                            </div>
                            <div class="mt-5">
                                <input type="text"
                                    class="input w-full border mt-2  @error('alt_text') border-theme-6 @enderror"
                                    placeholder="Write caption" name="alt_text" id="alt_text"
                                    value="{{ isset($post) ? $post->description : old('description') }}">

                            </div>

                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5"> <i
                                    data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Upload Image </div>
                            <div class="mt-5">
                                <div class="mt-3">
                                    <label class="@error('post_image') text-theme-6 @enderror">
                                        Upload Image
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </label>
                                    <div
                                        class="border-2 border-dashed rounded-md mt-3 pt-4 @error('post_image') border-theme-6 @enderror">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md"
                                                    alt="{{ isset($post) ? $post->description : '' }}"
                                                    src="{{ isset($post) ? $post->image : '/ar/dist/images/preview-6.jpg' }}"
                                                    id="post-image">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                                class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                                onchange="loadFile(event)" name="post_image"
                                                value="{{ old('post_image') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content__pane p-5 active" id="meta-data-02">
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Slug
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="slug" id="slug"
                                    value="{{ isset($post) ? $post->slug : old('slug') }}" readonly>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Meta - Description
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="meta_description" id="meta_description"
                                    value="{{ isset($post) ? $post->meta_description : old('meta_description') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Keywords
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="keywords" id="keywords"
                                    value="{{ isset($post) ? $post->keywords : old('keywords') }}" readonly>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>
                                Meta - Title
                            </div>
                            <div class="mt-5">
                                <input type="text" class="input w-full border mt-2   cursor-not-allowed  bg-gray-100"
                                    placeholder="Write caption" name="meta_title" id="meta_title"
                                    value="{{ isset($post) ? $post->meta_title : old('meta_title') }}" readonly>

                            </div>
                        </div>

                    </div>
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
            $("#content-02").show();
            $("#meta-data-02").hide();
            $("#images-02").hide();
            $("#content").hide();

            $("#content-button").click(function() {
                $("#meta-data").hide();
                $("#images").hide();
                $("#content").show();
            });
            $("#content-button-02").click(function() {
                $("#meta-data").hide();
                $("#images").hide();
                $("#content").show();
                $("#content-02").hide();
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
    <script>
        function getDistrict() {
            var provinceId = $('select[name="province_id"]').val();
            if (provinceId) {
                $.ajax({
                    url: '/getDistrict/' + provinceId,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('select[name="district_id"]').empty();
                            $('select[name="district_id"]').append(
                                '<option hidden>---  जिल्ला छान्नुहोस् |  ---</option>');
                            $.each(data, function(key, district) {
                                $('select[name="district_id"]').append('<option value="' + district.id +
                                    '">' + district.name_lc + '</option>');
                            });
                        } else {
                            $('select[name="district_id"]').append(
                                '<option hidden>---  पहिला प्रदेश छान्नुहोस् |  ---</option>');
                        }
                    }
                });
            }
            else{
                $('select[name="province_id"]').append(
                                '<option hidden>---  प्रदेश छान्नुहोस् |  ---</option>');
            }
        }

        function getLocalLevel() {
            var districtId = $('select[name="district_id"]').val();
            console.log(districtId);
            if (districtId) {
                $.ajax({
                    url: '/getLocalLevel/' + districtId,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('select[name="local_level_id"]').empty();
                            $('select[name="local_level_id"]').append(
                                '<option hidden>---  स्थानइय तह छान्नुहोस् |  ---</option>');
                            $.each(data, function(key, localLevel) {
                                console.log(data);
                                $('select[name="local_level_id"]').append('<option value="' + localLevel.id +
                                    '">' + localLevel.name_lc + '</option>');
                            });
                        } else {
                            $('select[name="local_level_id"]').append(
                                '<option hidden>---  पहिला जिल्ला छान्नुहोस् |  ---</option>');
                        }
                    }
                });
            }
        }


    </script>
    <script src="/ar/dist/js/custom.js"></script>
@endsection
