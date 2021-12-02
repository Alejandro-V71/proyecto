<?php

namespace App\Http\Livewire;

use App\Models\DetalleSolicitudRepuesto;
use App\Models\ReporteCuentaCobro;
use App\Models\SolicitudServicio;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class ReporteCuentaController extends Component
{
    public function render()
    {

        if(Auth::user()->UsuarioRol === 1 ){
            $this->reportes = ReporteCuentaCobro::where('email',Auth::user()->email)->get();
            return view('livewire.reporte-cuenta-controller');
        }else{

        }
        $this->reportes = ReporteCuentaCobro::all();
        return view('livewire.reporte-cuenta-controller');
    }
    public function PDF($title,$id){
        $reportes = ReporteCuentaCobro::where('title', '=' , $title)->distinct()->get();

        $rep = DetalleSolicitudRepuesto::where('detalle_solicitud_id' , $id)->get();
        $pdf = PDF::loadView('cuenta-cobro',compact('reportes','rep'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
