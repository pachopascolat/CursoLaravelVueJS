<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    //

//    protected $table = 'pedidos';
    protected $fillable = ['persona_id', 'vianda_id', 'fecha_solicitud', 'fecha_entrega'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

     public function vianda() {
        return $this->belongsTo('App\Vianda');
    }
}
