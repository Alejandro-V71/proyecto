<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredencialesUsuario extends Mailable
{
    use Queueable, SerializesModels;


    protected $email;
    protected $clave;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$clave)
    {
        //
        $this->email = $email;
        $this->clave = $clave;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->view('email.credenciales')->with('email',$this->email)
                                                                    ->with('clave' , $this->clave);
    }
}
