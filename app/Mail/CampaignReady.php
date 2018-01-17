<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Subscriber;

class CampaignReady extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber, $title, $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber, $title, $content)
    {
        $this->subscriber = $subscriber;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('og@emailplatform.com')
            ->view('emails.campaign')
            ->with([
                'name' => $this->subscriber->firstname,
                'title' => $this->title,
                'content' => $this->content 
            ])
            ->to($this->subscriber->email)
            ->subject( $this->title );
    }
}
