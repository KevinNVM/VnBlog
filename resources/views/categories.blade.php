@extends('layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
@endpush

@section('main')
    <div style="margin-top: 4.1em" class="border-bottom border-dark">

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Categories</h1>
                    <p class="lead text-muted">Division of posts regarded as having particular shared characteristics. Browse
                        Total of <span>{{ $count }}</span> Categories</p>
                    <p>
                        <a href="#goto" class="btn btn-primary my-2">Browse Categories</a>
                        <a href="/home" class="btn btn-secondary my-2">Home Page</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light" id="goto">
            <div class="container">

                <div id="masonry" class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach ($categories as $category)
                        <div class="col">
                            <div class="card bg-dark text-white">
                                <img src="https://source.unsplash.com/500x{{ mt_rand(
                                    strlen($category->name) > 55 ? 350 : strlen($category->name) + 550,
                                    strlen($category->name) > 35 ? 600 : strlen($category->name) + 750,
                                ) .
                                    '?' .
                                    $category->name }}"
                                    class="card-img" alt="Category Thumbnail">
                                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, .5)">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">
                                        {{ Str::words(Str::limit($category->description, 50, '...'), 8, '...') }}</p>
                                    <div class="btn-group page-link">
                                        <a href="/categories/{{ $category->slug }}"
                                            class="btn btn-sm btn-outline-light">View</a>
                                        {{-- <button type="button" class="btn btn-sm btn-outline-light">Edit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- <section class="pagination d-flex justify-content-center mt-3">
                    {{ $categories->links() }}
                </section> --}}

            </div>
        </div>

    </div>
@endsection

@push('footer')
    @include('partials.footer')
@endpush

@push('foot')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        $(window).on('load', () => {
            $('#masonry').masonry({
                percentPosition: true,
            });
        })
    </script>
@endpush
