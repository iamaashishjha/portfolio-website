@extends('layouts.ar')

@section('title')
    All Mass Organizations || Admin
@endsection

@push('breadcrumb')
    All Mass Organizations
@endpush

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Mass Organizations
        </h2>
        @if ($totalData < 1)    

            @if ($authUser->hasPermissionTo('create massorganization'))
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a href="{{route('admin.mass-organization.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Mass Organization</a>
                </div>
            @endif
            @endif
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">#</th>
                    <th class="whitespace-no-wrap">Title</th>
                    <th class="text-center whitespace-no-wrap">Status</th>
                    <th class="text-center whitespace-no-wrap">Entry Date</th>
                    <th class="text-center whitespace-no-wrap">Entry By</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($massOrganizations as $massOrganization)
                    <tr class="intro-x">
                        <td></td>
                        <td>
                            <a href="" class="font-medium whitespace-no-wrap">{{ $massOrganization->title }}</a>
                        </td>
                        <td class="w-40 border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="{{ $massOrganization->title }}" class="rounded-full"
                                        src="{{ isset($massOrganization->image) ? $massOrganization->image : Avatar::create($massOrganization->title)->toBase64() }}">
                                </div>
                            </div>
                        </td>
                        <td class="">
                            {!! $massOrganization->status !!}
                        </td>
                        <td>
                            {{ $massOrganization->created_at->toDateString() }}
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                                {{ $massOrganization->createdByEntity->name }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3 text-theme-3" href="javascript:;" data-toggle="modal"
                                    data-target="#view-modal-{{ $massOrganization->id }}">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    View
                                </a>
                                @if ($authUser->hasPermissionTo('update massorganization'))
                                    <a class="flex items-center mr-3" href="{{route('admin.mass-organization.edit', $massOrganization->id)}}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                @endif
                                @if ($authUser->hasPermissionTo('delete massorganization'))
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                data-target="#delete-modal-preview-{{ $massOrganization->id }}"> <i data-feather="trash-2"
                                    class="w-4 h-4 mr-1"></i> Delete </a>
                                    <div class="modal" id="delete-modal-preview-{{ $massOrganization->id }}">
                                        <div class="modal__content">
                                            <div class="p-5 text-center"> <i data-feather="x-circle"
                                                    class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-gray-600 mt-2">Do you really want to delete this post?</div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <form action="{{ route('admin.mass-organization.destroy', $massOrganization->id) }}" method="post">
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
                                <div class="modal" id="view-modal-{{ $massOrganization->id }}">
                                    <div class="modal__content">
                                        <div class="p-5">
                                            <div class="mx-6">
                                                <div class="h-full image-fit rounded-md overflow-hidden">
                                                    {!! $massOrganization->content !!}
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
                        <td colspan="6">No Mass Organization Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.content-wrapper -->
@endsection
