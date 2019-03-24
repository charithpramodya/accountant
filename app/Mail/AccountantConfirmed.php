<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Accountant;

class AccountantConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    protected $accountant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Accountant $accountant)
    {
        $this->accountant=$accountant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirmaccountant')->with([
            'name'=>'abc', 
            'password'=>'abc', 
            'username'=>'abc'

        ]);
    }
}
