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

    $citas = Cita::whereDate('fecha', $now->toDateString())
                 ->whereTime('hora', $now->copy()->addMinutes(5)->format('H:i'))
                 ->get();

    if ($citas->isNotEmpty()) {
        foreach ($citas as $cita) {
            Mail::to('agitokanoh657@gmail.com')->send(new CitaCreada($cita));
        }

        $this->info('Recordatorios de citas enviados correctamente!');
    } else {
        $this->info('No hay citas para recordar en el momento actual.');
    }
})->purpose('Envía un correo 5 minutos antes de la hora de la cita')->everyMinute();
