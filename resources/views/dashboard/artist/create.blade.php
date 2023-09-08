@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Vokalis</h1>
</div>
<div class="col-lg-8">

    <form method='post' action='/dashboard/artist' class='mb-5'>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Vokalis</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' required
                autofocus value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control @error('artist_slug') is-invalid @enderror" id="artist_slug"
                name='artist_slug' readonly required value="{{old('artist_slug')}}">
            @error('artist_slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<script>
const title = document.querySelector('#name');
const slug = document.querySelector('#artist_slug');

title.addEventListener('change', function() {
    fetch('/dashboard/artist/create/checkSlug?name=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
})

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})
</script>
@endsection