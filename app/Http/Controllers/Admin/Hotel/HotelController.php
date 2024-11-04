<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelCategory;
use Illuminate\Support\Facades\file; 
class HotelController extends Controller
{
    public function create($id)
    {
        $hotelCategory = HotelCategory::findOrFail($id);
        return view('admin.hotel.index', compact('hotelCategory'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'no_of_room' => 'required',
            'img1' => 'image|nullable',
            'img2' => 'image|nullable',
            'img3' => 'image|nullable',
        ]);
        // dd($request->all());
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->no_of_room = $request->no_of_room;
        $hotel -> destination = $request->destination;
        $hotel -> location_wise = $request->location_wise;
        $hotel -> category_wise = $request->category_wise;
        // Handle image uploads
    foreach (['img1', 'img2', 'img3'] as $hotel_img) {
        if ($request->hasFile($hotel_img)) {
            $imageName = time() . '_' . $request->file($hotel_img)->getClientOriginalName();
            $request->file($hotel_img)->move(public_path('hotel_img'), $imageName);
            // Save the image path in the database
            $hotel->$hotel_img = 'hotel_img/' . $imageName;
        }
    }
        $hotel->save();
        return redirect()->route('admin.hotel.category')->with('success', 'Hotel added successfully.');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Search for ferries by destination
        $hotels = Hotel::when($search, function ($query) use ($search) {
            return $query->where('destination', 'LIKE', '%' . $search . '%'); // Adjust 'destination' as needed
        })->paginate(5);
    // $hotels = Hotel::all(); 
    return view('admin.hotel.list', compact('hotels','search'));
    }
       
    public function edit($id){
        $hotel = Hotel::find($id);
        return view('admin.hotel.edit',compact('hotel'));
    }


    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Validate incoming data
        $request->validate([
            'name' => 'required',
            'no_of_room' => 'required',
            'img1' => 'image|nullable',
            'img2' => 'image|nullable',
            'img3' => 'image|nullable',
        ]);

        // Update hotel details
        $hotel->name = $request->name;
        $hotel->no_of_room = $request->no_of_room;
        $hotel->destination = $request->destination;
        $hotel->location_wise = $request->location_wise;
        $hotel->category_wise = $request->category_wise;

        // Handle image uploads
        foreach (['img1', 'img2', 'img3'] as $hotel_img) {
            if ($request->hasFile($hotel_img)) {
                // Delete old image if it exists
                if ($hotel->{$hotel_img}) {
                    File::delete(public_path($hotel->{$hotel_img}));
                }

                // Store the new image
                $imageName = time() . '_' . $request->file($hotel_img)->getClientOriginalName();
                $request->file($hotel_img)->move(public_path('hotel_img'), $imageName);

                // Save the image path in the database
                $hotel->{$hotel_img} = 'hotel_img/' . $imageName;
            }
        }

        // Save the updated hotel details
        $hotel->save();

        return redirect()->route('admin.hotels.list')->with('success', 'Hotel updated successfully.');
    }

    public function delete($id)
{
    $hotel = Hotel::findOrFail($id);

    // Delete associated images if they exist
    foreach (['img1', 'img2', 'img3'] as $img) {
        if ($hotel->{$img}) {
            File::delete('hotel_img/' . $hotel->{$img});
        }
    }

    // Delete the hotel record
    $hotel->delete();
    return redirect()->route('admin.hotels.list')->with('success', 'Hotel deleted successfully.');
}


}