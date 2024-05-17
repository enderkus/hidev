<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\SendLoginLink as SendLoginLinkNotification;

class SendLoginLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $loginUrl;
    /**
     * Create a new job instance.
     */
    public function __construct($loginUrl, User $user)
    {
        $this->loginUrl = $loginUrl;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->notify(new SendLoginLinkNotification($this->loginUrl));
    }
}
