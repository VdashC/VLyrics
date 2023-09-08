@extends('layouts.main')

@section('container')
<div class="container-fluid mb-4">
    <div class="col-lg-6 m-auto main-lagu-bg mt-3 border rounded-3 p-2">
        <h1 class="text-center fs-1"> {{$novel->title}}</h1>
        <img class="w-75 d-block mx-auto img-thumbnail" src="/myfiles/{{$novel->image}}" alt="">
        <h2 class="fs-5 text-center">{{$novel->jtitle}}</h2>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Judul</th>
                    <th class="text-center" scope="col">Vokalis</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a class="text-decoration-none" href="/{{$post->slug}}">
                            {{$post->title}}
                        </a></td>
                    <td>{{$post->artist->name}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class='d-flex justify-content-center'>{{$posts->links()}}</div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success d-block mx-auto" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Ajukan Lirik
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Pengajuan Lirik <span
                                class="badge bg-danger">Sedang dalam Tahap Pengembangan</span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <mark class="text-danger">Pengaju akan diberi credit atas kontribusinya</mark>
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" placeholder="Nama Panggilan" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                        </div>


                        <div class="input-group">

                            <textarea rows="10" style="height: 100%;" class="form-control"
                                placeholder="ISI SESUAI FORMAT! Judul Game/Anime/VN; Judul Lagu; Vokal; Lirik;"
                                aria-label="With textarea"></textarea>
                        </div>
                        <br>
                        <span class="bg-danger">Peringatan! Email spam akan di-blacklist</span>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Saya bukan robot.
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="button" class="btn btn-secondary disabled">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Akhir Modal-->
        

    </div>
    @endsection