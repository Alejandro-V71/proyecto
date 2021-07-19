<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //relacion muchos a uno con la tabla lineas
    public function lineas(){

        return $this->hasMany(Linea::class);
    }

    //relacion uno a mouchos con la tabla motocicleta

    public function motocicletas(){

        return $this->hasMany(Motocicleta::class);
    }
}
