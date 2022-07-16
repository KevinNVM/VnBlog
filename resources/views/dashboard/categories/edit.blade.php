@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Category</h1>
    </div>
    <section id="content">
        <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $category->name) }}" autocapitalize="on" autocomplete="off" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
                    value="{{ old('slug', $category->slug) }}" readonly>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="name" name="description">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-grid">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </section>
@endsection

@push('foot')
    <script>
        const title = $('#name'),
            slug = $('#slug'),
            button = $('button.btn-getslug');

        title.on('change', function() {
            console.log(title.val());
            if (title.val().length > 0) {
                $.ajax({
                    type: "GET",
                    url: "/utilities/getslug?title=" + title.val(),
                    success: function(response) {
                        slug.val(response.slug)
                    }
                });
            } else {
                slug.val('');
            }
        });
    </script>
@endpush
