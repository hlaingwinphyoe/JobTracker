<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
       $regions = Region::all();
       $categories = Category::latest()->get()->take(8);
       $types = Type::latest()->get();
       return view('main',compact('regions','types'));
    }

    public function jobLists(Request $request) {
        $regions = Region::all();
        $categories = Category::latest()->get();
       $types = Type::latest()->get();
        return view('pages.jobs.index',compact('regions','categories','types'));
    }
}
