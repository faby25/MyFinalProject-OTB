<?php

namespace App\Http\Controllers;

use App\Models\Taporte;
use Illuminate\Http\Request;

/**
 * Class TaporteController
 * @package App\Http\Controllers
 */
class TaporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taportes = Taporte::paginate();

        return view('taportes.index', compact('taportes'))
            ->with('i', (request()->input('page', 1) - 1) * $taportes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taporte = new Taporte();
        return view('taportes.create', compact('taporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Taporte::$rules);

        $taporte = Taporte::create($request->all());

        return redirect()->route('taportes.index')
            ->with('success', 'Taporte created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taporte = Taporte::find($id);

        return view('taportes.show', compact('taporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taporte = Taporte::find($id);

        return view('taportes.edit', compact('taporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Taporte $taporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taporte $taporte)
    {
        request()->validate(Taporte::$rules);

        $taporte->update($request->all());

        return redirect()->route('taportes.index')
            ->with('success', 'Taporte updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $taporte = Taporte::find($id)->delete();

        return redirect()->route('taportes.index')
            ->with('success', 'Taporte deleted successfully');
    }
}
