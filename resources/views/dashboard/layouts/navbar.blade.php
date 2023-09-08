<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

    <button class="navbar-toggler  d-md-none d-block collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand col-md-3 col-lg-2 d-block px-3" href="#">VLyrics</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method='post'>
                @csrf
                <button type='submit' class='dropdown-item text-white'>Log Out</button>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item {{Request::is('dashboard') ? 'aktif':''}}">
                        <a class="nav-link " aria-current="page" href="/dashboard">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('dashboard/bantuan*') ? 'aktif':''}}">
                        <a class="nav-link" href="/dashboard/bantuan">
                            Ketentuan Unggahan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            Beranda
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Langkah Admin</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item {{Request::is('dashboard/approval*') ? 'aktif':''}}">
                        <a class="nav-link " href="/dashboard/approval">
                            Persetujuan
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('dashboard/artist*') ? 'aktif':''}}">
                        <a class="nav-link " href="/dashboard/artist">
                            Tambah Vokalis
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('dashboard/novel*') ? 'aktif':''}}">
                        <a class="nav-link" href="/dashboard/novel">
                            Tambah Novel Visual
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>