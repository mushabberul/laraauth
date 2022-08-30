<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductUpload extends Mailable
{
    use Queueable, SerializesModels;
    public $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Product: {$this->product->name} Uploaded";
        return $this
        ->subject($subject)
        ->attach(public_path('invoices/invoice.pdf'),[
            'as'=>'order_invoice.pdf',
            'mime'=>'aplication/pdf'
        ])
        ->view('mails.product.product-uploaded');
    }
}
