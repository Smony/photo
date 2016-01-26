<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Mail;

class SendMessagesToSubscribers extends Job implements SelfHandling
{

    /**
     * @var
     */
    private $subscribers;

    /**
     * @var
     */
    private $title;

    /**
     * @var
     */
    private $message;

    public function __construct($subscribers, $title, $message)
    {
        $this->subscribers = $subscribers;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function handle()
    {
        if (count($this->subscribers) == false) {

            return false;
        }

        try {
            foreach ($this->subscribers as $subscriber) {
                Mail::send('emails.subscribe', ['messageText' => $this->message, 'titleText' => $this->title], function ($m) use ($subscriber) {
                    $m->from('example@domain.com');
                    $m->to($subscriber->email)->subject($this->title);
                });
            }
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }
}
