<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Zona;
use App\Ruta;
use Carbon\Carbon;

class HomeController extends Controller {

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $zonas = Zona::all();
        $rutas = Ruta::all();
        return view('/recorridos/main')
                        ->with('zonas', $zonas)
                        ->with('rutas', $rutas);
    }

}
