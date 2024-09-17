<?php

namespace App\Jobs;

use App\Mail\CitaCreada;
use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EnviarRecordatorioCita implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $cita;

    /**
     * Create a new job instance.
     */
    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Enviar el correo
        Mail::to('agitokanoh657@gmail.com')->send(new CitaCreada($this->cita));
    }
}
