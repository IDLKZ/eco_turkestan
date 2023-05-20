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
        $areas = Area::with("places")->get();
        return view('admin.place.create', compact('area',"areas"));
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
        dd("i am show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::findOrFail($id);
        $area = Area::where(["id"=>$place->area_id])->first();
        $places = Place::where(["area_id"=>$area->id])->whereNot("id",$place->id)->get();
        return view("admin.place.edit",compact("area","place","places"));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'title_ru' => 'required',
            'bg_color' => 'required',
            'bg_color' => 'required',
            'geocode' => 'required'
        ]);
        $place = Place::findOrFail($id);
        $place->edit($request->except(["area_id"]));
        return redirect(route('place.index'));
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
