<?php

namespace App\Http\Controllers\Admin\Itinerary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\file;

class ItineraryController extends Controller
{
    public function index()
    {
        return view('admin.Itinerary.index');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'package_name' => 'required',
            'day'=> 'required',
            'night' => 'required',
            'package_img' => 'required',
            'package_status' => 'required',
        ]);
        $packages = new Package();
        $packages -> package_name = $request->package_name;
        $packages -> day = $request->day;
        $packages -> night = $request->night;
        $packages -> package_status = $request-> package_status;
        if ($request->hasFile('package_img'))
        {
            $image = $request->file('package_img');
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext; 
            $image->move(public_path('package_image'), $imagename);
            $packages->package_img = $imagename;
        }
        $packages->save();
        return redirect()->Route('admin.itinerary.list')->with('success', 'Package created successfully.');
    }
    public function list(Request $request)
        {
            // Check if there is a search query
            $search = $request->input('search');

            // Search for packages by name
            $packages = Package::when($search, function ($query, $search) {
                return $query->where('package_name', 'LIKE', '%' . $search . '%'); // Adjust 'package_name' as needed
            })->paginate(5);

            return view('admin.Itinerary.list', compact('packages', 'search'));
        }
    public function edit($id)
    {
        $packages = Package::find($id);
        return view('admin.Itinerary.edit',compact('packages'));
    }
    public function update(Request $request, $id)
    {
        // Find the package by ID
        $package = Package::findOrFail($id);
        // dd($request);

        $request->validate([
            'package_name' => 'required',
            'day' => 'required',
            'night' => 'required',
            'package_img' => 'required',
            'package_status' => 'required',
        ]);
    
        // Update package fields
        $package->package_name = $request->package_name;
        $package->day = $request->day;
        $package->night = $request->night;
        $package->package_status = $request->package_status;
    
        // Handle image upload
        if ($request->hasFile('package_img')) {
            // Delete the old image if necessary
            if ($package->package_img) {
                $oldImagePath = public_path('package_image/' . $package->package_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
    
            // Store the new image
            $image = $request->file('package_img');
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext; 
            $image->move(public_path('package_image'), $imagename);
            $package->package_img = $imagename; // Update the image name in the package
        }
    
        // Save the updated package
        $package->save();
    
        // Redirect back with a success message
        return redirect()->route('admin.itinerary.list')->with('success', 'Package updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        $packages = Package::findOrFail($id);
        File::delete('package_image/'. $packages->package_img);
        $packages->delete();
        return redirect()->back()->with('success', 'Package Delete successfully.');
    }

    public function slide()
    {
        return view('admin.Itinerary.slide_form');
    }
    
}
