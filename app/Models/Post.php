<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ /* los datos que esperamos que el usuario nos de par allenar la bbdd*/
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];


    public function user() //funcion para relacionar un post con un usuario y recoger los datos del usuario
    {
    return $this->belongsTo(User::class)->select(['name', 'username']); ///el select nos devuelve los datos que queremos
    //$post =Post::find(1)
    //$post->user
    }

    public function comentarios() 
    { //relacion de comentarios . no es necesario crear una consulta where 
    return $this->hasMany(Comentario::class);
    }
}


