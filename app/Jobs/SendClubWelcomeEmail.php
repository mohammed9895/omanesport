<?php

namespace App\Jobs;

use App\Mail\WelcomeClubMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendClubWelcomeEmail implements ShouldQueue
{
    use Queueable;


    public function __construct(public User $user) {}

    public function handle()
    {
        Mail::to($this->user->email)->send(new WelcomeClubMail($this->user));
    }
}
