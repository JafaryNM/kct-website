<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf, $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf, $product)
    {
        $this->pdf = $pdf;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->subject('Invoice Order')
        ->view('pages.invoiceEmail')
        ->attachData($this->pdf->output(), 'invoice.pdf');
    }
}
