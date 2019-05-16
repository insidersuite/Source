<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $location, $experience_name, $experience_id, $accom_count, $act_count, $first_day, $last_day, $feedback_t_limit, $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {   
        $this->name = $data['name'];
		$this->location = $data['location'];
        $this->experience_name = $data['experience_name'];
		$this->experience_id = $data['experience_id'];
		$this->accom_count = $data['accom_count'];
		$this->act_count = $data['act_count'];
		$this->first_day = $data['first_day'];
		$this->last_day = $data['last_day'];
		$this->feedback_t_limit = $data['feedback_t_limit'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_templates.review', compact('name', 'location', 'experience_name', 'experience_id', 'accom_count', 'act_count', 'first_day', 'last_day', 'feedback_t_limit'))
        ->from("contact@insidersuite.com", "InsiderSuite")
        ->subject('📸 Rate your stay in '.$this->location.'!');
    }
}
