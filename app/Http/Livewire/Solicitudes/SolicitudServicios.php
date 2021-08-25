<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\SolicitudServicio;
use App\Models\estado_solicitud_servicio;
use App\Models\Estado;
use App\Models\User;

class SolicitudServicios extends Component
{
    public $solicitudes, $horaSolcitudServicio,
    $fechaSolicitudServicio, $descripcionProblema,
    $id_solicitud, $title, $Start, $End;
    public $user_id;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'user_id' => 'required',
        'horaSolcitudServicio' => 'required',
        'fechaSolicitudServicio' => 'required|date',
        'descripcionProblema' => 'required|min:10',
        'title' => 'required|min:5',
        'Start' => 'required|date',
        'End' => 'required|date',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $validation =$this->validate();
        SolicitudServicio::create($validation);
    }

    public function render()
    {
        $this->solicitudes= SolicitudServicio::all();
        return view('livewire.solicitudes.solicitud-servicios', [
            'users' => User::all()
        ]);
    }

    public function limpiar(){
        $this->horaSolcitudServicio='';
        $this->fechaSolicitudServicio='';
    }

    public function store(){
        $this->exampleMode = true;
        SolicitudServicio::updateOrCreate(['id'=>$this->id_solicitud],
        [
            'user_id' => $this->user_id,
            'horaSolcitudServicio' => $this->horaSolcitudServicio,
            'fechaSolicitudServicio' => $this->fechaSolicitudServicio,
            'descripcionProblema' => $this->descripcionProblema,
            'title' => $this->title,
            'Start' => $this->Start,
            'End' => $this->End,
        ]);

        session()->flash('message', 'Solicitud de servicio creada correctamente');

        $this->limpiar();

        $this->emit('userGuardar'); // Close model to using to jquery

    }
    public function editar($id)
    {
        $this->updateMode = true;
        $solicitudes = SolicitudServicio::where('id',$id)->first();
        $this->id_solicitud = $id;
        $this->user_id = $solicitudes->user_id;
        $this->horaSolcitudServicio = $solicitudes->horaSolcitudServicio;
        $this->fechaSolicitudServicio = $solicitudes->fechaSolicitudServicio;
        $this->descripcionProblema = $solicitudes->descripcionProblema;
        $this->title = $solicitudes->title;
        $this->Start = $solicitudes->Start;
        $this->End = $solicitudes->End;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->limpiar();
    }

    public function update()
    {
        $solicitudes = $this->validate([
            'horaSolcitudServicio' => 'required',
            'fechaSolicitudServicio' => 'required|date',
            'descripcionProblema' => 'required|min:10',
            'title' => 'required|min:5',
            'Start' => 'required|date',
            'End' => 'required|date',
        ]);

        if ($this->id_solicitud) {
            $solicitudes = SolicitudServicio::find($this->id_solicitud);
            $solicitudes->update([
                'horaSolcitudServicio' => $this->horaSolcitudServicio,
                'fechaSolicitudServicio' => $this->fechaSolicitudServicio,
                'descripcionProblema' => $this->descripcionProblema,
                'title' => $this->title,
                'Start' => $this->Start,
                'End' => $this->End,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Solicitud actualizada correctamente');
            $this->limpiar();

        }
    }

    public function delete($id)
    {
        if($id){
            SolicitudServicio::where('id',$id)->delete();
            session()->flash('message', 'Solicitud eliminada correctamente');
        }
    }
}
