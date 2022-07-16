@extends('dashboard.layouts.main')

@push('head')
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
@endpush

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Post</h1>
    </div>

    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-8">
            <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" mb-3">
                    <label class="fs-5" for="title"><i class="bi bi-fonts fs-4 m-0 p-0"></i> Post Title<small
                            aria-label="Required Field" class="text-danger">*</small></label>
                    <textarea rows="1" class="form-control @error('title') is-invalid @enderror" id="title"
                        placeholder="Some Interesting Title..." name="title" autocomplete="off" autofocus>{{ old('title') }}</textarea>
                    <div class="invalid-feedback">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <label class="fs-5" for="slug">Slug<small aria-label="Required Field"
                        class="text-danger">*</small></label>
                <div class="input-group mb-3">
                    <input type="text"
                        class="form-control form-control-plaintext @error('slug') is-invalid @enderror px-3" id="slug"
                        placeholder="Auto Slug Is In Action!" name="slug" readonly>
                    <button class="btn btn-secondary btn-getslug border-0" type="button" id="button-addon2">
                        <i class="fa-solid fa-arrow-rotate-right fa-lg"></i>
                    </button>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label class="fs-5" for="category">Category<small aria-label="Required Field"
                            class="text-danger">*</small></label>
                    <select id="category" name="category_id" class="form-select" aria-label="Default select example">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="fs-5">Thumbnail</label>
                    <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                </div>

                <div class=" mb-3">
                    <label class="fs-5" for="body">Body<small aria-label="Required Field"
                            class="text-danger">*</small></label>
                    <img id="previewImg" alt="Post Thumbnail" width="200" class="d-block mb-2">
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-success upload">
                        <i class="fa-solid fa-cloud-arrow-up"></i> Upload
                    </button>
                    <button type="button" id="preview" class="btn btn-primary">Preview</button>
                </div>
                <div class="mb-3">
                    <details>
                        <summary class="user-select-none"><code class="font-monospace fs-6">Preview</code></summary>
                        <p>
                        <section class="preview rounded p-2"
                            style="background-color: rgba(0, 0, 0, 0.01); outline: solid 1px rgba(0, 0, 0, 1);">
                        </section>
                        </p>
                    </details>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('foot')
    <script src="/js/getslug.js"></script>
    <script>
        $('.upload').click(function(e) {
            e.preventDefault();
            swal({
                    title: "Confirmation",
                    text: "Make Sure Everything Is Correct, Then Click The Button Down Below To Upload Your Post!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('form').submit();
                    }
                });

            $(window).unbind('beforeunload');
        });

        const body = $('#body');
        const preview = $('.preview');

        $(window).on('keyup', function(e) {
            if (body.val().length > 1) {
                $(window).bind('beforeunload', function() {
                    return "Do you want to exit this page?";
                });
            } else {
                $(window).unbind('beforeunload');
            }
        });

        var d = new Date();
        var strDate = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate();

        $('#preview').click(function() {
            preview.html(`
            <small><a href="/posts/${$('input#slug').val()}">/posts/${$('input#slug').val()}</a>
            <h2 class="blog-post-title">${$('textarea#title').val()}</h2>
            <p class="blog-post-meta">${strDate}</p>\n
            <div class="pb-2">
                    <section class="d-inline" id="author">
                        <a href="/"
                            class="badge-link badge rounded-pill text-decoration-none border border-dark link-dark">
                            <i class="bi bi-person-circle"></i> User
                        </a>
                    </section>
                    <i class="bi bi-chevron-right"></i>
                    <section class="d-inline" id="category">
                        <a href="/"
                            class="badge-link badge rounded-pill text-decoration-none border border-dark"
                            style="color: var(--link-1);">
                            <i class="bi bi-columns-gap"></i> ${$('select').children(':selected').attr('selected',
                    true).text()}
                        </a>
                    </section>
                </div>\n
            <img src="${$('#previewImg').attr('src')}" alt="Post Thumbnail"
            style="width: 95%; height: auto;" class="img-thumbnail mb-2">\n` +
                body.val());
        });

        $('#thumbnail').on('change', function(input) {
            var file = $("input#thumbnail").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
