@extends('layouts.ar')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
@endsection

@section('content')
@php
$authUser = \App\Models\User::find(Auth::id());
// dd($committees);
@endphp
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        @if (isset($parliament))
            Edit "{{ $parliament->title }}" details
        @else
            Create Parliament
        @endif
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @if ($authUser->hasPermissionTo('create parliament'))
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="#">
                <i class="fa fa-list" aria-hidden="true"></i>
                All Parliaments
            </a>
        </div>
        @endif
        <div class="col-span-12">
            <form
                action="{{ isset($parliament) ? route('admin.parliament.update', $parliament->id) : route('admin.parliament.store') }}"
                method="post" enctype="multipart/form-data">
                {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                @csrf
                @isset($parliament)
                    @method('PUT')
                @endisset
                <div class="intro-x box">
                    <h2 class="text-4xl font-medium leading-none m-3 p-4 text-theme-6">
                        {{ isset($parliament) ? 'Edit ' . $parliament->title : 'Create Parliament' }}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-2 mt-5 box intro-y">
                    <div class="intro-y col-span-12 lg:col-span-8">
                        <!-- BEGIN: Input -->
                        <div class="pt-5 px-5 preview" id="input">
                            <label class="font-extrabold">Title</label>
                            <input type="text" class="input w-full border mt-2" placeholder="Enter Title" name="title"
                                required autocomplete="email"
                                value="{{ isset($parliament->title) ? $parliament->title : old('title') }}">
                        </div>
                        <!-- END: Input -->
                        <!-- BEGIN: Input -->
                        <div class="pt-5 px-5 preview" id="input">
                            <label class="font-extrabold">File</label>
                            <input type="file" class="input w-full border mt-2" placeholder="Enter File" name="file"
                                required autocomplete="file"
                                value="{{ isset($parliament->file) ? $parliament->file : old('file') }}">
                        </div>
                        <!-- END: Input -->
                        <!-- BEGIN: Input -->
                        <div class="pt-5 px-5 preview" id="input">
                            <label class="font-extrabold">Description</label>
                            <textarea id="message" rows="6" class="input w-full border mt-2" name="description"
                                placeholder="Write description here...">
                                        {{ isset($parliament->description) ? $parliament->description : null }}
                            </textarea>
                        </div>
                        <!-- END: Input -->
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Display Information -->
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Midone Tailwind HTML Admin Template"
                                    src="{{ isset($parliament->image) ? $parliament->image : '/ar/dist/images/profile-6.jpg' }}"
                                    id="imagetoChange">
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Upload Photo</button>
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image"
                                    id="inputBtn" onchange="loadFile(event)">
                            </div>
                        </div>
                        <!-- END: Display Information -->
                    </div>
                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <div class="preview" id="input">
                            <label class="font-extrabold">Page Content</label>
                            <textarea class="summernote" data-height="250" name="content">{{ isset($parliament) ? $parliament->content : old('content') }}</textarea>
                        </div>

                    </div>
                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <button type="submit"
                            class="button w-100 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                            @if (isset($parliament))
                                Edit {{ $parliament->name }}
                            @else
                                Create Parliament
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('imagetoChange');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
