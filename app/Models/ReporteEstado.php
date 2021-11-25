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
        'title',
        'horaSolicitudServicio',
        'descripcionProblema',
        'start',
        'end',
        'diagnostico',
        'nombreServicio',
        'precioTotal'
    ];
    use HasFactory;
}
