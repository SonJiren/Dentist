protected function schedule(Schedule $schedule)
{
    $schedule->command('cita')->everyMinute();
}
