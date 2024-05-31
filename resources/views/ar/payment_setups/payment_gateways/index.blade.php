@extends('layouts.ar')

@section('title')
    All Payment Gateways || Admin
@endsection

@push('breadcrumb')
    All Payment Gateways
@endpush

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Payment Gateways    
        </h2>
        @if (auth()->user()->can('create paymentgateways'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('admin.payment-gateways.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Payment Gateway</a>
            </div>
        @endif
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
            <tr>
                <th class="whitespace-no-wrap">#</th>
                <th class="whitespace-no-wrap">Name</th>
                <th class="text-center whitespace-no-wrap">Image</th>
                <th class="text-center whitespace-no-wrap">Base URL</th>
                <th class="text-center whitespace-no-wrap">Secret Key</th>
                <th class="text-center whitespace-no-wrap">Is Active</th>
                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $item)
                <tr class="intro-x">
                    <td></td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap">{{ $item->name }}</a>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex sm:justify-center">
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="{{ $item->name }}" class="rounded-full"
                                     src="{{ $item->image ?? Avatar::create($item->name)->toBase64() }}">
                            </div>
                        </div>
                    </td>
                    <td class="">
                        {!! $item->base_url !!}
                    </td>
                    <td>
                        {{ $item->secret_key }}
                        <div class="text-gray-600 text-xs whitespace-no-wrap">
                        </div>
                    </td>
                    <td>
                        <div class="text-gray-600 text-xs whitespace-no-wrap">
                            {!! $item->is_active !!}
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex">
                            <a class="flex items-center mr-3 text-theme-3" href="javascript:;" data-toggle="modal"
                               data-target="#view-modal-{{ $item->id }}">
                                <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                View
                            </a>
                            @if (auth()->user()->can('update paymentgateways'))
                                <a class="flex items-center mr-3" href="{{route('admin.payment-gateways.edit', $item->id)}}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                    Edit
                                </a>
                            @endif
                            @if (auth()->user()->can('delete paymentgateways'))
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                   data-target="#delete-modal-preview-{{ $item->id }}"> <i data-feather="trash-2"
                                                                                                 class="w-4 h-4 mr-1"></i> Delete </a>
                                <div class="modal" id="delete-modal-preview-{{ $item->id }}">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                                                         class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-gray-600 mt-2">Do you really want to delete this post?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <form action="{{ route('admin.payment-gateways.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-dismiss="modal"
                                                        class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                                <button type="submit" class="button w-24 bg-theme-6 text-white">Trash</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endif
                            <!-- BEGIN: View Modal -->
                            <div class="modal" id="view-modal-{{ $item->id }}">
                                <div class="modal__content">
                                    <div class="p-5">
                                        <div class="mx-6">
                                            <div class="h-full image-fit rounded-md overflow-hidden">
                                                {!! $item->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="6">No Parliament Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.content-wrapper -->
@endsection
