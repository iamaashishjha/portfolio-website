@extends('layouts.ar')

@section('title')
    {{ isset($member) ? 'Edit Member ' . '"' . $member->title . '". | Aashish Jha' : 'Create New Member | Aashish Jha' }}
@endsection

@section('css')
@endsection

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="{{ route('admin.member.membership.index') }}" class="">Members</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">
            {{ isset($member) ? 'Edit Member ' . '"' . $member->name_en . '" details' : 'Create New Member' }}
        </a>
    </div>
@endsection

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($member) ? 'Edit New Blog Post' : 'नयाँ सदस्य बनानुहोस' }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a class="button text-white bg-theme-9 shadow-md mr-2" href="{{ route('admin.blog.post.index') }}">All
                Members</a>
        </div>
    </div>
    @include('partials.ar.modelMessage')

    <form
        action="{{ isset($member) ? route('admin.member.membership.update', $member->id) : route('admin.member.membership.store') }}"
        method="post" enctype="multipart/form-data" class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        @csrf
        @if (isset($member))
            @method('PUT')
        @endif
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600 justify-items-center">
                    @include('ar.member.membership.partials.tabs')
                </div>

                <div class="post__content tab-content">

                    @include('ar.member.membership.partials.citizenship')

                    @include('ar.member.membership.partials.personal')

                    @include('ar.member.membership.partials.property')

                    @include('ar.member.membership.partials.political')

                    @include('ar.member.membership.partials.document')

                </div>

            </div>
        </div>
        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5" id="btnDiv" hidden>
            <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        var ownImage = function(event) {
            var image = document.getElementById('own_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var signImage = function(event) {
            var image = document.getElementById('sign_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipFront = function(event) {
            var image = document.getElementById('citizenship_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var citizenshipBack = function(event) {
            var image = document.getElementById('citizenship_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportFront = function(event) {
            var image = document.getElementById('passport_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var passportBack = function(event) {
            var image = document.getElementById('passport_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var licenseImage = function(event) {
            var image = document.getElementById('license_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panFront = function(event) {
            var image = document.getElementById('pan_front');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        var panBack = function(event) {
            var image = document.getElementById('pan_back');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
