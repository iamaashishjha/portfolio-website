@extends('layouts.ar')

@section('title')
    All Bulk Messages || {{ __('base.title') }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.bulk-message.index') }}" class="">Bulk Messages</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Bulk Messages</a>
    </div>
@endsection

@section('content')
    {{-- @include('partials.ar.modelMessage') --}}
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Bulk Messages
        </h2>

        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.bulk-message.create') }}">
                Create
                Bulk Messages
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
                @if ($bulkMessages->count() > 0)
                    @foreach ($bulkMessages as $message)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $message->title }}</div>
                            </td>
                            <td class="text-center border-b">
                                <a class="flex items-center text-theme-12" href="javascript:;" data-toggle="modal"
                                    data-target="#notice-content-{{ $message->id }}"> <i data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View Content </a>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $message->createdByEntity->name }}</div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $message->created_at->format('d-M-Y') }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                                {!! $message->status !!}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 text-theme-9"
                                        href="{{ route('admin.bulk-message.edit', $message->id) }}"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $message->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="delete-modal-preview-{{ $message->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process
                                        cannot be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.bulk-message.destroy', $message->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="notice-content-{{ $message->id }}">
                            <div class="modal__content">
                                {{-- <div class="p-5 text-center"> --}}
                                <div class="p-5 text-center">
                                    {!! $message->content !!}
                                </div>
                                <div class="p-5 text-center">
                                    <div class="bg-white rounded-md shadow-md p-6">
                                        <h2 class="text-lg font-medium mb-4">Contact Information</h2>
                                        <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-6">
                                                {{-- <div class="flex flex-col gap-1"> --}}
                                                <span class="text-gray-500 text-sm">Email:</span>
                                                <div class="flex flex-col gap-1">
                                                    @foreach ($message->email as $email)
                                                        <a href="mailto:{{ $email }}"
                                                            class="text-blue-500 hover:underline">{{ $email }}</a>
                                                    @endforeach

                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="col-span-6">
                                                {{-- <div class="flex flex-col gap-1"> --}}
                                                <span class="text-gray-500 text-sm">Phone:</span>
                                                <div class="flex flex-col gap-1">
                                                    @foreach ($message->phone_number as $phone)
                                                        <span class="text-gray-700">{{ $phone }}</span>
                                                    @endforeach
                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="4">
                        No Messages Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
@endsection

@section('script')
    {{-- <script>
        $('.modal').appendTo('body');
    </script> --}}
@endsection
