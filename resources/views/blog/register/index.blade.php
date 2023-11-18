@extends('blog.layouts.main')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-8 col-sm-10 col-12">
            <main class="form-register w-100 m-auto border border-dark border-3">
                <form class="p-5" action="/register" method="post">
                    @csrf
                    <div class="text-center">
                        <img class="mb-4" src="/img/Logo R.png" alt="" width="90" height="90">
                    </div>
                    <h1 class="h3 mt-3 mb-4 text-center">Register Form</h1>
                    <div class="form-floating mt-5">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" name="name" value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" id="username" name="username" value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" id="email" name="email" value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
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
                    <button class="btn text-white w-100 py-2 mt-4" type="submit" name="register" style="background-color: #DE1616;">Register</button>
                    <p class="mt-2">Already registered? <a href="/login" class="text-decoration-none fw-bold text-warning">Login</a></p>
                </form>
            </main>
        </div>
    </div>
@endsection