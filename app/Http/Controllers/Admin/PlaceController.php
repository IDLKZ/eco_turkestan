<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::with("area")->paginate(20);
        return view("admin.place.index",compact("places"));
    }

    public function addPlace($id = null)
    {

        $area = Area::find($id);
        $areas = [];
        if(!$area){
            $areas = Area::with("places")->get();
        }
        $places = Place::where('area_id', $id)->get();
        return view('admin.place.create', compact('area', 'places',"areas"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        $places = Place::all();
        return view("admin.place.create",compact("areas","places"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'bg_color' => 'required',
            'geocode' => 'required',
            'area_id'=>'required'
        ]);
        Place::add($request->all());
        return redirect(route('place.index'));
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
        $place = Place::findOrFail($id);
        $place->delete();
        return redirect()->back();
    }
}
