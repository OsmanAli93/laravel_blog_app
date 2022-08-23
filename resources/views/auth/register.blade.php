@extends('layouts.app')

@section('title', 'Blog - Register')

@section('content')
    <section id="Register" class="auth py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="form-wrapper bg-white rounded p-5">
                        <h2 class="text-uppercase fw-bold mb-4 text-center">Register</h2>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
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
                            <div class="form-group mb-3">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection