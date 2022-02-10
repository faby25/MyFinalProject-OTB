<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectura;
use App\Models\Meter;
use App\Models\Tconsumo;
use App\models\User;
use App\models\Notice;
use Carbon\Carbon;

/**
 * Class LecturaController
 * @package App\Http\Controllers
 */
class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //$lecturas = Lectura::paginate();
        $datos[]=Meter::all();
        // $datos=Meter::all();
        return view('lecturas.index',$datos);
        // return view('lectura.index', compact('lecturas'))
        //     ->with('i', (request()->input('page', 1) - 1) * $lecturas->perPage());
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tconsumos=Tconsumo::first();
        $meter=Meter::find($id);
        $consulta=Lectura::where("meter_id","=",$id);
        if($consulta->count()>0)
        {
            $lect=Lectura::where("meter_id","=",$id)->orderby('id', 'desc')->first();
        }
        else
        {
            $var= new Lectura();
            $var->meter_id = $id;
            $var->lectura = 0;
            $var->consumo = 0;
            $var->save();

            return redirect('lectura');
        }
        return view('lecturas.create',compact('tconsumos','meter','lect'));
    }

    public function store(Request $request)
    {
        $var1 = $request->lectura;
        $var2 = $request->ulect;
        $consumo = $var1 - $var2;

        $lect = new Lectura();
        $lect->meter_id = $request->meter_id;
        $lect->lectura = $request->lectura;
        $lect->consumo = $consumo;

        $lect->save();

        $notice = new Notice;
        $notice->pagado = 0;
        $notice->lectura_id = $lect->id;
        $notice->detalle = $request->detalle;
        $notice->total = $consumo;
        $notice->created_at =Carbon::now();
        $notice->fechaVencimiento =  Carbon::now()->addWeeks(2);

        $notice->save();
        return redirect('lectura');
        // return view('notices.create',compact('notice','lect'));
    }
    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lectura = Lectura::find($id);
        return view('lecturas.show', compact('lectura'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Lectura::where('meter_id','=',$id);

        /* $users=User::select('medidors.id','users.name as nombre','users.lastnameM','users.lastnameF')
                   ->join('medidors','users.id','=','medidors.user_id')->where('medidors.id','=',$id); */
        // return view('lectura.edit', compact('lectura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lectura $lectura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lectura $lectura)
    {
        request()->validate(Lectura::$rules);
        $lectura->update($request->all());
        return redirect()->route('lecturas.index')
            ->with('success', 'Lectura updated successfully');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lectura = Lectura::find($id)->delete();

        return redirect()->route('lecturas.index')
            ->with('success', 'Lectura deleted successfully');
    }
}
