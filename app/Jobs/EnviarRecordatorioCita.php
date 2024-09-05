<?php

namespace App\Jobs;

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

    protected $cita;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('agitokanoh657@gmail.com')->send(new CitaCreada($this->cita));
    }
}
