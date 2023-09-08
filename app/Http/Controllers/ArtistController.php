<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function selectArtist(Request $request){
        $data = Artist::where('name', 'LIKE', '%'.request('q').'%')->orderBy('name')->paginate(10);
        
        return response()->json($data);
    }
}
