<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //relacion uno a muchos con la tabla motocicleta

    public function motocicletas()
    {
        return $this->hasMany(Motocicleta::class);
    }

    //Relacion uno a muchos
    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }

    //relacion muchos a muchos
    public function marcas()
    {
        return $this->belongsToMany(Marca::class);
    }
}
