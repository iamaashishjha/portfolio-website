@extends('layouts.ar')

@section('title')
    {{-- Create New Popup Notice | Nagrik Unmukti Party --}}
    {{ isset($popupNotice)
        ? 'Edit Popup Notice ' . '"' . $popupNotice->title . '". | Nagrik Unmukti Party'
        : 'Create New Popup Notice |
                                Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.popup-notice.index') }}" class="">Popup Notice</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href=""
            class="breadcrumb--active">{{ isset($popupNotice) ? 'Edit Popup Notice ' : 'Create New Popup Notice' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($popupNotice) ? 'Edit Popup Notice ' . '"' . $popupNotice->title . '".' : 'Create New Popup Notice' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.popup-notice.index') }}">All
                Popup Notice</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($popupNotice) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Popup Notice Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($popupNotice) ? route('admin.popup-notice.update', $popupNotice->id) : route('admin.popup-notice.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($popupNotice))
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6">
                            <div class="preview p-5">
                                <div>
                                    <h5
                                        class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                        Title
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </h5>

                                    <input type="text" id="title" name="title"
                                        class=" input w-full border mt-2 @error('title') border-theme-6 @enderror"
                                        placeholder="Enter Site Title"
                                        value="{{ isset($popupNotice) ? $popupNotice->title : old('title') }}" required>
                                    @error('title')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <div class="preview p-5">
                                <div>
                                    <h5
                                        class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                        Select Type
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </h5>
                                    <select data-search="true"
                                        class="tail-select w-full  input w-full border mt-2 @error('type') border-theme-6 @enderror"
                                        name="type" id="noticeType">
                                        <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Text
                                        </option>
                                        <option value="2" {{ old('type') == 1 ? 'selected' : '' }}>File
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2" id="noticeContent">
                        <div class="col-span-12">
                            <div class="preview p-5">
                                <h5
                                    class="text-lg ext-theme-9 @error('content') text-theme-6 @enderror font-medium leading-none">
                                    Content
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250" name="content">{{ isset($popupNotice->content) ? $popupNotice->content : old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2" id="noticeFile">
                        <div class="col-span-6">
                            <div class="preview p-5">
                                <h5
                                    class="text-lg ext-theme-9 @error('file') text-theme-6 @enderror font-medium leading-none">
                                    Popup Notice File
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div
                                    class="border-2 border-dashed rounded-md mt-2 pt-4 @error('file') border-theme-6 @enderror">
                                    <div class="flex flex-wrap px-4">
                                        <div class="w-24 h-24 relative file-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md"
                                                alt="{{ isset($popupNotice) ? $popupNotice->description : '' }}"
                                                src="{{ isset($popupNotice) ? '/ar/dist/images/file.png' : '/ar/dist/images/preview-6.jpg' }}"
                                                id="file">
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-feather="file" class="w-4 h-4 mr-2"></i> <span
                                            class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                        <input type="file" name="file"
                                            class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)"
                                            value="{{ old('file') }}">
                                    </div>
                                </div>
                                @error('file')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="button w-50 mr-1 mb-2 {{ isset($popupNotice) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($popupNotice) ? 'Update Popup Notice' : 'Create New Popup Notice' }}</button>
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
            var image = document.getElementById('file');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        $('#noticeType').change(function(e) {
            e.preventDefault();
            let selectedFileType = $(this).val();
            if (selectedFileType == 1) {
                $('#noticeFile').hide();
                $('#noticeContent').show();
            } else {
                $('#noticeFile').show();
                $('#noticeContent').hide();
            }
        });
    </script>

    @if(!isset($popupNotice))
        <script>
            $(document).ready(function() {
                $('#noticeFile').hide();
                $('#noticeContent').show();
            });
        </script>
    @endif
@endsection
