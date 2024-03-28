<?php

namespace App\Http\Controllers;

use App\Models\CommodityDetail;
use App\Models\VehicleEntry;
use Illuminate\Http\Request;

class VehicleEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VehicleEntry::query()
            // ->with('commodity_details')
            ->paginate(request('rowsPerPage'));
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

        $commodity_details = $request->validate([
            'commodity_details' => 'required|array|min:1',
            'commodity_details.*.commodity_id' => 'required',
            'commodity_details.*.measurement_unit_id' => 'required',
            'commodity_details.*.quantity' => 'nullable',
            'commodity_details.*.origin_company' => 'nullable',
            'commodity_details.*.challan_no' => 'required',
            'commodity_details.*.challan_date' => 'required|date',
            'commodity_details.*.agency_name' => 'nullable',
            'commodity_details.*.district_id' => 'required',
            'commodity_details.*.weight' => 'nullable',
        ]);

        // $commodity_details = $request->validate([
        //     'commodity_details' => 'nullable|array|min:1',
        //     'commodity_details.*.commodity_id' => 'nullable',
        //     'commodity_details.*.measurement_unit_id' => 'nullable',
        //     'commodity_details.*.quantity' => 'nullable',
        //     'commodity_details.*.origin_company' => 'nullable',
        //     'commodity_details.*.challan_no' => 'nullable',
        //     'commodity_details.*.challan_date' => 'nullable|date',
        //     'commodity_details.*.agency_name' => 'nullable',
        //     'commodity_details.*.district_id' => 'nullable',
        //     'commodity_details.*.weight' => 'nullable',
        // ]);
        try {

            $vehicleEntry = VehicleEntry::create($validated);

            foreach ($commodity_details['commodity_details'] as $commodityDetail) {
                $vehicleEntry->commodity_details()->create($commodityDetail);
            }
            return $this->index(request());
        } catch (\Throwable $th) {
            logger($th->getMessage());
            return response([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleEntry $vehicleEntry)
    {
        return $vehicleEntry->load('commodity_details.commodity');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleEntry $vehicleEntry)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleEntry $vehicleEntry)
    {
        $validated = request()->validate([
            'registration_no' => 'required',
            'crossed_date_time' => 'required',
            'driver_name' => 'required',
        ]);

        $request->validate([
            'commodity_details' => 'required|array|min:1',
            'commodity_details.*.commodity_id' => 'required',
            'commodity_details.*.measurement_unit_id' => 'required',
            'commodity_details.*.quantity' => 'nullable',
            'commodity_details.*.origin_company' => 'nullable',
            'commodity_details.*.challan_no' => 'required',
            'commodity_details.*.challan_date' => 'required|date',
            'commodity_details.*.agency_name' => 'nullable',
            'commodity_details.*.district_id' => 'required',
            'commodity_details.*.weight' => 'nullable',
        ]);

        $commodity_details = request('commodity_details');
        $existingDetails = $vehicleEntry->commodity_details;

        foreach ($commodity_details as $detail) {
            unset($detail['commodity']);
            if (isset($detail['id'])) {
                $commodityDetail = $existingDetails->firstWhere('id', $detail['id']);
                $commodityDetail->update($detail);
            } else if ($detail) {
                try {
                    $vehicleEntry->commodity_details()->create($detail);
                } catch (\Throwable $th) {
                    logger($th->getMessage());
                }
            }
        }
        $vehicleEntry->update($validated);
        if (request('deleted_commodity_detail_ids')) {
            //
        }
        return $this->index(request());
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
