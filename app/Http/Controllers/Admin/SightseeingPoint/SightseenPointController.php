<?php

namespace App\Http\Controllers\Admin\SightseeingPoint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sightseeing;
use App\Models\SightseeingPoint;

class SightseenPointController extends Controller
{
    public function index($id)
    {
        // dd($id);
        // Find the sightseeing image by ID
        $sightseeing = Sightseeing::findOrFail($id); // Use findOrFail for better error handling

        // Retrieve all sightseeing points related to the found sightseeing image
        $sightseeingPoints = SightseeingPoint::where('sightseeing_id', $sightseeing->id)->get();

        // Return the view with the retrieved data
        return view('admin.SightseeingPoint.index', compact('sightseeing', 'sightseeingPoints'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'destination_point' => 'required',
            'destination_point.*' => 'required',
            'description' => 'required',
            // 'description.*' => 'nullable',
        ]);

        // Find the sightseeing by ID
        // $sightseeing = Sightseeing::findOrFail($id);
        // $sightseeing->destination = $request->destination;
        // $sightseeing->location_wise = $request->location_wise;
        // $sightseeing->save();

        // // Clear existing points and descriptions
        // $sightseeing->points()->delete();

        // Insert new points
        foreach ($request->destination_point as $index => $point) {
            $sightseeingPoint = new SightseeingPoint();
            $sightseeingPoint->sightseeing_id = $request->id;
            $sightseeingPoint->destination = $request->destination;
            $sightseeingPoint->location_wise = $request->location_wise;
            $sightseeingPoint->destination_point = $request->destination_point[$index];
            $sightseeingPoint->description = $request->description[$index] ?? null; // Use null if no description
            $sightseeingPoint->save();
        }

        return redirect()->back()->with('success', 'Sightseeing updated successfully!');
    }

    public function edit($id)
    {
        $sightseeing = Sightseeing::findOrFail($id);
        $sightseeingPoints = SightseeingPoint::where('sightseeing_id', $id)->get();

        return view('admin.sightseeing.edit', compact('sightseeing', 'sightseeingPoints'));
    }
    public function delete($sightseeing_id, $id)
    {
        $sightseeingPoint = SightseeingPoint::findOrFail($id);
        $sightseeingPoint->delete();
    
        return redirect()->back()->with('success', 'Sightseeing point deleted successfully.');
    }
}
