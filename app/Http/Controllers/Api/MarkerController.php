<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function getAllMarker(){
        return Marker::with("event","type","breed","sanitary","status","category","place")->get();
    }
}
