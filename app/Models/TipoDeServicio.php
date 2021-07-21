<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeServicio extends Model
{
    use HasFactory;

    //relacion  muchos a uno con la tabla servicios

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
