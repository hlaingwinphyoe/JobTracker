<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
       $regions = Region::all();
       
       return view('main',compact(['regions']));
    }
}
