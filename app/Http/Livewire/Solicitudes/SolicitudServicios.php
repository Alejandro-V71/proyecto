<?php

namespace App\Http\Livewire\Solicitudes;

use App\Mail\NotificacionSolicitud;
use App\Models\DetalleSolicitud;
use Livewire\Component;
use App\Models\SolicitudServicio;
use App\Models\estado_solicitud_servicio;
use App\Models\Estado;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Repuesto;
use Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['eliminarSolicitud','updateSolicitud',
    'actualizarDetalle','eliminarDetalle','storeDetalle'];

    protected $rules = [
        'user_id' => 'required',
        'horaSolcitudServicio' => 'required|unique:solicitud_servicios,horaSolcitudServicio',
        'descripcionProblema' => 'required|string|min:10|max:500',
        'title' => 'required|string|min:5|max:30|unique:solicitud_servicios,title',
        'Start' => 'required|date|after_or_equal:yesterday',
        'End' => 'required|date|after_or_equal:Start',
    ];

    protected $messages = [
        'user_id.required' => 'El campo usuario es obligatorio',
        'horaSolcitudServicio.required' => 'El campo hora solicitud servicio es obligatorio',
        'descripcionProblema.required' => 'El campo descripcion problema es obligatorio',
        'descripcionProblema.min' => 'El campo descripcion debe tener mínimo 10 caracteres',
        'title.required' => 'El campo título es obligatorio',
        'title.min' => 'El campo título deben tener mínimo 5 caracteres',
        'Start.required' => 'El campo comienzo es obligatorio y es únicamente de tipo fecha',
        'Start.after_or_equal' => 'El campo comienzo debe ser posterior o igual a hoy',
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
        'horaSolcitudServicio' => 'required|unique:solicitud_servicios,horaSolcitudServicio',
        'descripcionProblema' => 'required|string|min:10|max:500',
        'title' => 'required|string|min:5|max:30|unique:solicitud_servicios,title',
        'Start' => 'required|date|after_or_equal:yesterday',
        'End' => 'required|date|after_or_equal:Start',
        ]);
    }

    public function save(){
        $validation =$this->validate();

        SolicitudServicio::create($validation);
        if(Auth::user()->UsuarioRol === 1 ){

            Mail::to(Auth::user()->email)->send(new NotificacionSolicitud(
                $this->title,
              $this->horaSolcitudServicio,
              $this->End
           ));
        }



    }

    public function render()
    {
        if(Auth::user()->UsuarioRol === 1){
            $consulta1 = SolicitudServicio::where('user_id',Auth::user()->id)->get();
            $this->solicitudes = $consulta1;

           // $this->detalle = DetalleSolicitud::where('solicitud_servicio_id',Auth::user()->solicitudServicio)->get();

           return view('livewire.solicitudes.solicitud-servicios', [
               'users' => User::where('id',Auth::user()->id)->get(),
               'servicios' => Servicio::all(),
               'repuestos' => Repuesto::all(),
           ]);

        }else{
            $this->solicitudes = SolicitudServicio::all();
            $this->detalles = DetalleSolicitud::all();
            //Detalle para cada solicitud
            $this->detalle = DetalleSolicitud::all();
            return view('livewire.solicitudes.solicitud-servicios', [
                'users' => User::all(),
                'servicios' => Servicio::all(),
                'repuestos' => Repuesto::all(),
            ]);
        }


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

            ['diagnostico' => 'required|string|min:10|max:500',
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
        $algo= DetalleSolicitud::updateOrCreate(['id'=>$this->id_detalles],
        [
            'diagnostico' => $this->diagnostico,
            'solicitud_servicio_id'=> $this->solicitud_servicio_id,
            'servicio_id'=>$this->servicio_id,

        ]);

        $idDetalle=$this->id_detalles;
        $algo->repuestos()->attach($this->idRepuesto);

        $this->limpiar();
        $this->exampleMode = false; // Close model to using to jquery
        $this->emit('Detalle');
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



    public function actualizarDetalle()
    {
        $detalles = $this->validate([
            'diagnostico' => 'required|string|min:10|max:500',
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

        }

    }

    public function eliminarDetalle(DetalleSolicitud $id)
    {
        $id->delete();
    }

    public function limpiar(){
        $this->horaSolcitudServicio='';
        $this->fechaSolicitudServicio='';
    }

    public function storeSolicitud(){
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
        //Mail::to($this->email)->send(new CredencialesUsuario($this->email,$contrasena));




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

    public function updateSolicitud()
    {
        $solicitudes = $this->validate([
            'user_id' => 'required',
        'horaSolcitudServicio' => 'required|unique:solicitud_servicios,horaSolcitudServicio',
        'descripcionProblema' => 'required|string|min:10|max:500',
        'title' => 'required|string|min:5|max:30|unique:solicitud_servicios,title',
        'Start' => 'required|date|after_or_equal:yesterday',
        'End' => 'required|date|after_or_equal:Start',
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
            $this->limpiar();
            $this->updateMode = false;
        }
    }

    public function eliminarSolicitud(SolicitudServicio $id)
    {
        $id->delete();
    }
}
