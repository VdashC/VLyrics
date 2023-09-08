@extends('layouts.main')

@section('container')

@if(isset($request))
<h1 class="text-center border-bottom mt-2 mb-4">{{$nama}}</h1>
<div class="row">
    @foreach($posts as $post)
    <div class="col-6 col-md-4 mb-3">
        <a href="/{{$post->slug}}">
            <div class="card">

                @if($post->novel->image)
                <img src="/myfiles/{{$post->novel->image}}" class="kartu">
                @else
                <img src="https://source.unsplash.com/500x400?" class="card-img-top" alt="">
                @endif

                <div class="overlays position-absolute overflow-auto mb-0">
                    <h2 class="text-center card-title text-white fw-bold mb-0" style='font-size:14px;'>{{$post->title}}</h2>
                    <h5 class="card-title text-secondary mt-0 text-center text-truncate" style="font-size:13px;">{{$post->novel->title}}</h5>
                </div>

            </div>
        </a>
    </div>
    @endforeach
</div>
<div class='d-flex justify-content-center'>{{$posts->links()}}</div>
@else
<h1 class="text-center border-bottom mt-4 mb-4">Vokalis Terunggah</h1>
<ul>
    @foreach($artists as $artist)
    <li><a href="/artists?artist={{$artist->name}}">{{$artist->name}}</a></li>
    @endforeach
</ul>
<div class='d-flex justify-content-center'>{{$artists->links()}}</div>
@endif


@endsection