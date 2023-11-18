@extends('blog.layouts.main')

@section('content')
    <h1 class="text-center">{{ $header }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group mt-4">
                    <input type="text" class="form-control" placeholder="Search ..." name="search" value="{{ request('search') }}">
                    <button class="btn text-white" type="submit" style="background-color: #DE1616;">Submit</button>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
        <div class="row mb-5">
            @foreach ($posts->skip(0) as $post)
                <div class="mt-5 px-5 col-xxl-3 col-xl-3 col-lg-4 col-md-8 col-sm-10 col-12">
                    <div class="card h-100">
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
                            <li class="list-group-item mt-4 mb-1">
                                <p style="text-align: justify">{!! $post->excerpt !!}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h4 class="text-center my-5">No posts yet.</h4>
    @endif
@endsection