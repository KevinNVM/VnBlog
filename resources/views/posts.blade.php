@extends('layouts.main')

@push('head')
    @include('partials.index_css')
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
@endpush

@section('main')
    <main class="container">

        <div class="header" style="margin-top: 4.1em">
            <header class="blog-header py-3 position-relative">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a class="link-secondary" href="/subscribe">Subscribe</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="/">VnBlog</a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="search-button link-secondary" href="#search" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="mx-3" role="img" viewBox="0 0 24 24">
                                <title>Search</title>
                                <circle cx="10.5" cy="10.5" r="7.5" />
                                <path d="M21 21l-5.2-5.2" />
                            </svg>
                        </a>
                        <a class="btn btn-sm btn-outline-secondary" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    </div>
                </div>
            </header>
            <div class="d-flex justify-content-center align-items-center spinner">
                <div class="spinner-border" role="status" style="width: 1.2rem; height: 1.2rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        @if ($posts->count())
            <div class="row g-4" style="max-width: 100%">
                <div class="col-md-8">
                    <form method="get">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Search Something"
                                name="search" value="{{ request('search') }}">
                            <label for="search"><i class="bi bi-search"></i> Search For..</label>
                        </div>
                    </form>
                    <h3 class="pb-4 mb-4 fst-italic border-bottom border-dark">
                        {{ $title }} {{ request('page') ? ' | Page: ' . request('page') : '' }}
                    </h3>

                    @foreach ($posts as $post)
                        <article class="blog-post border-bottom pb-3">
                            <h2 class="blog-post-title hvr-sweep-to-right">
                                <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                            </h2>
                            <p class="blog-post-meta p-0 m-0">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                            <div class="pb-2">
                                <section class="d-inline" id="author">
                                    <a href="/author/{{ $post->author->UUID }}"
                                        class="badge-link badge rounded-pill text-decoration-none border border-dark link-dark">
                                        <i class="bi bi-person-circle"></i> {{ $post->author->name }}
                                    </a>
                                </section>
                                <i class="bi bi-chevron-right"></i>
                                <section class="d-inline" id="category">
                                    <a href="/categories/{{ $post->category->slug }}"
                                        class="badge-link badge rounded-pill text-decoration-none border border-dark"
                                        style="color: var(--link-1);">
                                        <i class="bi bi-columns-gap"></i> {{ $post->category->name }}
                                    </a>
                                </section>
                            </div>
                            <img src="https://source.unsplash.com/900x400?{{ $post->category->name }}"
                                alt="Post Thumbnail" style="width: 95%; height: auto;" class="img-thumbnail mb-2">
                            <p aria-label="post exceprt">
                                {{ $post->excerpt }}
                            </p>
                            <a href="/post/{{ $post->slug }}" class="link-underline link-dark">
                                Read More..
                            </a>
                        </article>
                    @endforeach



                    <nav class="blog-pagination py-2" aria-label="Pagination">
                        <section class="pagination d-flex justify-content-start">
                            @if (request()->is('posts*') || request()->is('blog*'))
                                {{ $posts->links() }}
                            @else
                                Showing All Results
                            @endif
                        </section>
                    </nav>

                </div>
            @else
                <div class="row g-5" style="max-width: 100%">
                    <div class="col-md-8">
                        <h3>Sorry No Posts Found</h3>
                        <p>You Searched For</p>
                        <form method="get">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Search Something"
                                    name="search" value="{{ request('search') }}">
                                <label for="floatingInput"><i class="bi bi-search"></i> Search For..</label>
                            </div>
                        </form>
                    </div>
                    {{-- <section class="pagination d-flex justify-content-start">
                        {{ $posts->links() }}
                    </section> --}}
        @endif



        <div class="col-md-4">
            @include('partials.sidebar')
        </div>
        </div>

    </main>
@endsection

@push('footer')
    @include('partials.footer')
@endpush

@push('foot')
    <script>
        // search input
        $('a.search-button').click(() => {
            $('div.input-search').hide().show(200, 'linear');
            $('input[name=search]').focus();
        });
        $('button.btn-close-search').click(() => {
            $('div.input-search').hide(200, 'linear');
        });

        $.ajax({
            type: "GET",
            url: "/utilities/blog_header",
            success: function(response) {
                $('.spinner').remove();
                $('div.header').append(response);
            }
        });
    </script>
@endpush
