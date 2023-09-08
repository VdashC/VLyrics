<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#0D47A1;">
    <div class="container-fluid m-0">
        <button class="navbar-toggler p-1 border-3 me-1" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <img src="/img/VlyricsLogo.png" alt="" width="30px">
        </button>
        <a class="navbar-brand d-none d-lg-inline" href="#"><img src="/img/VlyricsLogo.png" alt="" width="35px">
            VLyrics</a>
        <form class="d-flex d-sm-none col-10" role="search" action="/search">
            @if(request('artist'))
            <input type="hidden" name="artist" value="{{request('artist')}}">
            @endif

            @if(request('user'))
            <input type="hidden" name="user" value="{{request('user')}}">
            @endif
            <input class="form-control" type="search" placeholder="Cari Judul Lagu atau VN" name="search"
                value='{{request("search")}}'>
            <button class="btn bg-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="white" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </form>
        @auth
        <div class="p-3 bg-warning d-none d-lg-inline rounded-pill" style="max-width:150px;"><img style="height:40px;"
                class="rounded-pill" src="/img/{{auth()->user()->image}}" alt="">{{auth()->user()->username}}</div>
        @else
        <a href="/login" class="text-decoration-none d-none d-lg-inline text-white btn btn-info"
            style="text-shadow: 1px 1px 5px black;">Masuk / Daftar</a>
        @endauth



        <div class="offcanvas offcanvas-start text-bg-dark m-0" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header border-bottom" style="background-color:#0D47A1;">
                <h5 class="offcanvas-title border-bottom border-dark-subtle p-0" id="offcanvasDarkNavbarLabel"><img
                        src="/img/VlyricsLogo.png" alt="" width="45px"> VLyrics</h5>
                @auth
                <div class="p-3 bg-warning rounded-pill text-dark" style="max-width:150px;">
                    <img class="rounded-pill overflow-hidden" style="height:40px;" src="/img/{{auth()->user()->image}}"
                        alt=""><span class="fw-bold ms-2" style="overflow:hidden;">{{auth()->user()->username}}</span>
                </div>
                @else
                <a href="/login" class="text-decoration-none text-white btn btn-info"
                    style="text-shadow: 1px 1px 5px black;">Masuk / Daftar</a>
                @endauth
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="background-color:#0D47A1;">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('/') ? 'active':''}}" aria-current="page" href="/">Beranda</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('artists') ? 'active':''}}" href="/artists">Vokal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('novels') ? 'active':''}}" href="/novels">Novel Visual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('tentang') ? 'active':''}}" href="/tentang">Tentang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Lain-lain
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item disabled" href="#">VGame</a></li>
                            <li><a class="dropdown-item disabled" href="#">VBlog</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-lg-0 mt-3 col-lg-4 mb-0" role="search" id="cari" action="/search">
                    @if(request('artist'))
                    <input type="hidden" name="artist" value="{{request('artist')}}">
                    @endif

                    @if(request('user'))
                    <input type="hidden" name="user" value="{{request('user')}}">
                    @endif
                    <input class="form-control me-2" type="search" placeholder="Cari Judul Lagu atau VN" name="search">
                    <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </form>

            </div>

        </div>
    </div>
</nav>