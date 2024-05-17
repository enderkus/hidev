<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\ReceiveMailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendReceivedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public $replyToMail;
    public $mailSubject;
    public $mailContent;
    public function __construct(User $user, $replyToMail, $mailSubject, $mailContent)
    {
        $this->user = $user;
        $this->replyToMail = $replyToMail;
        $this->mailSubject = $mailSubject;
        $this->mailContent = $mailContent;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->notify(new ReceiveMailNotification($this->replyToMail, $this->mailSubject, $this->mailContent));
    }
}
