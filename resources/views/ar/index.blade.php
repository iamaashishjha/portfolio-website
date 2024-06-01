@extends('layouts.ar');

@section('breadcum')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="/admin" class="breadcrumb--active">
            Admin Dashboard
        </a>
    </div>
@endsection

@section('content')
    <!-- BEGIN: Content -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General OverView
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    {{-- News --}}
                    
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <div class="flex-auto">
                                        <i class="report-box__icon text-theme-9 fa fa-list fa-3x"></i>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-3xl font-bold leading-8">{{ $newsPostsCount }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total News</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Blogs --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <div class="flex-auto">
                                        <i class="report-box__icon text-theme-9  fa fa-list fa-3x"></i>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-3xl font-bold leading-8 ">{{ $blogsPostsCount }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Blogs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Events --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <div class="flex-auto">
                                        <i class="report-box__icon text-theme-12 fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-3xl font-bold leading-8 ">{{ $eventsCount }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Events</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Members --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <div class="flex-auto">
                                        <i class="report-box__icon text-theme-15 fa fa-users fa-3x "></i>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-3xl font-bold leading-8 ">{{ $memberCount }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Members</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Users --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <div class="flex-auto">
                                        <i class="report-box__icon text-theme-18 fa fa-user-o fa-3x"></i>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-3xl font-bold leading-8">{{ $userCount }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: General Report -->
        </div>
    </div>
@endsection
