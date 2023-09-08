<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('register.index',[
            'title'=>'Daftar Akun'
        ]);
    }

    public function store(Request $request){
        

       $validatedData = $request->validate([
            'username'=>'required',
            'email'=> 'required|unique:users',
            'password'=>'required|min:5|max:255',
            
       ]);
       $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);
       // $request->session()->flash('success','Registrasi Berhasil! Silakan login');
       return redirect('/login')->with('success','Registrasi Berhasil! Silakan login');

    }
}
