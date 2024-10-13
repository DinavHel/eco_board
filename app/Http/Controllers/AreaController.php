<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Facility;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        $facilities = Facility::all();

        return view(view: 'areas.index', data: [
            'areas' => $areas,
            'facilities' => $facilities,
        ]);
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'facility' => 'required|integer'
        ]);

        $area = new Area();
        $area->name = $validated['name'];
        $area->description = $validated['description'];
        $area->facility_id = $validated['facility'];

        $area->save();

        return redirect(route('area.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        //
    }
}
