<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMailtrap extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $mail, $subject, $message;

    /**
     * Create a new message instance.
     * 
     *
     * @return void
     */
    public function __construct($name, $mail, $subject, $message)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('send.mails', [
            'name' => $this->name,
            'mail' => $this->mail,
            'subject' => $this->subject,
            'textMessage' => $this->message,
        ]);
    }
}
