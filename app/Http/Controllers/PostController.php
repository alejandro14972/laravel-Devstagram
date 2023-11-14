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

    public function index(User $user){
        //dd($user);

      // dd(auth()->user()); /* helper que nos dice que usuario esta registrado */

      return view('dashboard',[
        'user'=>$user
      ]);
    }
}
