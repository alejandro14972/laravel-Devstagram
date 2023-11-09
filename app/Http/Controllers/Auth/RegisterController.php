<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
       //dd($request);

       // dd($request->get('email'));

       //validación del form

       $this->validate($request,[
        'name' =>'required|max:30',
        'username' => 'required|unique:users|min:3|max:20',/* table,column,except,id */
        'email' => 'required|unique:users|email|max:60',
        'password' =>'required|confirmed|min:6'
       ]);


       dd("creando usuario");


    }

}
