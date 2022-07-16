@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
        @can('admin')
            <span class="btn btn-outline-primary btn-sm">{{ auth()->user()->role }}</span>
        @endcan
    </div>
    <section id="stats">
        @include('dashboard.layouts.breadcrumb')

        <div class="d-grid mb-3">
            <div class="post-stats bg-danger bg-gradient rounded-3 d-flex justify-content-between pt-2 px-3">
                <div class="stat text-light">
                    <h6>Author Statistics</h6>
                    <p>You've Uploaded <span class="fw-bold">{{ count($posts) }}</span> Posts Since
                        <span class="fw-bold">{{ date('M Y', strtotime(auth()->user()->created_at)) }}</span>
                    </p>
                </div>
                <h1 class="text-light"><i class="fa-solid fa-blog"></i></h1>
            </div>
        </div>
    </section>
@endsection
