@extends('layouts.customHome')

@section('content')
    <section class="news news-page section-gap">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12 col-lg-12">
                    <div class="card-wrap-section">
                        <div class="card-content">
                            <h1 class="news-title mb-2">
                                {{ __('home.menuItems.membership.approved-members') }}
                            </h1>
                            <div class="news-content mt-1 pt-3">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('home.s_no') }}</th>
                                            <th scope="col">{{ __('home.name') }} </th>
                                            <th scope="col">{{ __('home.email') }} </th>
                                            <th scope="col">{{ __('home.phone') }}</th>
                                            <th scope="col">{{ __('home.province') }}</th>
                                            <th scope="col">{{ __('home.district') }}</th>
                                            <th scope="col">{{ __('home.muncipality') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $loop->iteration }}</th>
                                                <td>{{ $member->name }}</td>
                                                <td>
                                                    {{ $member->email }}
                                                </td>
                                                <td>
                                                    {{ $member->phone_number }}
                                                </td>
                                                <td>
                                                    {{ $member->permProvince->name }}
                                                </td>
                                                <td>
                                                    {{ $member->permDistrict->name }}
                                                </td>
                                                <td>
                                                    {{ $member->permLocalLevel->name }}
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
