<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('rumah-sakit*') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('rumah-sakit.index') }}">
                    <i class="fas fa-file-alt"></i> Data Rumah Sakit
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pasien*') ? 'active' : '' }}" href="{{ route('pasien.index') }}">
                    <i class="fas fa-file-alt"></i> Data Pasien
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-light"><i class="fas fa-sign-out-alt"></i>
                        Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
