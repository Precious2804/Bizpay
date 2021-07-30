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

    public function __construct($name, $email, $packageName, $amount, $coupone)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->packageName = $packageName;
        $this->amount = $amount;
        $this->coupone = $coupone;
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
                    ->line('Investment Request to process the Coupon Code of '."$this->coupone". ' was successful and Investment has been registered')
                    ->line('The Coupon was invested on package '. "$this->packageName". ' on Bizpay Global which costs a token of ₦'. $this->amount)
                    ->action('Go to Dashboard', $url)
                    ->line('Note: Your coupon is expected to expire in 30days, after it has been used for an investment')
                    ->line('Thank you for investing with Bizpay Global');
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
