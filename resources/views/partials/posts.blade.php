<main class="contents">
    <div class="container">
        @if ($posts->count())
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="content">
                            <div class="content-img">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <img src="{{ asset('upload/thumbnails/' . $post->thumbnail) }}" width="100%" height="220" alt="">
                                </a>
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
                @endforeach
                <div class="pagination-wrapper py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 d-flex justify-content-center">
                            
                            {{ $posts->links() }}
                        
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>No Posts</p>
        @endif
    </div>
</main>