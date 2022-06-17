@extends('layouts.ar')

@section('title')
All Company Details | Nagrik Unmukti Party
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="{{ route('admin.home.company-details.index') }}" class="">Company Details</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">All Company Details</a>
</div>
@endsection

@section('content')
{{-- @include('partials.ar.modelMessage') --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Company Details
    </h2>
    @if ($totalData < 1) <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a class="button text-white bg-theme-1 shadow-md mr-2"
            href="{{ route('admin.home.company-details.create') }}">Create Company Details</a>

</div>
@endif

</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="datatable">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Name</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Logo</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Phone Number</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
            </tr>
        </thead>
        {{-- {{ dd($companyDetails) }} --}}
        <tbody>
            @if ($companyDetails->count()>0)
            @foreach ($companyDetails as $companyDetail)
            <tr>
                <td class="border-b text-center">
                </td>
                <td class="border-b text-center">
                    <div class="font-medium whitespace-no-wrap">{{ $companyDetail->company_name_en }}</div>
                </td>
                <td class="border-b text-center">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="{{ $companyDetail->company_description }}" class="rounded-full" src="{{ $companyDetail->logo }}">
                        </div>
                    </div>
                </td>
                <td class="text-center border-b">
                    {{ $companyDetail->phone_number }}
                </td>
                <td class="w-40 border-b">
                    {{ $companyDetail->email_address }}
                </td>

                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3 text-theme-9"
                            href="{{ route('admin.home.company-details.edit', $companyDetail->id) }}"> <i
                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <td class="text-center border-b" colspan="6">
                No Company Details Available
            </td>
            @endif
        </tbody>
    </table>
</div>
<!-- END: Datatable -->



@endsection

@section('script')
@include('partials.ar.messageScript')

<script>


</script>
@endsection