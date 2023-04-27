@extends('layouts.ar')

@section('title')
    All Goverments || Admin
@endsection

@push('breadcrumb')
    All Goverments
@endpush

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Goverments
        </h2>
        @if ($authUser->hasPermissionTo('create goverment'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('admin.goverment.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Goverment</a>
            </div>
        @endif
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">#</th>
                    <th class="whitespace-no-wrap">Title</th>
                    <th class="text-center whitespace-no-wrap">Image</th>
                    <th class="text-center whitespace-no-wrap">Status</th>
                    <th class="text-center whitespace-no-wrap">Entry Date</th>
                    <th class="text-center whitespace-no-wrap">Entry By</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($goverments as $goverment)
                    <tr class="intro-x">
                        <td></td>
                        <td>
                            <a href="" class="font-medium whitespace-no-wrap">{{ $goverment->title }}</a>
                        </td>
                        <td class="w-40 border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $goverment->title }}" class="rounded-full"
                                        src="{{ isset($goverment->image) ? $goverment->image : Avatar::create($goverment->title)->toBase64() }}">
                                </div>
                            </div>
                        </td>
                        <td class="">
                            {!! $goverment->status !!}
                        </td>
                        <td>
                            {{ $goverment->created_at->toDateString() }}
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                                {{ $goverment->createdByEntity->name }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3 text-theme-3" href="javascript:;" data-toggle="modal"
                                    data-target="#view-modal-{{ $goverment->id }}">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    View
                                </a>
                                @if ($authUser->hasPermissionTo('update goverment'))
                                    <a class="flex items-center mr-3" href="{{route('admin.goverment.edit', $goverment->id)}}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                @endif
                                @if ($authUser->hasPermissionTo('delete goverment'))
                                    <a class="flex items-center text-theme-6" href="javascript:;"
                                        onclick="deleteRecord('#delete_form-{{ $goverment->id }}');">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        Delete
                                    </a>
                                    <form id="delete_form-{{ $goverment->id }}"
                                        action="{{ route('admin.goverment.destroy', $goverment->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                @endif
                                <!-- BEGIN: View Modal -->
                                <div class="modal" id="view-modal-{{ $goverment->id }}">
                                    <div class="modal__content">
                                        <div class="p-5">
                                            <div class="mx-6">
                                                <div class="h-full image-fit rounded-md overflow-hidden">
                                                    {!! $goverment->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">No Goverment Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.content-wrapper -->
@endsection
