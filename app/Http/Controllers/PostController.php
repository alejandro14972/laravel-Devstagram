<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
  //

  public function __construct()
  { /* comprobar que el usuario ersta identificado */
    $this->middleware('auth')->except(['show', 'index']); //restringir metodos y otros no para usuariosin autentificar
  }

  public function index(User $user)
  { //creamos la clase usewr coomo parametro
    //dd($user->email);  // dd(auth()->user()); /* helper que nos dice que usuario esta registrado */

    $posts = Post::where('user_id', $user->id)->latest()->paginate(4); //consulta de los post del usuario
    //dd($posts); //puedo uasr ->get() para sacar todo

    return view('dashboard', [
      'user' => $user,
      'posts' => $posts
    ]);
  }

  public function create()
  { //nos permite visualizar el form post/create
    return view('post.create');
  }

  public function store(Request $request)
  { //almacena en la bbdd de la vista post/create
    $this->validate($request, [ //validamos los datos
      'titulo' => 'required|max:255',
      'descripcion' => 'required|max:255',
      'imagen' => 'required'
    ]);


    //una vez validados añadimos los datos a la bbdd y redirigimos al index
    Post::create([
      'titulo'  => $request->titulo,
      'descripcion' => $request->descripcion,
      'imagen' => $request->imagen,
      'user_id' => auth()->user()->id
    ]);

    /*  $request->user()->posts()->create([
      'titulo'  =>$request->titulo,
      'descripcion' => $request->descripcion,
      'imagen'=>$request->imagen,
      'user_id'=>auth()->user()->id
    ]); */

    return redirect()->route('post.index', auth()->user()->username);
  }

  public function show(User $user, Post $post)
  {  /* importar varios parametros  */
    return view('post.show', [
      'post' => $post,
      'user' => $user
    ]);
  }


  public function destroy(Post $post)
  {
    /* if($post->user_id === auth()->user()->id ){
      dd($post->id);
    }else{
      dd('no es la misma persona');
    } */


    //uso de policy
    $this->authorize('delete', $post);
    $post->delete();

    //eliminar la imagen
    $imagen_path = public_path('uploads/' . $post->imagen);
    if (File::exists($imagen_path)) {
      unlink($imagen_path);
    }


    return redirect()->route('post.index', auth()->user()->username);
  }
}
