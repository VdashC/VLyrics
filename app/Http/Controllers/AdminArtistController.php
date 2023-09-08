<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.artist.index',[
            'title'=>'Tambah Vokalis',
            'artists'=>Artist::filter(request(['search']))->orderBy('name')->paginate(24)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artist.create',[
            'title'=>'Tambah Vokalis',
            'artists'=>Artist::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|unique:artists'
        ]);

        Artist::create($validatedData);

        return redirect('/dashboard/artist')->with('success','Vokalis telah ditambahkan!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Artist::class, 'artist_slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
}
