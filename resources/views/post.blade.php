@extends('layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
    @include('partials.index_css')
@endpush

@section('main')
    <div class="container mb-3" style="margin-top: 4rem">
        <main class="container">


            <div class="row g-5" style="max-width: 100%">
                <div class="col-md-8">
                    <article class="blog-post border-bottom py-3">
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="blog-post-meta">
                            {{ date('d M Y', strtotime($post->created_at)) }}
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

                        <img src="https://source.unsplash.com/900x400?{{ $post->category->name }}" alt="Post Thumbnail"
                            style="width: 95%; height: auto;" class="img-thumbnail mb-2">

                        {!! $post->body !!}
                        <section id="tags">
                            <a href="#" class="badge rounded-pill text-decoration-none border border-dark">
                                <i class="bi bi-tags"></i> Tags
                            </a>
                        </section>
                    </article>
                    <a href="/blog" class="btn btn-outline-primary">
                        <i class="fa-solid fa-circle-arrow-left"></i> Back To Home
                    </a>
                </div>

                <div class="col-md-4">
                    @include('partials.sidebar')
                </div>
            </div>

        </main>
    </div>
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

        $(document).on('keyup', function(e) {
            if (e.which == 27) {
                $('div.input-search').hide(200, 'linear');
            }
        });
    </script>
@endpush
