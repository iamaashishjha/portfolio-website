@extends('layouts.ar')

@section('title')
{{ isset($companyDetail) ? 'Edit Blog Post ' . '"' . $companyDetail->title . '". | Nagrik Unmukti Party' : 'Create New
Blog Post | Nagrik
Unmukti Party' }}

@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.home.companyDetails.index') }}" class="">Blog Post</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">
        {{ isset($companyDetail) ? 'Edit New Blog Post ' . '"' . $companyDetail->title . '".' : 'Create New Blog Post'
        }}
    </a>
</div>
{{-- {{ dd($companyDetail) }} --}}
@endsection

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($companyDetail) ? 'Edit New Blog Post' : 'Create New Blog Post' }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0">
            <i class="w-4 h-4 mr-2" data-feather="eye"></i>
            Preview
        </button> --}}
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.home.companyDetails.index') }}">
            All Other Company Details
        </a>

    </div>
</div>
{{-- @include('partials.ar.messages') --}}
@include('partials.ar.modelMessage')


<form
    action="{{ isset($companyDetail) ? route('admin.home.companyDetails.update', $companyDetail->id) : route('admin.home.companyDetails.store') }}"
    method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    @csrf
    @if (isset($companyDetail))
    @method('PUT')
    @endif
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-12">

        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600"
                style="align-items: center!important;">
                <a title="Fill in the About Us" data-toggle="tab" id="about-button" data-target="#about"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                    About Us
                </a>
                <a title="Fill in Our History" data-toggle="tab" id="history-button" data-target="#history"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                    <i data-feather="align-left" class="w-4 h-4 mr-2"></i>
                    Our History
                </a>
                <a title="Fill in Our Mission" data-toggle="tab" id="mission-button" data-target="#mission"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                    <i data-feather="code" class="w-4 h-4 mr-2"></i>
                    Our Mission
                </a>
                <a title="Fill in Our Vision" data-toggle="tab" id="vision-button" data-target="#vision"
                    href="javascript:;"
                    class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                    <i data-feather="code" class="w-4 h-4 mr-2"></i>
                    Our Vision
                </a>
            </div>
            <div class="post__content tab-content">
                <div class="tab-content__pane p-5 active" id="about">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('about_us') text-theme-6 @enderror ">
                            About Us
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="about_us">{{ isset($companyDetail) ? $companyDetail->about_us : old('about_us') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="history">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_history') text-theme-6 @enderror ">
                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                            Our History
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="our_history">{{ isset($companyDetail) ? $companyDetail->our_history : old('our_history') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="mission">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_mission') text-theme-6 @enderror ">
                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                            Our Mission
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="our_mission">{{ isset($companyDetail) ? $companyDetail->our_mission : old('our_mission') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="tab-content__pane p-5 active" id="vision">
                    <div class="border border-gray-200 rounded-md p-5 mt-5">
                        <div
                            class="font-medium flex items-center border-b border-gray-200 pb-5 @error('our_vision') text-theme-6 @enderror ">
                            {{-- <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> --}}
                            Our Vision
                            <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                        </div>
                        <div class="mt-5">
                            <textarea data-feature="all" class="summernote" data-height="250"
                                name="our_vision">{{ isset($companyDetail) ? $companyDetail->our_vision : old('our_vision') }}</textarea>
                        </div>
                    </div>

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button type="submit"
                            class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
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

        $("#about").show();
        $("#history").hide();
        $("#mission").hide();
        $("#vision").hide();

        $("#about-button").click(function() {
            $("#about").show();
            $("#history").hide();
            $("#mission").hide();
            $("#vision").hide();
        });

        $("#history-button").click(function() {
            $("#about").hide();
            $("#history").show();
            $("#mission").hide();
            $("#vision").hide();
        });

        $("#mission-button").click(function() {
            $("#about").hide();
            $("#history").hide();
            $("#mission").show();
            $("#vision").hide();
        });

        $("#vision-button").click(function() {
            $("#about").hide();
            $("#history").hide();
            $("#mission").hide();
            $("#vision").show();
        });

    });
    // var loadFile = function(event) {
    //     var image = document.getElementById('post-image');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };

</script>
<script src="/ar/dist/js/custom.js"></script>

@endsection