<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; /* para la seguridad de la pass en la bbdd  */
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
       //dd($request);

       // dd($request->get('email'));


/* modificar el request del username*/
$request->request->add(['username'=>  Str::slug($request->username)]);  /* https://laravel.com/docs/10.x/helpers */


       //validación del form

       $this->validate($request,[
        'name' =>'required|max:30',
        'username' => 'required|unique:users|min:3|max:20',/* table,column,except,id */
        'email' => 'required|unique:users|email|max:60',
        'password' =>'required|confirmed|min:6'
       ]);


       /* equivale al insert into */
       User::create([
        'name' =>$request->name,
        'username' =>$request->username, 
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);


       /* autentificar usuario */

      /*  auth()->attempt([
        'email' =>$request->email,
        'password'=>$request->password
       ]); */
       /* otra forma de autentificar */

       auth()->attempt(
        $request->only('email', 'password')
       );

       /* redireccionar al usuario*/
        return redirect()->route('post.index');


    }

}
