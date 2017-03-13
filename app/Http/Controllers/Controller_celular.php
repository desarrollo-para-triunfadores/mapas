<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Celular;
use App\Http\Requests;
Use Session;

class Controller_celular extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $celulares = Celular::orderBy('serial')->get();
        return view('/celulares/main')->with('celulares', $celulares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $celular = new Celular($request->all());
        $celular->save();
        Session::flash('message', '¡Se ha registrado a un nuevo celular con éxito!');
        return redirect()->route('celulares.index');
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
        $celular = Celular::find($id);
        $celular->fill($request->all());
        $celular->save();
        Session::flash('message', '¡Se ha actualizado la información del registro con éxito!');
        return redirect()->route('celulares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $celular = Celular::find($id);
        $celular->delete();
        Session::flash('message', '¡El registro seleccionado a sido eliminado!');
        return redirect()->route('celulares.index');
    }

}
