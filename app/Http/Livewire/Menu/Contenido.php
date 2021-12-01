<?php

namespace App\Http\Livewire\Menu;

use App\Models\estado_solicitud_servicio;
use App\Models\Repuesto;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use App\Models\User;
use Livewire\Component;

class Contenido extends Component
{

    public $solicitudes,$servicios,$repuestos,$es, $estadoEspera, $estadoContizacion,
    $estadoEjecucion,$estadoCuenta
    ;
    public function render()


    {
        $user = User::all()->count();
        $this->solicitudes = SolicitudServicio::all()->count();
        $this->servicios = Servicio::all()->count();
        $this->repuestos = Repuesto::all()->count();

        $this->estadoEspera =estado_solicitud_servicio::where('estado_id',1)->count();
        $this->estadoContizacion =estado_solicitud_servicio::where('estado_id',2)->count();
        $this->estadoEjecucion =estado_solicitud_servicio::where('estado_id',3)->count();
        $this->estadoCuenta =estado_solicitud_servicio::where('estado_id',4)->count();




        return view('livewire.menu.contenido',compact('user'));
    }
}
