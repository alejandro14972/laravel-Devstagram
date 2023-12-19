<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //

    public function __construct()
    { /* comprobar que el usuario ersta identificado */
        $this->middleware('auth'); //restringir metodos y otros no para usuariosin autentificar
    }


    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $userId = auth()->id(); // Obtener el ID del usuario actual

        $this->validate($request, [
            'username' => [
                'required',
                "unique:users,username,$userId", // Ignorar el usuario actual
                'min:3',
                'max:20',
            ],
        ]);
    }
}
