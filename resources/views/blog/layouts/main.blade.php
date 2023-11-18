<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Web Blog Kampus' }} | {{ $title }}</title>

    {{-- R Logo --}}
    <link rel="icon" type="image/x-icon" href="/logo/logo_R.ico">

    {{-- Bootstrap Template --}}
    <link rel="stylesheet" href="/Bootstrap v5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Bootstrap Icons v1.10.5/font/bootstrap-icons.min.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">

    <style>
        .my-container {
            height: 80px;
        }
    </style>
</head>

<body>
    @include('blog/partials/navbar')

    @if (Route::currentRouteName() == '' || Route::currentRouteName() == 'home')
        <div class="container-fluid bg-light p-5" style="min-height: 100vh">
            @yield('content')
        </div>
    @else
        <div class="container-fluid bg-light p-5">
            <div class="my-container"></div>
                @yield('content')
            <div class="my-container"></div>
        </div>
    @endif

    @include('blog/partials/footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
    <script src="/js/JQuery v3.7.0 min.js"></script>
    
    <script src="/Bootstrap v5.3/js/bootstrap.min.js"></script>

    <script src="/js/about.js"></script>
</body>

</html>