<?php

namespace App\Http\Livewire;

use App\Models\ReporteEstado;
use Livewire\Component;



use Barryvdh\DomPDF\Facade as PDF;

class ReporteEstadoController extends Component
{
    public $reportes,$pdf,$reportePdf;


    public function render()
    {
        $this->reportes = ReporteEstado::all();
        return view('livewire.reporte-estado-controller');
    }

    public function PDF($diagnostico){
        $reportes = ReporteEstado::where('title', '=' , $diagnostico)->get();
        $pdf = PDF::loadView('prueba',compact('reportes'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
