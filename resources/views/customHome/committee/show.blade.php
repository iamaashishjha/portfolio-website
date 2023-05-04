@extends('layouts.customHome')

@section('meta')
    <meta property="og:title" content="{{ $committee->title }}">
    <meta name="title" content="{{ $committee->title }}">
    <meta name="author" content="{{ $committee->createdByEntity->name }}">
@endsection

@section('content')
    <section class="committee-list section-gap">
        <div class="container">
            <div class="main-title text-center border-bottom-white mt-80-sm">
                {{-- <div class="text-primary mb-4">{{$committee->title}}</div> --}}
                <h2 class="section-title text-center">
                    {{$committee->title}}
                </h2>
            </div>

            <div class="row g-4">
                @foreach ($committee->teamMembersEntity as $member)
                <div class="col-md-12 col-lg-3">
                    {{-- <div class="d-flex justify-content-center flex-wrap"> --}}
                        <a href="javascript:;" target="__blank">
                            <div class="card me-2 mb-5 image-card">
                                <img src="{{isset($member->image) ? $member->image : ''}}"
                                    alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-center text-primary">
                                        {{$member->name}}
                                    </h5>
                                    <h5 class="card-title text-center">
                                        {{$member->postsEntity->name}}
                                    </h5>
                                    <h6 class="card-title text-center text-secondary">
                                        {{$member->email}}
                                    </h6>
                                    <h6 class="card-title text-center text-secondary">
                                        {{$member->phone_number}}
                                    </h6>
                                </div>
                            </div>
                        </a>
                    {{-- </div> --}}
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
