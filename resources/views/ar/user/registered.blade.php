@extends('layouts.ar')

@section('title')
All Registerd Users | Aashish Jha
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="/admin" class="">Users</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Registerd Users</a>
</div>
@endsection

@section('content')
@include('partials.ar.modelMessage')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Registerd Users
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.user.admin') }}">Admin Users</a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="datatable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Image</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Name</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Posts</th>
                {{-- <th class="border-b-2 text-center whitespace-no-wrap">Categories</th> --}}
                {{-- <th class="border-b-2 text-center whitespace-no-wrap">Tags</th> --}}
                <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count()>0)
            @foreach ($users as $user)
            <tr>
                <td class="border-b text-center">
                </td>
                <td class="w-40 border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="{{ $user->name }}" class="rounded-full" src="{{ isset($user->image) ? $user->image : Avatar::create($user->name)->toBase64(); }}">
                        </div>
                    </div>
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">{{ $user->name }}</div>
                </td>
                <td class="text-center border-b">
                    {{ $user->email }}
                </td>
                {{-- <td class="text-center border-b">
					<span class="px-4 py-3 rounded-full bg-theme-1 text-white mr-1">
						{{ $user->catCount() }}
                </span>
                </td> --}}
                {{-- <td class="text-center border-b">
					<span class="px-4 py-3 rounded-full bg-theme-9 text-white mr-1">
						{{ $user->tagCount() }}
                </span>
                </td> --}}
                <td class="text-center border-b">
                    <span class="px-4 py-3 rounded-full bg-theme-6 text-white mr-1">
                        {{ $user->postCount() }}
                    </span>
                </td>
                
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center  text-theme-9 mr-3" href="javascript:;" data-toggle="modal" data-target="#make-modal-preview-{{ $user->id }}">
                            <i data-feather="user-plus" class="w-4 h-4 mr-1"></i>
                            Make
                        </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview-{{ $user->id }}">
                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
            <div class="modal" id="make-modal-preview-{{ $user->id }}">
                <div class="modal__content">
                    <div class="p-5 text-center"> <i data-feather="user-check" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Want to make Admin?</div>
                        <div class="text-gray-600 mt-2">Do you really want to make this user Admin?</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('admin.user.make', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                            <button type="submit" class="button w-24 bg-theme-9 text-white">Make</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal" id="delete-modal-preview-{{ $user->id }}">
                <div class="modal__content">
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete this user?</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
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
            <td class="text-center border-b" colspan="6">
                No Users Available
            </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

{{-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> --}}


@endsection

@section('script')
@include('partials.ar.messageScript')

<script>
    $(document).ready(function() {
        var t = $('.datatable').DataTable({
            destroy: true
            , "columnDefs": [{
                "searchable": false
                , "orderable": false
                , "targets": 0
            }]
            , "order": [
                [1, 'asc']
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied'
                , order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

</script>
@endsection