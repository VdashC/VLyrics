@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Lirik Baru</h1>
</div>
<div class="col-lg-8">

    <form method='post' action='/dashboard' class='mb-5' enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="novel_id" class="form-label">Novel Visual</label>
            <select id="novel_id" class="form-select" name='novel_id' aria-label="Default select example"></select>
        </div>
        

        <div class="mb-3">
            <label for="title" class="form-label">Judul Lagu (Romaji/Latin)</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name='title'
                required autofocus value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jtitle" class="form-label">Judul Lagu (Kanji)</label>
            <input type="text" class="form-control @error('jtitle') is-invalid @enderror" id="jtitle" name='jtitle'
                value="{{old('jtitle')}}">
            @error('jtitle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alttitle" class="form-label">Judul Lagu Alternatif (Opsional)</label>
            <input type="text" class="form-control @error('alttitle') is-invalid @enderror" id="alttitle"
                name='alttitle' value="{{old('alttitle')}}">
            @error('alttitle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Tautan Vidio (YouTube) (Opsional)</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name='link'
                value="{{old('link')}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="altlink" class="form-label">Tautan Vidio (GDrive) (Opsional)</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="altlink" name='altlink'
                value="{{old('altlink')}}">
            @error('altlink')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" id="slug" name='slug' readonly
                required value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artist_id" class="form-label">Vokalis</label>
            <select id="artist_id" class="form-select" name='artist_id' ></select>
        </div>


        <div class="mb-3">
            <label for="body" class="form-label">Romaji</label>
            @error('body')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{ old('body')}}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="jbody" class="form-label">Kanji</label>
            @error('jbody')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="jbody" type="hidden" name="jbody" value="{{ old('jbody')}}">
            <trix-editor input="jbody"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="ibody" class="form-label">Indonesia (Opsional)</label>
            @error('ibody')
            <p class='text-danger'>{{$message}}</p>
            @enderror
            <input id="ibody" type="hidden" name="ibody" value="{{ old('ibody')}}">
            <trix-editor input="ibody"></trix-editor>
        </div>

        <div class="mb-3">
            <input id="approved" type="hidden" name="approved" value="1">
        </div>


        <button type="submit" class="btn btn-primary">Unggah!</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {

    $("#novel_id").select2({
        placeholder: 'Pilih Novel Visual',
        ajax: {
            url: "{{route('selectNovel')}}",
            processResults: function({
                data
            }) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.title
                        }
                    })
                }
            }
        }
    });

    $("#artist_id").select2({
        placeholder: 'Pilih Vokalis',
        ajax: {
            url: "{{route('create.index')}}",
            processResults: function({
                data
            }) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            }
        }
    });


});
</script>

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