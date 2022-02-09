<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Notice;
use App\Models\Lectura;
use App\Models\Meter;
use App\Models\Tmulta;
/**
 * Class NoticeController
 * @package App\Http\Controllers
 */
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notices = Notice::paginate();

        return view('notices.index');
            // ->with('i', (request()->input('page', 1) - 1) * $notices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notice = new Notice();
        return view('notices.create', compact('notice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Notice::$rules);
        $notice = Notice::create($request->all());
        return redirect()->route('notices.index')
            ->with('success', 'Notice created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);

        return view('notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);

        return view('notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $datos = request()->except(['_token','_method']);

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        // $datos['multaMorosidad'] = $request->$multa;
        if ($notice->fechaVencimiento > $date) {
          $datos['multaMorosidad'] = 0;
        } else {
          if ($notice->pagado) {
            $datos['multaMorosidad'] =$notice->multaMorosidad;
          } else {
            $tmultas=Tmulta::all();
            $datos['multaMorosidad'] = $tmultas['0']["monto"];
          }
        }

        $datos['pagado'] = 1;
        Notice::where('id','=',$notice->id)->update($datos);
        $notice=Notice::findOrFail($notice->id);

        return view('notices.show', compact('notice'))
            ->with('success', 'Notice updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $notice = Notice::find($id)->delete();

        return redirect()->route('notices.index')
            ->with('success', 'Notice deleted successfully');
    }
}
