<?php

namespace App\Filament\Widgets;

use App\Models\Employer;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class EmployersChart extends ChartWidget
{
    protected static ? int $sort = 4;

    protected static string $color = 'info';

    protected static ?string $heading = 'Employers registered Chart in a year';

    protected function getData(): array
    {
        $data = $this->getEmployersPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'employer registered',
                    'data' => $data['employersPerMonth'],
                    // 'backgroundColor' => '#36A2EB',
                    // 'borderColor' => '#9BD0F5',
                ]
                ],
            'labels' => $data['months'],
        ];
    }

    public static function canView(): bool 
    {
        return auth()->user()->can('Access Chart Widget');
        // return auth()->user()->isAdmin();
    } 

    protected function getType(): string
    {
        return 'bar';
    }

    private function getEmployersPerMonth(): array
    {
        $now = Carbon::now();

        $employersPermonth = array();
        $months = array();

        foreach ( collect(range(1,12)) as $month) {
            $count = Employer::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $employersPermonth[] = $count;

            $months[] = $now->month($month)->format('M');
        }


        return [
            'employersPerMonth' => $employersPermonth,
            'months' => $months
        ];
    }
}
