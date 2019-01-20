<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    private $firstname;
    private $lastname;
    private $userpass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $lastname, $userpass)
    {
        $this->firstname = $firstname;
        $this->lasttname = $lastname;
        $this->userpass = $userpass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('little@monstr.com')
            ->subject('Registration mail')
            ->view('mail.welcome',[
            'user_firstname'=>$this->firstname,
            'user_lastname'=>$this->lasttname,
            'user_password'=>$this->userpass
        ]);
    }
}
