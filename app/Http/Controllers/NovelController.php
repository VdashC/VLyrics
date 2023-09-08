<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Novel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovelController extends Controller
{
    public function index(Request $request, Novel $novel){
        $judul = $novel->title;
        return view('novels.show',[
            'title'=>$novel->title,
            'novel'=>$novel,
            'posts'=>Post::whereHas('novel',function($query)use($judul){
                $query->where('title',$judul);
            })->orderBy('title')->paginate(12)
        ]);
    }

    public function selectNovel(Request $request){
        $data = Novel::where('title', 'LIKE', '%'.request('q').'%')->orderBy('title')->paginate(10);
        
        return response()->json($data);
    }
    
}
