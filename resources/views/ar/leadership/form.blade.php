@extends('layouts.ar')

@section('title')
    {{-- Create New Leadership | Nagrik Unmukti Party --}}
    {{ isset($leadership)
        ? 'Edit Leadership ' . '"' . $leadership->title . '". | Nagrik Unmukti Party'
        : 'Create New Leadership |
                                                            Nagrik Unmukti Party' }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.leadership.index') }}" class="">Leadership</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">{{ isset($leadership) ? 'Edit Leadership ' : 'Create New Leadership' }}</a>
    </div>
@endsection

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
        // dd($leaderships);
    @endphp
    <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($leadership) ? 'Edit Leadership ' . '"' . $leadership->title . '".' : 'Create New Leadership' }}
        </h2>
        @if ($authUser->hasPermissionTo('create leadership'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.leadership.index') }}">All
                    Leadership</a>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 {{ isset($leadership) ? 'bg-theme-9 text-white' : 'bg-theme-1 text-white' }}">

                    <h2 class="font-medium text-base mr-auto">
                        Enter Leadership Details
                    </h2>

                </div>
                {{-- @include('partials.ar.messages') --}}
                {{-- @include('partials.ar.modelMessage') --}}
                <form
                    action="{{ isset($leadership) ? route('admin.leadership.update', $leadership->id) : route('admin.leadership.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($leadership))
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12">
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
                                        value="{{ isset($leadership) ? $leadership->title : old('title') }}" required>
                                    @error('title')
                                        <span class="text-theme-6 mt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                            <option value="{{ $member->id }}"
                                                {{ isset($leadership) ? (in_array($member->id, $leadership->members) ? 'selected' : '') : '' }}>
                                                {{ $member->name }}</option>
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
                                    class="text-lg ext-theme-9 @error('description') text-theme-6 @enderror font-medium leading-none">
                                    Description
                                    <span class="text-lg ext-theme-9 text-theme-6 font-medium leading-none">*</span>
                                </h5>
                                <div class="mt-5">
                                    <textarea data-feature="all" class="summernote" data-height="250" name="description">{{ isset($leadership->description) ? $leadership->content : old('content') }}</textarea>
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
                            class="button w-50 mr-1 mb-2 {{ isset($leadership) ? 'bg-theme-3 text-white' : 'bg-theme-9 text-white' }}">{{ isset($leadership) ? 'Update Leadership' : 'Create New Leadership' }}</button>
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
    </script>
@endsection
