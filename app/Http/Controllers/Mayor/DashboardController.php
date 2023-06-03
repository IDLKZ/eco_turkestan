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
        $breeds = Breed::get();
        $subjectData[] = ['Прочие породы', 0];
        foreach ($breeds as $key => $value) {
            $pr = (Marker::where('breed_id', $value->id)->count()/Marker::count()) * 100;
            if ($pr < 0.75) {
                $subjectData[0][1] += $pr;
            } else {
                $subjectData[] = [$value->title_ru , $pr];
            }
        }

        return view('mayor.dashboard', compact('subjectData'));
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
