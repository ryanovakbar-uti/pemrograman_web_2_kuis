@extends('blog.layouts.main')

@section('content')
    <h1 class="text-center">All Posts in {{ $name }}</h1>
    @if ($posts->count())
        <div class="row">
            @foreach ($posts->skip(0) as $post)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                    <div class="card" style="height: 100%">
                        @if ($post->post_wallpaper)
                            <div style="position: relative; padding-bottom: 100%;">
                                <img src="/storage/{{ $post->post_wallpaper }}" alt="Post Image Wallpaper" style="position: absolute; width: 100%; height: 100%;">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/900x900/?{{ $post->header }}" class="card-img-top" alt="Post Unsplash Image Wallpaper">
                        @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/post/{{ $post->user->username }}/{{ $post->slug }}" class="text-decoration-none">
                                    <h2 class="text-center mt-5 fs-2">{{ $post->header }}</h2>
                                </a>
                                <br>
                                <h5 class="fs-4 text-center mb-5">
                                    By: <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a><br>
                                    in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                                </h5>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h4 class="text-center my-5">No posts yet.</h4>
    @endif
    <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
    </div>
@endsection