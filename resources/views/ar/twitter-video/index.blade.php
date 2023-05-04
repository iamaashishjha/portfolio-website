@extends('layouts.ar')

@section('title')
    All Twitter Videos || Admin
@endsection

@push('breadcrumb')
    All Twitter Videos
@endpush

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Twitter Videos
        </h2>
        @if ($authUser->hasPermissionTo('create twittervideo'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                    data-target="#create-modal">Add New Video</a>
            </div>
        @endif
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">#</th>
                    <th class="whitespace-no-wrap">Video Title</th>
                    <th class="text-center whitespace-no-wrap">Status</th>
                    <th class="text-center whitespace-no-wrap">Entry Date</th>
                    <th class="text-center whitespace-no-wrap">Entry By</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($videos as $video)
                    <tr class="intro-x">
                        <td></td>
                        <td>
                            <a href="" class="font-medium whitespace-no-wrap">{{ $video->title }}</a>
                        </td>
                        <td class="">
                            {!! $video->status !!}
                        </td>
                        <td>
                            {{ $video->created_at->toDateString() }}
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                                {{ $video->createdByEntity->name }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3 text-theme-3" href="javascript:;" data-toggle="modal"
                                    data-target="#view-modal-{{ $video->id }}">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    View
                                </a>
                                @if ($authUser->hasPermissionTo('update twittervideo'))
                                    <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                        data-target="#edit-modal-{{ $video->id }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                @endif
                                <!-- BEGIN: Edit Modal -->
                                <div class="modal" id="edit-modal-{{ $video->id }}">
                                    <div class="modal__content">
                                        <div
                                            class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">Edit</h2>
                                        </div>
                                        <form action="{{ route('admin.twitter-video.update', $video->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                                <div class="col-span-12 sm:col-span-12">
                                                    <label>Title</label> <input type="text"
                                                        class="input w-full border mt-2 flex-1"
                                                        placeholder="Video Title" name="title"
                                                        value="{{ $video->title }}">
                                                </div>
                                                <div class="col-span-12 sm:col-span-12">
                                                    <label>Iframe</label> <input type="text"
                                                        class="input w-full border mt-2 flex-1"
                                                        placeholder="Video Iframe" name="iframe"
                                                        value="{{ $video->iframe }}">
                                                </div>
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center"
                                                text-center> <button type="button"
                                                    class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="button w-100 bg-theme-12 text-white">
                                                    Update Video
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END: Edit Modal -->
                                @if ($authUser->hasPermissionTo('delete twittervideo'))
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                data-target="#delete-modal-preview-{{ $video->id }}"> <i data-feather="trash-2"
                                    class="w-4 h-4 mr-1"></i> Delete </a>
                                    <div class="modal" id="delete-modal-preview-{{ $video->id }}">
                                        <div class="modal__content">
                                            <div class="p-5 text-center"> <i data-feather="x-circle"
                                                    class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-gray-600 mt-2">Do you really want to delete this post?</div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <form action="{{ route('admin.twitter-video.destroy', $video->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" data-dismiss="modal"
                                                        class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                                    <button type="submit" class="button w-24 bg-theme-6 text-white">Trash</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endif
                                <!-- BEGIN: View Modal -->
                                <div class="modal" id="view-modal-{{ $video->id }}">
                                    <div class="modal__content">
                                        <div class="p-5">
                                            <div class="mx-6">
                                                <div class="h-full image-fit rounded-md overflow-hidden">
                                                    {!! $video->iframe !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Videos Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- BEGIN: Create Confirmation Modal -->
    <div class="modal" id="create-modal">
        <div class="modal__content modal__content--lg ">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Create New Video</h2>
            </div>
            <form action="{{ route('admin.twitter-video.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-12"> <label>Title</label> <input type="text"
                            class="input w-full border mt-2 flex-1" placeholder="VIdeo Title" name="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label>Iframe</label> <input type="text" class="input w-full border mt-2 flex-1"
                            placeholder="Video Title" name="iframe" value="{{ old('iframe') }}">
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center" text-center>
                    <button type="button"
                        class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="button w-100 bg-theme-9 text-white"> Create Video</button>
                </div>
            </form>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
