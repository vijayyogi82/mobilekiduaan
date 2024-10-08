<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $validToken;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validToken)
    {
        $this->validToken = $validToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vijayyogi8290@gmail.com')
        ->subject('Mobile Ki Dukan')
        ->view('user.email')
        ->with('validToken', $this->validToken);
    }
}
