<?php

namespace App\Jobs;

use App\Mail\InvitationStatusMail;
use App\Mail\WelcomeClubMail;
use App\Models\Club;
use App\Models\Gamer;
use App\Models\Member;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class InvitationStatusUpdateEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Club $club, public Member $member)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        dd($this->club, $this->member);
        Mail::to($this->club->email)->send(new InvitationStatusMail($this->club, $this->member));
    }
}
