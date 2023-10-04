<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Models\Region;
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
}
