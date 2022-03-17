@extends('layouts.ar')

@section('title')
Create New
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="" class="">Application</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">Dashboard</a>
</div>
@endsection

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Regular Form
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                    Input
                </h2>
            </div>
            <div class="p-5" id="input">
                <div class="preview">
                    <div>
                        <label>With Help</label>
                        <input type="text" class="input w-full border mt-2" placeholder="With help">
                        <div class="text-xs text-gray-600 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <div class="mt-3">
                                <label>Basic</label>
                                <div class="mt-2">
                                    <select class="select2 w-full" style="width: 100%">
                                        <option value="1">Leonardo DiCaprio</option>
                                        <option value="2">Johnny Deep</option>
                                        <option value="3">Robert Downey, Jr</option>
                                        <option value="4">Samuel L. Jackson</option>
                                        <option value="5">Morgan Freeman</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="intro-y col-span-12 lg:col-span-3">
                                <form data-single="true" action="/file-upload" class="dropzone border-gray-200 border-dashed">
                                    <div class="fallback"> <input name="file" type="file" /> </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                                    </div>
                                </form>
                            </div> --}}
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <div class="mt-3">
                                <label>Date: </label>
                                <div class="mt-2">
                                    <div class="relative w-56 mx-auto">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600"> <i data-feather="calendar" class="w-4 h-4"></i> </div> <input type="text" class="datepicker input pl-12 border">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="intro-y box">
                            <label>Content</label>
                            <div class="mt-2">
                                <textarea data-feature="all" class="summernote" name="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Image Upload
                                </h2>
                            </div>
                            <div class="p-5" id="single-file-upload">
                                <div class="preview">
                                    <form data-single="true" action="/file-upload" class="dropzone border-gray-200 border-dashed">
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>
                                        <div class="dz-message" data-dz-message>
                                            <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                            <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Input -->
    </div>

</div>


@endsection
