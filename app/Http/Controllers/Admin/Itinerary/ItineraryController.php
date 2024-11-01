<?php

namespace App\Http\Controllers\Admin\Itinerary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

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
        return redirect()->back()->with('success', 'Package created successfully.');
    }
    public function list()
    {
        $packages = Package::all();
        return view('admin.Itinerary.list',compact('packages'));
    }
}
