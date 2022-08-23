@extends('layouts.app')

@section('title', 'Blog - Forgot Password')

@section('content')
    <section id="Login" class="auth py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="form-wrapper bg-white rounded p-5">
                        <h2 class="text-uppercase fw-bold mb-4 text-center">Forgot Password</h2>
                        <form action="{{ route('password.forgot') }}" method="POST">
                            @csrf

                            @if (session('status'))
                                <div class="text-success mb-3 text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <div class="form-group mb-3">
                                <input type="email" id="email" name="email" class="form-control @error('email') border-danger @enderror" placeholder="Your Email" value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger m-0 pt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection