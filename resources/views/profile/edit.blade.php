@extends('layouts.app')

@section('title', 'Blog - Profile Edit')

@section('js')
    <script src="{{ mix('js/image_preview.js') }}"></script>
    <script src="{{ mix('js/toast.js') }}"></script>
@endsection

@section('content')

    @if (session('status'))
        <div class="custom-toast show">
            {{ session('status') }}
        </div>
    @endif
    <section class="profile py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="edit-profile bg-white">
                        <h2 class="text-center">Edit Profile</h2>
                        <form action="{{ route('profile.edit') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group image-preview mb-4 text-center">
                                <span class="avatar-null">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                <img src="" alt="" class="preview">
                                <input type="file" id="upload" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="first_name" class="mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ $user->profile->first_name }}" class="form-control @error('first_name') border-danger @enderror">

                                @error('first_name')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="last_name" class="mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') border-danger @enderror" value="{{ $user->profile->last_name }}">

                                @error('last_name')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="country" class="mb-2">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="{{ $user->profile->country }}">{{ $user->profile->country }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="gender" class="mb-2">Gender</label>
                                <select name="gender" id="gender" class="form-control @error('gender') border-danger @enderror">
                                    @if ( $user->profile->gender === 'male' )
                                        <option value="{{ $user->profile->gender }}">{{ Str::title($user->profile->gender) }}</option>
                                        <option value="female">Female</option>
                                    @elseif ( $user->profile->gender === 'female' )
                                        <option value="{{ $user->profile->gender }}">{{Str::title($user->profile->gender) }}</option>
                                        <option value="male">Male</option>
                                    @endif
                                </select>

                                @error('gender')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="dob" class="mb-2">Date of Birth</label>
                                <input type="date" name="date" id="dob" value="{{ $user->profile->date_of_birth }}" class="form-control">
                            </div>
                            <div class="form-group d-grid">
                                <button type="submit" class="btn btn-primary text-white">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection