<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipo;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('equipos.create');
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
            'nombre'=>'required',
            'latitud'=> 'required',
            'longitud' => 'required',
          ]);
          $equipo = new Equipo([
            'Nombre' => $request->get('nombre'),
            'Latitud'=> $request->get('latitud'),
            'Longitud'=> $request->get('longitud'),
          ]);
          $equipo->save();
          return redirect('/equipos')->with('success', 'Equipo ingresado correctamente');
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
        $equipo = Equipo::find($id);

        return view('equipos.edit', compact('equipo'));
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
            'nombre'=>'required',
            'latitud'=> 'required',
            'longitud' => 'required',
          ]);

          $equipo = Equipo::find($id);
            $equipo->Nombre = $request->get('nombre');
            $equipo->Latitud= $request->get('latitud');
            $equipo->Longitud= $request->get('longitud');
            
          
          $equipo->save();
          return redirect('/equipos')->with('success', 'Equipo actualizado correctamente');
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
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('/equipos')->with('success', 'Equipo eliminado correctamente');
    }
}
