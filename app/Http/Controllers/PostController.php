<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct() { /* comprobar que el usuario ersta identificado */
      $this->middleware('auth');
    }

    public function index(){
       // dd('desde muro');

      // dd(auth()->user()); /* helper que nos dice que usuario esta registrado */

      return view('dashboard');
    }
}
