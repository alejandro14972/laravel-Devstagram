<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        //dd('autenticando');

        //dd($request->remember);  /*  */

        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required'
        ]);

    

        //autentica usuarios
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
           return back()->with('mensaje', 'Credenciales incorrectas');//si las credenciales son incorrectas enviamos este mensaje al login.blade
        }

        return redirect()->route('post.index', auth()->user()->username);

    }

    


}
