<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    use HasFactory;
    public $table = "solicitud_servicios";
    protected $fillable = [
        'horaSolcitudServicio',
        'fechaSolicitudServicio',
        'descripcionProblema',
        'user_id',
        'title',
        'Start',
        'End',
    ];

    //relacion inversa con la tabla user

    public function user(){
        return $this->belongsTo(User::class);
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
