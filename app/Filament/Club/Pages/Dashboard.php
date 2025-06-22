<?php

namespace App\Filament\Club\Pages;

use Filament\Pages\Page;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $navigationIcon = 'hugeicons-dashboard-browsing';

    protected static string $view = 'filament.club.pages.dashboard';

    public $clubStaus;

    // make the mount function and check the status of the club and show notification for the user
    public function mount(): void
    {
        $this->clubStaus = auth()->user()->club?->status;
    }
}
