<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use App\Coordenada;
use App\Http\Requests;
use Carbon\Carbon;
Use Session;

class Controller_zona extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $zonas = Zona::all();
        return view('/zonas/main')->with('zonas', $zonas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        if ($request->ajax()) {
            $zona = new Zona($request->all());

            if (!$request->descripcion) {
                $zona->descripcion = "No se registró una descripción de la zona";
            }

            $zona->save();
            $vertices = $request->vertices;

            foreach ($vertices as $punto) {
                $coordenada = new Coordenada();
                $coordenada->latitud = $punto ['lat'];
                $coordenada->longitud = $punto['lng'];
                $coordenada->zona_id = $zona->id;
                $coordenada->save();
            }
            return response()->json(json_encode('1', true));
        } else {
            return view('/zonas/alta');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return response()->json("¡La venta fue registrada con éxito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $zona = Zona::find($id);
        $zona->fill($request->all());
        $zona->save();
        Session::flash('message', '¡Se ha actualizado la información de la zona con éxito!');
        return redirect()->route('zonas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {        
        $zona = Zona::find($id);
        $zona->delete();
        Session::flash('message', '¡La zona seleccionada a sido eliminada!');
        return redirect()->route('zonas.index');
    }

}
