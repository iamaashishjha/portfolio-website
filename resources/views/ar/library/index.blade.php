@extends('layouts.ar')

@section('title')
All Libraries || {{ __('base.title') }}
@endsection

@section('breadcrumb')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.library.index') }}" class="">$libraries</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All $libraries</a>
</div>
@endsection

@section('content')
{{-- @include('partials.ar.modelMessage') --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Libraries
    </h2>
    {{-- @if ($totalData < 1 ) --}}
        
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.library.create') }}">
            <i class="fa fa-plus mx-2"></i>
            Create
            New Libraries</a>
    </div>
    {{-- @endif --}}

</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display w-full" id="dataTable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Library Title</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image</th>
                <th class="border-b-2 text-center whitespace-no-wrap">File</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($libraries->count()>0)
            @foreach ($libraries as $library)
            <tr>
                <td class="border-b text-center">
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">{{ $library->title }}</div>
                </td>
                {{-- <td class="text-center border-b">
                    <div class="font-medium whitespace-no-wrap">{{ $library->description }}</div>
                </td> --}}
                <td class="text-center border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="{{ $library->title }}" class="rounded-full"
                                src="{{ $library->image }}">
                        </div>
                    </div>
                </td>
                <td class="text-center border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <a href="{{ $library->url }}" target="_blank">
                                <img alt="{{ $library->title }}" class=""
                                    src="/ar/dist/images/file.png">
                            </a>
                        </div>
                    </div>
                </td>
                
                {{-- <td class="text-center border-b">{{ $library->meta_description }}</td> --}}
                {{-- <td class="w-40 border-b">
                    {{ $library->meta_title }}
                </td>
                <td class="w-40 border-b">
                    {{ $library->keywords }}
                </td> --}}
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3 text-theme-9"
                            href="{{ route('admin.library.edit', $library->id) }}"> <i
                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                            data-target="#delete-modal-preview-{{ $library->id }}"> <i data-feather="trash-2"
                                class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
            <div class="modal" id="delete-modal-preview-{{ $library->id }}">
                <div class="modal__content">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('admin.library.destroy', $library->id) }}" method="post">
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
            <td class="text-center border-b" colspan="5">
                No Libraries Available
            </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

{{-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview"
        class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> --}}


@endsection

@section('script')


<script>

</script>
@endsection