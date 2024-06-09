@extends('layouts.ar')

@section('title')
    All Administrative Users | {{ __('base.title') }}
@endsection

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="/admin" class="">Users</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Admin Users</a>
    </div>
@endsection

@section('content')
@php
    $authUser = \App\Models\User::find(Auth::id());
@endphp
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Users
        </h2>
        @if ($authUser->hasPermissionTo('create user'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.user.create') }}">Add New User</a>
            </div>
        @endif
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Image</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Name</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Role</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">News</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Blogs</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="w-40 border-b">
                                <div class="flex sm:justify-center">
                                    <div class="intro-x w-10 h-10 image-fit">
                                        <img alt="{{ $user->name }}" class="rounded-full"
                                            src="{{ isset($user->image) ? $user->image : Avatar::create($user->name)->toBase64() }}">
                                    </div>
                                </div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $user->name }}</div>
                            </td>
                            <td class="text-center border-b">
                                {{ $user->email }}
                            </td>
                            <td class="text-center border-b">
                                <span class="px-4 py-3 rounded-full bg-theme-1 text-white mr-1">
                                    {{ $user->getRoleName() }}
                                </span>
                            </td>
                            <td class="text-center border-b">
                                <span class="px-4 py-3 rounded-full bg-theme-9 text-white mr-1">
                                    {{ $user->newsCount() }}
                                </span>
                            </td>
                            <td class="text-center border-b">
                                <span class="px-4 py-3 rounded-full bg-theme-6 text-white mr-1">
                                    {{ $user->postCount() }}
                                </span>
                            </td>
                            <td class="border-b w-5">
                                @if ($authUser->can('delete user'))
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $user->id }}">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        Delete
                                    </a>
                                </div>
                                @endif
                            </td>
                        </tr>

                        <div class="modal" id="delete-modal-preview-{{ $user->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete user? This process cannot
                                        be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="8">
                        No Users Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

@endsection
