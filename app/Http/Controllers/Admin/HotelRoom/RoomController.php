<?php

namespace App\Http\Controllers\Admin\HotelRoom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelRoom;



class RoomController extends Controller
{
    public function create($id)
    {
        $hotel = Hotel::find($id);
        $hotelroom = HotelRoom::where('hotel_id', $hotel->id)->get();
        return view('admin.hotel_room.index', compact('hotel', 'hotelroom'));
    }
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'capacity' => 'required',
                'bed' => 'required',
                'ac_type' => 'required',
                'amenities' => 'required',
                'price' => 'required',
                'pick_season_price' => 'required',
                'off_season_price' => 'required',
                'status' => 'required',
        ]);

                    // dd($request->all());

        for ($i = 0; $i < count($request->name); $i++) {
            $hotelrooms = new HotelRoom();
            $hotelrooms->hotel_id = $request->hotel_id;
            $hotelrooms->hotel_name = $request->hotel_name;
            $hotelrooms->destination = $request->destination;
            $hotelrooms->location_wise = $request->location_wise;
            $hotelrooms->category_wise = $request->category_wise;
            $hotelrooms->name = $request->name[$i];
            $hotelrooms->capacity = $request->capacity[$i];
            $hotelrooms->bed = $request->bed[$i];
            $hotelrooms->ac_type = $request->ac_type[$i];
            $hotelrooms->amenities = $request->amenities[$i];
            $hotelrooms->price = $request->price[$i];
            $hotelrooms->pick_season_price = $request->pick_season_price[$i];
            $hotelrooms->off_season_price = $request->off_season_price[$i];
            $hotelrooms->status = $request->status[$i];
            $hotelrooms->save();
        }

        return redirect()->route('admin.hotels.list')->with('success', 'Hotel Room added successfully.');
    }
    public function list(Request $request)
    {
        $search = $request->input('search');

        // Search for ferries by destination
        $hotelroom = HotelRoom::when($search, function ($query) use ($search) {
            return $query->where('hotel_name', 'LIKE', '%' . $search . '%'); // Adjust 'destination' as needed
        })->paginate(5);
        // $hotelroom = HotelRoom::all();
        // dd($hotelroom->all());
        return view('admin.hotel_room.list', compact('hotelroom','search'));
    }

    public function delete($id)
    {
        $hotelroom = HotelRoom::findOrFail($id);
        $hotelroom->delete();
        return redirect()->route('admin.hotel.rooms.list')->with('success', 'delete successfully room detels');
    }
    public function edit($hotelId, $roomId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $room = HotelRoom::findOrFail($roomId);

        return view('admin.hotel_room.edit', compact('hotel', 'room'));
    }
    public function update(Request $request, $hotelId, $roomId)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'bed' => 'required',
            'ac_type' => 'required',
            'amenities' => 'required',
            'price' => 'required',
            'pick_season_price' => 'required',
            'off_season_price' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        $hotelRoom = HotelRoom::findOrFail($roomId);
        $hotelRoom->name = $request->name;
        $hotelRoom->capacity = $request->capacity;
        $hotelRoom->bed = $request->bed;
        $hotelRoom->ac_type = $request->ac_type;
        $hotelRoom->amenities = $request->amenities;
        $hotelRoom->price = $request->price;
        $hotelRoom->pick_season_price = $request->pick_season_price;
        $hotelRoom->off_season_price = $request->off_season_price;
        $hotelRoom->status = $request->status;
        $hotelRoom->save();
        return redirect()->route('admin.hotel.rooms.list')->with('success', 'Room updated successfully.');
    }
    
}