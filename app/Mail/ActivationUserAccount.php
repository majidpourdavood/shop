<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationUserAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new messages.php instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the messages.php.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' فروشگاه اینترنتی - ')
            ->markdown('site.email.email');
    }
}
