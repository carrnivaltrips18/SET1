<?php

namespace App\Http\Controllers\Admin\Day_Itinerary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Slide2;

class Day_Wise_ItineraryController extends Controller
{

    public function index($id)
    {
        $packages = Package::find($id);
    
        if (!$packages) {
            return redirect()->back()->with('error', 'Package not found.');
        }
    
        // Get the first Slide2 record related to this package
        $slide2 = Slide2::where('package_id', $id)->first();
    
        return view('admin.Day_Itinerary.Day_Wise_Itinerary', compact('packages', 'slide2'));
    }
    
    public function UpdateOrStore(Request $request, $id)
    {
        // dd($request);
        if ($request->has('id')) {
            $slide2 = Slide2::findOrFail($request->id);
        } else {
            $slide2 = new Slide2();
        }
        $slide2->package_id = $request->package_id;
        $slide2-> Experience_Description = $request->Experience_Description;
        $slide2-> Experience_Media_Link = $request-> Experience_Media_Link;
        $slide2->Point_1_Heading = $request->Point_1_Heading;
        $slide2->Point_1_Details = $request->Point_1_Details;
        $slide2->Point_2_Heading = $request->Point_2_Heading;
        $slide2->Point_2_Details = $request->Point_2_Details;
        $slide2->Point_3_Heading = $request->Point_3_Heading;
        $slide2->Point_3_Details = $request->Point_3_Details;
        $slide2->Point_4_Heading = $request->Point_4_Heading;
        $slide2->Point_4_Details = $request->Point_4_Details;
        $slide2->Point_5_Heading = $request->Point_5_Heading;
        $slide2->Point_5_Details = $request->Point_5_Details;
        $slide2->Point_6_Heading = $request->Point_6_Heading;
        $slide2->Point_6_Details = $request->Point_6_Details;
        // Save the slide record (either new or updated)
        $slide2->save();
        // Redirect with success message
        return redirect()->back()->with('success', 'Package slide ' . ($request->has('id') ? 'updated' : 'created') . ' successfully.');

    }
    
}
