<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainStundentSecondPaymentAlert extends Mailable implements ShouldQueue
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
        return $this->view('mail.student.student2ndpaymentalert',compact('user'))->subject('Final Call: Last Chance to Claim Your Exclusive Benefits!')->replyTo('info@examcentrelondon.co.uk');
    }
}
