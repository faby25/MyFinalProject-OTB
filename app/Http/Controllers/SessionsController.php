<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
      return view('login.create');
    }
    public function destroy()
    {
      auth()-> logout();
      return redirect('/')->with('success', 'Goodbye!');
    }



  //   function index()
  // {
  //     return view('login');
  // }
  public function store(Request $request)
    {
      //validate Request
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('login/successlogin');
     }
     else
     {
      return back()->with('error', 'E-mail o Username erroneo, intente de nuevo');
     }
}
}
