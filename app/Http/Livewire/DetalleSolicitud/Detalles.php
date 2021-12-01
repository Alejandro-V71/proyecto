<?php

namespace App\Http\Livewire\DetalleSolicitud;

use App\Models\DetalleSolicitud;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use App\Models\TipoDeServicio;
use Livewire\Component;

class Detalles extends Component
{
    public $detalles, $diagnostico, $id_detalles;
    public $solicitud_servicio_id, $servicio_id;

    protected $rules = [
        'diagnostico' => 'required|string|min:5|max:500',
        'solicitud_servicio_id' => 'required',
        'servicio_id' => 'required',
    ];

    protected $listeners = ['eliminarDetalle'];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $validation =$this->validate();
        DetalleSolicitud::create($validation);
    }

     public function limpiar(){
        $this->diagnostico='';
    }

    public function render()
    {
        $this->detalles= DetalleSolicitud::all();
        return view('livewire.detalle-solicitud.detalles', [
            'solicitudes' => SolicitudServicio::all(),
            'servicios' => Servicio::all()
        ]);
    }

    public function store(){
        $this->exampleMode = true;
        DetalleSolicitud::updateOrCreate(['id'=>$this->id_detalles],
        [
            'diagnostico' => $this->diagnostico,
            'solicitud_servicio_id'=> $this->solicitud_servicio_id,
            'servicio_id'=>$this->servicio_id,

        ]);

        $this->limpiar();

        $this->emit('userGuardar'); // Close model to using to jquery

    }

    public function editar($id)
    {
        $this->updateMode = true;
        $detalles = DetalleSolicitud::where('id',$id)->first();
        $this->id_detalles = $id;
        $this->diagnostico = $detalles->diagnostico;
        $this->solicitud_servicio_id = $detalles->solicitud_servicio_id;
        $this->servicio_id = $detalles->servicio_id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->limpiar();

    }

    public function update()
    {
        $user = $this->validate([
            'diagnostico' => 'required|string|min:5|max:500',
            'solicitud_servicio_id' => 'required',
            'servicio_id' => 'required',
        ]);

        if ($this->id_detalles) {
            $detalles = DetalleSolicitud::find($this->id_detalles);
            $detalles->update([
                'diagnostico' => $this->diagnostico,
                'solicitud_servicio_id' => $this->solicitud_servicio_id,
                'servicio_id' => $this->servicio_id,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Usuario actualizado correctamente');
            $this->limpiar();

        }
    }


    public function eliminarDetalle(DetalleSolicitud $id)
    {
        /*if($id){
            DetalleSolicitud::where('id',$id)->delete();
            session()->flash('message', 'Servicio eliminado correctamente');
        }*/
        $id->delete();
    }

}
