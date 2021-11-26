<?php

namespace App\Http\Livewire\Solicitudes;

use App\Models\DetalleSolicitud;
use Livewire\Component;
use App\Models\SolicitudServicio;
use App\Models\estado_solicitud_servicio;
use App\Models\Estado;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Repuesto;
use Exception;
use Livewire\WithPagination;
use JeroenNoten\LaravelAdminLte\Components\Widget\Alert;

class SolicitudServicios extends Component
{
    public
    $solicitudes, $horaSolcitudServicio,
    $fechaSolicitudServicio, $descripcionProblema,
    $id_solicitud, $title, $Start, $End, $detalles,
    $user_id, $detalle, $detalleSolicitud,$detalleRepuesto,
   $id_detalles, $diagnostico, $solicitud_servicio_id, $servicio_id,
   $idRepuesto,$neumatico;

   use WithPagination;

   public $search = "";

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'user_id' => 'required',
        'horaSolcitudServicio' => 'required',
        'descripcionProblema' => 'required|min:10',
        'title' => 'required|min:5',
        'Start' => 'required|date',
        'End' => 'required|date',
    ];

    protected $messages = [
        'user_id.required' => 'El campo usuario es obligatorio',
        'horaSolcitudServicio.required' => 'El campo hora solicitud servicio es obligatorio',
        'descripcionProblema.required' => 'El campo descripcion problema es obligatorio',
        'descripcionProblema.min' => 'El campo descripcion debe tener mínimo 10 caracteres',
        'title.required' => 'El campo título es obligatorio',
        'title.min' => 'El campo título deben tener mínimo 5 caracteres',
        'Start.required' => 'El campo comienzo es obligatorio y es únicamente de tipo fecha',
        'End.required' => 'El campo fin es obligatorio y es únicamente de tipo fecha',
    ];

    protected $validationAttributes = [
        'user_id' => 'Usuario',
        'horaSolcitudServicio' => 'Hora solicitud',
        'descripcionProblema' => 'descripcion',
        'title' => 'titulo',
        'Start' => 'comienzo',
        'End' => 'fin',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName,[
            'user_id' => 'required',
        'horaSolcitudServicio' => 'required',
        'descripcionProblema' => 'required|min:10',
        'title' => 'required|min:5',
        'Start' => 'required|date|after_or_equal:yesterday',
        'End' => 'required|date|after_or_equal:Start',
            'diagnostico' => 'required',
            'solicitud_servicio_id' => 'required',
            'servicio_id' => 'required',
        ]);
    }

    public function save(){
        $validation =$this->validate();
        SolicitudServicio::create($validation);
    }

    public function render()
    {

        $this->solicitudes= SolicitudServicio::all();
        $this->detalles = DetalleSolicitud::all();
        $this->detalle = DetalleSolicitud::all();
        return view('livewire.solicitudes.solicitud-servicios', [
            'users' => User::all(),
            'solicitudes' => SolicitudServicio::all(),
            'servicios' => Servicio::all(),
            'repuestos' => Repuesto::all(),
        ]);
    }

    public function Detalle($id)
    {
        $this->detalleSolicitud = DetalleSolicitud::where('solicitud_servicio_id',$id)->get();
        return view('livewire.detalle-solicitud.detalleModal', [
            'solicitudes' => SolicitudServicio::all(),
            'servicios' => Servicio::all(),
            'repuestos' => Repuesto::all(),
        ]);
    }

    public function storeDetalle(){
        $this->exampleMode = true;
        $validatedData = $this->validate(

            ['diagnostico' => 'required',
            'solicitud_servicio_id' => 'required',
            'servicio_id' => 'required',],
            [
                'diagnostico.required' => 'El campo diagnostico es obligatorio',
                'diagnostico.min' => 'El campo diagnostico debe tener mínimo 10 caracteres',
                'solicitud_servicio_id.required' => 'El campo solicitud servicio es obligatorio',
                'servicio_id.required' => 'El campo servicio es obligatorio',
            ],

            ['diagnostico' => 'diagnostico',
            'solicitud_servicio_id' => 'solicitud_servicio_id',
            'servicio_id' => 'servicio_id',
            ]

    );

        try{
          $algo= DetalleSolicitud::updateOrCreate(['id'=>$this->id_detalles],
        [
            'diagnostico' => $this->diagnostico,
            'solicitud_servicio_id'=> $this->solicitud_servicio_id,
            'servicio_id'=>$this->servicio_id,

        ]);

        $idDetalle=$this->id_detalles;
        $algo->repuestos()->attach($this->idRepuesto);

        $this->limpiar();

        $this->emit('guardarD');
        $this->emit('userGuardar'); // Close model to using to jquery
        } catch(Exception $e){
            return $e;
       }


    }


    public function show($id)
    {
        $this->updateMode = true;
        $detalles = DetalleSolicitud::where('id',$id)->first();
        $this->id_detalles = $id;
        $this->diagnostico = $detalles->diagnostico;
        $this->solicitud_servicio_id = $detalles->solicitud_servicio_id;
        $this->servicio_id = $detalles->servicio_id;
    }



    public function updateDetalle()
    {
        $detalles = $this->validate([
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
            //updateExistingPivot
            $detalles->repuestos()->sync($this->idRepuesto);

            $this->updateMode = false;
            $this->limpiar();
            $this->emit('updateD');


        }

    }

    public function deleteDetalle($id)
    {
        if($id){
            $eliminar=DetalleSolicitud::where('id',$id)->delete();
           // session()->flash('message', 'Servicio eliminado correctamente');
           $this->emit('deleteD');
        }
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
            'descripcionProblema' => $this->descripcionProblema,
            'title' => $this->title,
            'Start' => $this->Start,
            'End' => $this->End,
        ]);

        $this->limpiar();

        $this->emit('userGuardar'); // Close model to using to jquery
        $this->emit('creadoCorrectamente');
    }
    public function editar($id)
    {
        $this->updateMode = true;
        $solicitudes = SolicitudServicio::where('id',$id)->first();
        $this->id_solicitud = $id;
        $this->user_id = $solicitudes->user_id;
        $this->horaSolcitudServicio = $solicitudes->horaSolcitudServicio;
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
            'descripcionProblema' => 'required|min:10',
            'title' => 'required|min:5',
            'Start' => 'required|date',
            'End' => 'required|date',
        ]);

        if ($this->id_solicitud) {
            $solicitudes = SolicitudServicio::find($this->id_solicitud);
            $solicitudes->update([
                'horaSolcitudServicio' => $this->horaSolcitudServicio,
                'descripcionProblema' => $this->descripcionProblema,
                'title' => $this->title,
                'Start' => $this->Start,
                'End' => $this->End,
            ]);
            $this->updateMode = false;
            //session()->flash('message', 'Solicitud actualizada correctamente');
            $this->limpiar();
            $this->emit('updateS');
        }
    }

    public function delete($id)
    {
        if($id){
            SolicitudServicio::where('id',$id)->delete();
            //session()->flash('message', 'Solicitud eliminada correctamente');
            $this->emit('deleteS');
        }
    }
}
