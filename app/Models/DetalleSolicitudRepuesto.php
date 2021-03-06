<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudRepuesto extends Model
{
    use HasFactory;

    protected $table="detalle_solicitud_repuesto";
    public $timestamps = false;
    //relacion de uno a muchos
    public function detalleSol(){
        return $this->belongsTo(DetalleSolicitud::class);
    }

    public function Repuesto(){
        return $this->belongsTo(Repuesto::class);
    }
}
