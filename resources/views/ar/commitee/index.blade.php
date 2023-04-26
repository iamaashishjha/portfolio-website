@extends('layouts.ar')

@section('title')
    All Committee || {{ __('base.title') }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.committee.index') }}" class="">Committee</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Committee</a>
    </div>
@endsection

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
        // dd($committees);
    @endphp
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Committee
        </h2>
        @if ($authUser->hasPermissionTo('create teammember'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.committee.create') }}">
                    Create Committee
                </a>
            </div>
        @endif
    </div>
    {{-- @include('partials.ar.modelMessage') --}}
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Title</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Content</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Created By</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Created At</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($committees->count() > 0)
                    @foreach ($committees as $committee)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->title }}</div>
                            </td>
                            <td class="text-center border-b">
                                <a class="flex items-center text-theme-15" href="javascript:;" data-toggle="modal"
                                    data-target="#notice-content-{{ $committee->id }}"> <i data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View Content </a>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->createdByEntity->name }}</div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $committee->created_at->format('d-M-Y') }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                                {!! $committee->status !!}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 text-theme-9"
                                        href="{{ route('admin.committee.edit', $committee->id) }}"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $committee->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="delete-modal-preview-{{ $committee->id }}">
                            <div class="modal__content modal__content--xl p-10">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process
                                        cannot be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.committee.destroy', $committee->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="notice-content-{{ $committee->id }}">
                            <div class="modal__content modal__content--lg p-10">
                                {{-- <div class="p-5 text-center"> --}}
                                <div class="p-5 text-center">
                                    {!! $committee->description !!}
                                </div>
                                @php
                                    $members = \App\Models\TeamMember::findMany($committee->members);
                                @endphp
                                <div class="grid grid-cols-12 gap-2">
                                    @foreach ($members as $member)
                                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                            <div class="box">
                                                <div class="flex items-start px-5 pt-5">
                                                    <div class="w-full flex flex-col lg:flex-row items-center">
                                                        <div class="w-16 h-16 image-fit">
                                                            <img alt="{{$member->name}}"
                                                                class="rounded-md"
                                                                src="{{ isset($memeber->image) ? $member->image : Avatar::create($member->name)->toBase64() }}">
                                                        </div>
                                                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                                            <a href="" class="font-medium">{{ $member->name }}</a>
                                                            <div class="text-gray-600 text-xs">
                                                                {{ $member->postsEntity->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center lg:text-left p-5">
                                                    @isset($member->description)
                                                        {!! $member->description !!}
                                                    @endisset
                                                    <div
                                                        class="flex items-center justify-center lg:justify-start text-gray-600 mt-5">
                                                        <i data-feather="mail" class="w-3 h-3 mr-2"></i>
                                                        {{ $member->email }}
                                                    </div>
                                                    <div
                                                        class="flex items-center justify-center lg:justify-start text-gray-600 mt-1">
                                                        <i data-feather="phone" class="w-3 h-3 mr-2"></i>
                                                        {{ $member->phone_number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="4">
                        No Committees Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
@endsection

@section('script')
    {{-- <script>
        $('.modal').appendTo('body');
    </script> --}}
@endsection
