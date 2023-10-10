<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FAQ;
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
}
