<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\TipoDeServicio;
use Livewire\WithPagination;

class Servicios extends Component
{
    use WithPagination;

    public $servicios, $id_servicios, $estadoServicio, $nombreServicio, $precioTotal, $tipo_de_servicio_id
    ,$search;

    protected $listeners = ['eliminarServicio','updateServicio','storeServicio'];

    protected $rules = [
        'estadoServicio' => 'required|string|min:5|max:100',
        'nombreServicio' => 'required|string|min:5|max:30|unique:servicios,nombreServicio',
        'precioTotal' => 'required|integer',
        'tipo_de_servicio_id' => 'required',
    ];

    protected $messages = [
        'estadoServicio.required' => 'El campo estado servicio es obligatorio',
        'estadoServicio.min' => 'El campo estado servicio debe tener mínimo 5 caracteres',
        'nombreServicio.required' => 'El campo nombre servicio es obligatorio',
        'nombreServicio.min' => 'El campo nombre servicio debe tener mínimo 5 caracteres',
        'precioTotal.required' => 'El campo precio total es obligatorio',
        'tipo_de_servicio_id.required' => 'El campo tipo de servicio es obligatorio',
    ];

    protected $validationAttributes = [
        'estadoServicio' => 'estado servicio',
        'nombreServicio' => 'nombre servicio',
        'precioTotal' => 'precio total',
        'tipo_de_servicio_id' => 'tipo de servicio id',
    ];

    public $updateMode= false;


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

    public function storeServicio(){

        Servicio::create([
            'estadoServicio' => $this->estadoServicio,
            'nombreServicio' => $this->nombreServicio,
            'precioTotal' => $this->precioTotal,
            'tipo_de_servicio_id' => $this->tipo_de_servicio_id,
        ]);

        $this->limpiar();
        $this->exampleMode = false;
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

    public function updateServicio()
    {
        $user = $this->validate([
            'estadoServicio' => 'required|string|min:5|max:100',
            'nombreServicio' => 'required|string|min:5|max:30|unique:servicios,nombreServicio',
            'precioTotal' => 'required|integer',
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
            $this->limpiar();
        }
    }

    public function eliminarServicio(Servicio $servicio){
       $servicio->delete();
    }

}
