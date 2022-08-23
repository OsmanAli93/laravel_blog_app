@extends('layouts.app')

@section('title', 'Blog - Home')

@section('js')
    <script src="{{ mix('js/toast.js') }}"></script>
@endsection

@section('content')
    @if (session('status'))
        <div class="custom-toast show">
            {{ session('status') }}
        </div>
    @endif
    
    <section class="home section-gap">
        @include('partials.posts')
    </section>
    
@endsection