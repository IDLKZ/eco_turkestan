<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trees = Marker::with('place', 'type')->where('user_id', auth()->id())->paginate(20);
        return view('moder.marker.index', compact('trees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tree = Marker::with('place', 'type', 'event', 'breed', 'category', 'sanitary', 'status')->findOrFail($id);

        return view('moder.marker.show', compact('tree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Marker::findOrFail($id)->delete();
        return redirect()->back();
    }
}
