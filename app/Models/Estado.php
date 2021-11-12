<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function solictudEstados(){
        return $this->hasMany(estado_solicitud_servicio::class);
    }
}
