@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-9">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ __('home.menuItems.membership.approved-members') }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                <table class="table table-striped table-responsive" style="display: inline-table;">
                                    <thead>
                                        <tr>
                                            <th scope="col">S. No. </th>
                                            <th scope="col">Name </th>
                                            <th scope="col">Email </th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">मन्त्रालय</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$member->name}}</td>
                                                <td>
                                                    {{$member->email}}
                                                </td>
                                                <td>
                                                    {{$member->phone_number}}
                                                </td>
                                                <td>
                                                    {{$member->permProvince->name}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
