@extends('blog.layouts.main')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-8 col-sm-10 col-12">
            @if (session()->has('success'))
                <div class="alert alert-primary alert-dismissible fade show fw-bold fs-5 text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show fw-bold fs-5 text-center" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <main class="form-login w-100 m-auto border border-dark border-3">
                <form class="p-5" action="/login" method="post">
                    @csrf
                    <div class="text-center">
                        <img class="mb-4" src="/img/Logo R.png" alt="" width="90" height="90">
                    </div>
                    <h1 class="h3 mt-3 mb-4 text-center">Login Form</h1>
                    <div class="form-floating mt-5">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" id="username" name="username">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn text-white w-100 py-2 mt-4" type="submit" name="login" style="background-color: #DE1616;">Login</button>
                    <p class="mt-2">Not registered? <a href="/register" class="text-decoration-none fw-bold text-warning">Register</a></p>
                </form>
            </main>
        </div>
    </div>
@endsection