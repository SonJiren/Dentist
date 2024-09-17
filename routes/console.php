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

 Artisan::command('RecordatorioCita', function () {
    $now = Carbon::now();
    $destinatarios = ['agitokanoh657@gmail.com'];
    $this->info('Fecha y hora actuales: ' . $now->toDateTimeString());

    // Obtener citas que necesitan recordatorio (5 minutos antes de la hora de la cita)
    $citas = Cita::whereDate('fecha', $now->toDateString())
                 ->whereTime('hora', $now->copy()->addMinutes(5)->format('H:i'))
                 ->get();

    // Enviar recordatorio solo si hay citas
    if ($citas->isNotEmpty()) {
        foreach ($citas as $cita) {
            Mail::bcc($destinatarios)->send(new CitaCreada($cita));
            $this->info("Recordatorio enviado para la cita con ID {$cita->id}.");
        }
    } else {

        $this->info('No hay citas pendientes para enviar recordatorio.');
    }
})->purpose('Enviar recordatorio 5 minutos antes de la cita')->everyMinute();
