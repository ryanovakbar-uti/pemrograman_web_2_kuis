@extends('blog.layouts.main')

@section('content')
    <h1 class="text-center">{{ $header }}</h1>
    <div>
        <h2 class="my-5">{{ $post->header }}</h2>
        <div class="mb-5">
            @if ($post->post_wallpaper)
                <img src="/storage/{{ $post->post_wallpaper }}" style="width: 300px; height: 300px;" alt="Post Image Wallpaper">
            @else
                <img src="https://source.unsplash.com/300x300/?{{ $post->header }}" alt="Post Unsplash Image Wallpaper">
            @endif
        </div>
        <h5 class="mt-5 mb-5">
            By: <a href="/user/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>
            in <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
        </h5>
        {!! $post->body !!}
        <div>
            <button onclick="history.back()" class="btn btn-primary mt-5">Back</button>
        </div>
    </div>
@endsection