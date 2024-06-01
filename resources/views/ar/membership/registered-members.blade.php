@extends('layouts.ar')

@section('title')
All Registered Members | Nagrik Unmukti Party
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.member.index') }}" class="">Members</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Registered Members</a>
    </div>
@endsection

@section('title')
    All Registered Members
@endsection

@section('content')
    {{-- @include('partials.ar.modelMessage') --}}

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Registered Members
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.member.create') }}"><i class="fa fa-plus mx-2" aria-hidden="true"></i>Register New
                Member</a>
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.member.getApprovedMembers') }}"><i class="fa fa-list mx-2" aria-hidden="true"></i>All
                Approved Members</a>
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full"  id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Name</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Phone</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Province</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">District</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Local Level</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if ($members->count() > 0)
                    @foreach ($members as $member)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">
                                    {{ $member->name_en }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">
                                    {{ $member->phone_number }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">
                                    {{-- {{ $member->permProvince->name }} --}}
                                </div>
                            </td>
                            <td class="text-center border-b">
                                <div class="font-medium whitespace-no-wrap">
                                    {{-- {{ $member->permDistrict->name }} --}}
                                </div>
                            </td>
                            <td class="text-center border-b">
                                <div class="font-medium whitespace-no-wrap">
                                    {{-- {{ $member->permLocalLevel->name }} --}}
                                </div>
                            </td>

                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center text-theme-9 mr-2" href="javascript:;" data-toggle="modal"
                                        data-target="#approve-modal-preview-{{ $member->id }}"> <i
                                            data-feather="check-circle" class="w-4 h-4 mr-1"></i>
                                        Approve
                                    </a>
                                    <a class="flex items-center mr-3 text-theme-3 mr-2" href="javascript:;"
                                        data-toggle="modal" data-target="#view-modal-preview-{{ $member->id }}">
                                        <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                        View
                                    </a>
                                    <a class="flex items-center text-theme-6 mr-2" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $member->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i>
                                        Delete
                                    </a>
                                    <a class="flex items-center mr-3 text-theme-12 mr-2"
                                        href="{{ route('admin.member.edit', $member->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="approve-modal-preview-{{ $member->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="check-circle"
                                        class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to Approve this member?</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.member.approve', $member->id) }}" method="POST">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-9 text-white">Approve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                        <div class="modal" id="delete-modal-preview-{{ $member->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete this member?</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.member.destroy', $member->id) }}" method="POST">
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
                    <td class="text-center border-b" colspan="7">
                        No Posts Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
@endsection

@section('script')
@endsection
