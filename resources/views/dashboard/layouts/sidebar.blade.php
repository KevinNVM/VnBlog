<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">
                    <i class="fa-solid fa-house"></i>
                    Home | Blog
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard">
                    <i class="fa-solid fa-house-laptop"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('profile*') ? 'active' : '' }}" href="/profile">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <i class="fa-solid fa-file"></i>
                    Posts
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Admin</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/dashboard/categories"
                        class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars-staggered"></i> Post Categories
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
