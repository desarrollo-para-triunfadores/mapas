<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'imagen', 'password'
    ];

    public function configuracion() {
        return $this->hasOne('App\Configuracion');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function colores_sistema() {
        $color = "";

        switch ($this->configuracion->color) {
            case'skin-blue':
                $color = "bg-primary";
                break;
             case 'skin-black'  :
                $color = "bg-gray-active";
                break;
            case 'skin-purple'  :
                $color = "bg-purple-active";
                break;
             case 'skin-green' :
                $color = 'bg-green-active' ;
                break;
             case  'skin-red' :
                $color = 'bg-red-active';
                break;
             case 'skin-yellow' :
                $color = 'bg-yellow-active';
                break;                        
            case'skin-blue-light':
                $color = "bg-primary";
                break;
             case 'skin-black-light' :
                $color = "bg-gray-active";
                break;
            case  'skin-purple-light' :
                $color = "bg-purple-active";
                break;
             case 'skin-green-light':
                $color = 'bg-green-active' ;
                break;
             case   'skin-red-light':
                $color = 'bg-red-active';
                break;
             case  'skin-yellow-light':
                $color = 'bg-yellow-active';
                break;
        }
        return $color;
    }

}
