<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\multa;
use App\Models\Tmulta;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
       {
           $datos ['users'] = User::where("is_admin","=",0)->paginate();
           return view('mreunion.index',$datos);
       }
      public function create()
       {
           return view('mreunion.create');
       }
       public function store(Request $request)
       {
           $var2= 2;

           $mult = new multa();
           $mult->user_id = $request->user_id;
           $mult->tmulta_id = $var2;
           $mult->descripcion = $request->descripcion;

           $mult->save();

           return redirect('mreunion');
       }

       public function edit($id)
       {
           $datos['users']=User::find($id);
           return view('mreunion.create',$datos);
       }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
