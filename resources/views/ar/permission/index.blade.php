@extends('layouts.ar')

@section('title')
    All Permissions | Admin
@endsection

@section('head')
@endsection

@push('breadcrumb')
    All Permissions
@endpush
@section('content')
    @php
        $results = $permissions;
        if (!$results->isEmpty()) {
            $results_array = $results->pluck('name', 'id')->toArray();
        }

        foreach ($results_array as $key => $text) {
            $results_array[$key] = $text;
        }

        $permission_collection = [];
        foreach ($results_array as $key => $name) {
            $entity_arr = explode(' ', $name);
            $permission_collection[end($entity_arr)][] = $entity_arr[0];
        }
        $authUser = \App\Models\User::find(Auth::id());
    @endphp

    <div class="content">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        All permissions
                    </h2>
                    @if ($authUser->hasPermissionTo('create permission'))
                        <a href="{{ route('admin.permission.generate') }}"
                            class="ml-auto flex text-theme-1 dark:text-theme-10"><i data-feather="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Generate Permissions</a>
                    @endif
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @if (!empty($permission_collection))
                        @foreach ($permission_collection as $key => $text)
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $key }}</div>
                                        <div class="text-base text-gray-600 mt-1">{{ implode('  ,  ', $text) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $key }}</div>
                                    <div class="text-base text-gray-600 mt-1">{{ implode('  ,  ', $text) }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- END: General Report -->
        </div>
    </div>
@endsection

@section('script')
@endsection
