@extends('layouts.app')

@section('title', 'Blog - Login')

@section('content')
    <section id="Login" class="auth py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="form-wrapper bg-white rounded p-5">
                        <h2 class="text-uppercase fw-bold mb-4 text-center">Login</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @if (session('status'))
                                <div class="text-danger mb-3 text-center">
                                    {{ session('status') }}
                                </div>
                    
                            @endif
                            <div class="form-group mb-3">
                                <input type="email" id="email" name="email" class="form-control @error('email') border-danger @enderror" placeholder="Your Email" value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger m-0 pt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="password" name="password" class="form-control @error('password') border-danger @enderror" placeholder="Choose a password">


                                @error('password')
                                    <p class="text-danger m-0 pt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-4">
                                <div>
                                    <input type="checkbox" name="remember" id="remember" class="me-2">
                                    <label for="remember" class="remember">Remember Me</label>
                                </div>
                                <span>
                                    <a href="{{ route('password.forgot') }}">Forgot Password?</a>
                                </span>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection