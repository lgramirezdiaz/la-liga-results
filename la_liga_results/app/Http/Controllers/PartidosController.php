<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\partido;

class PartidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();

        return view('partidos.index', compact('partidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partidos.create');
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
        $request->validate([
            'jornada'=>'required',
            'fecha'=> 'required|date',
            'local' => 'required',
            'visita' => 'required',
            'goles_local' => 'required|integer',
            'goles_visita' => 'required|integer',
          ]);
          $partido = new Partido([
            'Jornada' => $request->get('jornada'),
            'Fecha'=> $request->get('fecha'),
            'Local'=> $request->get('local'),
            'Visita'=> $request->get('visita'),
            'GolesLocal'=> $request->get('goles_local'),
            'GolesVisita'=> $request->get('goles_visita')
          ]);
          $partido->save();
          return redirect('/partidos')->with('success', 'Partido ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
        $partido = Partido::find($id);

        return view('partidos.edit', compact('partido'));
    }

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
        $request->validate([
            'jornada'=>'required',
            'fecha'=> 'required|date',
            'local' => 'required',
            'visita' => 'required',
            'goles_local' => 'required|integer',
            'goles_visita' => 'required|integer',
          ]);

          $partido = Partido::find($id);
            $partido->Jornada = $request->get('jornada');
            $partido->Fecha= $request->get('fecha');
            $partido->Local= $request->get('local');
            $partido->Visita= $request->get('visita');
            $partido->GolesLocal= $request->get('goles_local');
            $partido->GolesVisita= $request->get('goles_visita');
          
          $partido->save();
          return redirect('/partidos')->with('success', 'Partido actualizado correctamente');
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
        $partido = Partido::find($id);
        $partido->delete();
        return redirect('/partidos')->with('success', 'Partido eliminado correctamente');
    }
}
