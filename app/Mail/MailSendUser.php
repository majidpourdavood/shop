<?php

namespace App\Mail;

use App\Transaction;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSendUser extends Mailable
{
    use Queueable, SerializesModels;

    public $messageUser;
    public $linkUser;

    /**
     * Create a new messages.php instance.
     *
     * @return void
     */
    public function __construct($messageUser,$linkUser)
    {
        $this->linkUser = $linkUser;
        $this->messageUser = $messageUser;
    }

    /**
     * Build the messages.php.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' فروشگاه اینترنتی - ')
            ->markdown('site.email.mailSendUser');
    }
}
