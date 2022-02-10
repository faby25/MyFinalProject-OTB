<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meter;
use App\Models\User;

class MeterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $datos=Meter::all();
      return view('medidores.index',$datos);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('medidores.create');
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
      meter::insert($datosmedidor);
      //return response()->json($datosmulta);
      return redirect('user');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Medidor  $medidor
   * @return \Illuminate\Http\Response
   */
  public function show(Meter $meter)
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

      $datos['meters']=Meter::all();
      //return view('medidor.index',$datos);
      return view('medidores.index', compact('user'),$datos);

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
      meter::where('id','=',$id)->update($datosmedidor);

      $meter=Meter::findOrFail($id);
      return view('medidores.edit', compact('meter'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Medidor  $medidor
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Meter::destroy($id);
      return redirect('medidores');
  }
}
