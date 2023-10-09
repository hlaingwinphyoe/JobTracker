<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Http\Resources\JobPostResource;
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
            $employers = User::employer()->filterOn()->orderBy('id', 'DESC')->paginate($request->page_size);
        } else {
            $employers = User::employer()->filterOn()->orderBy('id', 'DESC')->paginate(20);
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
}
