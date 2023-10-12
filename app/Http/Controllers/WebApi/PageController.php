<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Http\Resources\JobPostResource;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function regionList()
    {
        $regions = Region::all();
        return response()->json([
            'regions' => $regions,
        ]);
    }

    public function jobPostList(Request $request)
    {
        if (isset($request->page_size) && $request->page_size) {
            $jobPosts = JobPost::with('user', 'type', 'region')->filterOn()->orderBy('id', 'DESC')->paginate($request->page_size);
        } else {
            $jobPosts = JobPost::with('user', 'type', 'region')->filterOn()->orderBy('id', 'DESC')->paginate(20);
        }

        return JobPostResource::collection($jobPosts);
    }

    public function employerList(Request $request)
    {
        if (isset($request->page_size) && $request->page_size) {
            $employers = Employer::filterOn()->orderBy('id', 'DESC')->paginate($request->page_size);
        } else {
            $employers = Employer::filterOn()->orderBy('id', 'DESC')->paginate(20);
        }

        return EmployerResource::collection($employers);
    }

    public function employerJobs(Request $request, $employerId)
    {
        if (isset($request->page_size) && $request->page_size) {
            $jobPosts = JobPost::with('user', 'type', 'region')->filterOn()->statusAvailable()->where('user_id', $employerId)->orderBy('id', 'DESC')->paginate($request->page_size);
        } else {
            $jobPosts = JobPost::with('user', 'type', 'region')->filterOn()->statusAvailable()->where('user_id', $employerId)->orderBy('id', 'DESC')->paginate(20);
        }

        return JobPostResource::collection($jobPosts);
    }

    public function savedJobs(Employee $employee, JobPost $jobPost)
    {
        $added_data = $employee->job_posts()->where('job_post_id', $jobPost->id)->first();

        if ($added_data) {
            return redirect()->back()->with('error', 'Already saved jobs');
        } else {
            $employee->job_posts()->attach($jobPost);

            return response()->json([
                'message' => "Saved jobs",
            ]);
        }
    }
}
