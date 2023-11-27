<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; /* para la seguridad de la pass en la bbdd  */
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->get('email'));

        /* modificar el request del username*/
        $request->request->add(['username' =>  Str::slug($request->username)]);  /* https://laravel.com/docs/10.x/helpers */
        /* este codigo se uso porque puede darse el caso de que 
haya dos usuarios con un username paredido
por ejemplo alejandro1234 y alejandro 1234 */

        //validación del form register 
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',/* table,column,except,id */
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        /* equivale al insert into, pasar los datos a la bbdd
       laravel es capaza de saber en que tabla insertar los datos
       MVC */
        User::create([
            'name' => $request->name,
            'username' => $request->username,
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
        return redirect()->route('post.index', auth()->user()->username);
    }
}
