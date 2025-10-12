<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlukMessageMail extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

   
    public $first_name;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $messageContent
     */
    public function __construct($first_name, $messageContent)
    {
        $this->$first_name = $first_name;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Custom Subject')
                    ->view('mail.blukmessage')
                    ->with([
                        'first_name' => $this->first_name,
                        'messageContent' => $this->messageContent,
                    ])->replyTo('info@examcentrelondon.co.uk');
    }
    
    
    
    // return $this->view('mail.blukmessage',compact('user'))->replyTo('info@examcentrelondon.co.uk');
}
