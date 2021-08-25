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

    public $servicios, $id_servicios, $estadoServicio, $nombreServicio, $precioTotal, $tipo_de_servicio_id;

    protected $rules = [
        'estadoServicio' => 'required|min:5',
        'nombreServicio' => 'required|min:5',
        'precioTotal' => 'required',
        'tipo_de_servicio_id' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $validation =$this->validate();
        Servicio::create($validation);
    }

     public function limpiar(){
        $this->diagnostico='';
    }

    public function render()
    {
        $this->detalles= DetalleSolicitud::all();
        $this->servicios= Servicio::all();
        return view('livewire.detalle-solicitud.detalles', [
            'servicios' => Servicio::all(),
            'solicitudes' => SolicitudServicio::all(),
            'tiServicios' => TipoDeServicio::all()
        ]);
    }

    public function guardar(){
        $this->exampleMode = true;
        Servicio::updateOrCreate(['id'=>$this->id_servicios],
        [
            'estadoServicio' => $this->estadoServicio,
            'nombreServicio' => $this->nombreServicio,
            'precioTotal' => $this->precioTotal,
            'tipo_de_servicio_id' => $this->tipo_de_servicio_id,
        ]);

        $this->emit('userGuardar'); // Close model to using to jquery

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

    public function editarr($id)
    {
        $this->updateMode = true;
        $servicios = Servicio::where('id',$id)->first();
        $this->id_servicios = $id;
        $this->estadoServicio = $servicios->estadoServicio;
        $this->nombreServicio = $servicios->nombreServicio;
        $this->precioTotal = $servicios->precioTotal;
        $this->tipo_de_servicio_id = $servicios->tipo_de_servicio_id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->limpiar();

    }

    public function update()
    {
        $user = $this->validate([
            'diagnostico' => 'required|min:10',
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

    public function updatee()
    {
        $user = $this->validate([
            'estadoServicio' => 'required|min:5',
            'nombreServicio' => 'required|min:5',
            'precioTotal' => 'required',
            'tipo_de_servicio_id' => 'required',
        ]);

        if ($this->id_servicios) {
            $servicios = Servicio::find($this->id_servicios);
            $servicios->update([
                'estadoServicio' => $this->estadoServicio,
                'nombreServicio' => $this->nombreServicio,
                'precioTotal' => $this->precioTotal,
                'tipo_de_servicio_id' => $this->tipo_de_servicio_id,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Usuario actualizado correctamente');
            $this->limpiar();

        }
    }

    public function delete($id)
    {
        if($id){
            DetalleSolicitud::where('id',$id)->delete();
            session()->flash('message', 'Servicio eliminado correctamente');
        }
    }

    public function deleteSer($id){
        if($id){
            Servicio::where('id',$id)->delete();
            session()->flash('message', 'Servicio eliminado correctamente');
        }
    }
}
