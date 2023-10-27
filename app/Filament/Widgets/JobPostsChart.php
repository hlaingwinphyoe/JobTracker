<?php

namespace App\Filament\Widgets;

use App\Models\AppliedJob;
use App\Models\JobPost;
use App\Models\Type;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class JobPostsChart extends ChartWidget
{
    protected static ? int $sort = 3;

    protected static ?string $maxHeight = '300px';

    protected int | string | array $columnSpan = 'full';

    // protected static string $color = 'info';

    protected static ?string $heading = 'Applied Job Post Chart';

    // protected static ?string $pollingInterval = null;
    protected static bool $isLazy = true;

    protected function getData(): array
    {
        $data = $this->getJobPostsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Job Posts created',
                    'data' => $data['postsPerMonth'],
                    // 'backgroundColor' => '#36A2EB',
                    // 'borderColor' => '#9BD0F5',
                ]
                ],
            'labels' => $data['months'],
        ];
    }

    public static function canView(): bool 
    {
        return auth()->user()->can('Access Applied Job Chart Widget');
        // return auth()->user()->isAdmin();
    } 

    protected function getType(): string
    {
        return 'line';
    }

    private function getJobPostsPerMonth(): array
    {
        $now = Carbon::now();

        $postsPermonth = array();
        $months = array();

        // $months = collect(range(1,12))->map(function($month) use($now, $postsPermonth) {
        //     $count = JobPost::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();

        //     $postsPermonth[] = $count;

        //     return $now->month($month)->format('M');
        // })->toArray();

        foreach ( collect(range(1,12)) as $month) {
            // $count = JobPost::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $employer = Type::where('slug', 'employer')->first();

            if (auth()->user()->type->id == $employer->id) {
                $count = AppliedJob::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->whereHas('job_post', function($q) {
                    $q->where('user_id', auth()->user()->id);
                })->get()->groupBy('job_id')->count();
            }else{
                $count = AppliedJob::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->get()->groupBy('job_id')->count();
            }

            $postsPermonth[] = $count;

            $months[] = $now->month($month)->format('M');
        }


        return [
            'postsPerMonth' => $postsPermonth,
            'months' => $months
        ];
    }
}
