<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TconsumoController;
use App\Http\Controllers\TmultaController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\NoticeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// posts-Inicio
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/posts={post:slug}',[HomeController::class,'show']);
Route::get('/categories={category:slug}',function(Category $category){
  return view('home.index',[
    'posts'=>$category->posts,
  ]);
})->name('category');
Route::get('/users={user:username}',function(User $user){
  return view('home.index',[
    'posts'=>$user->posts]);
});

require __DIR__.'/auth.php';

Route::get('create-pdf-file', [PDFController::class, 'index']);

//Dashboard
Route::get('/dashboard', function () {
  if (Auth::user()->hasAnyRole('Admin', 'Cajero','Lecturador')) {
    return view('admins.dashboard');
  } else {
    return view('socios.dashboard');
  }
}) ->middleware(['auth'])->name('dashboard');

//vistas-SOCIO
Route::resource('posts',PostController::class);
Route::get('posts.create',[PostController::class,'create']);
Route::post('posted',[PostController::class,'store']);
Route::get('posts.edit.{post:slug}',[PostController::class,'edit']);
Route::get('posts.show.{post:slug}',[PostController::class,'show']);
Route::PATCH('posts.update.{post:slug}',[PostController::class,'update']);
Route::DELETE('posts.delete.{post}',[PostController::class,'destroy']);

Route::get('notices',[NoticeController::class,'index']);
Route::post('notice',[NoticeController::class,'store']);
Route::get('notice.show.{notice:id}',[NoticeController::class,'show']);
Route::get('notice.create.{lectura:id}',[NoticeController::class,'create']);
Route::get('notice.edit.{notice:id}',[NoticeController::class,'edit']);

//  TODO:clasificacion de meters
Route::get('/meters={meter:id}',function(Meter $meter){
  return view('notice.index',[
    'lecturas'=>$meter->lecturas,
  ]);
})->name('category');

//vistas-ADMIN
// Route::post('admin/posts',[PostController::class,'store']);//->middleware('admin');

Route::resource('lectura',LecturaController::class);
// Route::get('lecturas.create.{meter:id}',[LecturaController::class,'create']);
// Route::post('lecturas',[LecturaController::class,'store']);
// Route::get('lecturas.edit.{meter:id}',[LecturaController::class,'edit']);
// Route::PATCH('lecturas.update.{lectura:id}',[LecturaController::class,'update']);
// Route::DELETE('lecturas.delete.{lectura}',[LecturaController::class,'destroy']);
Route::resource('lectura',LecturaController::class);
Route::get('lectura.edit.{meter:id}',[LecturaController::class,'create']);
Route::post('lectura',[LecturaController::class,'store']);
Route::get('lectura.create.{meter:id}',[LecturaController::class,'create']);
Route::PATCH('lectura.update.{lectura:id}',[LecturaController::class,'update']);
Route::DELETE('lectura.delete.{lectura}',[LecturaController::class,'destroy']);

Route::resource('medidor',MeterController::class);
Route::get('medidor.create',[MeterController::class,'create']);
Route::get('medidor.edit.{meter:id}',[MeterController::class,'edit']);
Route::PATCH('medidor.update.{meter:id}',[MeterController::class,'update']);
Route::DELETE('medidor.delete.{meter}',[MeterController::class,'destroy']);

Route::resource('taporte',TaporteController::class);
Route::get('taporte.create',[TaporteController::class,'create']);
Route::get('taporte.edit.{tmulta:id}',[TaporteController::class,'edit']);
Route::PATCH('taporte.update.{tmulta:id}',[TaporteController::class,'update']);
Route::DELETE('taporte.delete.{tmulta}',[TaporteController::class,'destroy']);

Route::resource('tmulta',TmultaController::class);
Route::get('tmulta.create',[TmultaController::class,'create']);
Route::get('tmulta.edit.{tmulta:id}',[TmultaController::class,'edit']);
Route::PATCH('tmulta.update.{tmulta:id}',[TmultaController::class,'update']);
Route::DELETE('tmulta.delete.{tmulta}',[TmultaController::class,'destroy']);

Route::resource('tconsumo',TconsumoController::class);
Route::get('tconsumo.create',[TconsumoController::class,'create']);
Route::get('tconsumo.edit.{tconsumo:id}',[TconsumoController::class,'edit']);
Route::PATCH('tconsumo.update.{tconsumo:id}',[TconsumoController::class,'update']);
Route::DELETE('tconsumo.delete.{tconsumo}',[TconsumoController::class,'destroy']);


Route::resource('user',UserController::class);
Route::get('user.create',[UserController::class,'create']);
Route::get('user.edit.{user:id}',[UserController::class,'edit']);
Route::PATCH('user.update.{user:id}',[UserController::class,'update']);
Route::DELETE('user.delete.{user}',[UserController::class,'destroy']);

Route::resource('mreunion',ReunionController::class);
Route::get('mreunion.create',[ReunionController::class,'create']);
Route::get('mreunion.edit.{mreunion:id}',[ReunionController::class,'edit']);
Route::PATCH('mreunion.update.{mreunion:id}',[ReunionController::class,'update']);
Route::DELETE('mreunion.delete.{mreunion}',[ReunionController::class,'destroy']);
