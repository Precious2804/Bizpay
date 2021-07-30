<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovedLoanNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $loan_coupone, $amount, $username)
    {
        //
        $this->email = $email;
        $this->loan_coupone = $loan_coupone;
        $this->amount = $amount;
        $this->username = $username;
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
        $url = route('loan');
        return (new MailMessage)
                                ->greeting('Hello '."$this->username")
                                ->line('Your Loan request of ₦'.$this->amount.' on Bizpay Global with the Loan Coupon ID of '."$this->loan_coupone". ' has been approved to receive payment on Bizpay')
                                ->line('PS: This approval was completed as a result of the satisfaction of the reason behind the Loan application and verification of the uploaded ID document')
                                ->action('Go to Dashboard', $url)
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
