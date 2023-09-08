@extends('layouts.main')

@section('container')

<h1 class="text-center mt-4 fs-1 fw-bolder">Cari Judul</h1>
<div class="mb-1">
    <form class="d-flex d-sm-none" role="search" action="/search">
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
</div>


<div class="text-center display-3 ">
    <a href="/huruf?huruf=a" class="fw-bold">A</a>
    <a href="/huruf?huruf=b" class="fw-bold">B</a>
    <a href="/huruf?huruf=c" class="fw-bold">C</a>
    <a href="/huruf?huruf=d" class="fw-bold">D</a>
    <a href="/huruf?huruf=e" class="fw-bold">E</a>
    <a href="/huruf?huruf=f" class="fw-bold">F</a>
    <a href="/huruf?huruf=g" class="fw-bold">G</a>
    <a href="/huruf?huruf=h" class="fw-bold">H</a>
    <a href="/huruf?huruf=i" class="fw-bold">I</a>
    <a href="/huruf?huruf=j" class="fw-bold">J</a>
    <a href="/huruf?huruf=k" class="fw-bold">K</a>
    <a href="/huruf?huruf=l" class="fw-bold">L</a>
    <a href="/huruf?huruf=m" class="fw-bold">M</a>
    <a href="/huruf?huruf=n" class="fw-bold">N</a>
    <a href="/huruf?huruf=o" class="fw-bold">O</a>
    <a href="/huruf?huruf=p" class="fw-bold">P</a>
    <a href="/huruf?huruf=q" class="fw-bold">Q</a>
    <a href="/huruf?huruf=r" class="fw-bold">R</a>
    <a href="/huruf?huruf=s" class="fw-bold">S</a>
    <a href="/huruf?huruf=t" class="fw-bold">T</a>
    <a href="/huruf?huruf=u" class="fw-bold">U</a>
    <a href="/huruf?huruf=v" class="fw-bold">V</a>
    <a href="/huruf?huruf=w" class="fw-bold">W</a>
    <a href="/huruf?huruf=x" class="fw-bold">X</a>
    <a href="/huruf?huruf=y" class="fw-bold">Y</a>
    <a href="/huruf?huruf=z" class="fw-bold">Z</a>
    <a href="" class="fw-bold">#</a>
</div>
<hr>

<div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">

            <div class="position-absolute bg-dark px-1 py-2 text-center"
                style="background-color: rgba(0,0,0,0.5); width:100%;"><a href=""
                    class='text-white  display-5 '>Unggahan Terbaru</a></div>
            <div>
                <img src="/myfiles/{{$posts[0]->novel->image}}" alt="" class="text-center mx-auto karosel">
                <div class="carousel-caption overlays">
                    <h2 class="text-center mb-0 d-flex justify-content-center align-items-center"><a
                            class="fs-1 text-white" href="/{{$posts[0]->slug}}">{{$posts[0]->title}}</a></h2>
                    <h3 class='text-center mt-0 mb-0'><a href="/artists?artist={{$posts[0]->artist->name}}"
                            class="text-warning">{{$posts[0]->artist->name}}</a>
                    </h3>
                    <span class="fs-5 text-center text-white"><a href="/novels/{{$posts[0]->novel->novel_slug}}"
                            class="text-white">{{$posts[0]->novel->title}}</a></span>

                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="position-absolute bg-dark px-1 py-2 text-center"
                style="background-color: rgba(0,0,0,0.5); width:100%;"><a href=""
                    class='text-white  display-5 '>Unggahan Terbaru</a></div>
            <div>
                <img src="/myfiles/{{$posts[1]->novel->image}}" alt="" class="text-center mx-auto karosel"
                    >
                <div class="carousel-caption overlays">
                    <h2 class="text-center mb-0"><a class="fs-1 text-white "
                            href="/{{$posts[1]->slug}}">{{$posts[1]->title}}</a></h2>
                    <h3 class='text-center mt-0 mb-0'><a href="/artists?artist={{$posts[1]->artist->name}}"
                            class="text-warning">{{$posts[1]->artist->name}}</a>
                    </h3>
                    <span class="fs-5 text-center text-white"><a href="/novels/{{$posts[1]->novel->novel_slug}}"
                            class="text-white">{{$posts[1]->novel->title}}</a></span>
                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="position-absolute bg-dark px-1 py-2 text-center"
                style="background-color: rgba(0,0,0,0.5); width:100%;"><a href=""
                    class='text-white  display-5 '>Unggahan Terbaru</a></div>
            <div>
                <img src="/myfiles/{{$posts[2]->novel->image}}" alt="" class="text-center mx-auto karosel"
                    >
                <div class="carousel-caption overlays">
                    <h2 class="text-center mb-0"><a class="fs-1 text-white"
                            href="/{{$posts[2]->slug}}">{{$posts[2]->title}}</a></h2>
                    <h3 class='text-center mt-0 mb-0'><a href="/artists?artist={{$posts[2]->artist->name}}"
                            class="text-warning">{{$posts[2]->artist->name}}</a>
                    </h3>
                    <span class="fs-5 text-center text-white"><a href="/novels/{{$posts[2]->novel->novel_slug}}"
                            class="text-white">{{$posts[2]->novel->title}}</a></span>

                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="position-absolute bg-dark px-1 py-2 text-center"
                style="background-color: rgba(0,0,0,0.5); width:100%;"><a href=""
                    class='text-white  display-5 '>Unggahan Terbaru</a></div>
            <div>
                <img src="/myfiles/{{$posts[3]->novel->image}}" alt="" class="text-center mx-auto karosel"
                    >
                <div class="carousel-caption overlays">
                    <h2 class="text-center mb-0"><a class="fs-1 text-white"
                            href="/{{$posts[3]->slug}}">{{$posts[3]->title}}</a></h2>
                    <h3 class='text-center mt-0 mb-0'><a href="/artists?artist={{$posts[3]->artist->name}}"
                            class="text-warning">{{$posts[3]->artist->name}}</a>
                    </h3>
                    <span class="fs-5 text-center text-white"><a href="/novels/{{$posts[3]->novel->novel_slug}}"
                            class="text-white">{{$posts[3]->novel->title}}</a></span>

                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="position-absolute bg-dark px-1 py-2 text-center"
                style="background-color: rgba(0,0,0,0.5); width:100%;"><a href=""
                    class='text-white  display-5 '>Unggahan Terbaru</a></div>
            <div>
                <img src="/myfiles/{{$posts[4]->novel->image}}" alt="" class="text-center mx-auto karosel"
                    >
                <div class="carousel-caption overlays">
                    <h2 class="text-center mb-0"><a class="fs-1 text-white"
                            href="/{{$posts[4]->slug}}">{{$posts[4]->title}}</a></h2>
                    <h3 class='text-center mt-0 mb-0'><a href="/artists?artist={{$posts[4]->artist->name}}"
                            class="text-warning">{{$posts[4]->artist->name}}</a>
                    </h3>
                    <span class="fs-5 text-center text-white"><a href="/novels/{{$posts[4]->novel->novel_slug}}"
                            class="text-white">{{$posts[4]->novel->title}}</a></span>

                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class='text-center mx-auto mt-4'>
    <a href="https://www.paypal.me/VdashC"><img src="/img/donate.webp" alt="" width='300px'></a>
</div>
@endsection