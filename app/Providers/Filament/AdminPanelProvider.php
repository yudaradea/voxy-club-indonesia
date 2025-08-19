<?php

namespace App\Providers\Filament;

use App\Http\Middleware\EnsureUserIsAdmin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
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
                EnsureUserIsAdmin::class
            ])
            ->authMiddleware([
                Authenticate::class,

            ])

            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Data Member'),
                NavigationGroup::make()
                    ->label('Home Page'),
                NavigationGroup::make()
                    ->label('About Page'),
                NavigationGroup::make()
                    ->label('Event Page'),
                NavigationGroup::make()
                    ->label('Merchandise Page'),
                NavigationGroup::make()
                    ->label('Other'),
            ])
            ->favicon(asset('images/logo.png'))
            ->brandName('Dashboard Admin - Voxy')

            ->userMenuItems([
                // Tambahkan item menu baru di sini
                MenuItem::make()
                    ->label('Home')
                    ->url('/')
                    ->icon('heroicon-s-home'),
                MenuItem::make()
                    ->label('Profile')
                    ->url('/profile') // Ganti dengan URL halaman profil Anda
                    ->icon('heroicon-s-user'), // Ikon opsional
                // Filament akan otomatis menambahkan item 'Logout' di bawah ini
            ]);
    }
}
