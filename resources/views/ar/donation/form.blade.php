@extends('layouts.ar')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
@endsection

@section('content')
@php
$authUser = \App\Models\User::find(Auth::id());
// dd($committees);
@endphp
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        @if (isset($donation))
            Edit "{{ $donation->title }}" details
        @else
            Create Donation
        @endif
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @if ($authUser->hasPermissionTo('create donation'))
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="#">
                <i class="fa fa-list" aria-hidden="true"></i>
                All Donations
            </a>
        </div>
        @endif
        <div class="col-span-12">
            <form
                action="{{ isset($donation) ? route('admin.donation.update', $donation->id) : route('admin.donation.store') }}"
                method="post" enctype="multipart/form-data">
                {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                @csrf
                @isset($donation)
                    @method('PUT')
                @endisset
                <div class="intro-x box">
                    <h2 class="text-4xl font-medium leading-none m-3 p-4 text-theme-6">
                        {{ isset($donation) ? 'Edit ' . $donation->title : 'Create donation' }}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-2 mt-5 box intro-y">
                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <div class="preview" id="input">
                            <label class="font-extrabold">Page Content</label>
                            <textarea class="summernote" data-height="250" name="content">{{ isset($donation) ? $donation->content : old('content') }}</textarea>
                        </div>

                    </div>
                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <button type="submit"
                            class="button w-100 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                            @if (isset($donation))
                                Edit {{ $donation->name }}
                            @else
                                Create Donation
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('imagetoChange');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
