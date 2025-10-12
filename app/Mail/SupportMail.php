<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
 
    public $message;

    public function __construct($message)
    {
       
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $message = $this->message;
        return $this->markdown('mail.supportmail')->with('message', $this->message)->subject('Candidate Support Inquiry')->replyTo('info@examcentrelondon.co.uk');
    }
}
