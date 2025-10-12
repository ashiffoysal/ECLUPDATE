<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class secondPaymentAlert extends Mailable 
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
        return $this->view('mail.unpaidmail.sendSecondPaymentAlertMail',compact('user'))->subject('Final 24 Hours: Secure Your Exam Place with an Exclusive 10% Discount!')->replyTo('info@examcentrelondon.co.uk');
    }
}
