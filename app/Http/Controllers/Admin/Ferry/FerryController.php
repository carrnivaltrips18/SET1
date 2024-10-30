<?php

namespace App\Http\Controllers\Admin\Ferry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ferry;
class FerryController extends Controller
{
    public function list()
    {
        $ferry =Ferry::all();
        return view('admin.ferry.list',compact('ferry'));
    }
    public function index()
    {
        return view('admin.ferry.index');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'ferry_type' => 'required',
            'destination'  => 'required',
            'pickup_location_wise'  => 'required',
            'pickup_sightseeing_point'  => 'required',
            'drop_location_wise'  => 'required',
            'drop_sightseeing_point'  => 'required',
            'price'  => 'required',
            'pick_session_price'  => 'required',
            'off_session_price'  => 'required',
        ]);
        $ferrys = new Ferry();
        $ferrys -> ferry_type = $request -> ferry_type;
        $ferrys -> destination = $request -> destination;
        $ferrys -> pickup_location_wise = $request -> pickup_location_wise;
        $ferrys -> pickup_sightseeing_point = $request -> pickup_sightseeing_point;
        $ferrys -> drop_location_wise = $request -> drop_location_wise;
        $ferrys -> drop_sightseeing_point = $request -> drop_sightseeing_point;
        $ferrys -> price = $request -> price;
        $ferrys -> pick_session_price = $request -> pick_session_price;
        $ferrys -> off_session_price = $request -> off_session_price;
        $ferrys -> save();
        return redirect()->Route('admin.ferry')->with('success','Ferry add successfully');
    }
    public function edit(Request $request, $id)
    {
        $ferrys = Ferry::findOrFail($id);
        return view('admin.ferry.edit' , compact('ferrys'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $ferries = Ferry::findOrFail($id);
        $ferries -> ferry_type = $request -> ferry_type;
        $ferries -> destination = $request -> destination;
        $ferries -> pickup_location_wise = $request -> pickup_location_wise;
        $ferries -> pickup_sightseeing_point = $request -> pickup_sightseeing_point;
        $ferries -> drop_location_wise = $request -> drop_location_wise;
        $ferries -> drop_sightseeing_point = $request -> drop_sightseeing_point;
        $ferries -> price = $request -> price;
        $ferries -> pick_session_price = $request -> pick_session_price;
        $ferries -> off_session_price = $request -> off_session_price;
        $ferries -> save();
        return redirect()->Route('admin.ferry')->with('success','Ferry add successfully');
    }
    public function delete(Request $request, $id)
    {
        $ferries = Ferry::findOrFail($id);
        $ferries->delete();
        return redirect()->route('admin.ferry')->with('success','Ferry Delete successfully');
    }
}
