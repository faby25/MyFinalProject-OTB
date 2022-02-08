<?php

namespace App\Http\Controllers;

use App\Models\Tmulta;
use CreateTmultasTable;
use Illuminate\Http\Request;

class TmultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['tmultas']=Tmulta::paginate();
        return view('tmulta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tmulta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosmulta = request()->except('_token');
        Tmulta::insert($datosmulta);
        //return response()->json($datosmulta);
        return redirect('tmulta');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function show(Tmulta $tmulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tmulta=Tmulta::findOrFail($id);
        return view('tmulta.edit', compact('tmulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $datosmulta = request()->except(['_token','_method']);
            Tmulta::where('id','=',$id)->update($datosmulta);

            $tmulta=Tmulta::findOrFail($id);
            return view('tmulta.edit', compact('tmulta'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tmulta::destroy($id);
        return redirect('tmulta');
    }
} 
