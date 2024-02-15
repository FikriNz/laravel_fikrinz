<header class="navbar navbar-dark navbar-expand-lg sticky-top bg-primary p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><i class="fas fa-hospital"></i> Rumah
        Sakit</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
        <div class="nav-item dropdown">
            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                            Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
