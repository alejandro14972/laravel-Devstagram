<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    //
    public function store(Request $request){
        $imagen =$request->file('file'); //este input es un arreglo
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid().".".$imagen->extension(); //sirve para poner nombre unicos en las imagenes
        $imagenServidor = Image::make($imagen); //usar intervención image para el uso de métodos
        $imagenServidor->fit(1000,1000, null); //recortar imagen
        $iamgenPath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($iamgenPath);

        return response()->json(['imagen'=>$nombreImagen,'longitud'=> strlen($nombreImagen)]);
    }
}
