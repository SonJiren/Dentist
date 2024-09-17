<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;

class CitaCreada extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $cita;

    /**
     * Create a new message instance.
     *
     * @param $cita
     */
    public function __construct($cita)
    {
        $this->cita = $cita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recordatorio')
                    ->subject('Confirmación de Cita')
                    ->with([
                        'cita' => $this->cita,
                    ]);
    }
}
