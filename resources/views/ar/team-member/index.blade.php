@extends('layouts.ar')

@section('title')
    All Team Members | {{ __('base.title') }}
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="/admin" class="">Dashboard</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">All Team Members</a>
    </div>
@endsection

@section('content')
    @php
        $authUser = \App\Models\User::find(Auth::id());
    @endphp
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Team Members
        </h2>
        @if ($authUser->hasPermissionTo('create teammember'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.team-member.create') }}">
                    <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                    Add Team Members
                </a>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-2">
        <div class="col-span-12 md:col-span-6">
            <div class="preview mt-2">
                <label class="font-extrabold">Select Designation</label>
                <div class="mt-2">
                    <select data-search="true" class="select2 w-full" name="post_id">
                        <option value=""></option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6">
            <div class="preview mt-2">
                <label class="font-extrabold">Select Email</label>
                <div class="mt-2">
                    <select data-search="true" class="select2 w-full" name="email">
                        <option value=""></option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="-1">-1</option>
                        <option value="-2">-2</option>
                        <option value="-3">-3</option>
                        <option value="-4">-4</option>
                        <option value="-5">-5</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="border-b-2 text-center  whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Image</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">Name</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Designation</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Tenure Start</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Tenure End</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @if ($members->count() > 0)
                    @foreach ($members as $member)
                        <tr>
                            <td class="border-b text-center">
                            </td>
                            <td class="w-40 border-b">
                                <div class="flex sm:justify-center">
                                    <div class="intro-x w-10 h-10 image-fit">
                                        <img alt="{{ $member->name }}" class="rounded-full"
                                            src="{{ isset($member->image) ? $member->image : Avatar::create($member->name)->toBase64() }}">
                                    </div>
                                </div>
                            </td>
                            <td class="border-b text-center">
                                <div class="font-medium whitespace-no-wrap">{{ $member->name }}</div>
                            </td>
                            <td class="text-center border-b">
                                {{ $member->email }}
                            </td>
                            <td class="text-center border-b">
                                {{ $member->postsEntity->name }}
                            </td>
                            <td class="text-center border-b">
                                {{ $member->tenure_start_date_np }}
                            </td>
                            <td class="text-center border-b">
                                {{ $member->tenure_end_date_np }}
                            </td>
                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    @if ($authUser->can('update teammember'))
                                        <a class="flex items-center mr-3 text-theme-20"
                                            href="{{ route('admin.team-member.edit', $member->id) }}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    @endif
                                    @if ($authUser->can('delete teammember'))
                                        <a class="flex items-center" href="javascript:;" data-toggle="modal"
                                            data-target="#delete-modal-preview-{{ $member->id }}">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            Delete
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <div class="modal" id="delete-modal-preview-{{ $member->id }}">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">Do you really want to delete user? This process cannot
                                        be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <form action="{{ route('admin.team-member.destroy', $member->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dismiss="modal"
                                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <td class="text-center border-b" colspan="8">
                        No Members Available
                    </td>
                @endif
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

@endsection

@section('script')
    <script>
        (function($) {

            var dataTable;

            var select2Init = function() {
                // $('select').select2({
                //   dropdownAutoWidth : true,
                //   allowClear: true,
                //   placeholder: "Select a grade",
                // });
            };

            var dataTableInit = function() {
                dataTable = $('#dataTable').DataTable({
                    "columnDefs": [{
                        "targets": 5,
                        "type": 'num',
                    }, {
                        "targets": 3,
                        "type": 'num',
                    }],
                });
            };

            var dtSearchInit = function() {

                $('#post_id').change(function() {
                    dtSearchAction($(this), 5)
                });

            };

            dtSearchAction = function(selector, columnId) {
                var fv = selector.val();
                if ((fv == '') || (fv == null)) {
                    dataTable.api().column(columnId).search('', true, false).draw();
                } else {
                    dataTable.api().column(columnId).search(fv, true, false).draw();
                }
            };


            $(document).ready(function() {
                select2Init();
                dataTableInit();
                dtSearchInit();
            });

        })(jQuery);
    </script>
@endsection
