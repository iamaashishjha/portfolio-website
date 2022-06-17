@extends('layouts.ar')

@section('title')
All Blog Categories | Nagrik Unmukti Party
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.blog.category.index') }}" class="">Blog Category</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Blog Categories</a>
</div>
@endsection

@section('content')
{{-- @include('partials.ar.modelMessage') --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Blog Categories
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.blog.category.create') }}">Create New Category</a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="datatable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Category Name</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Blogs</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Created At</th>
                <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @if ($categories->count()>0)
            @foreach ($categories as $category)
            <tr>
                <td class="border-b text-center">
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">{{ $category->title }}</div>
                </td>
                <td class="text-center border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="{{ $category->description }}" class="rounded-full" src="{{ $category->image }}">
                        </div>
                    </div>
                </td>
                <td class="text-center border-b">{{ $category->posts->count() }}</td>
                <td class="w-40 border-b">
                    {!! $category->status !!}
                </td>
                <td class="w-40 border-b">
                    <div class="flex items-center sm:justify-center text-theme-1"> <i data-feather="calendar" class="w-4 h-4 mr-2"></i> {{ $category->created_at->format('H:i:s A Y-m-d') }} </div>
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3" href="{{ route('admin.blog.category.edit', $category->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview-{{ $category->id }}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
            <div class="modal" id="delete-modal-preview-{{ $category->id }}">
                <div class="modal__content">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('admin.blog.category.destroy', $category->id) }}" method="post">
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
            <td class="text-center border-b" colspan="7">
                No Categories Available
            </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

{{-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> --}}


@endsection

@section('script')


<script>

</script>
@endsection
