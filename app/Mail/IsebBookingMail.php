<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IsebBookingMail extends Mailable implements ShouldQueue
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
        return $this->view('mail.isebmail.index',compact('user'))->subject('ISEB Booking Confirmation')->replyTo('info@examcentrelondon.co.uk');;
    }
}
