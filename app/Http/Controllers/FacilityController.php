<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $provinces = Province::all();
        $facilities = Facility::all();
        return view(view: 'facilities.index', data: [
            'provinces' => $provinces,
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'province' => 'required|integer'
        ]);

        $facility = new Facility();
        $facility->name = $validated['name'];
        $facility->description = $validated['description'];
        $facility->province_id = $validated['province'];

        $facility->save();

        return redirect(route('facilities.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
