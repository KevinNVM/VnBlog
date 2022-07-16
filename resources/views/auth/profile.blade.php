@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ $user->name }}</h1>
        @can('admin')
            <span class="btn btn-outline-primary btn-sm">{{ auth()->user()->role }}</span>
        @endcan
    </div>
    <section id="stats">
        @include('dashboard.layouts.breadcrumb')

        <div class="d-grid mb-3">
            <div class="post-stats bg-primary bg-gradient rounded-3 d-flex justify-content-between pt-2 px-3">
                <div class="stat text-light">
                    <h6>Account Info</h6>
                    <small>
                        User ID :
                        <pre>{{ $user->UUID }}</pre>

                        Registered Email :
                        <pre>{{ $user->email }}</pre>

                    </small>
                    <p>
                        Name : {{ $user->name }} <a href="/profile/{{ $user->UUID }}/edit" class="link-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </p>
                    <p>
                        Password : <a href="/profile/{{ $user->UUID }}/edit" class="link-warning">Change Password <i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </p>
                    <p>
                        You Created This Account On <span
                            class="fw-bold">{{ date('d/m/y H:i:s', strtotime($user->created_at)) }}</span><br>
                        Last Updated Time : <span
                            class="fw-bold">{{ date('d/m/y H:i:s', strtotime($user->updated_at)) }}</span>
                    </p>
                </div>
                <h1 class="text-light"><i class="fa-solid fa-user"></i></h1>
            </div>
        </div>

    </section>
@endsection
