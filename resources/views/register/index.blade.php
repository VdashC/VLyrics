@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 ">
        <main>
            <h1 class="h3 mt-3 mb-3 fw-bold text-center">Daftar Akun</h1>

            <form class="form-registration" action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        id="username" placeholder="username" required value="{{old('username')}}">
                    <label for="username">Nama Pengguna</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="email@gmail.com" value="{{old('email')}}">
                    <label for="email">Alamat Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password"
                        class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" required>
                    <label for="password">Buat Kata Sandi</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar!</button>
            </form>
            <small class="d-block text-center mt-2">Sudah Terdaftar? <a href="/login">Masuk Sekarang!</a></small>
        </main>
    </div>
</div>

@endsection