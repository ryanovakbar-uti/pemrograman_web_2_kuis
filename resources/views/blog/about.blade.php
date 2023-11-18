@extends('blog.layouts.main')

@section('content')
    <h1 class="text-center">About</h1>

    <div class="col-10 m-auto">
        <div class="mt-5">
            @if (session()->has('success'))
                <div class="alert alert-primary alert-dismissible fade show fw-bold fs-5 text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show fw-bold fs-5 text-center" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <table class="table fs-5 mt-5">
                <tbody>
                    <tr>
                        <td colspan="2" class="td-img p-5 col-xxl-3 col-xl-3 col-lg-4 col-md-8 col-sm-10 col-12 bg-light shadow">
                            <form action="/about/{{ $user[0]->username ?? "" }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input type="hidden" name="oldImage" value="{{ $user[0]->profile_wallpaper ?? "" }}">
                                @if ($user[0]->profile_wallpaper ?? "")
                                    <div class="my-4">
                                        <div style="position: relative; padding-bottom: 100%;">
                                            <img src="/storage/{{ $user[0]->profile_wallpaper ?? "" }}" alt="" class="img-preview img-fluid d-block" style="width: 100%; height: 100%; position: absolute;">
                                        </div>
                                    </div>
                                @else
                                    <div style="width: 300px; height: 300px;" class="my-4">
                                        <div style="position: relative; padding-bottom: 100%;">
                                            <img src="/storage/profile_wallpaper/Default_Profile_Wallpaper.png" alt="" class="img-preview img-fluid" style="width: 100%; height: 100%; position: absolute;">
                                        </div>
                                    </div>
                                @endif
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="text-center border-0">
                                    <button class="btn mt-5" type="submit" style="background-color: #DE1616; color: white;">Save</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>{{ 'Name: ' }}</h3>
                        </td>
                        <td class="col-5">{{ $user[0]->name ?? "Empty" }}</td>
                    </tr>
                    <tr>
                        <td>
                            <h3>{{ 'Username: ' }}</h3>
                        </td>
                        <td class="col-5">{{ $user[0]->username ?? "Empty" }}</td>
                    </tr>
                    <tr>
                        <td>
                            <h3>{{ 'Email: ' }}</h3>
                        </td>
                        <td class="col-5">{{ $user[0]->email ?? "Empty" }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
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