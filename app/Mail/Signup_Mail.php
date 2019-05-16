<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/1/2019
 * Time: 2:37 PM
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class Signup_Mail extends Mailable
{
    use Queueable, SerializesModels;

    public $sender_name, $text, $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function build()
    {
        return $this->view('mail_templates.signup')
            ->from("contact@insidersuite.com", "InsiderSuite")
            ->subject(' 🎉Your Insider Suite membership is here!');
    }
}
