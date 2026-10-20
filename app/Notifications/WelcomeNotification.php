<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // return (new MailMessage)
        //             ->subject('Welcome to MyHobbyArts!')
        //             ->greeting('Hello, ' . $notifiable->name . '!')
        //             ->line('Thank you for registration.')
        //             ->action('Go to MyHobbyArts', url('/home'))
        //             ->line('Glad to see you!');

        return (new MailMessage)
            ->subject('Welcome to MyHobbyArts!')
            ->view('testmail.welcome', [
                'user' => $notifiable
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'subject' => 'Welcome to MyHobbyArts!',
            'message' => 'User' . $notifiable->name . 'register.',
            'user_id' => $notifiable->id,
        ];
    }
}
