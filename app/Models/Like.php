<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [ /* los datos que esperamos que el usuario nos de par allenar la bbdd*/
        'user_id'
    ];
}
