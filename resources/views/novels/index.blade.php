@extends('layouts.main')

@section('container')

<h1 class="text-center mt-4 mb-3">Novel Visual Terunggah</h1>

<div class="container">
    <div class="row">
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
                        <h5 class="fw-bold mt-0 mb-0 text-secondary kartu-title">{{$novel->title}}</h5>
                    </div>
                </a>
            </div>

        </div>
        @endforeach
    </div>
</div>
<div class='d-flex justify-content-center'>{{$novels->links()}}</div>

@endsection