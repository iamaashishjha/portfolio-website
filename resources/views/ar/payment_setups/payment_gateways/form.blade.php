@extends('layouts.ar')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css" />
@endsection

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            @if (isset($member))
                Edit "{{ $member->name }}" details
            @else
                Create New Payment Gateway
            @endif
        </h2>
        @if (auth()->user()->can('list paymentgateways'))
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('admin.team-member.index') }}">
                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                    All Payment Gateways
                </a>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12">
            <form
                action="{{ isset($parliament) ? route('admin.payment-gateways.update', $parliament->id) : route('admin.payment-gateways.store') }}"
                method="post" enctype="multipart/form-data">
                {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                @csrf
                @isset($parliament)
                    @method('PUT')
                @endisset
                <div class="intro-x box">
                    <h2 class="text-4xl font-medium leading-none m-3 p-4 text-theme-6">
                        {{ isset($parliament) ? 'Edit ' . $parliament->title : 'Create Payment Gateway' }}
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-2 mt-5 box intro-y">

                    <div class="intro-y col-span-12 lg:col-span-8">
                        <div class="grid w-full gap-2 md:grid-cols-2">
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Name</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Enter Name"
                                    name="name" required
                                    value="{{ isset($parliament->title) ? $parliament->title : old('name') }}">
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Base Url</label>
                                <input type="url" class="input w-full border mt-2"
                                    placeholder="Enter Payment Gateway Base Url" name="base_url" required
                                    value="{{ isset($parliament->title) ? $parliament->title : old('title') }}">
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Signing Key</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Enter Signing Key"
                                    name="signing_key"
                                    value="{{ isset($parliament->title) ? $parliament->title : old('title') }}">
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Signing File</label>
                                <input type="file" class="input w-full border mt-2" placeholder="Enter Signing File"
                                    name="signing_file"
                                    value="{{ isset($parliament->file) ? $parliament->file : old('file') }}">
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Secret Key Name</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Enter Secret Key Name"
                                    name="secret_key_name"
                                    value="{{ isset($parliament->title) ? $parliament->title : old('title') }}">
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                            <div class="pt-5 px-5 preview" id="input">
                                <label class="font-extrabold">Secret Key</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Enter Secret Key"
                                    name="secret_key"
                                    value="{{ isset($parliament->title) ? $parliament->title : old('title') }}">
                            </div>
                            <!-- END: Input -->
                        </div>
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Display Information -->
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Midone Tailwind HTML Admin Template"
                                    src="{{ isset($parliament->image) ? $parliament->image : '/ar/dist/images/profile-6.jpg' }}"
                                    id="imagetoChange">
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Upload Photo</button>
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image"
                                    id="inputBtn" onchange="loadFile(event)">
                            </div>
                        </div>
                        <!-- END: Display Information -->
                    </div>
                    <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                        <button type="submit"
                            class="button w-100 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                            @if (isset($parliament))
                                Edit {{ $parliament->name }}
                            @else
                                Create Payment Gateway
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
