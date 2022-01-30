<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedInvestment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $packageName;
    public $amount;
    public $coupone;

    public function __construct($name, $email, $amount)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('invest');
        return (new MailMessage)
                    ->greeting('Hello '.$this->name)
                    ->line('Investment Request was successful and Investment has been registered for an amount of'.$this->amount)
                    ->action('Go to Dashboard', $url)
                    ->line('Thank you for choosing us');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
