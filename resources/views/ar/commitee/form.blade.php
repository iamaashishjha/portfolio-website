@extends('layouts.ar')

@section('title')
    {{-- Create New Committee | Nagrik Unmukti PartyDetails --}}
    {{ isset($committee)
        ? 'Edit Committee ' . '"' . $committee->title . '". | Nagrik Unmukti PartyDetails'
        : 'Create New Committee |
                                                        Nagrik Unmukti PartyDetails' }}
@endsection

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.committee.index') }}" class="">Committee</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href=""
            class="breadcrumb--active">{{ isset($committee) ? 'Edit Committee ' : 'Create New Committee' }}</a>
    </div>
@endsection

@section('content')
@php
$authUser = \App\Models\User::find(Auth::id());
// dd($committees);
@endphp
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($committee) ? 'Edit Committee ' . '"' . $committee->title . '".' : 'Create New Committee' }}
        </h2>
        @if ($authUser->hasPermissionTo('create committee'))
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.committee.index') }}">All
                Committee</a>
        </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($committee) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Committee Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($committee) ? route('admin.committee.update', $committee->id) : route('admin.committee.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($committee))
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12">
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
                                        value="{{ isset($committee) ? $committee->title : old('title') }}" required>
                                    @error('title')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2" id="messageContent">
                        <div class="col-span-12">
                            <div class="preview p-5">
                                <h5
                                    class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                    Description
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250" name="description">{{ isset($committee->description) ? $committee->content : old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="button w-50 mr-1 mb-2 {{ isset($committee) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($committee) ? 'Update Committee' : 'Create New Committee' }}</button>
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
    </script>
@endsection
