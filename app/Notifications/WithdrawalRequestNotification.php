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
    public function __construct($email, $coupAmount, $coupPackage, $username, $coupProfit, $coupone)
    {
        //
        $this->email = $email;
        $this->coupAmount = $coupAmount;
        $this->coupPackage = $coupPackage;
        $this->username = $username;
        $this->coupProfit = $coupProfit;
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
        $url = route('withdraw');
        return (new MailMessage)
                                ->greeting('Hello '.$this->username)
                                ->line('You initiated a Withdrawal request of ₦'.$this->coupAmount.' on Bizpay Global for the Coupon Code of '."$this->coupone")
                                ->line('The Coupon was investted on pacakge: '."$this->coupPackage ". 'at an amount cost of ₦'.$this->coupAmount. ', which is expected yield a profit of ₦'.$this->coupProfit. ' after a period 30 days')
                                ->action('Go to Dashboard', $url)
                                ->line('PS: The Administration would confirm your request in the soonest possible time and then make the necessary procedures to provide a payment returns for your investment')
                                ->line('Thank you for choosing Bizpay Global');                                
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
