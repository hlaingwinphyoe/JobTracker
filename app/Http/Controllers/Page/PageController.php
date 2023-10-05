<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FAQ;

class PageController extends Controller
{
    public function faq()
    {
        $faqs = FAQ::isType('faq')->get();
        
        return view('pages.pages.faq', compact('faqs'));
    }
}
