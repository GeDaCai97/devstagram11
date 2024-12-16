<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

Route::get('/', HomeController::class)->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');


Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post:titulo}', [PostController::class, 'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post:titulo}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/posts/{post:titulo}', [PostController::class, 'destroy'])->name('posts.destroy');

//Like a los posts
Route::post('/posts/{post:titulo}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post:titulo}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');



Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');

//Siguiendo usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');