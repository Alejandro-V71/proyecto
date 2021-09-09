<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'horaSolcitudServicio',
        'fechaSolicitudServicio',
        'user_id',
        'Start',
        'End',
        'descripcionProblema',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    //relacion de uno a muchos con la tabla solicitud estado
    public function solictudEstados(){
        return $this->hasMany(estado_solicitud_servicio::class);
    }
    //relacion uno a muchos con la tabla detalle de solicitud

    public function detalleSolicitudes(){
        return $this->hasMany(DetalleSolicitud::class);
    }
}
