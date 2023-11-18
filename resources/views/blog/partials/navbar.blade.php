<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #DE1616">
    <div class="container-fluid">
        <a class="navbar-brand fs-3 mx-5" href="/">{{ auth()->user()->name ?? 'Web Blog Kampus' }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fs-5 ms-5">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ $navbar === 'home' ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link {{ $navbar === 'about' ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="/posts" class="nav-link {{ $navbar === 'posts' ? 'active' : '' }}">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link {{ $navbar === 'categories' ? 'active' : '' }}">Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav fs-5 ms-auto me-5">
                @auth
                    <li class="nav-item dropdown me-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-layout-text-window"></i> My Dashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $navbar === 'login' ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>