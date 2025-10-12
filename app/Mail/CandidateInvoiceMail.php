<?php

namespace App\Mail;
use PDF;
use App\Models\ExamRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateInvoiceMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('ECL Invoice')
                    ->view('mail.invoicesendmail');
  
        foreach ($this->details['files'] as $file){
            $this->attach($file);
        }
  
        return $this;
    }
}
