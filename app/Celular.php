<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
    protected $table = "celular";

    protected $fillable = ['serial', 'marca', 'modelo'];

    public function rutas()
    {
        return $this->hasMany('App\Ruta');
    }
}
