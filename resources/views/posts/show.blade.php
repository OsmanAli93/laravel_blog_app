@extends('layouts.app')

@section('title', 'Blog - ' . $post->slug)

@section('content')
    <section class="single-post py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post-contents px-5">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <p>{{ $post->description }}</p>
                        <div class="info mb-3">
                            <div class="author">
                                <a href="{{ route('users.posts', $post->user) }}" class="text-uppercase fs-13">by {{ $post->user->profile->first_name . ' ' . $post->user->profile->last_name }}</a>
                            </div>
                            <div class="datetime text-uppercase fs-13 fw-bold">
                                Publised {{ $post->created_at->toFormattedDateString() }}
                            </div>
                        </div>
                        <article id="post-{{$post->id }}" class="mb-4">   
                            <figure>
                                <img src="{{ asset('upload/thumbnails/' . $post->thumbnail) }}" class="img-fluid" alt="">
                            </figure>
                            
                            {!! $post->message !!}
                        </article>
                        <div class="d-flex align-items-center">
                            @auth
                                @if ( !$post->likedBy(auth()->user()) )
                                    <form action="{{ route('posts.likes', $post) }}" method="POST" class="me-3">
                                        @csrf
                                        <button type="submit" title="Like" class="border-0 bg-transparent fs-38">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post) }}" method="POST" class="me-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Unlike" class="border-0 bg-transparent fs-38">
                                            <i class="bi bi-hand-thumbs-up-fill"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth

                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 