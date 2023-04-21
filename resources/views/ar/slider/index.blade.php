@extends('layouts.ar')

@section('title')
All Sliders | {{ __('base.title') }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.home.slider.index') }}" class="">Slider</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Sliders</a>
</div>
@endsection

@section('content')
{{-- @include('partials.ar.modelMessage') --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Sliders
    </h2>
    @if ($totalData < 1)    
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.home.slider.create') }}">Create New Slider</a>
    </div>
    @endif
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="datatable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Slider Title</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Slider Description</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image 1</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image 2</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image 3</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image 4</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image 5</th>
                <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @if ($sliders->count()>0)
                @foreach ($sliders as $slider)
                    <tr>
                        <td class="border-b text-center">
                        </td>
                        <td class="border-b text-center">
                            <div class="font-medium whitespace-no-wrap">{{ $slider->slider_title }}</div>
                        </td>
                        <td class="border-b text-center">
                            <div class="font-medium whitespace-no-wrap">{{ $slider->slider_description }}</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $slider->slider_description }}" class="rounded-full" src="{{ $slider->slider_image_a }}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $slider->slider_description }}" class="rounded-full" src="{{ $slider->slider_image_b }}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $slider->slider_description }}" class="rounded-full" src="{{ $slider->slider_image_c }}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $slider->slider_description }}" class="rounded-full" src="{{ $slider->slider_image_d }}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $slider->slider_description }}" class="rounded-full" src="{{ $slider->slider_image_e }}">
                                </div>
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3 text-theme-20" href="{{ route('admin.home.slider.edit', $slider->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <td class="text-center border-b" colspan="9">
                    No Sliders Available
                </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

{{-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> --}}


@endsection

@section('script')


@endsection
