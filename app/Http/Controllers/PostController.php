<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function create(){ //nos permite visualizar el form post/create
      return view('post.create');
  }

  public function store(Request $request){ //almacena en la bbdd de la vista post/create
    $this->validate($request,[ //validamos los datos
      'titulo'=>'required|max:255',
      'descripcion'=>'required|max:255',
      'imagen'=>'required'
    ]);


    //una vez validados añadimos los datos a la bbdd y redirigimos al index
    Post::create([ 
      'titulo'  =>$request->titulo,
      'descripcion' => $request->descripcion,
      'imagen'=>$request->imagen,
      'user_id'=>auth()->user()->id
    ]);

   /*  $request->user()->posts()->create([
      'titulo'  =>$request->titulo,
      'descripcion' => $request->descripcion,
      'imagen'=>$request->imagen,
      'user_id'=>auth()->user()->id
    ]); */

    return redirect()->route('post.index', auth()->user()->username);
}
}
