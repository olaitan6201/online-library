<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Checkout;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Filament\Reader\Resources\CheckoutResource;

class DueDateReminder extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Checkout $checkout)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The book you borrowed is due in 2 days.')
            ->line('Book: '.$this->checkout->book->title)
            ->action('Return Book', CheckoutResource::getUrl(tenant: $notifiable))
            ->line('Thank you for using our library!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
