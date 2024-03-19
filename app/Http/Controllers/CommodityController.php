<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Commodity::with('measurement_unit')->get();
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
            'name' => 'required',
            'measurement_unit_id' => 'required',
        ]);
        Commodity::create($validated);

        return $this->index(request());
    }

    /**
     * Display the specified resource.
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commodity $commodity)
    {

        $validated = $request->validate([
            'name' => 'required',
            'measurement_unit_id' => 'required',
        ]);
        $commodity->update($validated);
        return $this->index(request());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return $this->index(request());
    }
}
