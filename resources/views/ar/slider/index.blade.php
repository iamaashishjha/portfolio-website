@extends('layouts.ar')

@section('title')
All Sliders | Aashish Jha
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.home.slider.index') }}" class="">Slider</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Sliders</a>
</div>
@endsection

@section('content')
@include('partials.ar.modelMessage')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Sliders
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.home.slider.create') }}">Create New Slider</a>

    </div>
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
                <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
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
                        <a class="flex items-center mr-3" href="{{ route('admin.home.slider.edit', $slider->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview-{{ $slider->id }}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
            <div class="modal" id="delete-modal-preview-{{ $slider->id }}">
                <div class="modal__content">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('admin.home.slider.destroy', $slider->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                            <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
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
@include('partials.ar.messageScript')

<script>
    $(document).ready(function() {
        var t = $('.datatable').DataTable({
            destroy: true
            , "columnDefs": [{
                "searchable": false
                , "orderable": false
                , "targets": 0
            }]
            , "order": [
                [1, 'asc']
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied'
                , order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

</script>
@endsection
