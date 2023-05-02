@extends('layouts.ar')

@section('title')
    All Donations || Admin
@endsection

@push('breadcrumb')
    All Donations
@endpush

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Donations
        </h2>
        @if ($totalData < 1)    

        @if ($authUser->hasPermissionTo('create donation'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('admin.donation.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Donation</a>
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
                @forelse ($donations as $donation)
                    <tr class="intro-x">
                        <td></td>
                        <td>
                            <a href="" class="font-medium whitespace-no-wrap">{{ $donation->title }}</a>
                        </td>
                        
                        <td class="">
                            {!! $donation->status !!}
                        </td>
                        <td>
                            {{ $donation->created_at->toDateString() }}
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                            </div>
                        </td>
                        <td>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                                {{ $donation->createdByEntity->name }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3 text-theme-3" href="javascript:;" data-toggle="modal"
                                    data-target="#view-modal-{{ $donation->id }}">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    View
                                </a>
                                @if ($authUser->hasPermissionTo('update donation'))
                                    <a class="flex items-center mr-3" href="{{route('admin.donation.edit', $donation->id)}}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                @endif
                                @if ($authUser->hasPermissionTo('delete donation'))
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                data-target="#delete-modal-preview-{{ $donation->id }}"> 
                                <i data-feather="trash-2"
                                    class="w-4 h-4 mr-1"></i> 
                                    Delete 
                                </a>

                                    
                                    
                                @endif

                                <div class="modal" id="delete-modal-preview-{{ $donation->id }}">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-gray-600 mt-2">Do you really want to delete this post?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <form action="{{ route('admin.donation.destroy', $donation->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-dismiss="modal"
                                                    class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                                <button type="submit" class="button w-24 bg-theme-6 text-white">Trash</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- BEGIN: View Modal -->
                                <div class="modal" id="view-modal-{{ $donation->id }}">
                                    <div class="modal__content">
                                        <div class="p-5">
                                            <div class="mx-6">
                                                <div class="h-full image-fit rounded-md overflow-hidden">
                                                    {!! $donation->content !!}
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
                        <td colspan="6">No Donations Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.content-wrapper -->
@endsection
