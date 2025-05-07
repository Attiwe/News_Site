<?php

namespace App\Notifications\Api;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;

class SentOtpRegister extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $otp;
    public function __construct()
    {
        $this->otp = new Otp;
    }

   
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
            ->line('This notification is for verify your email.')
            ->line('data time : ' . now()->format('Y-m-d H:i:s'))
            ->line('this is your otp code : ' . $otp->token);
    }

        public function toArray(object $notifiable): array
    {
        return [
            //
        ];
         
    }
}
