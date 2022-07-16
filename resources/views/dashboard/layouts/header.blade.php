<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Dashboard <i
            class="bi bi-chevron-compact-right"></i> VnBlog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="" class="d-inline-flex w-100">
        <input class="form-control form-control-dark w-100 rounded-0 border-0 search w-100" type="text"
            name="search" placeholder="Search [ ALT + K ]" aria-label="Search">
    </form>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="POST" class="logout">
                <div class="d-grid">
                    @csrf
                    <button type="submit" class="nav-link px-3 border-0 bg-transparent btn-logout"><i
                            class="bi bi-box-arrow-left"></i>
                        Logout</a></button>
                </div>
            </form>
        </div>
    </div>
</header>
