<?php

namespace App\Http\Livewire;

use App\Models\DetalleSolicitudRepuesto;
use App\Models\ReporteCuentaCobro;
use App\Models\ReporteEstado;
use App\Models\SolicitudServicio;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class ReporteCuentaController extends Component
{
    public function render()
    {
        //Que pasa si el rol es cliente
        if(Auth::user()->UsuarioRol === 1 ){
            //se valida que el usuario en sesion sea el correcto y que el estado sea cuenta
            //de cobro
            $this->reportes = ReporteEstado::where('email',Auth::user()->email)
            ->where('estado_id',4)->get();
            return view('livewire.reporte-cuenta-controller');
        }else{

        }
        //si el rol es asesor se muestran todo pero el estado sea cuenta cobro
        $this->reportes = ReporteEstado::where('estado_id',4)->get();
        return view('livewire.reporte-cuenta-controller');
    }
    public function PDF($title,$id,$estado){
        //se trae el reporte que cumpla con las dos condiciones
        $reportes = ReporteEstado::where('title', '=' , $title)->
        where('estado_id',$estado)->distinct()->get();

        $rep = DetalleSolicitudRepuesto::where('detalle_solicitud_id' , $id)->get();
        $pdf = PDF::loadView('cuenta-cobro',compact('reportes','rep'));
        return $pdf->setPaper('A3','portrait')->stream('invoice.pdf');
    }
}
