@extends('layouts.main')

@section('container')


<h5 class="fw-light d-inline">Menampilkan hasil untuk:
    @if($search)
</h5><mark>
    <h5 class="d-inline">{{$search}}</h5>
</mark>
@else
<h5 class="d-inline">semua</h5>
@endif

@if ($posts->count() > 0)
<div class="container-fluid">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="/{{$post->slug}}">
                <div class="card">

                    @if($post->novel->image)
                    <img src="/myfiles/{{$post->novel->image}}" class="kartu" >
                    @else
                    <img src="https://source.unsplash.com/500x400?" class="card-img-top" alt="">
                    @endif

                    <div class="position-absolute overlays text-white text-center " style='overflow:auto;'>
                        <h2 class="text-center card-title text-white fw-bold mt-0 mb-0 kartu-lagu">{{$post->title}}</h2>
                        <h5 class="card-title text-secondary mt-0 mb-0 text-truncate kartu-novel">
                            {{$post->novel->title}}
                        </h5>
                        <small class="card-title text-decoration-none mb-2 text-white">Vokal: {{$post->artist->name}}
                        </small>

                    </div>

                </div>
            </a>
        </div>
        @endforeach

        @foreach($novels as $novel)
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="position-absolute bg-dark px-3 py-1 text-white" style="background-color: rgba(0,0,0,0.7);">
                    Novel Visual</div>

                @if($novel->image)
                <img src="/myfiles/{{$novel->image}}" class='kartu'>
                @else
                <img src="https://source.unsplash.com/500x400?" class="card-img-top" alt="">
                @endif
                <a href="/novels/{{$novel->novel_slug}}" class="stretched-link">
                    <div class="overlays-white text-center position-absolute overflow-auto mb-0">
                        <h5 class="fw-bold mt-0 mb-0 text-secondary" style="font-size:15px;">{{$novel->title}}</h5>
                    </div>
                </a>
            </div>

        </div>
        @endforeach
    </div>
</div>

@else
<div class="text-center d-flex justify-content-center align-items-center" style="top:50%; height:60vh;">
    <p class='fs-4 '>"Coba Cari Kata Kunci Lain Berdasarkan Vokalis atau Judul Novel [04]"</p>
</div>

@endif

<div class='d-flex justify-content-center'>{{$posts->links()}}</div>

@endsection