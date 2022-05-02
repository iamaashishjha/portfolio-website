@extends('layouts.ar')

@section('title')
{{-- Create New Header/Footer | Aashish Jha --}}
{{ isset($headerFooter)? 'Edit Header/Footer ' . '"' . $headerFooter->title . '". | Aashish Jha': 'Create New Header/Footer | Aashish Jha' }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.home.headerFooter.index') }}" class="">Header/Footer</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">{{ isset($headerFooter) ? 'Edit Header/Footer ' : 'Create New Header/Footer' }}</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8 ">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($headerFooter) ? 'Edit Header/Footer ' . '"' . $headerFooter->title . '".' : 'Create New Header/Footer' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.home.headerFooter.index') }}">All Educations</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($headerFooter) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                <h2 class="font-medium text-base mr-auto">
                    Enter Header/Footer Details
                </h2>

            </div>
            {{-- @include('partials.ar.messages') --}}
            @include('partials.ar.modelMessage')
            <form action="{{ isset($headerFooter) ? route('admin.home.headerFooter.update', $headerFooter->id) : route('admin.home.headerFooter.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($headerFooter))
                @method('PUT')
                @endif
                <div class="p-5" id="input">
                    <div class="preview">
                        <div>
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Header/Footer Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="title" name="title" class="{{ isset($headerFooter) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} input w-full border mt-2 @error('title') border-theme-6 @enderror" placeholder="Enter Name" value="{{ isset($headerFooter) ? $headerFooter->title : old('title') }}" {{ isset($headerFooter) ? 'readonly' : '' }}>
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Header/Footer Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <textarea data-feature="all" class="summernote" data-height="250" name="content"></textarea>
                            {{-- <input type="text" id="description" name="description" class="input w-full border mt-2 @error('description') border-theme-6 @enderror" placeholder="Enter Description in 250 Words." value="{{ isset($headerFooter) ? $headerFooter->description : old('description') }}"> --}}
                        </div>
                        
                        <div class="mt-5 mb-5">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                    Is Active</h5>
                                <input class="show-code input input--switch border" type="checkbox" name="is_active" {{ isset($headerFooter) ? $headerFooter->checkStatus() : '' }}>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('education_image') text-theme-6 @enderror font-medium leading-none">
                                Logo Upload <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <div class="border-2 border-dashed rounded-md mt-2 pt-4 @error('education_image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($headerFooter) ? $headerFooter->description : '' }}" src="{{ isset($headerFooter) ? $headerFooter->image : '/ar/dist/images/preview-6.jpg' }}" id="education-image">
                                    </div>
                                </div>
                                <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 mr-1">Upload a file</span> or drag and drop
                                    <input type="file" name="education_image" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="loadFile(event)" value="{{ old('education_image') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Institution</label>
                            <input type="text" name="institution" class="input w-full border mt-2" placeholder="Enter Institution" value="{{ isset($headerFooter) ? $headerFooter->institution : old('institution') }}" >
                        </div>
                        <div class="mt-3">
                            <label>University</label>
                            <input type="text" name="university" class="input w-full border mt-2" placeholder="Enter University" value="{{ isset($headerFooter) ? $headerFooter->university : old('university') }}" >
                        </div>
                        <div class="mt-3">
                            <label>Grades</label>
                            <input type="text" name="grades" class="input w-full border mt-2" placeholder="Enter Grades" value="{{ isset($headerFooter) ? $headerFooter->grades : old('grades') }}" >
                        </div>
                        <div class="mt-3">
                            <label>No of Year</label>
                            <input type="text" name="no_of_year" class="input w-full border mt-2" placeholder="Enter No of year of education" value="{{ isset($headerFooter) ? $headerFooter->no_of_year : old('no_of_year') }}" >
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit" class="button w-50 mr-1 mb-2 {{ isset($headerFooter) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($headerFooter) ? 'Update Header/Footer' : 'Create New Header/Footer' }}</button>
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
{{-- <script src="/ar/dist/js/custom.js"></script> --}}
<script>
    var loadFile = function(event) {
        var image = document.getElementById('education-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

{{-- @include('partials.ar.messageScript') --}}
@endsection
