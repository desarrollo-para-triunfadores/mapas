<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model {

    protected $table = "configuracion";
    protected $fillable = ['latitud', 'longitud', 'zoom', 'color', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
