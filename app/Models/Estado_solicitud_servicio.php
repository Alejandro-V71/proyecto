<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_solicitud_servicio extends Model
{
    use HasFactory;
    public $table = "estado_solicitud_servicio";
    protected $fillable = [
        'fechaIncio',
        'fechaFin',
        'solicitud_id',
        'estado_id',
    ];

    //relacion uno a muchos inversa
    public function solicitudServicio(){
        return $this->belongsTo(SolicitudServicio::class, 'solicitud_id')->withDefault();
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
