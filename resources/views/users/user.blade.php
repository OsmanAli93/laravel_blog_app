@extends('layouts.app')

@section('title', 'Blog - ' . $user->profile->first_name . ' ' . $user->profile->last_name)

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    ...
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <section class="user section-gap">
        <div class="user pb-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="user-info text-center">
                            <div class="avatar mb-3">
                                <img src="{{ asset('upload/images/' . $user->profile->image) }}" width=100 height=100 class="rounded-circle border border-2 border-primary" alt="avatar">
                            </div>
                            <div class="text-capitalize">
                                {{ $user->profile->country }}
                                <span class="middledot">&#8226;</span>
                                {{ $user->profile->gender }}
                                <span class="middledot">&#8226;</span>
                                {{ date('d-M-Y', strtotime($user->profile->date_of_birth)) }}
                            </div>
                            <div class="info-details">
                                <h1 class="mb-2">{{ $user->profile->first_name . ' ' . $user->profile->last_name }}</h1>
                                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="contents">
            <div class="container">
                @if ($posts->count())
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-4">
                                <div class="content">
                                    <div class="content-img">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <img src="{{ asset('upload/thumbnails/' . $post->thumbnail) }}" width="100%" height="220" alt="">
                                        </a>
                                        
                                        <div class="cta">
                                            <div class="cta-delete">
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <div class="cta-edit btn btn-success px-4">
                                                <a href="{{ route('posts.edit', $post) }}" class="text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                            
                                        </div>
                                      
                                       
                                    <div class="content-details bg-white rounded">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <p class="date">
                                            {{ $post->created_at->format('d F Y') }}
                                            <span class="middledot">&#8226;</span>
                                            {{ $post->created_at->diffForHumans() }}
                                            <span class="middledot">&#8226;</span>
                                        
                                            <a href="{{ route('users.posts', $post->user) }}" class="text-dark">
                                                {{ $post->user->profile->first_name . ' ' . $post->user->profile->last_name; }}
                                            </a>
                                        </p>
                                        <div class="content-text">
                                            {{ $post->description }}
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">There are no posts</div>
                @endif
            </div>
        </main>

    </section>
@endsection