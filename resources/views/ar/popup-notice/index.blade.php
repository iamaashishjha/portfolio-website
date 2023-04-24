@extends('layouts.ar')

@section('title')
    All Popup Notices || {{ __('base.title') }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.popup-notice.index') }}" class="">Popup Notices</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Popup Notices</a>
    </div>
@endsection

@section('content')
    {{-- @include('partials.ar.modelMessage') --}}
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Popup Notices
        </h2>

        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.popup-notice.create') }}">
                Create
                Popup Notices
            </a>
        </div>

    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Title</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Content</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Created By</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Created At</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($popupNotices->count() > 0)
                    @foreach ($popupNotices as $notice)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $notice->title }}</div>
                            </td>
                            <td class="text-center border-b">
                                <a class="flex items-center text-theme-15" href="javascript:;" data-toggle="modal"
                                    data-target="#notice-content-{{ $notice->id }}"> <i data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View Content </a>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $notice->createdByEntity->name }}</div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $notice->created_at->format('d-M-Y') }}</div>
                            </td>
                            <td class="border-b text-center">
                                {!! $notice->status !!}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 text-theme-9"
                                        href="{{ route('admin.popup-notice.edit', $notice->id) }}"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $notice->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="delete-modal-preview-{{ $notice->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process
                                        cannot be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.popup-notice.destroy', $notice->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="notice-content-{{ $notice->id }}">
                            <div class="modal__content">
                                {{-- <div class="p-5 text-center"> --}}
                                @if ($notice->type == 1)
                                    <div class="p-5 text-center">
                                        {!! $notice->content !!}
                                    </div>
                                @else
                                    <div class="p-5 text-center">
                                        <div class="flex sm:justify-center">
                                            <div class="">
                                                <img alt="{{ $notice->title }}" class="rounded-full"
                                                    src="{{ $notice->image }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- </div> --}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="4">
                        No Notices Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
@endsection

@section('script')
    <script>
        $('.modal').appendTo('body');
    </script>
@endsection
