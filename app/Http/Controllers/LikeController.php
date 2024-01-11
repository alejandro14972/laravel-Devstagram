<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }

    /* 
    Explicación paso a paso:
Parámetros de la función:

$request: Es una instancia de la clase Request y se utiliza para acceder a los datos de la solicitud HTTP.
$post: Es un modelo Post que se pasa como parámetro a la función. Esto puede ser parte de la ruta o algún otro método de obtención del post al que se le dará "like".
Creación del "like":

$post->likes(): Accede a la relación likes definida en el modelo Post. Esta relación podría estar definida como una relación de uno a muchos (hasMany), por ejemplo.
create([...]): Crea un nuevo modelo Like asociado a ese post con los datos proporcionados en el array asociativo.
'user_id' => $request->user()->id: Establece el ID del usuario que dio el "like" como el ID del usuario actual que hizo la solicitud.
Redirección:

return back();: Redirige al usuario de nuevo a la página anterior. En este contexto, probablemente se utiliza para volver a la página del post después de dar el "like".
    
    */


    public function destroy(Request $request, Post $post)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
