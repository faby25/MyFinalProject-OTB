<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
class RegisterController extends Controller
{
    public function store()
    {
      // var_dump(request()->all());
      return request()->all();

      // @attributes= request()->validate([
      //   'name'=> 'required|max:255',
      //   'username'=> 'required|min:3|max:255|unique:users,username',
      //   'email'=> 'required|email|max:255|unique:users,email',
      //   'password'=> 'required|min:7|max255',
      //   // 'password'=> ['required','min:7','max:255'];
      // ]);

      // $user =User::create($attributes);
      // auth()->login($user);

      return redirect('/')->with('success','La cuenta ha sido creada exitosamente.');

    }

    public function create()
    {
      return view('register.create');
    }


}
