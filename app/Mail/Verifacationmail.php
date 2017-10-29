<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Verifacationmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $confirmation_code
    public function __construct(Confirmation_code $confirmation_code,Name $name)
    {
        $this->name = $name;
        $this->confirmation_code = $confirmation_code
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verify')
                    ->with([
                        'confirmation_code' = $confirmation_code,
                        'name' = $name,
                    ]);
    }
}
