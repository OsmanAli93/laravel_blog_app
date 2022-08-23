@extends('layouts.app')

@section('title', 'Blog - Reset Password')

@section('content')
    <section id="Reset" class="auth py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="form-wrapper bg-white rounded p-5">
                        <h2 class="text-uppercase fw-bold mb-4 text-center">Reset Password</h2>
                        <form action="{{ route('password.reset', $token) }}" method="POST">
                            @csrf

                            @if (session('status'))
                                <div class="text-danger mb-3 text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                              
                            <input type="hidden" name="email" value="{{ $email }}">
                            
                            <div class="form-group mb-3">
                                <input type="password" id="password" name="password" class="form-control @error('password') border-danger @enderror" placeholder="New Password">

                                @error('password')
                                    <p class="text-danger m-0 pt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" placeholder="Confirm new password">

                                @error('password_confirmation')
                                    <p class="text-danger m-0 pt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection