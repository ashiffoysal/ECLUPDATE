<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable 
{
    use Queueable, SerializesModels;

    protected $code;
   

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build()
    {
        $code = $this->code;
        $companyInformation = app('companyInformation');

        return $this->view('mail.user_registermail', compact('code'))
                    ->subject('Welcome to ' . $companyInformation->company_mail_name . ' - Registration Code!')
                    ->replyTo($companyInformation->email, $companyInformation->company_mail_name . ' Support');
    }
}
