<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateExamConfirmation extends Mailable 
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
        return $this->view('mail.candidateexamconfirmation',compact('user'))->replyTo('info@examcentrelondon.co.uk');;
    }
}
