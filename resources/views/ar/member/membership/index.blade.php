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
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.member.membership.create') }}">Create New Blog Post</a>
        {{-- <a class="button text-white bg-theme-6 shadow-md mr-2" href="{{ route('admin.member.membership.trashed') }}">Trashed Blog Posts</a> --}}
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center  whitespace-no-wrap">Name</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Post Image</th>
               {{-- <th class="border-b-2 text-center whitespace-no-wrap">Post Category</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Post Tags</th>
                <th class="border-b-2 text-center whitespace-no-wrap">email</th> --}}
                <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @if ($members->count()>0)
                @foreach ($members as $member)
                <tr>
                    <td class="border-b text-center">
                    </td>
                    <td class="border-b text-center">
                        <div class="font-medium whitespace-no-wrap">
                            {{-- {{ $member->title }} --}}
                        {{ Str::limit($member->name_en, 20, ' (...)'); }}
                        </div>
                    </td>
                    <td class="text-center border-b">
                        {{-- <div class="flex sm:justify-center">
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="{{ $member->name_en }}" class="rounded-full" src="{{ $member->getOwnimageAttribute() }}">
                            </div>
                        </div> --}}
                    </td>


                    {{-- <td class="text-center border-b">
                        {{ $member->category->title }}
                    </td>

                    <td class="text-center w-40 border-b">
                    {!! $member->tags !!}
                    </td>
                    <td class="w-40 border-b">
                        {!! $member->status !!}
                        <div class="flex items-center sm:justify-center text-theme-1"> <i data-feather="calendar" class="w-4 h-4 mr-2"></i> {{ $member->created_at->format('H:i:s A Y-m-d') }} </div>
                    </td> --}}
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('admin.member.membership.edit', $member->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview-{{ $member->id }}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Trash </a>
                        </div>
                    </td>
                </tr>
                <div class="modal" id="delete-modal-preview-{{ $member->id }}">
                    <div class="modal__content">
                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-gray-600 mt-2">Do you really want to delete this member?</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <form action="{{ route('admin.member.membership.destroy', $member->id) }}" method="member">
                                @csrf
                                @method('DELETE')
                                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
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
