<nav class="navbar navbar-expand-md bg-light fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="/">VnBlog</a>
        <div class="dropdown dropstart">
            <button class="navbar-toggler" type="button" id="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'fw-semibold' : '' }}" href="/home"><i
                            class="bi bi-house"></i> Home</a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link {{ request()->is('blog*') ? 'fw-semibold' : '' }}" href="/blog"><i
                            class="bi bi-columns-gap"></i> blog</a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link {{ request()->is('about') ? 'fw-semibold' : '' }}" href="/about"><i
                            class="bi bi-patch-question"></i> About</a>
                </li>
                <li class="dropdown-divider"></li>
                @auth
                    <li class="dropdown-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-person-circle"></i> {{ \App\Models\User::firstName(auth()->user()->name) }}
                        </a>


                    </li>
                @else
                    <li class="dropdown-item">
                        <a class="nav-link" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <small class="link-secondary h6">Login</small>
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" href="/register">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <small class="link-secondary h6">Register</small>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'fw-semibold' : '' }}"
                        href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle nav-link {{ request()->is('blog*') ? 'fw-semibold' : '' }}"
                            href="/blog" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item  {{ request()->is('blog*') ? 'fw-semibold' : '' }}"
                                    href="/blog">Home Page</a></li>
                            <li><a class="dropdown-item  {{ request()->is('categories*') ? 'fw-semibold' : '' }}"
                                    href="/categories">Category List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'fw-semibold' : '' }}" href="/about">About</a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ \App\Models\User::firstName(auth()->user()->name) }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-circle"></i> Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST" class="logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-logout"><i
                                            class="bi bi-box-arrow-left"></i>
                                        Logout</a></button>
                                </form>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link"><i class="bi bi-box-arrow-in-left"></i> Register</a>
                    </li>
                </ul>
            @endauth

        </div>
    </div>
</nav>

@auth
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ auth()->user()->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="d-grid">
                                <a class="border border-dark btn btn-warning" href="/profile"><i
                                        class="bi bi-person-circle"></i>
                                    Profile</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <a href="/dashboard" class="border border-dark btn btn-primary"><i
                                        class="bi bi-layout-text-sidebar-reverse"></i>
                                    Dashboard</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <a class="border border-dark btn btn-primary" href="/categories"><i
                                        class="bi bi-layout-text-sidebar"></i> Category Lists</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <form action="/logout" method="POST" class="logout">
                                <div class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-danger border border-dark btn-logout"><i
                                            class="bi bi-box-arrow-left"></i>
                                        Logout</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endauth
