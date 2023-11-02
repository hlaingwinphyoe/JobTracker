<?php

namespace App\Filament\Widgets;

use App\Models\JobPost;
use App\Models\Type;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ? int $sort = 2;

    protected static ? string $pollingInterval = '15s';

    protected static bool $islazy = true;

    protected function getStats(): array
    {
        if (auth()->user()->type->id == Type::where('slug', 'employer')->first()->id) {
            return [
                Stat::make('Total Job Posts', JobPost::where('user_id', auth()->user()->id)->get()->count())
                    ->description(('Total Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('success')
                    ->chart([7,3,4,5,6,3,5,3]),

                Stat::make('Available Job Posts', JobPost::where('status_id', 10)->where('user_id', auth()->user()->id)->get()->count())
                    ->description(('Available Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('primary')
                    ->chart([7, 2, 10, 3, 15, 4, 17]),

                Stat::make('Closed Job Posts', JobPost::where('status_id', 11)->where('user_id', auth()->user()->id)->get()->count())
                    ->description(('Closed Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('danger')
                    ->chart([7,3,4,5,6,2,1,3,8,6]),
            ];
        }else{
            return [
                Stat::make('Total Job Posts', JobPost::count())
                    ->description(('Total Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('success')
                    ->chart([7,3,4,5,6,3,5,3]),

                Stat::make('Available Job Posts', JobPost::where('status_id', 10)->count())
                    ->description(('Available Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('primary')
                    ->chart([7, 2, 10, 3, 15, 4, 17]),

                Stat::make('Closed Job Posts', JobPost::where('status_id', 11)->count())
                    ->description(('Closed Job Posts'))
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->color('danger')
                    ->chart([7,3,4,5,6,2,1,3,8,6]),
            ];
        }
    }

    public static function canView(): bool 
    {
        // return auth()->user()->isAdmin();
        return auth()->user()->hasDirectPermission('Access Stats Widget');
    } 
}
