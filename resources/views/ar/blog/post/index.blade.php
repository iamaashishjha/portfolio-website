@extends('layouts.ar')

@section('title')
    All Blog Posts || {{ __('base.title') }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.blog.post.index') }}" class="">Blogs</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Posts</a>
    </div>
@endsection

@section('title')
    All Blog Posts
@endsection

@section('content')
    {{-- @include('partials.ar.modelMessage') --}}

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Blog Posts
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Product</button> --}}
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.blog.post.create') }}">Create New
                Blog Post</a>
            <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.blog.post.trashed') }}">Trashed
                Blog Posts</a>
                <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.category.index') }}">Blog Category</a>
                    <a class="button text-white bg-theme-12 shadow-md mr-2" href="{{ route('admin.blog.tag.index') }}">Blog Tag</a>
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Post Title</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Post Image</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Post Category</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">
                                    {{-- {{ $post->title }} --}}
                                    {{ Str::limit($post->title, 20, ' (...)') }}
                                </div>
                            </td>
                            <td class="text-center border-b">
                                <div class="flex sm:justify-center">
                                    <div class="intro-x w-10 h-10 image-fit">
                                        <img alt="{{ $post->description }}" class="rounded-full" src="{{ $post->image }}">
                                    </div>
                                </div>
                            </td>
                            {{-- {{ dd($post->category) }} --}}


                            <td class="text-center border-b">
                                {{ $post->category->title }}
                            </td>

                            <td class="w-40 border-b">
                                {!! $post->status !!}
                                {{-- <div class="flex items-center sm:justify-center text-theme-1"> <i data-feather="calendar" class="w-4 h-4 mr-2"></i> {{ $post->created_at->format('H:i:s A Y-m-d') }} </div> --}}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('admin.blog.post.show', $post->id) }}">
                                        <i data-feather="eye" class="w-4 h-4 mr-1"></i> view </a>
                                    <a class="flex items-center mr-3" href="{{ route('admin.blog.post.edit', $post->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $post->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Trash </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="delete-modal-preview-{{ $post->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete this post?</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.blog.post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Trash</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="6">
                        No Posts Available
                    </td>
                @endif



            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->


@endsection

@section('script')
    <script></script>
@endsection
