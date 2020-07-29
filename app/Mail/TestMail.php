<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file1 = \storage_path('app/public/attach-1.jpg');
        $file2 = \storage_path('app/public/attach-2.jpg');

        return $this
            ->view('emails.test-mail')
            ->attach($file1)
            ->attach($file2);
    }
}
