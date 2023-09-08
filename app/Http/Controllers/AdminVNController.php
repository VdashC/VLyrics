<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Novel;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminVNController extends Controller
{   
    
    public function edit(Novel $novel)
    {   
        return view('dashboard.novel.edit',[
            'novel'=>$novel,
            'title'=>'Edit VN'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.novel.index',[
            'title'=>'Tambah VN',
            'novels'=>Novel::filter(request(['search']))->orderBy('title')->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.novel.create',[
            'title'=>'Tambah Novel Visual'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'jtitle'=>'nullable',
            'image'=>'required|image|file|max:1024',
            'novel_slug'=>'required|unique:novels'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('/img',['disk'=>'my_files']);
        }

        Novel::create($validatedData);
        return redirect('/dashboard/novel')->with('success','Novel Visual telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Novel $novel)
    {   

        $rules =[
            'image'=>'required',
            'title'=>'required|max:255'
        ];

        if($request->slug != $novel->novel_slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('/img',['disk'=>'my_files']);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Novel::where('id',$novel->id)->update($validatedData);

        return redirect('/dashboard/novel')->with('success','Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Novel::class, 'novel_slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }

}
