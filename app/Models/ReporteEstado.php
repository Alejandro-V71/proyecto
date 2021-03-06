<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteEstado extends Model
{
    protected $table="reporteestado";
    public $timestamps = false;

    protected $fillable = [


        'placaMotocicleta',
        'colorMotocicleta',
        'cilindraje',
        'kilometraje',
        'nombreLinea',
        'nombreMarca',
        'name',
        'email',
        'solicitud_id',
        'title',
        'horaSolicitudServicio',
        'descripcionProblema',
        'start',
        'end',
        'diagnostico',
        'nombreServicio',
        'precioTotal',
        'estado_id',
        'detalle_solicitud_id'
    ];
    use HasFactory;
}
