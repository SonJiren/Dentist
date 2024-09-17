<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
 use Carbon\Carbon;
 use App\Models\Cita;
 use Illuminate\Support\Facades\Mail;
 use App\Mail\CitaCreada;
use App\Jobs\EnviarRecordatorioCita;
/* Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

 */
Artisan::command('cita {id}', function ($id) {
    $cita = Cita::find($id);

    if ($cita) {
        // Convertir la hora de la cita
        $horaCita = Carbon::createFromFormat('Y-m-d H:i:s', $cita->hora_cita);
        $horaEnvio = $horaCita->subMinutes(5); // 5 minutos antes

        // Enviar el correo de inmediato a tu Gmail
        Mail::to('agitokanoh657@gmail.com')->send(new CitaCreada($cita));

        EnviarRecordatorioCita::dispatch($cita)->delay($horaEnvio);

        $this->info("Recordatorio programado y correo enviado.");
    } else {
        $this->error("Cita con ID {$id} no encontrada.");
    }
})->purpose('Enviar recordatorio de cita 5 minutos antes de la hora establecida.')->everyMinute();
