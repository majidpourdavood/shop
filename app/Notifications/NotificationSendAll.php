<?php

namespace App\Notifications;

use App\Transaction;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationSendAll extends Notification
{
    use Queueable;
    protected  $message;
    protected  $link;
    protected  $link_text;
    protected  $class;
    protected  $userSender;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $link,$link_text, $class,$userSender)
    {
        $this->message = $message;
        $this->link = $link;
        $this->link_text = $link_text;
        $this->class = $class;
        $this->userSender = $userSender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        return [
            'data' => $this->message,
            'user' => $notifiable,
            'link' => $this->link,
            'link_text' => $this->link_text,
            'class' => $this->class,
            'userSender' => $this->userSender,

        ];
    }
}
