<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = "zona";

    protected $fillable = ['nombre', 'color', 'descripcion'];

    public function coordenadas()
    {
        return $this->hasMany('App\Coordenada');
    }
}
