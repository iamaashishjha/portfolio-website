@extends('layouts.ar')

@section('title')
{{-- Create New Event | Nagrik Unmukti Party --}}
{{ isset($event)? 'Edit Event ' . '"' . $event->title . '". | Nagrik Unmukti Party': 'Create New Event | Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.event.index') }}" class="">Event</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">{{ isset($event) ? 'Edit Event ' : 'Create New Event' }}</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8 ">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($event) ? 'Edit Event ' . '"' . $event->title . '".' : 'Create New Event' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.event.index') }}">All Events</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div
                class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($event) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">
                <h2 class="font-medium text-base mr-auto">
                    Enter Event Details
                </h2>

            </div>
            {{-- @include('partials.ar.messages') --}}
            @include('partials.ar.modelMessage')
            <form action="{{ isset($event) ? route('admin.event.update', $event->id) : route('admin.event.store') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($event))
                @method('PUT')
                @endif
                <div class="p-5" id="input">
                    <div class="preview">
                        <div>
                            <h5
                                class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Event Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="title" name="title"
                                class="{{ isset($event) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} input w-full border mt-2 @error('title') border-theme-6 @enderror"
                                placeholder="Enter Name" value="{{ isset($event) ? $event->title : old('title') }}" {{
                                isset($event) ? 'readonly' : '' }}>

                        </div>
                        <div class="mt-3">
                            <h5
                                class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Event Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="description" name="description"
                                class="input w-full border mt-2 @error('description') border-theme-6 @enderror"
                                placeholder="Enter Description in 250 Words."
                                value="{{ isset($event) ? $event->description : old('description') }}">

                        </div>
                        <div class="mt-5 mb-5">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                    Is Active</h5>
                                <input class="show-code input input--switch border" type="checkbox" name="status" {{
                                    isset($event) ? $event->checkStatus() : '' }}>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5
                                class="text-lg ext-theme-9 @error('event_image') text-theme-6 @enderror font-medium leading-none">
                                Event Image Upload <span
                                    class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <div
                                class="border-2 border-dashed rounded-md mt-2 pt-4 @error('event_image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($event) ? $event->description : '' }}"
                                            src="{{ isset($event) ? $event->image : '/ar/dist/images/preview-6.jpg' }}"
                                            id="event-image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                        class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                    <input type="file" name="event_image"
                                        class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)"
                                        value="{{ old('event_image') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Event Slug</label>
                            <input type="text" id="slug" name="slug"
                                class="input w-full border mt-2 cursor-not-allowed  bg-gray-100"
                                placeholder="Enter Slug" value="{{ isset($event) ? $event->slug : old('slug') }}"
                                readonly>
                        </div>
                        <div class="mt-3">
                            <label>Event Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description"
                                class="input w-full border mt-2 cursor-not-allowed bg-gray-100"
                                placeholder="Enter Meta Description"
                                value="{{ isset($event) ? $event->meta_description : old('meta_description') }}"
                                readonly>
                        </div>
                        <div class="mt-3">
                            <label>Event Keywords</label>
                            <input type="text" id="keywords" name="keywords"
                                class="input w-full border mt-2 cursor-not-allowed bg-gray-100"
                                placeholder="Enter Keywords"
                                value="{{ isset($event) ? $event->keywords : old('keywords') }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label>Event Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title"
                                class=" cursor-not-allowed input w-full border mt-2 bg-gray-100"
                                placeholder="Enter Meta Title"
                                value="{{ isset($event) ? $event->meta_title : old('meta_title') }}" readonly>
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="button w-50 mr-1 mb-2 {{ isset($event) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{
                                isset($event) ? 'Update Event' : 'Create New Event' }}</button>
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
        var image = document.getElementById('event-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@include('partials.ar.messageScript')
@endsection