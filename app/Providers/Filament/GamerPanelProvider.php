<?php

namespace App\Providers\Filament;

use App\Http\Middleware\EnsureUserHasClub;
use App\Http\Middleware\EnsureUserHasGamer;
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

class GamerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('gamer')
            ->path('gamer')
            ->login()
            ->colors([
                'primary' => '#58c3e3',
                'gray' => Color::Slate,
            ])
            ->brandLogo(
                asset('images/logo.svg'),
            )
            ->topNavigation()
            ->discoverResources(in: app_path('Filament/Gamer/Resources'), for: 'App\\Filament\\Gamer\\Resources')
            ->discoverPages(in: app_path('Filament/Gamer/Pages'), for: 'App\\Filament\\Gamer\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Gamer/Widgets'), for: 'App\\Filament\\Gamer\\Widgets')
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
                EnsureUserHasGamer::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->registration()
            ->viteTheme('resources/css/filament/gamer/theme.css');
    }
}
