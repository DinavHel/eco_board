<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sensors = Sensor::all();
        $areas = Area::all();

        return view(view: 'sensors.index', data: [
            'sensors' => $sensors,
            'areas' => $areas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'area' => 'required|integer'
        ]);

        $sensor = new Sensor();
        $sensor->name = $validated['name'];
        $sensor->description = $validated['description'];
        $sensor->area_id = $validated['area'];
        $sensor->uuid = uuid_create();

        $sensor->save();

        return redirect(route('sensors.index'));
    }
}
