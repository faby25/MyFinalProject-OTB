<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('posts.index',['posts'=>Post::paginate(10)] )//compact('posts')
            ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view ('posts.create', compact('post'));
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
     const EXCERPT_LENGTH = 100;
    public function store(Request $request)
    {
        $post = new Post;
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title);//$request->slug;
        $post->excerpt = Str::limit($request->body, 350);//$request->excerpt;
        if (isset($request['thumbnail'])) {
          $post->thumbnail =request()->file('thumbnail')->store('thumbnails');
        }
        $post->save(); // Post::create($attributes);
        return redirect('posts')
            ->with('success', 'El post fue creado exitosamente.');
    }
      // public function store()
      // {
      //   // $path=request()->file('thumbnail')->store('thumbnails');
      //   //      ddd(request()->file('thumbnail'));
      //      $attributes = request()->validate([
      //        'title' =>'required',
      //        'thumbnail'=>'required',
      //        'slug'=>'required',
      //         // Rule::unique('posts','slug')],
      //        'excerpt' =>'required',
      //        'body'=>'required',
      //        'category_id' =>'required',
      //        // Rule::exists('categories','id')]
      //      ]);
      //      $attributes['user_id']=auth()->id();
      //       $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
      //      Post::create($attributes);
      //      return redirect('/posts')->with('success', 'Post created successfully.');
      //    }
    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));// $post = Post::find($id);
    }
    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);// return view('posts.edit')->with('post',$post);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $datos = request()->except(['_token','_method']);
        $datos['slug'] = Str::slug($request->title);
        $datos['excerpt'] = Str::limit($request->body, 350);

        if (isset($datos['thumbnail'])) {
            $datos['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }

        Post::where('id','=',$post->id)->update($datos);
        $post=Post::findOrFail($post->id);
        return redirect('posts')->with('success', 'El post fue actualizado exitosamente.');
    }
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'El post fue borrado exitosamente');
    }

    protected function validatePost(?Post $post =null ):array
    {
      $post ??= new Post();// $post=new Post();
      return request()->validate([
             'title' =>'required',
             'thumbnail'=>'required',
             // [    'thumbnail'=>$post->exists ? ['image']:['required','image'],
             'slug'=>'required',
             // $post->update(['slug' => $post->title]),
              // Rule::unique('posts','slug')],
              // Rule::exists('categories','id')]->ignore($post->id)
             'excerpt' =>'required',
             'body'=>'required',
             'category_id' =>'required', // Rule::exists('categories','id')]
       ]);
    }
}
