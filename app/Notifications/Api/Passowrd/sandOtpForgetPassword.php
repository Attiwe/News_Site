<?php

namespace App\Notifications\Api\Passowrd;

use Ichtrojan\Otp\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sandOtpForgetPassword extends Notification
{
    use Queueable;
 
    private $otp;
    
    public function __construct()
    {
        $this->otp = new Otp;
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
    public function toMail(object $notifiable): MailMessage
    {
      
        $otp = $this->otp->generate($notifiable->email, 'numeric', 6, 20);
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('This notification  ForgetPassword .')
            ->line('data time : ' . now()->format('Y-m-d H:i:s'))
            ->line('this is your otp code : ' . $otp->token);
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
