<?php

namespace App\Http\Livewire\EstadoSolicitud;

use App\Models\Estado;
use App\Models\estado_solicitud_servicio;
use App\Models\SolicitudServicio;
use Livewire\Component;

class EstadoSolicitudes extends Component
{
    public $solEstados, $fechaIncio, $fechaFin,  $id_estadoSol;
    public $estado_id, $solicitud_id;

    protected $rules = [
        'solicitud_id' => 'required',
        'estado_id' => 'required',
        'fechaIncio' => 'required|date',
        'fechaFin' => 'required|date',
    ];

    protected $messages = [
        'solicitud_id.required' => 'El campo estado de solicitud es obligatorio',
        'estado_id.required' => 'El campo estado es obligatorio',
        'fechaIncio.required' => 'El campo fecha de inicio es obligatorio',
        'fechaFin.required' => 'El campo fecha fin es obligatorio',
    ];

    protected $validationAttributes = [
        'estadoServicio' => 'estado servicio',
        'nombreServicio' => 'nombre servicio',
        'precioTotal' => 'precio total',
        'tipo_de_servicio_id' => 'tipo de servicio id',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $validation =$this->validate();
        estado_solicitud_servicio::create($validation);
    }

    public function render()
    {
        $this->solEstados= estado_solicitud_servicio::all();
        return view('livewire.estado-solicitud.estado-solicitudes', [
            'estados' => Estado::all(),
            'solicitudes' => SolicitudServicio::all()
        ]);
    }

    public function limpiar(){
        $this->fechaIncio='';
        $this->fechaFin='';
    }

    public function store(){
        $this->exampleMode = true;
        estado_solicitud_servicio::updateOrCreate(['id'=>$this->id_estadoSol],
        [
            'solicitud_id'=>$this->solicitud_id,
            'estado_id'=>$this->estado_id,
            'fechaIncio' => $this->fechaIncio,
            'fechaFin' => $this->fechaFin,
        ]);

        //session()->flash('message', 'Estado de solicitud creado correctamente');

        $this->limpiar();

        $this->emit('userGuardar'); // Close model to using to jquery
        $this->emit('createEstado');

    }
    public function editar($id)
    {
        $this->updateMode = true;
        $solEstados = estado_solicitud_servicio::where('id',$id)->first();
        $this->solicitud_id = $solEstados->solicitud_id;
        $this->id_estadoSol = $id;
        $this->estado_id = $solEstados->estado_id;
        $this->fechaIncio = $solEstados->fechaIncio;
        $this->fechaFin = $solEstados->fechaFin;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->limpiar();

    }

    public function update()
    {
        $solEstados = $this->validate([
            'solicitud_id' => 'required',
            'estado_id' => 'required',
            'fechaIncio' => 'required|date',
            'fechaFin' => 'required|date',
        ]);

        if ($this->id_estadoSol) {
            $solEstados = estado_solicitud_servicio::find($this->id_estadoSol);
            $solEstados->update([
                'solicitud_id' => $this->solicitud_id,
                'estado_id' => $this->estado_id,
                'fechaIncio' => $this->fechaIncio,
                'fechaFin' => $this->fechaFin,
            ]);
            $this->updateMode = false;
            //session()->flash('message', 'Estado de solicitud actualizado correctamente');
            $this->limpiar();
            $this->emit('updateEstado');
        }
    }

    public function delete($id)
    {
        if($id){
            estado_solicitud_servicio::where('id',$id)->delete();
            //session()->flash('message', 'Estado de solicitud eliminado correctamente');
            $this->emit('deleteEstado');
        }
    }
}
