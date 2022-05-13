@extends('layouts.ar')

@section('title')
    All Blog Posts | Aashish Jha
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.member.membership.index') }}" class="">Blogs</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Posts</a>
    </div>
@endsection

@section('title')
    All Blog Posts
@endsection

@section('content')
    @include('partials.ar.modelMessage')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Blog Posts
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Product</button> --}}
            <a class="button text-white bg-theme-1 shadow-md mr-2"
                href="{{ route('admin.member.membership.create') }}">Create New Blog Post</a>
            {{-- <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.member.membership.trashed') }}">Trashed Blog Posts</a> --}}
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Citizenship</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Personal</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Income / Property</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Political</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Documents</th>
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
                                    {{-- {{ $member->title }} --}}
                                    {{ Str::limit($member->name_en, 20, ' (...)') }}
                                </div>
                            </td>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                            </td>
                            <td class="border-b text-center">
                            </td>
                            <td class="text-center border-b">
                                <div class="flex sm:justify-center">
                                    <div class="intro-x w-10 h-10 image-fit">
                                        <img alt="{{ $member->name_en }}" class="rounded-full"
                                            src="{{ $member->doc_own_image }}">
                                    </div>
                                </div>
                            </td>

                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                        data-target="#view-modal-preview-{{ $member->id }}"> <i data-feather="eye"
                                            class="w-4 h-4 mr-1"></i> View </a>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('admin.member.membership.edit', $member->id) }}"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-modal-preview-{{ $member->id }}"> <i data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Trash </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="view-modal-preview-{{ $member->id }}">
                            <div class="modal__content">
                                <!-- BEGIN: Boxed Accordion -->
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="intro-y box">
                                        <div class="p-5" id="boxed-accordion">
                                            <div class="preview">
                                                <div class="accordion">
                                                    <div class="accordion__pane active border border-gray-200 p-4">
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Citizenship
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            <div class="grid grid-cols-2 gap-4">
                                                            <p>Full Name : {{ $member->name_en }}</p>
                                                            <p>पुरा नाम : {{ $member->name_lc }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Gender : {{ $member->gender->name_en }}</p>
                                                                <p>DOB (AD) : {{ $member->gender->birth_date_ad }}</p>
                                                                <p>DOB (BS) : {{ $member->gender->birth_date_bs }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-2">
                                                                <p>Citizenship Issued Province : {{ $member->citizenProvince->name }}</p>
                                                                <p>Citizenship Issued District : {{ $member->citizenProvince->name }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Citizenship Number : {{ $member->citizenship_number }}</p>
                                                                <p>Passport Number : {{ ($member->passport_number) ? $member->passport_number : NULL }}</p>
                                                                <p>Voter Id Number : {{ ($member->voter_id_number) ? $member->voter_id_number : NULL }}</p>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Permanent Address
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            <div class="grid grid-cols-2 gap-4">
                                                            <p>Full Name : {{ $member->name_en }}</p>
                                                            <p>पुरा नाम : {{ $member->name_lc }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Gender : {{ $member->gender->name_en }}</p>
                                                                <p>DOB (AD) : {{ $member->gender->birth_date_ad }}</p>
                                                                <p>DOB (BS) : {{ $member->gender->birth_date_bs }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-2">
                                                                <p>Citizenship Issued Province : {{ $member->citizenProvince->name }}</p>
                                                                <p>Citizenship Issued District : {{ $member->citizenProvince->name }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Citizenship Number : {{ $member->citizenship_number }}</p>
                                                                <p>Passport Number : {{ ($member->passport_number) ? $member->passport_number : NULL }}</p>
                                                                <p>Voter Id Number : {{ ($member->voter_id_number) ? $member->voter_id_number : NULL }}</p>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Temporary Address
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            <div class="grid grid-cols-2 gap-4">
                                                            <p>Full Name : {{ $member->name_en }}</p>
                                                            <p>पुरा नाम : {{ $member->name_lc }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Gender : {{ $member->gender->name_en }}</p>
                                                                <p>DOB (AD) : {{ $member->gender->birth_date_ad }}</p>
                                                                <p>DOB (BS) : {{ $member->gender->birth_date_bs }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-2">
                                                                <p>Citizenship Issued Province : {{ $member->citizenProvince->name }}</p>
                                                                <p>Citizenship Issued District : {{ $member->citizenProvince->name }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <p>Citizenship Number : {{ $member->citizenship_number }}</p>
                                                                <p>Passport Number : {{ ($member->passport_number) ? $member->passport_number : NULL }}</p>
                                                                <p>Voter Id Number : {{ ($member->voter_id_number) ? $member->voter_id_number : NULL }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion__pane border border-gray-200 p-4 mt-3">
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Personal
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged.

                                                        </div>
                                                    </div>
                                                    <div class="accordion__pane border border-gray-200 p-4 mt-3">
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Income / Property</a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged.</div>
                                                    </div>
                                                    <div class="accordion__pane border border-gray-200 p-4 mt-3">
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Political
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged.</div>
                                                    </div>
                                                    <div class="accordion__pane border border-gray-200 p-4 mt-3">
                                                        <a href="javascript:;"
                                                            class="accordion__pane__toggle font-medium block">
                                                            Documents
                                                        </a>
                                                        <div
                                                            class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged.</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END: Boxed Accordion -->
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
                                    <form action="{{ route('admin.member.membership.destroy', $member->id) }}"
                                        method="POST">
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
    <script>
        $(document).ready(function() {
            var t = $('.datatable').DataTable({
                destroy: true,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [1, 'asc']
                ]
            });

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>
@endsection
