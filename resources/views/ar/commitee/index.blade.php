@extends('layouts.ar')

@section('title')
    All Committee || {{ __('base.title') }}
@endsection

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.committee.index') }}" class="">Committee</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Committee</a>
    </div>
@endsection

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
        // dd($committees);
    @endphp
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Committee
        </h2>
        @if ($authUser->hasPermissionTo('create committee'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.committee.create') }}">
                    Create Committee
                </a>
            </div>
        @endif
    </div>
    {{-- @include('partials.ar.modelMessage') --}}
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
                @if ($committees->count() > 0)
                    @foreach ($committees as $committee)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->title }}</div>
                            </td>
                            <td class="text-center border-b">
                                <a class="flex items-center text-theme-15" href="javascript:;" data-toggle="modal"
                                    data-target="#notice-content-{{ $committee->id }}"> <i data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View Content </a>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->createdByEntity->name }}</div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->created_at->format('d-M-Y') }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                                {!! $committee->status !!}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 text-theme-9"
                                        href="{{ route('admin.committee.edit', $committee->id) }}"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $committee->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="delete-modal-preview-{{ $committee->id }}">
                            <div class="modal__content modal__content--xl p-10">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process
                                        cannot be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.committee.destroy', $committee->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="notice-content-{{ $committee->id }}">
                            <div class="modal__content modal__content--lg p-10">
                                <div class="p-5 text-center">
                                    {!! $committee->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="4">
                        No Committees Available
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
