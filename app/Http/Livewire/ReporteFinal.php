<?php

namespace App\Http\Livewire;

use App\Models\DetalleSolicitudRepuesto;
use App\Models\estado_solicitud_servicio;
use App\Models\ReporteEstado;
use App\Models\ReporteFinalM;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
class ReporteFinal extends Component
{
    public function render()
    {
        if(Auth::user()->UsuarioRol === 1 ){
            $this->reportes = ReporteEstado::where('email',Auth::user()->email)
            ->where('estado_id',4)->get();
            return view('livewire.reporte-final');
        }else{
            $this->reportes = ReporteEstado::where('estado_id',4)->get();
            return view('livewire.reporte-final');
        }


    }

    public function PDF($title,$id,$idSolicitud){
        $reportes = ReporteEstado::where('title', '=' , $title)->
        where('estado_id',4)->distinct()->get();

        $rep = DetalleSolicitudRepuesto::where('detalle_solicitud_id' , $id)->get();
        $est = estado_solicitud_servicio::where('solicitud_id',$idSolicitud)->distinct()->get();
        $pdf = PDF::loadView('reporte-final',compact('reportes','rep','est'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
