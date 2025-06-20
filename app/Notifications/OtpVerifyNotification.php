<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;

class OtpVerifyNotification extends Notification
{
    use Queueable;

     
     public function __construct()
    {
         
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
        $otp = (new Otp)->generate($notifiable->email, 'numeric' , 6 , 15);
         return (new MailMessage)
            ->greeting('Hello!')
            ->subject('Verify your email address')
            ->line('This is a test notification.')
            ->greeting('Code')
            ->line('code : '.$otp ->token);
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
