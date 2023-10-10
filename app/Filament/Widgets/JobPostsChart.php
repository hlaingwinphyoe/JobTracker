<?php

namespace App\Filament\Widgets;

use App\Models\JobPost;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class JobPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = $this->getJobPostsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Job Posts created',
                    'data' => $data['postsPerMonth'],
                ]
                ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getJobPostsPerMonth(): array
    {
        $now = Carbon::now();

        // $postsPermonth = [];
        $postsPermonth = array();

        $months = collect(range(1,12))->map(function($month) use($now, $postsPermonth) {
            $count = JobPost::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            // $count = JobPost::whereMonth('created_at', '10')->count();

            $postsPermonth[] = $count;

            return $now->month($month)->format('M');
        })->toArray();

        return [
            'postsPerMonth' => $postsPermonth,
            'months' => $months
        ];
    }
}
