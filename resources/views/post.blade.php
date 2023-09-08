@extends('layouts.main')

@section('meta')
<meta name="description"
    content="Lirik lagu vn dan anime romaji,kanji dan indonesia dengan judul lagu {{$post->title}} - {{$post->novel->title}} oleh {{$post->artist->name}}">
<meta name=”robots” content="index, follow">
<meta name="keywords"
    content="{{$post->title}} lyrics, {{$post->title}} {{$post->artist->name}} lyrics,{{$post->title}} lyrics romaji {{$post->novel->title}},lyrics {{$post->title}} {{$post->novel->title}}">
<style>
tr {
    font-size: 14px;
}
</style>
@endsection

@section('container')

<div class="col-12 m-auto mt-2 p-2 mb-5 border rounded-2 bg-light homework" onmousedown='return false;'
    onselectstart='return false;'>
    <h1 class="text-center mb-0">{{$post->title}}</h1>
    <h4 class="text-center">{{$post->jtitle}}</h4>
    @if($post->link)
    <iframe width="100%" height="200px" class="d-block mx-auto" src="https://www.youtube.com/embed/{{$post->link}}"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
    @elseif($post->altlink)
    <audio controls class="d-block mx-auto" src="{{$post->altlink}}" type="audio/mp3">
        Silakan ganti browser untuk streaming musik!
    </audio>
    @else

    @endif
    <table class='table'>
        <tr>
            <th>Vokal:</th>
            <td>{{$post->artist->name}}</td>
        </tr>
        <tr>
            <th>Dari:</th>
            <td>{{$post->novel->title}} @if($post->novel->jtitle) | {{$post->novel->jtitle}} @endif</td>
        </tr>
        <tr>
            <th>Kata Kunci:</th>
            <td>{{$post->title}} - {{$post->artist->name}} | {{$post->novel->title}} lyrics</td>
        </tr>
        <tr>
            <th>Terakhir diperbarui:</th>
            <td>{{$post->updated_at}}</td>
        </tr>
    </table>
    <!-- <span class="fs-6 border d-block"><b>Vokal: </b></span> <div class="d-inline-block kotak">{{$post->artist->name}}</div> -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="romaji-tab" data-bs-toggle="tab" data-bs-target="#romaji-tab-pane"
                type="button" role="tab" aria-controls="romaji-tab-pane" aria-selected="true">Romaji</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="kanji-tab" data-bs-toggle="tab" data-bs-target="#kanji-tab-pane" type="button"
                role="tab" aria-controls="kanji-tab-pane" aria-selected="false">Kanji</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="indonesia-tab" data-bs-toggle="tab" data-bs-target="#indonesia-tab-pane"
                type="button" role="tab" aria-controls="indonesia-tab-pane" aria-selected="false">Indonesia</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="romaji-tab-pane" role="tabpanel" aria-labelledby="romaji-tab"
            tabindex="0">
            <div class="jpn">
                @if($post->body)
                {!! $post->body !!}
                <hr>
                <mark class="bg-info">Diunggah oleh:</mark>
                <div class="card mt-1 mx-auto d-block" style="width: 95%;">
                    <div class="card-body">
                        <h5 class="d-inline"><img src="/img/{{$post->user->image}}" width="60px" class="rounded-circle"
                                alt="..."></h5>
                        <span class="fw-bold text-danger ms-2">{{$post->user->username}}</span>
                    </div>
                </div>
                @else
                Belum Tersedia
                <hr>
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="kanji-tab-pane" role="tabpanel" aria-labelledby="kanji-tab" tabindex="0">
            <div class="kanji">
                @if($post->jbody)
                {!! $post->jbody !!}
                <hr>
                <mark class="bg-info">Diunggah oleh:</mark>
                <div class="card mt-1 mx-auto" style="width: 19rem;">
                    <div class="card-body">
                        <h5 class="d-inline"><img src="/img/{{$post->user->image}}" width="60px" class="rounded-circle"
                                alt="..."></h5>
                        <span class="fw-bold text-danger ms-2">{{$post->user->username}}</span>
                    </div>
                </div>
                @else
                Belum Tersedia
                <hr>
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="indonesia-tab-pane" role="tabpanel" aria-labelledby="indonesia-tab" tabindex="0">
            <div class="indo">
                @if($post->ibody)
                {!! $post->ibody !!}
                <hr>
                <mark class="bg-info">Diterjemahkan oleh:</mark>
                <div class="card mt-1 mx-auto d-block" style="width: 90%;">
                    <div class="card-body">
                        <h5 class="d-inline"><img src="/img/VlyricsLogo.png" width="60px" class="rounded-circle"
                                alt="..."></h5>
                        <span class="fw-bold text-danger ms-1">**Vdash</span>
                    </div>
                </div>
                @else
                Belum Tersedia
                <hr>
                @endif
            </div>
        </div>


        <div class="mt-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">
            <p class="mark text-center">Kesalahan lirik atau tautan yang rusak? <a class="btn btn-danger"
                    href="#">Laporkan!</a>

            </p>
        </div>
    </div>
</div>

@endsection