<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class firstPaymentalert extends Mailable 
{
    use Queueable, SerializesModels;

    
    
     public $user;
     
    public function __construct($user)
    {
        $this->user = $user;
    }
   
    public function build()
    {
        $user = $this->user;
        return $this->view('mail.unpaidmail.sendpaymentmail',compact('user'))->subject('Final Reminder: Secure Your Exam Place & Save Big with Our Special Offer! ')->replyTo('info@examcentrelondon.co.uk');
    }
}
