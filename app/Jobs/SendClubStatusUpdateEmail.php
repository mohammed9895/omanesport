<?php

namespace App\Jobs;

use App\Mail\ClubStatusUpdateMail;
use App\Mail\WelcomeClubMail;
use App\Models\Club;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendClubStatusUpdateEmail implements ShouldQueue
{
    use Queueable;

    public function __construct(public User $user, public Club $club) {}

    public function handle()
    {
        Mail::to($this->user->email)->send(new ClubStatusUpdateMail($this->user, $this->club));
    }
}
