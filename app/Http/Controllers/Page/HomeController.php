<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $categories = Category::inRandomOrder()->get()->take(8);
        $types = Type::isType('job')->orderBy('id')->get();
        return view('main', compact('regions', 'types', 'categories'));
    }

    public function jobLists(Request $request)
    {
        $regions = Region::all();
        $categories = Category::orderBy('id')->get();
        $types = Type::isType('job')->orderBy('id')->get();
        $jobsTotal = JobPost::all()->count();
        return view('pages.jobs.index', compact('regions', 'categories', 'types', 'jobsTotal'));
    }

    public function employerLists(Request $request)
    {
        $regions = Region::all();
        $categories = Category::orderBy('id')->get();
        $types = Type::isType('job')->orderBy('id')->get();

        $jobsTotal = JobPost::all()->count();
        return view('pages.employers.index', compact('regions', 'categories', 'types', 'jobsTotal'));
    }

    public function jobDetail($slug)
    {
        $jobPost = JobPost::with('user', 'category', 'type')->where('slug', $slug)->first();

        if ($jobPost) {
            $relatedJobs = $jobPost->where('category_id', $jobPost->category_id)->where('id', '!=', $jobPost->id)->inRandomOrder()->get()->take(4);
            return view('pages.jobs.show', compact('jobPost', 'relatedJobs'));
        } else {
            return view('composables.404');
        }
    }

    public function employerDetail($id)
    {
        $employer = Employer::with('jobs')->findOrFail($id);

        $openJobTotal = $employer->jobs()->statusAvailable()->get()->count();

        $categories = Category::inRandomOrder()->get()->take(5);

        return view('pages.employers.show', compact('employer', 'openJobTotal', 'categories'));
    }
}
