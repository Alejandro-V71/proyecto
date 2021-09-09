<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;

    //relacion  muchos a muchos detalle soliciutd

    public function detalleSolicitudes(){
        return $this->belongsToMany(DetalleSolicitud::class);
    }
}
