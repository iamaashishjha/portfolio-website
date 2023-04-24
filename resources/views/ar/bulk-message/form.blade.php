@extends('layouts.ar')

@section('title')
    {{-- Create New Bulk Message | Nagrik Unmukti Party --}}
    {{ isset($bulkMessage)
        ? 'Edit Bulk Message ' . '"' . $bulkMessage->title . '". | Nagrik Unmukti Party'
        : 'Create New Bulk Message |
                                                        Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.bulk-message.index') }}" class="">Bulk Message</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href=""
            class="breadcrumb--active">{{ isset($bulkMessage) ? 'Edit Bulk Message ' : 'Create New Bulk Message' }}</a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($bulkMessage) ? 'Edit Bulk Message ' . '"' . $bulkMessage->title . '".' : 'Create New Bulk Message' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.bulk-message.index') }}">All
                Bulk Message</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($bulkMessage) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Bulk Message Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($bulkMessage) ? route('admin.bulk-message.update', $bulkMessage->id) : route('admin.bulk-message.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($bulkMessage))
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6">
                            <div class="preview p-5">
                                <div>
                                    <h5
                                        class="text-lg ext-theme-9 @error('title') text-theme-6 @enderror font-medium leading-none">
                                        Title
                                        <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                    </h5>

                                    <input type="text" id="title" name="title"
                                        class=" input w-full border mt-2 @error('title') border-theme-6 @enderror"
                                        placeholder="Enter Site Title"
                                        value="{{ isset($bulkMessage) ? $bulkMessage->title : old('title') }}" required>
                                    @error('title')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <div class="p-5" id="multi-select">
                                <h5
                                    class="text-lg ext-theme-9 @error('members[]') text-theme-6 @enderror font-medium leading-none">
                                    Select Message Type
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="preview mt-2">
                                    <select data-placeholder="Select Message Sending Type" data-search="true"
                                        class="select2 w-full" multiple name="medium[]">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ isset($bulkMessage) ?  in_array($type->id, $bulkMessage->medium) ? 'selected' : '' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="grid grid-cols-12 gap-2" id="messageFile">
                        <div class="col-span-12">
                            <div class="p-5 preview">
                                <h5
                                    class="text-lg ext-theme-9 @error('members[]') text-theme-6 @enderror font-medium leading-none">
                                    Select Members
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="mt-2">
                                    <select data-placeholder="Select Members" class="select2 w-full" multiple
                                        name="members[]">
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}" {{ isset($bulkMessage) ? in_array($member->id, $bulkMessage->members) ? 'selected' : '' : '' }}>{{ $member->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2" id="messageContent">
                        <div class="col-span-12">
                            <div class="preview p-5">
                                <h5
                                    class="text-lg ext-theme-9 @error('content') text-theme-6 @enderror font-medium leading-none">
                                    Content
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250" name="content">{{ isset($bulkMessage->content) ? $bulkMessage->content : old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <span class="text-theme-6 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="button w-50 mr-1 mb-2 {{ isset($bulkMessage) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($bulkMessage) ? 'Update Bulk Message' : 'Create New Bulk Message' }}</button>
                    </div>
            </div>
        </div>
        </form>

    </div>
    <!-- END: Input -->
    </div>
    </div>
@endsection

@section('script')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('file');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        // $('#noticeType').change(function(e) {
        //     e.preventDefault();
        //     let selectedFileType = $(this).val();
        //     if (selectedFileType == 1) {
        //         $('#noticeFile').hide();
        //         $('#noticeContent').show();
        //     } else {
        //         $('#noticeFile').show();
        //         $('#noticeContent').hide();
        //     }
        // });
    </script>

    {{-- @if (!isset($bulkMessage))
        <script>
            $(document).ready(function() {
                $('#noticeFile').hide();
                $('#noticeContent').show();
            });
        </script>
    @endif --}}
@endsection
