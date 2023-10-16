<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class EmployeesChart extends ChartWidget
{
    protected static ? int $sort = 4;

    protected static string $color = 'info';
    
    protected static ?string $heading = 'Employees registered Chart in a year';

    protected function getData(): array
    {
        $data = $this->getEmployeesPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Employee registered',
                    'data' => $data['employeesPerMonth'],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
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

    private function getEmployeesPerMonth(): array
    {
        $now = Carbon::now();

        $employeesPermonth = array();
        $months = array();

        foreach ( collect(range(1,12)) as $month) {
            $count = Employee::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $employeesPermonth[] = $count;

            $months[] = $now->month($month)->format('M');
        }


        return [
            'employeesPerMonth' => $employeesPermonth,
            'months' => $months
        ];
    }
}
