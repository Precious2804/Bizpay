<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $first_name, $amount, $profit)
    {
        //
        $this->email = $email;
        $this->first_name = $first_name;
        $this->amount = $amount;
        $this->profit = $profit;
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
        $url = route('withdraw');
        return (new MailMessage)
                                ->greeting('Hello '.$this->first_name)
                                ->line('You initiated a Withdrawal request for an amount of ₦'.$this->profit.' on '.env('APP_NAME'))
                                ->action('Go to Dashboard', $url)
                                ->line('PS: The Administration would confirm your request in the soonest possible time and then make the necessary procedures to provide a payment returns for your investment')
                                ->line('Thank you for choosing '.env('APP_NAME'));                                
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
