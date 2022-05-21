@extends('layouts.ar')

@section('title')
All Members | Aashish Jha
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.member.membership.index') }}" class="">Members</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Members</a>
</div>
@endsection

@section('title')
All Members
@endsection

@section('content')
@include('partials.ar.modelMessage')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        All Members
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2"
            href="{{ route('admin.member.membership.create') }}">Register New Member</a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Name</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Email</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Phone</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Cast</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Profession</th>
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
                        {{ $member->email }}
                    </div>
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">
                        {{ $member->phone_number }}
                    </div>
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">
                        {{ $member->cast }}
                    </div>
                </td>
                <td class="text-center border-b">
                    <div class="font-medium whitespace-no-wrap">
                        {{ $member->profession }}
                    </div>
                </td>

                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center text-theme-9 mr-2" href="javascript:;" data-toggle="modal"
                            data-target="#approve-modal-preview-{{ $member->id }}"> <i data-feather="check-circle"
                                class="w-4 h-4 mr-1"></i>
                            Approve
                        </a>
                        <a class="flex items-center mr-3 text-theme-3 mr-2" href="javascript:;" data-toggle="modal"
                            data-target="#view-modal-preview-{{ $member->id }}">
                            <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                            View
                        </a>
                        <a class="flex items-center text-theme-6 mr-2" href="javascript:;" data-toggle="modal"
                            data-target="#delete-modal-preview-{{ $member->id }}"> <i data-feather="trash-2"
                                class="w-4 h-4 mr-1"></i>
                            Delete
                        </a>
                        <a class="flex items-center mr-3 text-theme-12 mr-2"
                            href="{{ route('admin.member.membership.edit', $member->id) }}">
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
                        <form action="{{ route('admin.member.membership.destroy', $member->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-dismiss="modal"
                                class="button w-24 border text-gray-700 mr-1">Cancel</button>
                            <button type="submit" class="button w-24 bg-theme-9 text-white">Approve</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal" id="view-modal-preview-{{ $member->id }}">
                <div class="modal__content modal__content--xl">
                    <!-- BEGIN: Boxed Accordion -->
                    <div class="col-span-12 lg:col-span-6">
                        <div class="intro-y box">
                            <div class="p-5" id="boxed-accordion">
                                <div class="preview">
                                    <div class="accordion">
                                        {{-- citizenship --}}
                                        <div class="accordion__pane active border border-gray-200 p-4">

                                            <a href="javascript:;" class="text-4xl accordion__pane__toggle font-medium block text-center">
                                                Citizenship
                                            </a>
                                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Citizenship Based Details (नागरिकता अनुशारको विवरण |)
                                                </h5>
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Full Name : {{ $member->name_en }}</p>
                                                    <p>पुरा नाम : {{ $member->name_lc }}</p>
                                                    <p>Citizenship Issued Province :
                                                        {{ $member->citizenProvince->name }}</p>
                                                    <p>Citizenship Issued District :
                                                        {{ $member->citizenProvince->name }}</p>
                                                </div>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <p>Gender : {{ $member->gender->name_en }}</p>
                                                    <p>DOB (AD) : {{ $member->gender->birth_date_ad }}</p>
                                                    <p>DOB (BS) : {{ $member->gender->birth_date_bs }}</p>
                                                    <p>Citizenship Number : {{ $member->citizenship_number }}
                                                    </p>
                                                    <p>Passport Number :
                                                        {{ $member->passport_number ? $member->passport_number : null }}
                                                    </p>
                                                    <p>Voter Id Number :
                                                        {{ $member->voter_id_number ? $member->voter_id_number : null }}
                                                    </p>
                                                </div>
                                                <hr class="mt-2 mb-2">
                                                <h1 class="text-2xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">
                                                    Permanent Address (स्थायी ठेगाना |)
                                                </h1>
                                                <hr class="mt-2 mb-2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Province (प्रदेश) : {{ $member->name_en }}</p>
                                                    <p>District (जिल्ला) : {{ $member->name_lc }}</p>
                                                    <p>Local Level (स्थानइय तह) : {{ $member->name_lc }}</p>
                                                    <p>Local Level Type (स्थानीय तहको प्रकार) : {{ $member->name_lc }}</p>
                                                    <p>Ward Number (वार्ड नम्बर) : {{ $member->name_lc }}</p>
                                                    <p>Tole (टोल) : {{ $member->name_lc }}</p>
                                                </div>
                                                <<hr class="mt-2 mb-2">
                                                <h1 class="text-2xl text-theme-1 font-medium leading-none mt-2 mb-2 text-center">
                                                    Temporary Address (अस्थायी ठेगाना |)
                                                </h1>
                                                <hr class="mt-2 mb-2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Province (प्रदेश) : {{ $member->name_en }}</p>
                                                    <p>District (जिल्ला) : {{ $member->name_lc }}</p>
                                                    <p>Local Level (स्थानइय तह) : {{ $member->name_lc }}</p>
                                                    <p>Local Level Type (स्थानीय तहको प्रकार) : {{ $member->name_lc }}</p>
                                                    <p>Ward Number (वार्ड नम्बर) : {{ $member->name_lc }}</p>
                                                    <p>Tole (टोल) : {{ $member->name_lc }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- personal --}}
                                        <div class="accordion__pane border border-gray-200 p-4">

                                            <a href="javascript:;" class="text-4xl accordion__pane__toggle font-medium block text-center">
                                                Personal
                                            </a>
                                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Citizenship Based Details (नागरिकता अनुशारको विवरण |)
                                                </h5>
                                                <hr class="mt-2 mb-2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Email : {{ $member->name_en }}</p>
                                                    <p>Phone Number : {{ $member->name_lc }}</p>
                                                    <p>Mobile Number : {{ $member->name_lc }}</p>
                                                    <p>Cast (जाति) : {{ $member->name_lc }}</p>
                                                    <p>वर्ग : {{ $member->name_lc }}</p>
                                                    <p>वर्ग स्रोत : {{ $member->name_lc }}</p>
                                                    <p>Education Qualification (शैक्षिक् योग्यता) : {{ $member->name_lc}}</p>
                                                    <p>Blood Group (रक्त समूह ) : {{ $member->name_lc }}</p>
                                                    <p>Other Identity (अन्य पहिचान) : {{ $member->name_lc }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- property --}}
                                        <div class="accordion__pane border border-gray-200 p-4">

                                            <a href="javascript:;" class="text-4xl accordion__pane__toggle font-medium block text-center">
                                                Income / Property
                                            </a>
                                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Income Details (आय विवरण |)
                                                </h5>
                                                <hr class="mt-2 mb-2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Profession : {{ $member->name_en }}</p>
                                                    <p>Source of Income : {{ $member->name_lc }}</p>
                                                </div>


                                                <hr class="mt-2 mb-2">

                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Property Details (सम्पति बिबरण |)
                                                </h5>
                                                <hr class="mt-2 mb-2">

                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Property in Cash (नगद सम्पत्ति) : {{ $member->name_en }}</p>
                                                    <p>Fixed Property (अचल सम्पति) : {{ $member->name_lc }}</p>
                                                    <p>Property in Share (सेयर सम्पत्ति) : {{ $member->name_lc }}</p>
                                                    <p>Other Property (अन्य सम्पत्ति) : {{ $member->name_lc }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- political --}}
                                        <div class="accordion__pane border border-gray-200 p-4">
                                            <a href="javascript:;" class="text-4xl accordion__pane__toggle font-medium block text-center">
                                                Political
                                            </a>
                                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Political Details (राजनैतिक विवरण |)
                                                </h5>
                                                <hr class="mt-2 mb-2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <p>Haisiyat : {{ $member->name_en }}</p>
                                                    <p>Committee Name : {{ $member->name_lc }}</p>
                                                    <p>मासिक लेवी दर : {{ $member->name_lc }}</p>
                                                    <p>संगठनको सदस्यता प्राप्त मिति(AD) : {{ $member->name_lc }}</p>
                                                    <p>संगठनको सदस्यता प्राप्त मिति(बि.सं.) : {{ $member->name_lc }}</p>
                                                    <p>Party Location : {{ $member->name_lc }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- documents --}}
                                        <div class="accordion__pane border border-gray-200 p-4">

                                            <a href="javascript:;" class="text-4xl accordion__pane__toggle font-medium block text-center">
                                                Documents
                                            </a>
                                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                                <h5 class="text-2xl text-theme-9 font-medium leading-none mt-7 mb-5 mb-2 text-center">
                                                    Important Documents (जरुरि कागजात)
                                                </h5>
                                                <hr class="mt-2 mb-2">
                                                <div class="intro-y box mt-5">
                                                    <div class="p-5" id="fade-animation-slider">
                                                        <div class="preview">
                                                            <div class="slider mx-6 fade-mode">
                                                                @foreach ($member->getDocs() as $file)
                                                                <div class="h-64 px-2">
                                                                    <div class="h-full image-fit rounded-md overflow-hidden">
                                                                        <img alt="{{ $file['name'] }}" src="{{ $file['file'] }}" />
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                        <form action="{{ route('admin.member.membership.destroy', $member->id) }}" method="POST">
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