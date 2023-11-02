<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LogoutResponse::class, function (Application $app) {
            return new \App\Http\Responses\LogoutResponse();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentIcon::register([
            'panels::sidebar.collapse-button' => 'fas-bars-staggered',
            'panels::sidebar.expand-button' => 'fas-bars-staggered',
        ]);

        // Filament::serving(function () {
        //     Filament::registerUserMenuItems([
        //         'account' => UserMenuItem::make()->url(route('filament.admin.pages.my-profile')),
        //     ]);
        // });
    }
}
