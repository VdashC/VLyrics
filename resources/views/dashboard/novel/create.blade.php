@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Novel Visual</h1>
</div>
<div class="col-lg-8">

    <form method='post' action='/dashboard/novel' class='mb-5' enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Novel Visual</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name='title'
                required autofocus value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jtitle" class="form-label">Judul Novel Visual (Kanji) (Opsional)</label>
            <input type="text" class="form-control @error('jtitle') is-invalid @enderror" id="jtitle" name='jtitle'
                 value="{{old('jtitle')}}">
            @error('jtitle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control @error('novel_slug') is-invalid @enderror" id="novel_slug" name='novel_slug' readonly
                required value="{{old('novel_slug')}}">
            @error('novel_slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Tambah Poster</label>
            <img class='img-preview img-fluid mb-3 col-sm-5' src="">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name='image'
                onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<script>

const title = document.querySelector('#title');
const slug = document.querySelector('#novel_slug');

title.addEventListener('change', function() {
    fetch('/dashboard/novel/create/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
})

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection