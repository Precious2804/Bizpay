<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $loan_coupone, $username, $reasons, $amount)
    {
        //
        $this->email = $email;
        $this->loan_coupone = $loan_coupone;
        $this->username = $username;
        $this->reasons = $reasons;
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
        $url = route('loan');
        return (new MailMessage)
                                ->greeting('Hello '."$this->username")
                                ->line('You initiated a Loan request of ₦'.$this->amount.' on Bizpay Global')
                                ->line('For the purpose stated as: '."$this->reasons")
                                ->action('Go to Dashboard', $url)
                                ->line('PS: The Administration of Bizpay Global would review your loan application request and then provide an approval for the loan request')
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
