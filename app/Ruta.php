<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model {

    protected $table = "ruta";
    protected $fillable = ['fecha_inicio', 'hora_inicio', 'fecha_fin', 'hora_fin', 'celular_id', 'preventista_id'];

    public function celular() {
        return $this->belongsTo('App\Celular');
    }

    public function preventista() {
        return $this->belongsTo('App\Preventista');
    }

    public function coordenadas() {
        return $this->hasMany('App\Coordenada');
    }

    function distancia_entre_coordenadas($lat1, $lon1, $lat2, $lon2, $unit) {

        $radius = 6378.137; // //Radio de la tierra en km
        $dlon = $lon1 - $lon2;
        $distance = acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($dlon))) * $radius;

        if ($unit == "KM") {
            return ($distance);
        } else if ($unit == "M") {
            return ($distance * 1000);
        } else if ($unit == "CM") {
            return ($distance * 100000);
        } else {
            return 0;
        }
    }

    function distancia_ruta() {
        $distancia = 0;
        for ($i = 0; $i < count($this->coordenadas) - 1; $i++) {
            $distancia = $distancia + $this->distancia_entre_coordenadas($this->coordenadas[$i]->latitud, $this->coordenadas[$i]->longitud, $this->coordenadas[$i + 1]->latitud, $this->coordenadas[$i + 1]->longitud, "KM");
        }
        return $distancia;
    }

}
