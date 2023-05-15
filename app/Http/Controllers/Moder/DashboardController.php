<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('moder.dashboard');
    }

    public function maps()
    {
        $geocodes = Place::with('area')->where('user_id', auth()->id())->get();
        dd($geocodes);
    }
}
