<?php

namespace App\Providers;

use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Filament::registerUserMenuItems([
            //     UserMenuItem::make()
            //         ->label('Edit Profile')
            //         // ->url(route('filament.admin.pages.edit-profile'))
            //         ->url(ProfileResource::getUrl('edit', ['record' => Auth::user()->id]))
            //         ->icon('fas-user'),
            //     //ImageColumn::make('avatar')
            // ]);
        });
    }

    
}
