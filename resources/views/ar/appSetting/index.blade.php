@extends('layouts.ar')

@section('title')
All App Settings || {{ __('base.title') }}
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.app-setting.index') }}" class="">App Settings</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All App Settings</a>
</div>
@endsection

@section('content')
{{-- @include('{{-- @include('partials.ar.modelMessage') --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        App Settings
    </h2>
    @if ($totalData < 1 )
        
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.app-setting.create') }}">Create
            New App Settings</a>
    </div>
    @endif

</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="datatable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Site Title</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Title Image</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Meta Title</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Meta Description</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Keywords</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($appSettings->count()>0)
            @foreach ($appSettings as $appSetting)
            <tr>
                <td class="border-b text-center">
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">{{ $appSetting->site_title }}</div>
                </td>
                <td class="text-center border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="{{ $appSetting->site_title }}" class="rounded-full"
                                src="{{ $appSetting->image }}">
                        </div>
                    </div>
                </td>
                <td class="text-center border-b">{{ $appSetting->meta_description }}</td>
                <td class="w-40 border-b">
                    {{ $appSetting->meta_title }}
                </td>
                <td class="w-40 border-b">
                    {{ $appSetting->keywords }}
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3 text-theme-9"
                            href="{{ route('admin.app-setting.edit', $appSetting->id) }}"> <i
                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        {{-- <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                            data-target="#delete-modal-preview-{{ $appSetting->id }}"> <i data-feather="trash-2"
                                class="w-4 h-4 mr-1"></i> Delete </a> --}}
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <td class="text-center border-b" colspan="7">
                No App Settings Available
            </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

{{-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview"
        class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> --}}


@endsection

@section('script')

<script>

</script>
@endsection