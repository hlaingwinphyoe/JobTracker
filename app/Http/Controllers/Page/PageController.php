<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

use App\Models\FAQ;
use App\Models\JobPost;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndConditions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $employee = DB::transaction(function () use ($request, $employee, $jobPost) {
                $request->validate([
                    'cover_letter' => 'required',
                    'file' => 'required|file|mimes:jpeg,bmp,png,svg,pdf'
                ]);

                $dir = "public/employee_attachment";

                if (!Storage::exists('public/employee_attachment')) {
                    Storage::makeDirectory('public/employee_attachment');
                }

                $newName = uniqid() . "_cv_letter." . $request->file("file")->extension();
                $request->file("file")->storeAs($dir, $newName);

                $employee->applied_jobs()->create([
                    "job_id" => $jobPost->id,
                    "cover_letter" => $request->cover_letter,
                    "file" => $newName
                ]);

                return $employee;
            });

            return redirect()->route('jobs.index')->with('message', 'Successfully Submitted.');
        }
    }
}
