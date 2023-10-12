<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

use App\Models\FAQ;
use App\Models\JobPost;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndConditions;

class PageController extends Controller
{
    public function faq()
    {
        $faqs = FAQ::get();

        return view('pages.pages.faq', compact('faqs'));
    }

    public function terms()
    {
        $terms = TermsAndConditions::get()->last();

        return view('pages.pages.terms', compact('terms'));
    }

    public function policy()
    {
        $policy = PrivacyPolicy::get()->last();

        return view('pages.pages.policy', compact('policy'));
    }

    public function savedJob(Employee $employee, JobPost $jobPost)
    {
        $added_data = $employee->job_posts()->where('job_post_id', $jobPost->id)->first();

        if ($added_data) {
            return redirect()->back()->with('error', 'Already saved jobs');
        } else {
            $employee->job_posts()->attach($jobPost);

            return redirect()->back()->with('message', 'Saved jobs');
        }
    }

    public function detach(Employee $employee, JobPost $jobPost)
    {
        $employee->job_posts()->detach($jobPost);

        return redirect()->back()->with('message', 'Removed from Favorites');
    }

    public function applyJob($slug)
    {
        $jobPost = JobPost::where('slug', $slug)->first();
        return view('pages.jobs.apply-job', compact('jobPost'));
    }

    public function submitJob(Request $request, Employee $employee, JobPost $jobPost)
    {
        $added_data = $employee->applied_jobs()->where('job_id', $jobPost->id)->first();

        if ($added_data) {
            return redirect()->back()->with('error', 'Already Submitted!');
        } else {
            $employee->applied_jobs()->create([
                "cover_letter" => $request->cover_letter,
            ]);

            return redirect()->route('home.jobs')->with('message', 'Successfully Submitted.');
        }
    }
}
