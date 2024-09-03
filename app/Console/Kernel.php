protected function schedule(Schedule $schedule)
{
    $schedule->job(new EnviarRecordatorioCita())->everyMinute();
}
