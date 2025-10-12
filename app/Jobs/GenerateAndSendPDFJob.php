<?php

namespace App\Jobs;

use Dompdf\Dompdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PDF;


class GenerateAndSendPDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $pdf = PDF::loadView('invoice.index', ['data' => $this->data])->setOptions([
            'defaultFont' => 'sans-serif',
            'dpi' => 150,
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        $email = $this->data->email;
        $title = "Welcome to Exam Centre London";
        $body = "This is the email body.";

        Mail::send('mail.invoicesendmail', compact('title', 'body'), function ($message) use ($email, $pdf) {
            $message->to($email)
                ->subject('ECL Invoice')
                ->attachData($pdf->output(), 'Invoice.pdf');
        });
    }
}
