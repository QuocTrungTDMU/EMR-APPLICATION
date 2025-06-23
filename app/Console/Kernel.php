protected function schedule(Schedule $schedule)
{
// Cleanup expired FCM tokens daily
$schedule->command('fcm:cleanup')->daily();
}