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
        return view('pages.jobs.index', compact('regions', 'categories', 'types'));
    }

    public function employerLists(Request $request)
    {
        $regions = Region::all();
        $categories = Category::orderBy('id')->get();
        $types = Type::isType('job')->orderBy('id')->get();
        return view('pages.employers.index', compact('regions', 'categories', 'types'));
    }

    public function jobDetail($slug)
    {
        $jobPost = JobPost::with('user', 'category', 'type')->where('slug', $slug)->first();

        $relatedJobs = JobPost::with('user', 'category', 'type')->where('category_id', $jobPost->category_id)->where('id', '!=', $jobPost->id)->inRandomOrder()->get()->take(4);
        return view('pages.jobs.show', compact('jobPost', 'relatedJobs'));
    }

    public function employerDetail($id)
    {
        $employer = Employer::with('jobs')->findOrFail($id);
        $openJobTotal = JobPost::where('user_id', $employer->id)->statusAvailable()->get()->count();
        return view('pages.employers.show', compact('employer', 'openJobTotal'));
    }
}
