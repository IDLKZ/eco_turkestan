<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarkerRequest;
use App\Models\GeoPosition;
use App\Models\Marker;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use MatanYadaev\EloquentSpatial\Objects\Point;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trees = Marker::with('place', 'type')->where('user_id', auth()->id())->paginate(20);
        return view('moder.marker.index', compact('trees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkerRequest $request)
    {
        $data = $request->all();
        $latLng['lat'] = $request['lat'];
        $latLng['lng'] = $request['lng'];
        $test = Carbon::now()->format('Y') - $data['age'];
        $data['landing_date'] = Carbon::createFromDate($test)->format('d.m.Y');
//        if ($request['landing_date']) {
//            $years = explode('-', $data['landing_date']);
//            $year = $years[0];
//            $data['age'] = Carbon::now()->format('Y') - $year;
//        } else {
//            unset($data['landing_date']);
//        }
        $data['user_id'] = auth()->id();

//        $geoPosition = GeoPosition::where('user_id', auth()->id())->latest()->first();
//
//        if ($geoPosition != null) {
//            GeoPosition::where('user_id', auth()->id())->update([
//                'geocode' => json_encode($latLng)
//            ]);
//        } else {
//            GeoPosition::create([
//                'user_id' => auth()->id(),
//                'geocode' => json_encode($latLng)
//            ]);
//        }

        foreach (json_decode($request['geocode'][0]) as $datum) {
            $data['geocode'] = json_encode($datum);

            $data['point'] = new Point($datum->lat, $datum->lng);
            Marker::add($data);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tree = Marker::with('place.area', 'type', 'event', 'breed', 'category', 'sanitary', 'status')->findOrFail($id);
        return view('moder.marker.show', compact('tree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Marker::findOrFail($id)->delete();
        return redirect()->back();
    }
}
