<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::latest()->get()->take(8);
        $types = Type::isType('job')->latest()->get();
        return view('main', compact('regions', 'types','categories'));
    }

    public function jobLists(Request $request)
    {
        $regions = Region::all();
        $categories = Category::latest()->get();
        $types = Type::isType('job')->latest()->get();
        return view('pages.jobs.index', compact('regions', 'categories', 'types'));
    }

    public function employerLists(Request $request)
    {
        $employerType = Type::isType('user')->where('name', 'employer')->first();
        $employers = User::where('type_id', $employerType->id)->paginate(20);
        $regions = Region::all();
        $types = Type::isType('job')->latest()->get();
        $categories = Category::latest()->get();
        return view('pages.employers.index', compact('regions', 'categories','types'));
    }
}
