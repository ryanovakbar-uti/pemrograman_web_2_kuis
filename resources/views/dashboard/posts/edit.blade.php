@extends('dashboard.layouts.main')

@section('content')
    @if ($post->user->id != auth()->user()->id)
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="fs-2">This post not found.</h1>
        </div>
    @else
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="fs-2">Edit Post</h1>
        </div>

        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="header" class="form-label">Header</label>
                    <input type="text" class="form-control @error('header') is-invalid @enderror" id="header" name="header" value="{{ old('header', $post->header) }}">
                    @error('header')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id', $post->category->id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Post Image Wallpaper</label>
                    <input type="hidden" name="oldImage" value="{{ $post->post_wallpaper }}">
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
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body-trix" class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body" id="body-trix" class="@error('body') border-danger @enderror"></trix-editor>
                    @error('body')
                        <div class="text-danger mt-1" style="font-size: 14px">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-5">Update Post</button>
            </form>
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