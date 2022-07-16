@extends('dashboard.layouts.main')

@push('head')
    <style>
        .button-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            background-color: #00aeff;
            color: rgb(0, 0, 0);
            text-align: center;
            border-radius: 50px;
            box-shadow: 2px 2px 3px #999;
            z-index: 2;
        }

        .button-float:hover {
            background-color: #00aeff;
            box-shadow: 2px 2px 3px #999;
        }

        .button-float:active {
            background-color: #00aeff;
            box-shadow: 2px 2px 3px #999;
        }

        .x-float {
            margin-top: 50%;
        }
    </style>
@endpush

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>

    </div>
    <section id="content">
        @include('dashboard.layouts.breadcrumb')

        <div>
            <a class="button-float btn btn-lg" href="/dashboard/categories/create"><i
                    class="fa-solid fa-plus fa-lg x-float"></i></a>
        </div>

        <div class="table-responsive col-lg-8">

            @if (session('msg'))
                <div class="alert alert-{{ session('msg')['status'] }} alert-dismissible fade show" role="alert">
                    {!! session('msg')['body'] !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($category->name, 120, '...') }}</td>
                                <td title="{{ $category->description }}">
                                    {{ Str::limit($category->description, 250, '...') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/dashboard/categories/{{ $category->slug }}/edit"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="/dashboard/categories/{{ $category->slug }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm btn-delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No Categories Found. <a href="/dashboard/categories/create">Create
                                    New Post</a></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('foot')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this item!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('form.d-inline').submit()
                    }
                });
        })
    </script>
@endpush
