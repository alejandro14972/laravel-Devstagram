<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        if ($request->imagen) {
            $imagen = $request->file('imagen'); //este input es un arreglo
            $nombreImagen = Str::uuid() . "." . $imagen->extension(); //sirve para poner nombre unicos en las imagenes
            $imagenServidor = Image::make($imagen); //usar intervención image para el uso de métodos
            $imagenServidor->fit(1000, 1000, null); //recortar imagen
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        //guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null; //1º revisamos si hay imagen 2º checkeamos la img ?? igual a null
        $usuario->save();

        //redirenccionar
        return redirect()->route('post.index', $usuario->username);
    }
}
