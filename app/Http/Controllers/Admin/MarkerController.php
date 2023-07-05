<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Event;
use App\Models\Marker;
use App\Models\Place;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function index(){
        $places = Place::with("area")->get();
        $breeds = Breed::all();
        $categories = Category::all();
        $events = Event::all();
        $sanitaries = Sanitary::all();
        $status = Status::all();
        $types = Type::all();
        return view("admin.marker.index",compact("places","breeds","types","status","sanitaries","events","categories"));
    }


    public function edit(Request $request){
        $query = Marker::query()->where(["place_id" => $request->get("place_id"),"breed_id" => $request->get("breed_id")]);
        $places = Place::with("area")->get();
        $breeds = Breed::all();
        $categories = null;
        $events = null;
        $sanitaries = null;
        $status = null;
        $types = null;
        if($request->get("event_id")){
            $events = Event::all();
            $query = $query->whereIn("event_id",$request->get("event_id"));
        }
        if($request->get("sanitary_id")){
            $sanitaries = Sanitary::all();
            $query = $query->whereIn("event_id",$request->get("sanitary_id"));
        }
        if($request->get("status_id")){
            $status = Status::all();
            $query = $query->whereIn("status_id",$request->get("status_id"));
        }
        if($request->get("type_id")){
            $types = Type::all();
            $query = $query->whereIn("type_id",$request->get("type_id"));
        }
        if($request->get("category_id")){
            $categories = Category::all();
            $query = $query->whereIn("category_id",$request->get("category_id"));
        }
        $marker = $query->count();
        $data = $request->all();
        return view("admin.marker.update",compact("places","breeds","types","status","sanitaries","events","categories","marker","data"));
    }
}
