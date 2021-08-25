<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\TipoDeServicio;

class Servicios extends Component
{
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
        $this->servicios= Servicio::all();
        return view('livewire.servicios.servicios', [
        'servicios' => Servicio::all(),
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

    public function deleteSer($id){
        if($id){
            Servicio::where('id',$id)->delete();
            session()->flash('message', 'Servicio eliminado correctamente');
        }
    }

}
