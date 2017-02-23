<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    protected $table = "coordenada";

    protected $fillable = ['latitud', 'longitud', 'fecha', 'hora', 'zona_id', 'ruta_id'];

    
    public function ruta()   
    {
        return $this->belongsTo('App\Ruta');
    }
    
    public function zona()   
    {
        return $this->belongsTo('App\Zona');
    }
    
}
