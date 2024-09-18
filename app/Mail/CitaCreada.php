<?php

namespace App\Mail;

use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class CitaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $cita;

    /**
     * Crea una nueva instancia de mensaje.
     *
     * @param Cita $cita
     */
    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    /**
     * Construye el mensaje.
     *
     * @return $this
     */
    public function build()
    {
        // Convertir la fecha y hora a objetos Carbon
        $fecha = Carbon::parse($this->cita->fecha);
        $hora = Carbon::parse($this->cita->hora);

        return $this->view('emails.recordatorio')
                    ->subject('Recordatorio de Cita')
                    ->with([
                        'cliente' => $this->cita->cliente->nombre,
                        'tratamiento' => $this->cita->tratamiento->nombre,
                        'fecha' => $fecha->format('d-m-Y'),
                        'hora' => $hora->format('h:i A'),
                    ]);
    }
}
