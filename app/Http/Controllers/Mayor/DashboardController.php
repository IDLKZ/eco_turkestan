<?php

namespace App\Http\Controllers\Mayor;

use App\Exports\MarkerExport;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Marker;
use App\Models\Place;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $markerTotal = Marker::count();
        $breeds = DB::table('markers')
            ->select('breed_id', DB::raw('count(*) as total'))
            ->groupBy('breed_id')
            ->orderBy('total', 'DESC')
            ->get();
        $breedTotal = $breeds->pluck("total");
        $breedsT = Breed::whereIn("id", $breeds->pluck("breed_id")->toArray())->pluck("title_ru","id");
        foreach ($breeds as $item) {
            $dataForBreed[] = [$breedsT[$item->breed_id], ($item->total/$markerTotal)*100];
        }
//        dd($dataForBreed);
//        $breeds = Breed::withCount('markers')->get();
        $areas = Area::withCount('markers')->get();
        $sanitaries = Sanitary::withCount('markers')->get();
//        $dataForBreed[] = ['Прочие породы', 0];

//        foreach ($breeds as $value) {
//            $pr = ($value->markers_count/$markerTotal) * 100;
//            $dataForBreed[] = [$value->title_ru , $pr];
//            if ($pr < 3) {
//                $dataForBreed[0][1] += $pr;
//            } else {
//                $dataForBreed[] = [$value->title_ru , $pr];
//            }
//        }
        foreach ($areas as $value) {
            $dataForArea[] = [$value->title_ru, ($value->markers_count/$markerTotal) * 100];
        }

        foreach ($sanitaries as $value) {
            $dataForSanitary[] = [$value->title_ru , ($value->markers_count/$markerTotal) * 100];
        }
        return view('mayor.dashboard', compact('dataForBreed', 'dataForArea', 'dataForSanitary', 'markerTotal'));
    }

    public function statistics()
    {
        $forExp = [];
        $markers = Marker::with('sanitary', 'breed', 'place.area')->paginate(20);

        return view('mayor.statistics', compact('markers', 'forExp'));
    }

    public function search(Request $request)
    {
        $markers = Marker::searchable($request->all())->paginate(20);
        $forExp = $request->all();
        return view('mayor.statistics', compact('markers', 'forExp'));
    }

    public function export(Request $request)
    {
        (new MarkerExport($request->all()))->store('markers.xlsx');
        toastr('Экспорт начался!');
        return back();
    }
}
