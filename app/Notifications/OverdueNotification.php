<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Checkout;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Filament\Resources\CheckoutResource;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OverdueNotification extends Notification
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
            ->line('A book is overdue and needs to be returned.')
            ->line('User: '.$this->checkout->user->name)
            ->line('Book: '.$this->checkout->book->title)
            ->action('View Checkouts', CheckoutResource::getUrl(tenant: $notifiable))
            ->line('Please follow up with the reader.');
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
