<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $cita;

    public function __construct($cita)
    {
        $this->cita = $cita;
    }

    public function build()
    {
        return $this->view('emails.recordatorio')
                    ->subject('Confirmación de Cita')
                    ->with([
                        'cita' => $this->cita,
                    ]);
    }
}

