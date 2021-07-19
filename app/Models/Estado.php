<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //relacion mouchos a muchos

    public function solicitudes(){

        return $this->belongsToMany(SolicitudServicio::class,'estado_solicitud_servicio','estado_id','solicitud_id');
    }
}
