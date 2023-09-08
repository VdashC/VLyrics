<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AdminVNController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminArtistController;
use App\Http\Controllers\DashboardPostController;

Route::resource('/dashboard/novel', AdminVNController::class);
// Route::get('/dashboard/novel/{novel:novel_slug}/edit',[AdminVNController::class,'edit'])->middleware('auth');

// Route::post('/dashboard/novel',[AdminVNController::class,'update'])->middleware('auth');

Route::get('/tentang',function(){
    return view('tentang',[
        'title'=>'Tentang'
    ]);
});

Route::get('selectArtist', [ArtistController::class, 'selectArtist'])->name('create.index');
Route::get('selectNovel', [NovelController::class, 'selectNovel'])->name('selectNovel');



Route::post('/logout',[LoginController::class,'logout']);

Route::get('/artists',[PostController::class,'artist']);

Route::get('/',[PostController::class,'index']);

Route::get('/dashboard/novel/create/checkSlug',[AdminVNController::class,'checkSlug'])->middleware('auth');

Route::resource('/dashboard/artist/',AdminArtistController::class)->middleware('auth');
Route::get('/dashboard/artist/create/checkSlug',[AdminArtistController::class,'checkSlug'])->middleware('auth');

Route::get('/dashboard/bantuan',function(){
    return view('dashboard.bantuan',[
        'title'=>'Bantuan'
    ]);
});

Route::get('/dashboard/approval',function(){
    return view('dashboard.approval',[
        'title'=>'Persetujuan'
    ]);
});



Route::get('/novels',[PostController::class,'novel2']);
// Route::get('/novels/{novel:novel_slug}',[PostController::class,'novelShow']);


Route::get('/home',function(){
    return 'Login berhasil, silakan muat ulang';
});

Route::get('/search',[PostController::class,'cari']);

Route::get('/huruf',[PostController::class,'novel']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
// Route::get('/register',function(){
//     return 'Halaman ini dinonaktifkan sementara';
// });
Route::post('/register',[RegisterController::class,'store']);

Route::resource('/dashboard',DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/create/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);


Route::get('/{post:slug}',[PostController::class,'show']);
Route::get('/novels/{novel:novel_slug}',[NovelController::class,'index']);








