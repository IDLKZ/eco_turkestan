<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Models\UserPlace;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('moder.dashboard');
    }

    public function maps()
    {

    }
    public function places()
    {
        $places = UserPlace::with('place.area')->where('user_id', auth()->id())->paginate(10);
        return view('moder.place', compact('places'));
    }

}
