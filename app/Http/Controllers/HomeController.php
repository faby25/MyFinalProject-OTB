<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    // se escriben metodos para administrar rutas
    // public function_invoke(){
    //    // return "Bienvenido a la pagina principal";
    // }
    public function store(){
      // $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
      $path = request()->file('thumbnail')->store('thumbnails');
      return 'Done: '.$path;
    }
    public function index()
    {
       return view('home.index',[
         // 'posts'=>$this->getPosts(),
         'posts'=>Post::latest()->filter(request(['search','category','user']))->get(),
       ]);
    }
    public function show(Post $post)
    {
      return view('home.show',[
        'post'=>$post
      ]);
    }

    protected function getPosts()
    {
      $posts=Post::latest();
      if(request('search')){
        $posts
           ->where('title','like','%'.request('search').'%')
           ->orWhere('body','like','%'.request('search').'%');
      }
      return $posts->get();
    }
}
