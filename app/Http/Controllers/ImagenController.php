<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    //
    public function store(Request $request){
        $imagen =$request->file('file'); //este input es un arreglo
        return response()->json(['imagen'=>"probando respuesta"]);
    }
}
