@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>
    <section id="content">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/dashboard/posts/" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <button type="button" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </div>

        <div class="col-lg-8">
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

                @if (!$post->thumbnail)
                    <img src="https://source.unsplash.com/900x400?{{ $post->category->name }}" alt="Post Thumbnail"
                        style="width: 95%; height: auto;" class="img-thumbnail mb-2">
                @else
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Thumbnail"
                        style="width: 95%; height: auto;" class="img-thumbnail mb-2">
                @endif

                {!! $post->body !!}
                <section id="tags">
                    <a href="#" class="btn btn-outline-dark rounded-pill btn-sm">
                        <i class="bi bi-tags"></i> Tags
                    </a>
                </section>
            </article>
            <div class="back my-4">
                <a href="/dashboard/posts" class="btn btn-outline-primary">
                    <i class="fa-solid fa-circle-arrow-left"></i> Back To Home
                </a>
            </div>
        </div>
    </section>
@endsection
