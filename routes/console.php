<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
 use Carbon\Carbon;
use App\Jobs\EnviarRecordatorioCita;
use App\Models\Cita;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('cita {id}', function ($id) {
    $cita = Cita::find($id);

    if ($cita) {
        $horaCita = Carbon::createFromFormat('Y-m-d H:i:s', $cita->hora_cita);
        $horaEnvio = $horaCita->subMinutes(5);

        EnviarRecordatorioCita::dispatch($cita)->delay($horaEnvio);

        $this->info("Recordatorio programado para la cita con ID {$id}.");
    } else {
        $this->error("Cita con ID {$id} no encontrada.");
    }

})->purpose('Enviar recordatorio de cita 5 minutos antes de la hora establecida.');
