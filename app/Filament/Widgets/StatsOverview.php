<?php

namespace App\Filament\Widgets;

use App\Models\JobPost;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ? string $pollingInterval = '15s';

    protected static bool $islazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description(('Increase in users'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7,3,4,5,6,3,5,3]),

            Stat::make('Total Job Posts', JobPost::count())
                ->description(('Total job posts in app'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7,3,4,5,6,3,5,3]),

            Stat::make('Available Job Posts', JobPost::where('status_id', 10)->count())
                ->description(('Available job posts in app'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7,3,4,5,6,3,5,3]),
        ];
    }
}
