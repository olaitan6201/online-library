<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Enums\UserRole;
use App\Models\Checkout;
use Illuminate\Console\Command;
use App\Notifications\DueDateReminder;
use App\Notifications\OverdueNotification;

class SendBookNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-book-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Book Notifications Handler';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Due date reminders
        $dueSoonCheckouts = Checkout::whereNull('checked_in_at')
            ->where('due_date', now()->addDays(2))
            ->with(['user:id,name', 'book:id,title'])
            ->get(['id', 'user_id', 'book_id']);

        foreach ($dueSoonCheckouts as $checkout) {
            $checkout->user->notify(new DueDateReminder($checkout));
        }

        // Overdue notifications
        $overdueCheckouts = Checkout::query()->whereNull('checked_in_at')
            ->where('due_date', '<', now())
            ->with(['user:id,name', 'book:id,title'])
            ->get(['id', 'user_id', 'book_id']);

        $librarian = User::query()->whereRelation('roles', 'name', '=', UserRole::LIBRARIAN)->first();

        foreach ($overdueCheckouts as $checkout) {
            $librarian->notify(new OverdueNotification($checkout));
        }
    }
}
