@extends('layouts.ar')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
@endsection

@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        @if (isset($user))
            Edit "{{ $user->name }}" details
        @else
            Create New User
        @endif
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="#">
                <i class="fa fa-list" aria-hidden="true"></i>
                All Users
            </a>
        </div>
        <div class="col-span-12">
            <form action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                <div class="intro-x box">
                    <h2 class="text-4xl font-medium leading-none m-3 p-4 text-theme-6">
                        {{ isset($user) ? 'Edit '.$user->name : 'Create New User' }}
                    </h2>
                </div>
                    <div class="grid grid-cols-12 gap-2 mt-5 box intro-y">
                        <div class="intro-y col-span-12 lg:col-span-8">
                            <!-- BEGIN: Input -->
                                <div class="pt-5 px-5" id="input">
                                    <div class="preview">
                                        <div>
                                            <label class="font-extrabold">User Name</label>
                                            <input type="text" class="input w-full border mt-2"
                                                placeholder="Enter User Name" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}" required autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                                <div class="pt-5 px-5" id="input">
                                    <div class="preview">
                                        <div>
                                            <label class="font-extrabold">User Email</label>
                                            <input type="text" class="input w-full border mt-2"
                                            placeholder="Enter User Email" name="email" required autocomplete="email" value="{{ isset($user->email) ? $user->email : old('email') }}">
                                        </div>
                                    </div>
                                </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                                <div class="pt-5 px-5" id="input">
                                    <div class="preview">
                                        <div>
                                            <label class="font-extrabold">Password</label>
                                            <input type="password" class="input w-full border mt-2"
                                            placeholder="Enter User Password" name="password" required autocomplete="new-password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input -->
                                <div class="pt-5 px-5" id="input">
                                    <div class="preview">
                                        <div>
                                            <label class="font-extrabold">Confirm Password</label>
                                            <input type="password" class="input w-full border mt-2"
                                            placeholder="Confirm User Password" name="password_confirmation" required autocomplete="new-password" value="{{ old('password_confirmation') }}">
                                        </div>
                                    </div>
                                </div>
                            <!-- END: Input -->
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-4">
                            <!-- BEGIN: Input -->
                                <div class="pt-5 px-5" id="input">
                                    <div class="preview">
                                        <div>
                                            <label class="font-extrabold">Select Post</label>
                                            <div class="mt-2">
                                                <select data-search="true" class="tail-select w-full" name="role">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}" {{  old('role') == $role->id ? "selected" : "" }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Display Information -->
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="{{ isset($user->image_path) ? '/storage/'.$user->image_path : '/ar/dist/images/profile-6.jpg' }}" id="imagetoChange">
                                    {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div> --}}
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="button w-full bg-theme-1 text-white">Upload Photo</button>
                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image_path" id="inputBtn" onchange="loadFile(event)">
                                </div>
                            </div>
                            <!-- END: Display Information -->
                        </div>
                        <div class="intro-x col-span-12 lg:col-span-12 m-5 p-5">
                            <button type="submit" class="button w-100 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                                @if (isset($user))
                                    Edit {{ $user->name }}
                                @else
                                    Create new User
                                @endif
                            </button>
                        </div>
                    </div>
            </form>
            {{-- <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                        class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="button" class="button w-24 bg-theme-9 text-white">Create</button>
                </div> --}}
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
