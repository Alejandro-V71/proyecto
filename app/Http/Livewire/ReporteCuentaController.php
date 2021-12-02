<?php

namespace App\Http\Livewire;

use App\Models\ReporteCuentaCobro;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteCuentaController extends Component
{
    public function render()
    {
        $this->reportes = ReporteCuentaCobro::all();
        return view('livewire.reporte-cuenta-controller');
    }
    public function PDF($title){
        $reportes = ReporteCuentaCobro::where('title', '=' , $title)->get();
        $pdf = PDF::loadView('cuenta-cobro',compact('reportes'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
