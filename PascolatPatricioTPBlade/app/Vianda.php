<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vianda extends Model {

    //

    protected $fillable = ['nombre', 'descripcion', 'precio', 'vegetariana'];

    public function pedidos() {
        return $this->hasMany('App\Pedido');
    }

}
