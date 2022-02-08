<?php

namespace App\Http\Controllers;

use App\Models\Tconsumo;
use Illuminate\Http\Request;

class TconsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tconsumos']=Tconsumo::paginate();
        return view('tconsumo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tconsumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosconsumo = request()->except('_token');
        Tconsumo::insert($datosconsumo);
        //return response()->json($datosmulta);
        return redirect('tconsumo');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tconsumo  $tconsumo
     * @return \Illuminate\Http\Response
     */
    public function show(Tconsumo $tconsumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tconsumo  $tconsumo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tconsumo=Tconsumo::findOrFail($id);
        return view('tconsumo.edit', compact('tconsumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tconsumo  $tconsumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosconsumo = request()->except(['_token','_method']);
        Tconsumo::where('id','=',$id)->update($datosconsumo);

        $tconsumo=Tconsumo::findOrFail($id);
        return view('tconsumo.edit', compact('tconsumo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tconsumo  $tconsumo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tconsumo::destroy($id);
        return redirect('tconsumo');
    }
}
