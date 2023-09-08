<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Novel;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{   
    public function index(){
       

        return view('home',[
            'title'=>'Beranda',
            // 'active'=>'posts',
            // 'posts'=>Post::all()
            'posts'=>Post::latest()->filter(request(['search','artist','user']))->paginate(12)->withQueryString()
        ]);
    }

    public function cari(Request $request){

		// if (request('user')){
		// 	$user = User::firstWhere('username', request('user'));
		// }
        $queryInput = $request->input('search');
        $novels = Novel::filter(request(['search']))->paginate();

        return view('cari', [
            'title'=>'Cari Judul',
            'search'=>$queryInput,
            'posts'=>Post::latest()
            ->filter(request(['search','user']))->paginate(7)->withQueryString(),
            // 'novels'=>Novel::latest()->where(function($query)use($queryInput){
            //     $query->where('title','like','%'.$queryInput.'%');
            // })
            'novels'=>$novels


        ]);
    }

    public function novel(Request $request){
        
        $huruf = $request->huruf;
        $huruf = strtoupper($huruf);
       
        return view('huruf',[
            'title' => 'Huruf '.$huruf,
            'filter'=>$request,
            'posts' => Novel::filter(request(['huruf']))->orderBy('title')->paginate(12)->withQueryString()
        ]);

    }

    public function artist(Request $request){
        $name = $request->artist;

        if(isset($request->artist)){
                $posts = Post::filter(request(['artist']))->orderBy('title')->paginate(12)->withQueryString();
            return view('artists.index',[
                'title'=>'Vokalis - '.$request->artist,
                'artists'=>Artist::orderBy('name')->paginate(22),
                'nama'=>$name,
                'request'=>$request,
                'posts'=>$posts
            ]);
        }


        return view('artists.index',[
            'title'=>'Vokalis',
            'artists'=>Artist::orderBy('name')->paginate(30)->withQueryString(),
            'nama'=>$name,
        ]);
    }

    public function novel2(Request $request){
        return view('novels.index',[
            'novels'=>Novel::orderBy('title')->paginate(12)->withQueryString(),
            'title'=>'Visual Novel'
        ]);
    }

    public function novelShow(Novel $novel){

        return view('artists.show',[
            'title'=>$artist->name,
            'novel'=>$novel
        ]);
    }

    public function show(Post $post){

        return view('post',[
    "title"=>$post->title. ' - ' . $post->artist->name .' | '.$post->novel->title,
    "post" => $post
]);
}
}