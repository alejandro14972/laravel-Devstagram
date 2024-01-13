<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    


    //
    public function __invoke() /* solo para controladores que tienen un solo metodo invocable se llama automaticamente */
    {

        //obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray(); //pluck traer ciertos campos en array(to array)

        $post = Post::whereIn('user_id', $ids)->latest()->paginate(20); //el metodo where revisa un valor
        //where in revisa varios 
        //https://laravel.com/docs/10.x/queries#where-clauses




        return view('home', ['posts' => $post]);
    }
}
