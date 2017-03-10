<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preventista;
use Storage;
use App\Http\Requests;
use Carbon\Carbon;
Use Session;

class Controller_preventista extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $preventistas = Preventista::orderBy('codigo')->get();
        return view('/preventistas/main')->with('preventistas', $preventistas);
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
        $nombreImagen = 'sin imagen';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'preventista_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('preventistas')->put($nombreImagen, \File::get($file));
        }

        $preventista = new Preventista($request->all());
        $preventista->imagen = $nombreImagen;
        $preventista->save();
        Session::flash('message', '¡Se ha registrado a un nuevo preventista con éxito!');
        return redirect()->route('preventistas.index');
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
        $preventista = Preventista::find($id);
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'preventista_' . time() . '.' . $file->getClientOriginalExtension();
            if (Storage::disk('preventistas')->exists($preventista->imagen)) {
                Storage::disk('preventistas')->delete($preventista->imagen);   // Borramos la imagen anterior.      
            }
            $preventista->fill($request->all());
            $preventista->imagen = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('preventistas')->put($nombreImagen, \File::get($file));  // Movemos la imagen nueva al directorio /imagenes/usuarios   
            $preventista->save();
            Session::flash('message', '¡Se ha actualizado la información del preventista con éxito!');
            return redirect()->route('preventistas.index');
        }
        $preventista->fill($request->all());
        $preventista->save();
        Session::flash('message', '¡Se ha actualizado la información del preventista con éxito!');
        return redirect()->route('preventistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
         $preventista = Preventista::find($id);
        if ($preventista->imagen != 'sin imagen') {
            Storage::disk('preventistas')->delete($preventista->imagen); // Borramos la imagen asociada.
        }
        $preventista->delete();
        Session::flash('message', '¡El preventista seleccionado a sido eliminado!');
        return redirect()->route('preventistas.index');
    }

}
