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
        'start',
        'end',
        'descripcionProblema'
    ];
    //relacion inversa con la tabla user

    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion muchos a muchos

    public function estados(){
        return $this->belongsToMany(Estado::class,'estado_solicitud_servicio','solicitud_id','estado_id');
    }
    //relacion uno a muchos con la tabla detalle de solicitud

    public function detalleSolicitudes(){
        return $this->hasMany(DetalleSolicitud::class);
    }
}
