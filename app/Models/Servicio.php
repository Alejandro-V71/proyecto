<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    //relacionoo uno a muchos con la tabla tipo de servicios

    public function tipoServicio(){
        return $this->belongsTo(TipoDeServicio::class,'tipo_de_servicio_id');
    }

    //relacion muchos auno con la tabla detalle de solicitud

    public function detalleSolicitudes(){
        return $this->hasMany(DetalleSolicitud::class);
    }
    

}
