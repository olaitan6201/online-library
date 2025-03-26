<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

\Illuminate\Support\Facades\Schedule::command('app:send-book-notifications')
    ->appendOutputTo(storage_path('logs/send-book-notifications.log'))
    ->withoutOverlapping()
    ->runInBackground()
    ->daily()
    ->onOneServer();
