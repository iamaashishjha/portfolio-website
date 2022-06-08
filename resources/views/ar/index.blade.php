@extends('layouts.ar');

@section('breadcum')

<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
    <a href="@can('isAdmin') /admin @elsecan('isUser') /dashboard @endcan" class="breadcrumb--active">
        @can('isAdmin') Admin Dashboard @elsecan('isUser') Dashboard @endcan
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
                {{-- <a href="@can('isAdmin') /admin @elsecan('isUser') /dashboard @endcan"
                    class="ml-auto flex text-theme-1">
                    <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                    Reload Data
                </a> --}}
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                {{-- News --}}
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <div class="flex-auto">
                                    <i class="fa fa-th-list fa-3x report-box__icon text-theme-3"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8">{{ $newsCatCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total News Categories</div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <div class="flex-auto">
                                    <i class="report-box__icon text-theme-6 fa fa-tags fa-3x"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8">{{ $newsTagsCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total News Tags</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <div class="flex-auto">
                                    <i class="report-box__icon text-theme-9 fa fa-list fa-3x"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8">{{ $newsPostsCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total News Posts</div>
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
                                    <i class="fa fa-th-list fa-3x report-box__icon text-theme-3"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8 ">{{ $blogsCatCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total Blog Categories</div>
                                </div>
                                {{-- <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <div class="flex-auto">
                                    <i class="report-box__icon text-theme-6  fa fa-tags fa-3x"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8 ">{{ $blogsTagsCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total Blog Tags</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <div class="flex-auto">
                                    <i class="report-box__icon text-theme-9  fa fa-list fa-3x"></i>
                                </div>
                                <div class="flex-auto">
                                    <div class="text-3xl font-bold leading-8 ">{{ $blogsPostsCount }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total Blog Posts</div>
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

                {{-- @can('isUser')
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 ">{{ $postCount }}</div>
                            <div class="text-base text-gray-600 mt-1">My Blog Posts</div>
                        </div>
                    </div>
                </div>
                @endcan --}}
            </div>
        </div>
        <!-- END: General Report -->
    </div>
</div>
@endsection