<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Cita;
use App\Jobs\EnviarRecordatorioCita;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $citas = Cita::where('hora_cita', '>', Carbon::now())
                         ->where('hora_cita', '<=', Carbon::now()->addMinutes(5))
                         ->get();

            foreach ($citas as $cita) {
                EnviarRecordatorioCita::dispatch($cita);
            }
        })->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
