<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verification')
            ->from('info@tamraat.com', 'Tamraat')
            ->subject('Tamrat Account Verification')
            ->with('username', $this->user->name)
            ->with('code', $this->code);
    }
}
