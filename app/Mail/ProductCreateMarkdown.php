<?php

namespace App\Mail;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductCreateMarkdown extends Mailable
{
    use Queueable, SerializesModels;
    public $product;
    public $category;
    public $subcategory;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product,Category $category,Subcategory $subcategory)
    {
        $this->product = $product;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "{$this->product->name} product uploaded!";
        return $this
        ->subject($subject)
        ->markdown('emails.product');
    }
}
