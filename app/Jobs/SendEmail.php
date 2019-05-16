<?php
    namespace App\Jobs;
    use Illuminate\Bus\Queueable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Contracts\Mail\Mailer;
    class SendEmail implements ShouldQueue
    {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
        private $template;
        private $email;
        private $title;
        private $data;
        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct($template, $email, $title, $data)
        {
            $this->template = $template;
            $this->email = $email;
            $this->title = $title;
            $this->data = $data;
        }
        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle(Mailer $mailer)
        {
            // $mailer->send('mail_templates.visitor_email',  ['username' => $username], function ($message) use ($email) {
            //     $message->to($email)->subject('🎉Your Insider Suite membership is here!');
            // });
            $email = $this->email;
            $title = $this->title;
            $mailer->send($this->template, $this->data, function ($message) use ($email, $title){
                          $message->to($email)->subject($title);
                          // $message->from('nwambachristian@gmail.com', 'Christian Nwmaba');
                          // $message->to('nwambachristian@gmail.com');
                          });
        }
    }
