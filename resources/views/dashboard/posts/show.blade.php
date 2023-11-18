@extends('dashboard.layouts.main')

@section('content')
    @if ($post->user->id != auth()->user()->id)
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="fs-2">This post not found.</h1>
        </div>
    @else
        <h1 class="text-center mt-5">{{ $header }}</h1>
        <div>
            <h2 class="my-5">{{ $post->header }}</h2>
            <div class="mb-5">
                @if ($post->post_wallpaper)
                    <div style="width: 300px; height: 300px;" class="my-4">
                        <div style="position: relative; padding-bottom: 100%;">
                            <img src="/storage/{{ $post->post_wallpaper }}" alt="" class="img-preview img-fluid d-block" style="width: 100%; height: 100%; position: absolute">
                        </div>
                    </div>
                @else
                    <div style="width: 300px; height: 300px;" class="my-4">
                        <div style="position: relative; padding-bottom: 100%;">
                            <img src="/storage/post_wallpaper/Default_Post_Wallpaper.png" alt="" class="img-preview img-fluid" style="width: 100%; height: 100%; position: absolute">
                        </div>
                    </div>
                @endif
            </div>
            {!! $post->body !!}
            <div class="navbar my-5">
                <button onclick="history.back()" class="btn btn-primary me-auto">Back</button>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-white me-4">Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0 text-decoration-none" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    @endif

    <script>
        const header = document.querySelector("#header");
        const slug = document.querySelector("#slug");

        header.addEventListener("keyup", function() {
            let preslug = header.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
            const image = document.querySelector("#image");
            const imagePreview = document.querySelector(".img-preview");
            imagePreview.style.display = "block";
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection