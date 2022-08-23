@extends('layouts.app')

@section('title', 'Blog - Post Edit')

@section('content')
    <section id="post" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="post-wrapper bg-white rounded p-5">
                        <h2 class="mb-4">Edit Article</h2>
                        <form action="{{ route('posts.edit', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="thumbnail" class="mb-2">Thumbnail</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') border-danger @enderror">

                                @error('thumbnail')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="title" class="mb-2">Title</label>
                                <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control @error('title') border-danger @enderror">

                                @error('title')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="desc" class="mb-2">Description</label>
                                <input type="text" name="description" id="desc" value="{{ $post->description }}" class="form-control @error('description') border-danger @enderror">

                                @error('description')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="message" class="mb-2">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                                <input type="hidden" id="text" value="{{ $post->message }}">

                                @error('message')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary text-white">Send</button>
                            </div>
                            
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

                            <script>
                                const text = document.querySelector('#text');

                                CKEDITOR.replace( 'message', {
                                    height: 280
                                } );

                                CKEDITOR.instances.message.setData(text.value);
                        </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection