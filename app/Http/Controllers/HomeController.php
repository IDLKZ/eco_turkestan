<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view("stats");
    }
    public function contact(){
        return view("contact");
    }


}
