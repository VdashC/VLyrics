@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Unggahan</h1>
</div>
<div class="col-lg-8">

    <form method='post' action='/dashboard/{{$post->slug}}' class='mb-5' enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="novel_id" class="form-label">Novel Visual</label>
            <select class="form-select" name='novel_id' required>
                @foreach ($novels as $novel)
                @if(old('novel_id',$post->novel_id)==$novel->id)
                <option value="{{$novel->id}}" selected>{{$novel->title}}</option>
                @else
                <option value="{{$novel->id}}">{{$novel->title}}</option>
                @endif
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Lagu (Romaji/Latin)</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name='title'
                required autofocus value="{{old('title',$post->title)}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jtitle" class="form-label">Judul Lagu (Kanji)</label>
            <input type="text" class="form-control @error('jtitle') is-invalid @enderror" id="jtitle" name='jtitle'
                value="{{old('jtitle',$post->jtitle)}}">
            @error('jtitle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alttitle" class="form-label">Judul Lagu Alternatif (Opsional)</label>
            <input type="text" class="form-control @error('alttitle') is-invalid @enderror" id="alttitle"
                name='alttitle' value="{{old('alttitle',$post->alttitle)}}">
            @error('alttitle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Tautan Vidio (YouTube) (Opsional)</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                name='link' value="{{old('link',$post->link)}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="altlink" class="form-label">Tautan Vidio (GDrive) (Opsional)</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="altlink"
                name='altlink' value="{{old('altlink',$post->altlink)}}">
            @error('altlink')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name='slug' readonly
                required value="{{old('slug',$post->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select class="form-select" name='artist_id' required>
                @foreach ($artists as $artist)
                @if(old('artist_id',$post->artist_id)==$artist->id)
                <option value="{{$artist->id}}" selected>{{$artist->name}}</option>
                @else
                <option value="{{$artist->id}}">{{$artist->name}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Romaji</label>
            @error('body')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{old('body',$post->body)}}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="jbody" class="form-label">Kanji</label>
            @error('jbody')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="jbody" type="hidden" name="jbody" value="{{old('jbody',$post->jbody)}}">
            <trix-editor input="jbody"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="ibody" class="form-label">Indonesia (Opsional)</label>
            @error('ibody')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="ibody" type="hidden" name="ibody" required value="{{old('ibody',$post->ibody)}}">
            <trix-editor input="ibody"></trix-editor>
        </div>

        <div class="mb-3">
            <input id="approved" type="hidden" name="approved" value="0">
        </div>


        <button type="submit" class="btn btn-primary">Simpan Edit</button>
    </form>
</div>

<script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function() {
    fetch('/dashboard/create/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
})

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})

</script>
@endsection