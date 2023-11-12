<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    function store() {
        //dd("cerrando sesion");
        auth()->logout();
        return redirect()->route('login');
    }
}
