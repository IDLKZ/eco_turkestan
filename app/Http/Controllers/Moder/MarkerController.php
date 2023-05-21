<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarkerRequest;
use App\Models\Marker;
use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $place = Place::with('markers')->findOrFail($id);
        return view('moder.marker.create', compact('place'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkerRequest $request)
    {
        $data = $request->all();
        if ($request['landing_date']) {
            $years = explode('-', $data['landing_date']);
            $year = $years[0];
            $data['age'] = Carbon::now()->format('Y') - $year;
        } else {
            unset($data['landing_date']);
        }
        $data['user_id'] = auth()->id();
        foreach (json_decode($request['geocode'][0]) as $datum) {
            $data['geocode'] = json_encode($datum);
            Marker::add($data);
        }
        return redirect(route('trees.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
