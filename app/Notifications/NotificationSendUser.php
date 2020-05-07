<?php

namespace App\Notifications;

use App\Transaction;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationSendUser extends Notification
{
    use Queueable;
    protected $messageUser;
    protected $linkUser;
    protected $link_textUser;
    protected $iconUser;
    protected $classNameBtnUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($messageUser, $linkUser, $link_textUser, $iconUser, $classNameBtnUser)
    {
        $this->messageUser = $messageUser;
        $this->linkUser = $linkUser;
        $this->link_textUser = $link_textUser;
        $this->iconUser = $iconUser;
        $this->classNameBtnUser = $classNameBtnUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        return [
            'data' => $this->messageUser,
            'user' => $notifiable,
            'link' => $this->linkUser,
            'link_text' => $this->link_textUser,
            'icon' => $this->iconUser,
            'classNameBtn' => $this->classNameBtnUser,

        ];
    }
}
