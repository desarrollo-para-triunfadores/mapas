<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preventista extends Model
{
    protected $table = "preventista";

    protected $fillable = ['nombre', 'apellido', 'dni', 'color', 'imagen'];

    public function rutas()
    {
        return $this->hasMany('App\Ruta');
    }
}
