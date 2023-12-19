<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

/* añadir con use la importacion dela clase controlador y el metodo index para su vista. se pueden añadir mas metodos */
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

//rutas para el perfil
Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');

//rutas de los post 
Route::get('{user:username}',[PostController::class, 'index'])->name('post.index'); /* rutas dinamicas dependiendo del login derl usuario route model baindin*/
Route::get('/post/create',[PostController::class, 'create'])->name('post.create'); //validacion de la vista
Route::post('/post',[PostController::class, 'store'])->name('post.store'); //pasar datos  a la bbdd
Route::get('/{user:username}/posts/{post}',[PostController::class, 'show'])->name('posts.show'); //visualizar un post en nueva pagina
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');


//comentarios de los post
Route::post('/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store'); //ruta para crear comentarios de post. pasamos el post y user name


Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//like fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

