<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamBookingMail extends Mailable implements ShouldQueue
{ 
    use Queueable, SerializesModels;

    // implements ShouldQueue
     

    public function __construct()
    {
       
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        
        return $this->view('mail.bookingmail')->subject('Exam Booking Confirmation and Payment Reminder')->replyTo('info@examcentrelondon.co.uk');
        
    }
}
