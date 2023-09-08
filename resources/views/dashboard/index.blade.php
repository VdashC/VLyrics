@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Postingan</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{session('success')}}
</div>
@endif


<div class="table-responsive col-lg-8">
    <a href="/dashboard/create" class='btn btn-primary mb-3'>Unggah Lirik Baru</a>
    <div>
        <form class="d-flex mt-lg-0 mt-3 col-lg-4 mb-0" role="search" id="cari" action="/dashboard">
            <input class="form-control me-2" type="search" placeholder="Cari Judul Lagu atau VN" name="search2">
            <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="white" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </form>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col" class="text-center">Vokalis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><b>{{$post->title}}</b></td>
                <td>{{$post->artist->name}}</td>
                <td>
                    <a href="/{{$post->slug}}" class="btn btn-info">Lihat</a>
                    <a href="/dashboard/{{$post->slug}}/edit" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class='d-flex justify-content-center'>{{$posts->links()}}</div>

@endsection