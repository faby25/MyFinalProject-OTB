<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Meter;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TconsumoController;
use App\Http\Controllers\TmultaController;
use App\Http\Controllers\TaporteController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ReunionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//routes for reset Password
// Route::get('register', [UserController::class, 'register'])->name('register');
//
// Route::get('login', [UserController::class, 'login'])->name('login');
// Route::post('login', [UserController::class, 'loginValidate'])->name('login');
//
// Route::get('forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
// Route::get('forgot-password/{token}', [UserController::class, 'forgotPasswordValidate']);
// Route::post('forgot-password', [UserController::class, 'resetPassword'])->name('forgot-password');
//
// Route::put('reset-password', [UserController::class, 'updatePassword'])->name('reset-password');

Route::get('perfil/actualizar',['as'=> 'perfil.edit', 'uses' => 'UsuarioController@edit']);
Route::patch('perfil/actualizar',['as'=> 'perfil.update', 'uses' => 'UsuarioController@update']);

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

Route::get('create-pdf-file.{notice:id}', [PDFController::class, 'index']);
// Route::get('create-pdf-file', [PDFController::class, 'index']);

//Dashboard
Route::get('/dashboard', function () {
  if (Auth::user()->hasAnyRole('Admin', 'Cajero','Lecturador')) {
    return view('admins-dashboard');
  } else {
    return view('socios-dashboard');
  }
}) ->middleware(['auth'])->name('dashboard');

//vistas-SOCIO
Route::resource('posts',PostController::class);
Route::get('posts.socios',[PostController::class,'socios']);
Route::PATCH('posts.atendido.{post:id}',[PostController::class,'atendido']);
Route::get('posts.create',[PostController::class,'create']);
Route::post('posted',[PostController::class,'store']);
Route::get('posts.edit.{post:slug}',[PostController::class,'edit']);
Route::get('posts.show.{post:slug}',[PostController::class,'show']);
Route::get('posts.sinAtender',[PostController::class,'sinAtender']);
Route::PATCH('posts.update.{post:slug}',[PostController::class,'update']);
Route::DELETE('posts.delete.{post}',[PostController::class,'destroy']);

Route::get('pendientes', function () {
    return view('notices.pendientes');
});
Route::get('notice.show.last',function(){
  return view('notices.last');
});
Route::get('notice.lastrecibo',function(){
  return view('notices.lastrecibo');
});
Route::get('notices',[NoticeController::class,'index']);
// Route::post('notice.store',[NoticeController::class,'store']);
Route::get('notice.show.{notice:id}',[NoticeController::class,'show']);
// Route::get('notice.edit.pendientes',[NoticeController::class,'edit']);
Route::PATCH('notice.update.{notice:id}',[NoticeController::class,'update']);

//  TODO:clasificacion de meters
Route::get('/meters={meter:id}',function(Meter $meter){
  return view('notice.index',[
    'lecturas'=>$meter->lecturas,
  ]);
});//->name('meter');

//vistas-ADMIN
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
Route::get('taporte.edit.{taporte:id}',[TaporteController::class,'edit']);
Route::PATCH('taporte.update.{taporte:id}',[TaporteController::class,'update']);
Route::DELETE('taporte.delete.{taporte}',[TaporteController::class,'destroy']);

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
