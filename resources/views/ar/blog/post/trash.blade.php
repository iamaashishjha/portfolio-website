@extends('layouts.ar')

@section('title')
Trashed Blog Posts | Aashish Jha
@endsection

@section('breadcum')
<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="" class="">Application</a>
    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
    <a href="" class="breadcrumb--active">Dashboard</a>
</div>
@endsection


@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Datatable
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Product</button> --}}
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('post.create') }}">Create New Post</a>

    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">PRODUCT NAME</th>
                <th class="border-b-2 text-center whitespace-no-wrap">IMAGES</th>
                <th class="border-b-2 text-center whitespace-no-wrap">REMAINING STOCK</th>
                <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">Nike Tanjun</div>
                    <div class="text-gray-600 text-xs whitespace-no-wrap">Nike Tanjun</div>
                </td>
                <td class="text-center border-b">
                    <div class="flex sm:justify-center">
                        <div class="intro-x w-10 h-10 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-11.jpg">
                        </div>
                        <div class="intro-x w-10 h-10 image-fit -ml-5">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-12.jpg">
                        </div>
                        <div class="intro-x w-10 h-10 image-fit -ml-5">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-11.jpg">
                        </div>
                    </div>
                </td>
                <td class="text-center border-b">108</td>
                <td class="w-40 border-b">
                    <div class="flex items-center sm:justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3" href=""> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- END: Datatable -->


@endsection

@section('script')
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


