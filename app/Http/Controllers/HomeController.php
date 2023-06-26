<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class HomeController extends Controller
{


    public function index(){
        return view("home");
    }
    public function map(){
        return view("map");
    }
    public function faq(){
        return view("faq");
    }
    public function stats(){
        Marker::factory()->count(100000)->create();
        return view("stats");
    }
    public function contact(){
        return view("contact");
    }

    public function db_dump(){
        Artisan::call("backup:run --only-db --disable-notifications");
    }


}
