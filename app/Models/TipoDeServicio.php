<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;

class TipoDeServicio extends Model
{
    protected $table="tipo_de_servicios";
    use HasFactory;

    //relacion  muchos a uno con la tabla servicios

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
