<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Novel;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.index',[
            'title'=>'Dashboard',
            'posts'=>Post::latest()->filter(request(['search2']))->orderBy('title')->paginate(12)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('dashboard.create',[
            'artists'=>Artist::all()->sortBy('name'),
            'novels'=>Novel::all()->sortBy('title'),
            'title'=>'Unggah'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $validatedData = $request->validate([
            'novel_id'=>'required',
            'title'=>'required|max:255',
            'jtitle'=>'max:255',
            'alttitle'=>'max:255',
            'link'=>'max:255|nullable',
            'altlink'=>'url|nullable',
            'slug'=>'required|unique:posts',
            'artist_id'=>'required',
            'approved'=>'required',
            'body'=>'required',
            'jbody'=>'nullable',
            'ibody'=>'nullable'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard')->with('success','Lirik Baru Berhasil Diunggah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $dashboard)
    {   

        return view('dashboard.edit',[
            'post'=>$dashboard,
            'title'=>'Edit Unggahan',
            'artists'=>Artist::all()->sortBy('name'),
            'novels'=>Novel::all()->sortBy('title'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $dashboard)
    {   

        $rules =[
            'novel_id'=>'required',
            'title'=>'required|max:255',
            'jtitle'=>'max:255',
            'alttitle'=>'max:255',
            'link'=>'max:255|nullable',
            'altlink'=>'url|nullable',
            'artist_id'=>'required',
            'image'=>'image|file|max:1024',
            'approved'=>'required',
            'body'=>'required',
            'jbody'=>'nullable',
            'ibody'=>'nullable'
        ];

        if($request->slug != $dashboard->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['image'] = $request->file('image')->store('/img',['disk'=>'my_files']);
        // }

        $validatedData['user_id'] = auth()->user()->id;

        Post::where('id',$dashboard->id)->update($validatedData);

        return redirect('/dashboard')->with('success','Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if($post->image){
                Storage::delete($post->image);
            }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success','Post has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}