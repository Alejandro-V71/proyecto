<?php

namespace App\Http\Livewire;

use App\Models\estado_solicitud_servicio;
use App\Models\ReporteEstado;
use App\Models\SolicitudServicio;
use Livewire\Component;



use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class ReporteEstadoController extends Component
{
    public $reportes,$pdf,$reportePdf;

    public  $idSolicitud,$idEstado;
    public function render()
    {

        if(Auth::user()->UsuarioRol === 1 ){



                        $this->reportes = ReporteEstado::where('email',Auth::user()->email)->
                        where('estado_id',2)->get();
                        return view('livewire.reporte-estado-controller');





        }else{


            $this->reportes = ReporteEstado::where('estado_id',2)->get();
            return view('livewire.reporte-estado-controller');
        }

    }

    public function PDF($title,$estado){
        $reportes = ReporteEstado::where('title', '=' , $title)->
        where('estado_id',$estado)->distinct()->get();
        $pdf = PDF::loadView('prueba',compact('reportes'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
