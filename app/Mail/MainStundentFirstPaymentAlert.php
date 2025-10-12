<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainStundentFirstPaymentAlert extends Mailable implements ShouldQueue
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
        return $this->view('mail.student.student1stpaymentalert',compact('user'))->subject('Don’t Miss Out! Exclusive Exam Booking Discounts!')->replyTo('info@examcentrelondon.co.uk');
    }
}
