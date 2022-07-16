@extends('layouts.main')

@section('main')
    <div class="container" style="margin-top: 25vh;">
        <form action="/login" method="POST">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <h2 class="h3 mb-3">Login To Your Account</h2>
                    @if (session()->has('msg'))
                        <div class="alert alert-{{ session('msg')['status'] }}" role="alert">
                            {{ session('msg')['body'] }}
                        </div>
                    @endif

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ old('email') }}" placeholder="name@mail.com" name="email" autofocus
                            autocomplete="true" required aria-required="true">
                        <label for="email"><i class="bi bi-envelope"></i> Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating positon-relative">
                        <input type="password" class="form-control" id="password" placeholder="Your Password"
                            name="password" required aria-required="true">
                        <label for="password"><i class="bi bi-key"></i> Password</label>
                    </div>

                    <div class="show-pass d-flex justify-content-between mb-3">
                        <div class="remember user-select-none">
                            <input type="checkbox" name="remember" id="check">
                            <label for="check">Remember Me</label>
                        </div>
                        <div class="eye">
                            <label for="eye" class="fs-5"><i class="bi bi-eye-fill"></i></label>
                            <input type="checkbox" id="eye" hidden>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('foot')
    <script>
        $('input#eye').on('click', () => {
            if ($('input#eye').is(':checked')) {
                $('label[for=eye]').html('<i class="bi bi-eye-fill"></i>');
                $('input#password').attr('type', 'password');
            } else {
                $('label[for=eye]').html('<i class="bi bi-eye-slash"></i>');
                $('input#password').attr('type', 'text');
            }
        });
    </script>
@endpush
