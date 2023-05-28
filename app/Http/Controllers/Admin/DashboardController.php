<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserPresenceChannel;
use App\Http\Controllers\Controller;
use App\Models\GeoPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function geo_positions()
    {
        $moders = User::with('geo')->where('role_id', 2)->get();
        return view('admin.geo.index', compact('moders'));
    }

    public function getByGeo($id)
    {
        $geo = GeoPosition::findOrFail($id);
        return view('admin.geo.show', compact('geo'));
    }
}
