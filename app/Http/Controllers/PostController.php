<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct() { /* comprobar que el usuario ersta identificado */
      $this->middleware('auth');
    }

    public function index(User $user){ //creamos la clase usewr coomo parametro
        //dd($user->email);
      // dd(auth()->user()); /* helper que nos dice que usuario esta registrado */
      return view('dashboard',[
        'user'=>$user
      ]);
    }

    public function create(){ //creamos la clase usewr coomo parametro
      return view('post.create');
  }
}
