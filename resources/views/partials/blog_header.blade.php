<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach ($categories as $category)
            <a class="p-2 link-secondary text-capitalize"
                href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        @endforeach
    </nav>
</div>

<div class=" mb-4 text-white rounded bg-dark">
    <div id="carouselExampleControls" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <a href="/post/{{ $posts[count($posts) - 1]->slug }}">
                    <img src="https://source.unsplash.com/1200x500?{{ $posts[count($posts) - 1]->category->name }}"
                        class="d-block w-100" alt="Featured Post">
                    <div class="carousel-caption d-none d-md-block rounded" style="background-color: rgba(0, 0, 0, .2)">
                        <h5>{{ $posts[count($posts) - 1]->title }}</h5>
                        <p>{{ Str::limit($posts[count($posts) - 1]->excerpt, 120, '...') }}</p>
                    </div>
                </a>
            </div>
            @if ($posts->count() > 6)
                @for ($i = 2; $i < 5; $i++)
                    <div class="carousel-item">
                        <a href="/post/{{ $posts[$i]->slug }}">
                            <img src="https://source.unsplash.com/1200x500?{{ $posts[$i]->category->name }}"
                                class="d-block w-100" alt="Featured Post">
                            <div class="carousel-caption d-none d-md-block rounded"
                                style="background-color: rgba(0, 0, 0, .2)">
                                <h5>{{ $posts[$i]->title }}</h5>
                                <p>{{ Str::limit($posts[$i]->excerpt, 120, '...') }}</p>
                            </div>
                        </a>
                    </div>
                @endfor
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="row mb-2">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative featured-posts"
            style="background: url('http://source.unsplash.com/400x300?{{ $posts[1]->category->name }}')">
            <div class="col p-4 d-flex flex-column position-static text-light" style="background: rgba(0, 0, 0, .2)">
                <strong
                    class="d-inline-block mb-2 text-warning text-capitalize">{{ $posts[1]->category->name }}</strong>
                <h3 class="mb-0 text-truncate">{{ Str::limit($posts[1]->title, 20, '..') }}</h3>
                <div class="mb-1 text-secondary">{{ $posts[1]->created_at->diffForHumans() }}
                    <section class="d-inline" id="category">
                        <a href="/categories/{{ $posts[1]->category->slug }}"
                            class="badge-link badge rounded-pill text-decoration-none text-bg-warning">
                            <i class="bi bi-columns-gap"></i> {{ $posts[1]->category->name }}
                        </a>
                    </section>
                </div>
                <p class="card-text mb-auto">{{ Str::limit($posts[1]->excerpt, 90, '...') }}</p>
                <a href="/post/{{ $posts[1]->slug }}" class="stretched-link link-light highlighted-link">Continue
                    reading</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative featured-posts"
            style="background: url('http://source.unsplash.com/400x300?{{ $posts[2]->category->name }}')">
            <div class="col p-4 d-flex flex-column position-static text-light" style="background: rgba(0, 0, 0, .2)">
                <strong
                    class="d-inline-block mb-2 text-success text-capitalize">{{ $posts[2]->category->name }}</strong>
                <h3 class="mb-0 text-truncate">{{ Str::limit($posts[2]->title, 20, '..') }}</h3>
                <div class="mb-1 text-secondary">{{ $posts[2]->created_at->diffForHumans() }}
                    <section class="d-inline" id="category">
                        <a href="/categories/{{ $posts[2]->category->slug }}"
                            class="badge-link badge rounded-pill text-decoration-none text-bg-warning">
                            <i class="bi bi-columns-gap"></i> {{ $posts[2]->category->name }}
                        </a>
                    </section>
                </div>
                <p class="card-text mb-auto">{{ Str::limit($posts[2]->excerpt, 90, '...') }}</p>
                <a href="/post/{{ $posts[2]->slug }}" class="stretched-link link-light highlighted-link">Continue
                    reading</a>
            </div>
        </div>
    </div>
</div>
