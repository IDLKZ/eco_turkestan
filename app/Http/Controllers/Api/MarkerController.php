<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use App\Models\Place;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class MarkerController extends Controller
{
    public function getAllMarker(){

        return Marker::with("event","type","breed","sanitary","status","category","place")->get();
    }

    public function getPlacesMarker(Request $request){
        if($request->get("ids") && $request->has("search_polygon")){
            $polygon = Polygon::fromJson($request->get("search_polygon"));
            $query = Marker::query()->whereContains($polygon, "point");
            if($request->get("event")){
                $query = $query->whereIn("event_id",explode(",", $request->get("event")));
            }
            if($request->get("status")){
                $query = $query->whereIn("status_id",explode(",", $request->get("status")));
            }
             if($request->get("category")){
                 $query = $query->whereIn("category_id",explode(",", $request->get("category")));
             }
            if($request->get("sanitary")){
                $query = $query->whereIn("sanitary_id",explode(",", $request->get("sanitary")));
            }
             if($request->get("breed")){
                 $query = $query->whereIn("breed_id",explode(",", $request->get("breed")));
             }
            return $query->whereIn("place_id",explode(",", $request->get("ids")))->get();
        }
        return [];

    }
}
