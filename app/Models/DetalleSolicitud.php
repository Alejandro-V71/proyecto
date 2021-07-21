<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitud extends Model
{
    use HasFactory;

    // relacion uno a muchos con la tabla servicio

    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }

    //relacion uno a muochos con la tabla solicitud de srvicio

    public function solicitudServicio(){
        return $this->belongsTo(SolicitudServicio::class);
    }

    //relacion muchos a muchos con repouesto

    public function repuestos(){
        return $this->belongsToMany(Repuesto::class);
    }
}
