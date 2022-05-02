@extends('layouts.ar')

@section('title')
{{-- Create New Education | Aashish Jha --}}
{{ isset($education)? 'Edit Education ' . '"' . $education->title . '". | Aashish Jha': 'Create New Education | Aashish Jha' }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.info.education.index') }}" class="">Education</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">{{ isset($education) ? 'Edit Education ' : 'Create New Education' }}</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8 ">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($education) ? 'Edit Education ' . '"' . $education->title . '".' : 'Create New Education' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.info.education.index') }}">All Educations</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($education) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                <h2 class="font-medium text-base mr-auto">
                    Enter Education Details
                </h2>

            </div>
            {{-- @include('partials.ar.messages') --}}
            @include('partials.ar.modelMessage')
            <form action="{{ isset($education) ? route('admin.info.education.update', $education->id) : route('admin.info.education.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($education))
                @method('PUT')
                @endif
                <div class="p-5" id="input">
                    <div class="preview">
                        <div>
                            <h5 class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                Education Title
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="title" name="title" class="{{ isset($education) ? ' cursor-not-allowed  bg-gray-100 ' : '' }} input w-full border mt-2 @error('title') border-theme-6 @enderror" placeholder="Enter Name" value="{{ isset($education) ? $education->title : old('title') }}" {{ isset($education) ? 'readonly' : '' }}>
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Education Description
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <input type="text" id="description" name="description" class="input w-full border mt-2 @error('description') border-theme-6 @enderror" placeholder="Enter Description in 250 Words." value="{{ isset($education) ? $education->description : old('description') }}">
                        </div>
                        <div class="mt-3 mb-3">
                            <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                Select Start and End Date
                                <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                            </h5>
                            <hr class="mt-3">
                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <div>
                                    <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                        Select Start Date
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </h5>
                                    <div class="relative w-56 mx-auto">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="datepicker input pl-12 border" name="start_date">
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                        Select End Date
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </h5>
                                    <div class="relative w-56 mx-auto">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="datepicker input pl-12 border" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 mb-5">
                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <h5 class="text-lg ext-theme-9  font-medium leading-none mr-3">
                                    Is Active</h5>
                                <input class="show-code input input--switch border" type="checkbox" name="is_active" {{ isset($education) ? $education->checkStatus() : '' }}>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="text-lg ext-theme-9 @error('education_image') text-theme-6 @enderror font-medium leading-none">
                                Education Image Upload <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span></h5>
                            <div class="border-2 border-dashed rounded-md mt-2 pt-4 @error('education_image') border-theme-6 @enderror">
                                <div class="flex flex-wrap px-4">
                                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                        <img class="rounded-md" alt="{{ isset($education) ? $education->description : '' }}" src="{{ isset($education) ? $education->image : '/ar/dist/images/preview-6.jpg' }}" id="education-image">
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
                            <input type="text" name="institution" class="input w-full border mt-2" placeholder="Enter Institution" value="{{ isset($education) ? $education->institution : old('institution') }}" >
                        </div>
                        <div class="mt-3">
                            <label>University</label>
                            <input type="text" name="university" class="input w-full border mt-2" placeholder="Enter University" value="{{ isset($education) ? $education->university : old('university') }}" >
                        </div>
                        <div class="mt-3">
                            <label>Grades</label>
                            <input type="text" name="grades" class="input w-full border mt-2" placeholder="Enter Grades" value="{{ isset($education) ? $education->grades : old('grades') }}" >
                        </div>
                        <div class="mt-3">
                            <label>No of Year</label>
                            <input type="text" name="no_of_year" class="input w-full border mt-2" placeholder="Enter No of year of education" value="{{ isset($education) ? $education->no_of_year : old('no_of_year') }}" >
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit" class="button w-50 mr-1 mb-2 {{ isset($education) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($education) ? 'Update Education' : 'Create New Education' }}</button>
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
