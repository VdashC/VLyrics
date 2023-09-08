@extends('layouts.main')

@section('container')

<h1 class="text-center fw-semibold mt-4 mb-4 display-1">{{strtoupper($filter->huruf)}}</h1>

@if ($posts->count() > 0)
<div class="container">
    <div class="row">
        @foreach($posts as $novel)
        <div class="col-6 col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute bg-dark px-3 py-1 text-white" style="background-color: rgba(0,0,0,0.7);">
                    Novel Visual</div>

                @if($novel->image)
                <img src="/myfiles/{{$novel->image}}" class="kartu">
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
<div class="text-center">
    <p class='fs-4 '>"Belum Tersedia [04]"</p>
</div>

@endif

<div class='d-flex justify-content-center'>{{$posts->links()}}</div>

@endsection