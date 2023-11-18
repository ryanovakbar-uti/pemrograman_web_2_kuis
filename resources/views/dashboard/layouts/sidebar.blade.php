<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Ryanov's Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-3 fs-5" href="/home">
                        <i class="bi bi-house-door-fill mb-3 text-danger"></i><span style="color: #DE1616;">Home</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-3 fs-5" href="/dashboard/posts" style="background-color: {{ Request::is('dashboard') || Request::is('dashboard/posts*') ? 'lightgray' : '' }}">
                        <i class="bi bi-file-earmark mb-3 text-danger"></i><span style="color: #DE1616;">My Dashboard</span>
                    </a>
                </li>
            </ul>
            @can('admin')
                <h5 class="d-flex align-items-center mt-4 text-muted px-5">ADMINISTRATOR</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-3 fs-5" href="/dashboard/categories" style="background-color: {{ Request::is('dashboard/categories*') ? 'lightgray' : '' }}">
                            <i class="bi bi-grid mb-3 text-danger"></i></i><span style="color: #DE1616;">All Categories</span>
                        </a>
                    </li>
                </ul>
            @endcan
        </div>
    </div>
</div>