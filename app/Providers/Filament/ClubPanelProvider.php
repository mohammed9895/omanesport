<?php

namespace App\Providers\Filament;

use App\Http\Middleware\EnsureUserHasClub;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ClubPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('club')
            ->path('club')
            ->colors([
                'primary' => '#58c3e3',
                'gray' => Color::Slate,
            ])
            ->brandLogo(
                asset('images/logo.svg'),
            )
            ->topNavigation()
            ->login()
            ->discoverResources(in: app_path('Filament/Club/Resources'), for: 'App\\Filament\\Club\\Resources')
            ->discoverPages(in: app_path('Filament/Club/Pages'), for: 'App\\Filament\\Club\\Pages')
            ->pages([
//                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Club/Widgets'), for: 'App\\Filament\\Club\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                 EnsureUserHasClub::class,
            ])
            ->viteTheme('resources/css/filament/club/theme.css')
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
