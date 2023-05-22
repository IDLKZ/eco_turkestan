<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use App\Models\Place;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function getAllMarker(){
        return Marker::with("event","type","breed","sanitary","status","category","place")->get();
    }

    public function getPlacesMarker(Request $request){

        if($request->get("ids")){
            return Marker::whereIn("place_id",explode(",", $request->get("ids")))->get();
        }
        return [];

    }
}
