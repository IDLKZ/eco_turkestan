<?php

namespace App\Http\Controllers\Mayor;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Marker;
use App\Models\Place;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mayor.dashboard');
    }

    public function statistics()
    {
        $markers = Marker::with('area', 'sanitary', 'breed', 'place')->paginate(20);
        return view('mayor.statistics', compact('markers'));
    }

    public function search(Request $request)
    {
        $markers = Marker::searchable($request)->paginate(20);

        return view('mayor.statistics', compact('markers'));
    }
}
