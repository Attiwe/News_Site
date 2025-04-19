<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;


class CommentNotification extends Notification
{
    use Queueable;
    

     
    public $comment ,$post;
    
    public function __construct($comment, $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
      
    }
 
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function  toBroadcast(object $notifiable): array
    {
         return [
            'commit' => $this->comment->commit,
            'user_id' => $this->comment->user_id,
            'title' => $this->post->title,
            'user_name' => $this->comment->user->name,
            'link' => route('frontend.show-posts', $this->post->slug)
        ];
    }
    
     
    public function toDatabase(object $notifiable): array
    {
         return [
            'commit' => $this->comment->commit,
            'user_id' => $this->comment->user_id,
            'title' => $this->post->title,
            'user_name' => $this->comment->user->name,
            'link' => route('frontend.show-posts', $this->post->slug)
        ];
    }
     
}
