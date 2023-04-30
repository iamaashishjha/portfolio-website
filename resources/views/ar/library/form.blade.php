@extends('layouts.ar')

@section('title')
    {{-- Create New Library | Nagrik Unmukti Party --}}
    {{ isset($library)
        ? 'Edit Library ' . '"' . $library->title . '". | Nagrik Unmukti Party'
        : 'Create New Library |
    Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.library.index') }}" class="">Library</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">{{ isset($library) ? 'Edit Library ' : 'Create New Library' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($library) ? 'Edit Library ' . '"' . $library->title . '".' : 'Create New Library' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.library.index') }}">
                <i class="fa fa-list mx-2"></i>
                All
                Library</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($library) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Library Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($library) ? route('admin.library.update', $library->id) : route('admin.library.store') }}"
                    method="post" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
                    @csrf
                    @if (isset($library))
                        @method('PUT')
                    @endif
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>

                            <input type="text" id="title" name="title"
                                class=" input w-full border mt-2 @error('title') border-theme-6 @enderror"
                                placeholder="Enter Library Title"
                                value="{{ isset($library) ? $library->title : old('title') }}" required>

                            @error('title')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>

                            <input type="text" id="description" name="description"
                                class=" input w-full border mt-2 @error('description') border-theme-6 @enderror"
                                placeholder="Enter Library Description"
                                value="{{ isset($library) ? $library->description : old('description') }}" required>
                            @error('description')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5 class="text-lg ext-theme-9 @error('url') text-theme-6 @enderror font-medium leading-none">
                                URL
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>

                            <input type="url" id="url" name="url"
                                class=" input w-full border mt-2 @error('url') border-theme-6 @enderror"
                                placeholder="Enter Library Description"
                                value="{{ isset($library) ? $library->url : old('url') }}" required>
                            @error('url')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('meta_title') text-theme-6 @enderror font-medium leading-none">
                                Meta Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_title"
                                class="input w-full border mt-2  cursor-not-allowed bg-gray-100" id="meta_title"
                                placeholder="Enter Meta Title"
                                value="{{ isset($library) ? $library->meta_title : old('meta_title') }}" required
                                readonly>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('meta_description') text-theme-6 @enderror font-medium leading-none">
                                Meta Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="meta_description"
                                class="input w-full border mt-2  cursor-not-allowed bg-gray-100" id="meta_description"
                                placeholder="Enter Meta Description"
                                value="{{ isset($library) ? $library->meta_description : old('meta_description') }}"
                                required readonly>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('keywords') text-theme-6 @enderror font-medium leading-none">
                                Keywords
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" name="keywords"
                                class="input w-full border mt-2  cursor-not-allowed bg-gray-100" id="keywords"
                                placeholder="Enter Keywords"
                                value="{{ isset($library) ? $library->keywords : old('keywords') }}" required readonly>
                        </div>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5 class="text-lg ext-theme-9 @error('image') text-theme-6 @enderror font-medium leading-none">
                                Library Image
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <div
                                class="border-2 border-dashed rounded-md mt-2 pt-4 @error('image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($library) ? $library->description : '' }}"
                                            src="{{ isset($library) ? $library->image : '/ar/dist/images/preview-6.jpg' }}"
                                            id="image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                        class="text-theme-1 mr-1">Upload
                                        a file</span> or drag and drop
                                    <input type="file" name="image" id="image"
                                        class="w-full h-full top-0 left-0 absolute opacity-0" accept="image/*"
                                        onchange="loadImage(event)" value="{{ old('image') }}">
                                </div>
                            </div>

                            @error('image')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview">
                            <h5
                                class="text-lg ext-theme-9 @error('file') text-theme-6 @enderror font-medium leading-none">
                                Library File
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <div
                                class="border-2 border-dashed rounded-md mt-2 pt-4 @error('file') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative file-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md"
                                            alt="{{ isset($library) ? $library->description : '' }}"
                                            src="{{ isset($library) ? '/ar/dist/images/file.png' : '/ar/dist/images/preview-6.jpg' }}"
                                            id="file">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="file" class="w-4 h-4 mr-2"></i> <span
                                        class="text-theme-1 mr-1">Upload
                                        a file</span> or drag and drop
                                    <input type="file" name="file" id="file"
                                        class="w-full h-full top-0 left-0 absolute opacity-0" accept="application/pdf"
                                        onchange="loadFile(event)" value="{{ old('file') }}">
                                </div>
                            </div>

                            @error('file')
                                <span class="text-theme-6 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="p-5 preview text-center">
                            <button type="submit"
                                class="button w-50 mr-1 mb-2 {{ isset($library) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($library) ? 'Update Library' : 'Create New Library' }}</button>
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
        var loadImage = function(event) {
            var image = document.getElementById('image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile = function(event) {
            var image = document.getElementById('file');
            image.src = '{{ url('/ar/dist/images/file.png') }}';
        };
    </script>
    <script src="/ar/dist/js/custom.js"></script>
@endsection
