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
        $breeds = Breed::all();
        $areas = Area::all();
        $sanitaries = Sanitary::all();
        $dataForBreed[] = ['Прочие породы', 0];

        foreach ($breeds as $value) {
            $pr = (Marker::where('breed_id', $value->id)->count()/Marker::count()) * 100;
            if ($pr < 3) {
                $dataForBreed[0][1] += $pr;
            } else {
                $dataForBreed[] = [$value->title_ru , $pr];
            }
        }

        foreach ($areas as $value) {
            $dataForArea[] = [$value->title_ru , (Marker::where('area_id', $value->id)->count()/Marker::count()) * 100];
        }
        foreach ($sanitaries as $value) {
            $dataForSanitary[] = [$value->title_ru , (Marker::where('sanitary_id', $value->id)->count()/Marker::count()) * 100];
        }

        return view('mayor.dashboard', compact('dataForBreed', 'dataForArea', 'dataForSanitary'));
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
