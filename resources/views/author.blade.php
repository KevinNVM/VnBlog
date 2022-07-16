@extends('layouts.main')

@push('head')
    <style>
        .grid {
            place-items: center;
            min-height: 100vh;
        }
    </style>
@endpush

@section('main')
    <div class="d-grid grid">
        <div class="card mb-3 shadow" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 d-md-flex justify-content-center align-items-center rounded-start"
                    style="background: rgb(221,41,198); background: linear-gradient(145deg, rgba(221,41,198,1) 0%, rgba(112,169,223,1) 89%); ">
                    <img src="https://source.unsplash.com/125x125?person" class="img-fluid rounded-circle shadow-lg mx-2 my-2"
                        alt="Profile Picture" width="125" height="125">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fa-solid fa-blog"></i> {{ $user->name }}
                        </h5>
                        <p class="m-0 p-0">User ID</p>
                        <span class="input-group">
                            <input value="{{ $user->UUID }}" type="text" class="form-control form-control-sm"
                                id="uid" readonly>
                            <button id="click" class="btn btn-light border border-secondary"><i class="bi bi-clipboard2"
                                    data-bs-toggle="tooltip" title="Copy To Clipboard" onclick="copy()"></i></button>
                        </span>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae dolorem
                            voluptas dolore quas.</p>
                        <a class="btn btn-outline-dark" href="/posts?author={{ $user->UUID }}"><i
                                class="fa-solid fa-blog"></i> User Posts</a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <p class="card-text"><small class="text-muted">Joined
                                {{ $user->created_at->diffForHumans() }}</small></p>
                        <p class="m-0 p-0">
                            <a href="#" class="btn btn-outline-danger border-0" data-bs-toggle="tooltip"
                                title="Report User">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('foot')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        function copy() {
            var copyText = document.getElementById("uid");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            $('#click').html('<i class="bi bi-clipboard2-check"></i>')
        }
    </script>
@endpush
