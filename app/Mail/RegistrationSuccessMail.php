<?php

namespace App\Mail;
use PDF;
use App\Models\ExamRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccessMail extends Mailable 
{
    use Queueable, SerializesModels;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->details = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Registration Success')
                    ->view('mail.registration_successmail')->replyTo('info@examcentrelondon.co.uk');
  
      
  
        return $this;
    }
}
