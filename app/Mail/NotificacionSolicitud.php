<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NotificacionSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    protected $titulo;
    protected $hora;
    protected $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo,$hora,$fecha)
    {
        //
        $this->titulo = $titulo;
        $this->hora = $hora;
        $this->fecha = $fecha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->from('ayuda@motorbike.com')->view('email.notificacionExitosa')->with('titulo',$this->titulo)
        ->with('hora' , $this->hora)
        ->with('fecha' ,$this->fecha);
    }
}
