<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApply extends Notification
{
    use Queueable;
    private $id_candidate;
    private $name_candidate;
    private $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_candidate, $name_candidate, $user_id)
    {
        $this->id_candidate = $id_candidate;
        $this->name_candidate = $name_candidate;
        $this->user_id = $user_id;
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
        $url = url('/notifications');

        return (new MailMessage)
                    ->line('New apply to your offer')
                    ->line('The vacancy is: ' . $this->name_candidate)
                    ->action('Go to your notifications', $url)
                    ->line('Thank you for using our application!');
    }

  
    public function toDataBase(object $notifiable)
    {
        return [
            'id_candidate' => $this->id_candidate,
            'name_candidate' => $this->name_candidate,
            'user_id' => $this->user_id,
        ];
    }
}
