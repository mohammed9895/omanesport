<?php

namespace App\Jobs;

use App\Mail\GamerInvitationMail;
use App\Mail\WelcomeClubMail;
use App\Models\Club;
use App\Models\Gamer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendInvitationEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Club $club, public Gamer $gamer) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->gamer->user->email)->send(new GamerInvitationMail($this->club, $this->gamer));
    }
}
