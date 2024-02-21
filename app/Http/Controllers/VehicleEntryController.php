<?php

namespace App\Http\Controllers;

use App\Models\VehicleEntry;
use Illuminate\Http\Request;

class VehicleEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleEntry::paginate(request('rowsPerPage'));
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
            'registration_no' => 'required',
            'crossed_date_time' => 'required',
            'driver_name' => 'required',
        ]);

        VehicleEntry::create($validated);
        return $this->index(request());
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleEntry $vehicleEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleEntry $vehicleEntry)
    {
        $validated = request()->validate([
            'registration_no' => 'required',
            'crossed_date_time' => 'required',
            'driver_name' => 'required',
        ]);
        $vehicleEntry->update($validated);
        return $this->index(request());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleEntry $vehicleEntry)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleEntry $vehicleEntry)
    {
        $vehicleEntry->delete();
        return $this->index(request());
    }
}
