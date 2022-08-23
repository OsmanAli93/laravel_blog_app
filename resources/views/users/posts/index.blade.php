@extends('layouts.app')

@section('title', 'Blog - ' . $user->profile->first_name . ' ' . $user->profile->last_name)

@section('content')
    <section class="users-posts section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-5 pb-5">
                <div class="col-lg-8">
                    <div class="user-info text-center">
                        <div class="avatar mb-3">
                            <img src="{{ asset('upload/images/' . $user->profile->image) }}" width=100 height=100 class="rounded-circle border border-2 border-primary" alt="avatar">
                            
                        </div>
                        <div class="info-details">
                            <h1 class="mb-2">{{ $user->profile->first_name . ' ' . $user->profile->last_name }}</h1>
                            <p class="mb-0">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
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
                                        
                                        @can('delete', $post)
                                            <div class="cta">
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-4">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan
                                       
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
                    <p>There are no posts</p>
                @endif
            </div>
        </main>

    </section>
    
@endsection