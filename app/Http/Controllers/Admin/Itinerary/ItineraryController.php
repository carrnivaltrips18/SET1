<?php

namespace App\Http\Controllers\Admin\Itinerary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\file;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

        // $manager = new ImageManager(Driver::class);
        // $img = $manager->read(public_path('package_image'.$imagename));
        // $img->cover(150, 150);
        // $img->save(public_path('package_image'.$imagename));
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
            // 'package_img' => 'required',
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



    // Here work on slide1


    public function slide($id)
    {
        // dd($id);
        $packages = Package::find($id);
        return view('admin.Itinerary.slide1',compact('packages'));
    }
    // slide data store
    public function storeOrUpdate(Request $request,$id)
    {
        // dd($request);
        // Validate the incoming request data

        // $request->validate([
        //     'package_name' => 'required',
        //     's1_text1' => 'required',
        //     's1_anim_text2' => 'required',
        //     's1_text3' => 'required',
        //     's1_square_box_text' => 'required',
        //     's1_btn1' => 'required',
        //     's1_btn2' => 'required',
        //     's1_img' => 'required',
    
        //     's2_text1' => 'required',
        //     's2_anim_text2' => 'required',
        //     's2_text3' => 'required',
        //     's2_square_box_text' => 'required',
        //     's2_btn1' => 'required',
        //     's2_btn2' => 'required',
        //     's2_img' => 'required',
    
        //     's3_text1' => 'required',
        //     's3_anim_text2' => 'required',
        //     's3_text3' => 'required',
        //     's3_square_box_text' => 'required',
        //     's3_btn1' => 'required',
        //     's3_btn2' => 'required',
        //     's3_img' => 'required',
        // ]);


        // dd($request);
    
        if ($request->has('id')) {
            $packages = Package::findOrFail($request->id);
        } else {
            $packages = new Package();
        }
        // dd($id);
        // $slide->package_name = $request->package_name;
    
        // Assign the text fields for each slide
        $packages->s1_text1 = $request->s1_text1;
        $packages->s1_anim_text2 = $request->s1_anim_text2;
        $packages->s1_text3 = $request->s1_text3;
        $packages->s1_square_box_text = $request->s1_square_box_text;
        $packages->s1_btn1 = $request->s1_btn1;
        $packages->s1_btn2 = $request->s1_btn2;
    
        $packages->s2_text1 = $request->s2_text1;
        $packages->s2_anim_text2 = $request->s2_anim_text2;
        $packages->s2_text3 = $request->s2_text3;
        $packages->s2_square_box_text = $request->s2_square_box_text;
        $packages->s2_btn1 = $request->s2_btn1;
        $packages->s2_btn2 = $request->s2_btn2;
    
        $packages->s2_text1 = $request->s2_text1;
        $packages->s3_anim_text2 = $request->s3_anim_text2;
        $packages->s3_text3 = $request->s3_text3;
        $packages->s3_square_box_text = $request->s3_square_box_text;
        $packages->s3_btn1 = $request->s3_btn1;
        $packages->s3_btn2 = $request->s3_btn2;
    
        // Handle image uploads for each slide (only if a new image is provided)
        
        if ($request->hasFile('s1_img')) {
            // Check if the old image exists and delete it
            if ($packages->s1_img && file_exists(public_path('slide_images/' . $packages->s1_img))) {
                unlink(public_path('slide_images/' . $packages->s1_img)); // Delete old image
            }
        
            // Handle the new image upload
            $image = $request->file('s1_img');
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext;
            $image->move(public_path('slide_images'), $imagename);
            $packages->s1_img = $imagename;
        }
        
        if ($request->hasFile('s2_img')) {
            // Check if the old image exists and delete it
            if ($packages->s2_img && file_exists(public_path('slide_images/' . $packages->s2_img))) {
                unlink(public_path('slide_images/' . $packages->s2_img)); // Delete old image
            }
        
            // Handle the new image upload
            $image = $request->file('s2_img');
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext;
            $image->move(public_path('slide_images'), $imagename);
            $packages->s2_img = $imagename;
        }
        
        if ($request->hasFile('s3_img')) {
            // Check if the old image exists and delete it
            if ($packages->s3_img && file_exists(public_path('slide_images/' . $packages->s3_img))) {
                unlink(public_path('slide_images/' . $packages->s3_img)); // Delete old image
            }
        
            // Handle the new image upload
            $image = $request->file('s3_img');
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext;
            $image->move(public_path('slide_images'), $imagename);
            $packages->s3_img = $imagename;
        }
        
    
        // Save the slide record (either new or updated)
        $packages->save();
    
        // Redirect to the list of slides with a success message
        return redirect()->route('admin.itinerary.list')->with('success', 'Package slide ' . ($request->has('id') ? 'updated' : 'created') . ' successfully.');

    }
    
}
