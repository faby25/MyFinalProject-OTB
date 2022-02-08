<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use App\Models\User;
use Illuminate\Http\Request;

class MedidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
        $datos['medidors']=Medidor::all();
        return view('medidor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medidor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosmedidor = request()->except('_token');
        medidor::insert($datosmedidor);
        //return response()->json($datosmulta);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medidor  $medidor
     * @return \Illuminate\Http\Response
     */
    public function show(Medidor $medidor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medidor  $medidor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
     
        $datos['medidors']=Medidor::all();
        //return view('medidor.index',$datos);
        return view('medidor.index', compact('user'),$datos);

        //$medidor=Medidor::findOrFail($id);
        //return view('medidor.edit', compact('medidor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medidor  $medidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosmedidor = request()->except(['_token','_method']);
        medidor::where('id','=',$id)->update($datosmedidor);

        $medidor=Medidor::findOrFail($id);
        return view('medidor.edit', compact('medidor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medidor  $medidor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medidor::destroy($id);
        return redirect('medidor');
    }
}
