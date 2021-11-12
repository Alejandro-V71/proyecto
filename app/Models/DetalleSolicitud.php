<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitud extends Model
{
    use HasFactory;
    public $table = "detalle_solicituds";
    protected $fillable = [
        'id',
        'diagnostico',
        'solicitud_servicio_id',
        'servicio_id',
    ];

    // relacion muchos a uno con la tabla servicio

    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicio_id')->withDefault();
    }

    //relacion uno a muchos con la tabla solicitud de srvicio

    public function solicitudServicio(){
        return $this->belongsTo(SolicitudServicio::class, 'solicitud_servicio_id')->withDefault();
    }

    //relacion muchos a muchos con repouesto

    public function repuestos(){
        return $this->belongsToMany(Repuesto::class, 'detalle_solicitud_repuesto')->withTimestamps();
    }
}
